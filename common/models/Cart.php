<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property int $id
 * @property int $product_id
 * @property int $qty
 * @property string $price
 * @property int $user_id
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'qty', 'price', 'user_id'], 'required'],
            [['product_id', 'qty', 'user_id'], 'integer'],
            [['price'], 'string', 'max' => 25],
            [['door_type', 'color', 'accessories'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
            'price' => 'Price',
            'door_type' => 'Door Type',
            'color' => 'Color',
            'accessories' => 'Accessories', 
            'user_id' => 'User ID',
        ];
    }
}
