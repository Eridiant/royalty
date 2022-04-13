<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%lg_message}}".
 *
 * @property int $id
 * @property string $language
 * @property string|null $translation
 *
 * @property LgSourceMessage $id0
 * @property Language $language0
 */
class TrasnlationsMessage extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%lg_message}}';
    }

    public function rules()
    {
        return [
            [['language', 'translation', 'id'], 'required'],
            [['translation'], 'string'],
            [['language'], 'exist', 'targetClass'=> Language::class, 'targetAttribute'=>'key']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'language' => 'Язык',
            'translation' => 'Перевод',
        ];
    }
}
