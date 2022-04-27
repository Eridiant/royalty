<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_ip}}".
 *
 * @property int $id
 * @property int $ip
 * @property string|null $code
 * @property string|null $country
 * @property string|null $city
 * @property int $created_at
 *
 * @property UserActivity[] $userActivities
 */
class UserIp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_ip}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip'], 'required'],
            [['ip', 'created_at'], 'integer'],
            [['code'], 'string', 'max' => 10],
            [['country', 'city'], 'string', 'max' => 64],
        ];
    }

    // public function behaviors()
    // {
    //     return [
    //         'timestamp' => [
    //             'class' => TimestampBehavior::class,
    //             'attributes' => [
    //                 \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
    //                 \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
    //             ],
    //             'value' => new \yii\db\Expression('NOW()'),
    //         ],
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'code' => 'Code',
            'country' => 'Country',
            'city' => 'City',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[UserActivities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserActivities()
    {
        return $this->hasMany(UserActivity::class, ['user_id' => 'id']);
    }
}
