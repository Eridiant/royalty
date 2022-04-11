<?php
/*
 * Severtain
 * 23.07.21
 * */

namespace common\components;

use Yii;
use yii\base\Component;

class TranslateComponent extends Component
{
    /*
     * Возвращает переводимый текст по ключу
     * TODO Remove!
     */
    public function returnTranslateByKey($key, $lang = "", $defaultText = "")
    {
        $lang = Yii::$app->language;
        $defaultText = $key;

        $translate_value = Yii::$app->db->createCommand(
            'SELECT *
                  FROM {{%translation}} as pf
                  WHERE pf.key = "' . $key . '" AND pf.lang="' . $lang . '" '
        )->queryOne()['text'];

        if (!Yii::$app->user->isGuest && Yii::$app->request->get('edit_mode')) {
            if (Yii::$app->user->can("canAdmin")) {
                //Enter text
                if ($translate_value)
                    return "<div style='display:inline-block;' class='site-text-translate' key='$key'>" . $translate_value . "</div>";
                else
                    return
                        "<div style='display:inline-block;' class='site-text-translate not-text' key='$key'>$defaultText</div>";
            } else
                return $translate_value ? $translate_value : $defaultText;
        } else
            return $translate_value ? $translate_value : $defaultText;
    }

    /*
     * Method to translate phrase
     * @key - translated phrase
     */
    public function getT($key)
    {
        $lang = Yii::$app->language;
        $defaultText = $key;
        $SQL_GET_TRANSLATION = "SELECT * FROM {{%translation}} as pf WHERE pf.key = ";

        $translate_value = Yii::$app->db->createCommand(
            $SQL_GET_TRANSLATION.' "' . $key . '" AND pf.lang="' . $lang . '" '
        )->queryOne();

        if (isset($translate_value) && is_array($translate_value)) {
            $translate_value = $translate_value['text'];
        } else
            $translate_value = null;

        if (!Yii::$app->user->isGuest) {
            if ( Yii::$app->user->can("canAdmin") ) {
                $text = $translate_value ? $translate_value : $defaultText;

                return "<wts-yii-phrase translatable data-origin='$defaultText' data-translate='$translate_value'>$text</wts-yii-phrase>";
            }
        }

        return $translate_value ? $translate_value : $defaultText;
    }
}