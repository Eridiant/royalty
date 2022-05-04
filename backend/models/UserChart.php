<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user_chart}}".
 *
 * @property int $id
 * @property int $data_id
 * @property int $user
 *
 * @property DayStat $data
 */
class UserChart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_chart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_id', 'user'], 'required'],
            [['data_id', 'user'], 'integer'],
            [['data_id'], 'exist', 'skipOnError' => true, 'targetClass' => DayStat::class, 'targetAttribute' => ['data_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_id' => 'Data ID',
            'user' => 'User',
        ];
    }

    /**
     * Gets query for [[Data]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return $this->hasOne(DayStat::class, ['id' => 'data_id']);
    }
}
