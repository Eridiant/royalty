<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%page_by_day}}".
 *
 * @property int $id
 * @property int $data_id
 * @property int $page
 *
 * @property DayStat $data
 */
class PageByDay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%page_by_day}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_id', 'page'], 'required'],
            [['data_id', 'page'], 'integer'],
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
            'page' => 'Page',
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
