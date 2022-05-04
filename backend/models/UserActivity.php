<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user_activity}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $url
 * @property string|null $ref
 * @property string|null $lang
 * @property string|null $device
 * @property int $created_at
 *
 * @property UserIp $user
 */
class UserActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_activity}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['url', 'ref', 'device'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 12],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserIp::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'url' => 'Url',
            'ref' => 'Ref',
            'lang' => 'Lang',
            'device' => 'Device',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserIp::class, ['id' => 'user_id']);
    }
}
