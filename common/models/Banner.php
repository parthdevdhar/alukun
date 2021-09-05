<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property int $id
 * @property string $banner_img
 * @property int $order_id
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id'], 'integer'],
            [
                ['banner_img'], 'image', 
                'minWidth' => 2500,
                'maxWidth' => 2500,
                'minHeight' => 850,
                'maxHeight' => 850,  
                'skipOnEmpty' => !$this->isNewRecord, 
                'extensions' => 'png, jpg, jpeg'
            ],
            //[['banner_img'], 'string', 'max' => 255],
            [['description', 'btn_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banner_img' => 'Banner Image',
            'order_id' => 'Order ID',
            'description' => 'Description',
            'btn_link' => 'Button Link',
            'btn_title' => 'Button Title',
        ];
    }
    function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . '-';
    }
}
