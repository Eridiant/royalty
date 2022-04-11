<?php

namespace common\components;

use Yii;
use yii\base\Component;

class TranslateComponent extends Component
{
    public function getT($key)
    {
        if (Yii::$app->user->isGuest) {
            return Yii::t('app', $key);
        } else {
            return "<p class='translate' data-translate='" . $key . "'>" . Yii::t('frontend', $key) . "</p>";
        }
    }
}