<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%flat}}".
 *
 * @property int $id
 * @property int $floor_id
 * @property int $num
 * @property float|null $money
 * @property float|null $total_area
 * @property float|null $living_space
 * @property float|null $balcony_area
 * @property int $status
 *
 * @property Floor $floor
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%flat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor_id', 'num'], 'required'],
            [['floor_id', 'num', 'status'], 'integer'],
            [['money', 'total_area', 'living_space', 'balcony_area'], 'number'],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Floor::class, 'targetAttribute' => ['floor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor_id' => 'Floor ID',
            'num' => 'Num',
            'money' => 'Money',
            'total_area' => 'Total Area',
            'living_space' => 'Living Space',
            'balcony_area' => 'Balcony Area',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Floor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floor::class, ['id' => 'floor_id']);
    }
}
