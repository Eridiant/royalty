<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%language}}".
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string $code
 * @property int $default
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $deleted_at
 *
 * @property LgSourceMessage[] $ids
 * @property LgMessage[] $lgMessages
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'key', 'code', 'created_at', 'updated_at'], 'required'],
            [['default', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 24],
            [['key'], 'string', 'max' => 16],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'key' => 'Key',
            'code' => 'Code',
            'default' => 'Default',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Ids]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(LgSourceMessage::className(), ['id' => 'id'])->viaTable('{{%lg_message}}', ['language' => 'key']);
    }

    /**
     * Gets query for [[LgMessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLgMessages()
    {
        return $this->hasMany(LgMessage::className(), ['language' => 'key']);
    }
}
