<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%lg_source_message}}".
 *
 * @property int $id
 * @property string|null $category
 * @property string|null $message
 *
 * @property Language[] $languages
 * @property LgMessage[] $lgMessages
 */
class Trasnlations extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%lg_source_message}}';
    }

    public function rules()
    {
        return [
            [['category', 'message'], 'required'],
            [['message'], 'string'],
            [['category'], 'in', 'range'=>['common','frontend','backend']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'category' => 'Категория',
            'message' => 'Сообщение',
        ];
    }
    
    public function getTranslaits() {
        return $this->hasMany(TrasnlationsMessage::class, ['id'=>'id']);
    }
    
    public function getTranslait() {
        return $this->hasOne(TrasnlationsMessage::class, ['id'=>'id'])->where(['language'=>\Yii::$app->language]);
    }
}
