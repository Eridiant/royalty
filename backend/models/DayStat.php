<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%day_stat}}".
 *
 * @property int $id
 * @property int $year
 * @property int $month
 * @property int $day
 * @property int $date
 *
 * @property UserChart[] $userCharts
 * @property UserNew[] $userNews
 */
class DayStat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%day_stat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'month', 'day', 'date'], 'required'],
            [['year', 'month', 'day', 'date'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'month' => 'Month',
            'day' => 'Day',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[UserCharts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserChart()
    {
        return $this->hasOne(UserChart::class, ['data_id' => 'id']);
    }

    /**
     * Gets query for [[UserNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserNew()
    {
        return $this->hasOne(UserNew::class, ['data_id' => 'id']);
    }
}
