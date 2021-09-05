<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_count}}".
 *
 * @property int $id
 * @property int $product_id
 * @property int $view
 * @property int $wishlisted
 * @property int $incart
 */
class ProductCount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_count}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'view', 'wishlisted', 'incart'], 'safe'],
            [['product_id', 'view', 'wishlisted', 'incart'], 'integer'],
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
            'view' => 'View',
            'wishlisted' => 'Wishlisted',
            'incart' => 'Incart',
        ];
    }
}
