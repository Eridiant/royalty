<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user_ip}}".
 *
 * @property int $id
 * @property int $ip
 * @property string|null $code
 * @property string|null $country
 * @property string|null $region
 * @property string|null $city
 * @property int|null $checked
 * @property int $created_at
 *
 * @property UserActivity[] $userActivities
 */
class UserIp extends \yii\db\ActiveRecord
{
    public $cnt;

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
            [['ip', 'created_at'], 'required'],
            [['ip', 'checked', 'created_at'], 'integer'],
            [['code'], 'string', 'max' => 10],
            [['country', 'city'], 'string', 'max' => 64],
            [['region'], 'string', 'max' => 128],
        ];
    }

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
            'region' => 'Region',
            'city' => 'City',
            'checked' => 'Checked',
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
        return $this->hasMany(UserActivity::className(), ['user_id' => 'id']);
    }
}
