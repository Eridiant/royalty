<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%page_chart}}".
 *
 * @property int $id
 * @property int $data_id
 * @property int $page
 *
 * @property DataStat $data
 */
class PageChart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%page_chart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_id', 'page'], 'required'],
            [['data_id', 'page'], 'integer'],
            [['data_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataStat::class, 'targetAttribute' => ['data_id' => 'id']],
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
        return $this->hasOne(DataStat::class, ['id' => 'data_id']);
    }
}
