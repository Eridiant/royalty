<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%floor}}".
 *
 * @property int $id
 * @property int $floor
 * @property int|null $price
 *
 * @property Flat[] $flats
 */
class Floor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%floor}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor'], 'required'],
            [['floor', 'price'], 'integer'],
            [['floor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor' => 'Floor',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Flats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flat::class, ['floor_id' => 'id']);
    }
}
