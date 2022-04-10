<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%flat}}".
 *
 * @property int $id
 * @property int $floor_id
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
            [['floor_id'], 'required'],
            [['floor_id'], 'integer'],
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
