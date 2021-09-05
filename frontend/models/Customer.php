<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $area_code
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'phone'], 'required'],
            [['email'],'email'],
            [['phone'],'unique'],
            [['email'],'unique', 'when' => function ($model) {
                return !empty($model->email);
            }],
            [['user_id', 'area_code'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'area_code' => 'Area',
        ];
    }
}
