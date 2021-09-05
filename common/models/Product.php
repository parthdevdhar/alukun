<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $img
 * @property string $thumb
 * @property resource $description
 * @property string|null $door_type
 * @property string|null $colors
 * @property string|null $accessories
 * @property string $created_dt
 * @property string $modified_dt
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'name', 'price'], 'required'],
            [['price', 'discount_price'], 'number'],
            [['description'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => !$this->isNewRecord, 'extensions' => 'png, jpg, jpeg'],
            [['created_dt', 'modified_dt', 'discount_price', 'thumb'], 'safe'],
            [['name', 'price',  'thumb', 'discount_price',  'door_type', 'colors', 'accessories'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Category',
            'name' => 'Name',
            'price' => 'Price',
            'img' => 'Image',
            'thumb' => 'Thumb',
            'discount_price' => 'Discount Price',
            'description' => 'Description',
            'door_type' => 'Door Type',
            'colors' => 'Colors',
            'accessories' => 'Accessories',
            'created_dt' => 'Created Dt',
            'modified_dt' => 'Modified Dt',
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

    public static function status($id)
    {
        $v = '';
        switch ($id) {
            case "0":
                $v = '<span class="badge badge-default">Order Received</span>';
                break;
            case "1":
                $v = '<span class="badge badge-info">In-Process</span>';
                break;
            case "2":
                $v = '<span class="badge badge-dark">In Printing</span>';
                break;
            case "3":
                $v = '<span class="badge badge-primary">Order is Ready</span>';
                break;
            case "4";
                $v = '<span class="badge badge-success">Dispatched</span>';
                break;
            case "5";
                $v = '<span class="badge badge-success">Delivered</span>';
                break;
        }
        return $v;
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function getSubCategory()
    {
        return $this->hasOne(SubCat::className(), ['id' => 'subcat_id']);
    }
}
