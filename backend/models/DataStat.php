<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%data_stat}}".
 *
 * @property int $id
 * @property int $year
 * @property int $month
 * @property int $day
 * @property int $hour
 * @property int $date
 *
 * @property PageChart[] $pageCharts
 */
class DataStat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%data_stat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'month', 'day', 'hour', 'date'], 'required'],
            [['year', 'month', 'day', 'hour', 'date'], 'integer'],
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
            'hour' => 'Hour',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[PageCharts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageChart()
    {
        return $this->hasOne(PageChart::class, ['data_id' => 'id']);
    }
}
