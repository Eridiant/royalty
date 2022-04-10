<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%callback}}".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string|null $subject
 * @property string|null $lang
 * @property int|null $viewed
 * @property string $created_at
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%callback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['viewed'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'subject'], 'string', 'max' => 255],
            [['phone', 'email', 'lang'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'subject' => 'Subject',
            'lang' => 'Lang',
            'viewed' => 'Viewed',
            'created_at' => 'Created At',
        ];
    }
}
