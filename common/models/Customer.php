<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $bussiness_name
 * @property string $gst_no
 * @property string $mail
 * @property string $number
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $discount
 * @property int $status
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
            [['user_id', 'name', 'mail', 'number', 'address', 'city', 'state', 'zip', 'status'], 'required'],
            ['mail','email'],
            ['mail', 'unique'],
            [['number'],'string', 'min' => 10],
            [['number'], 'number'],
            [['user_id', 'status'], 'integer'],
            [['name', 'bussiness_name', 'gst_no', 'mail', 'number', 'address', 'city', 'state', 'zip', 'discount'], 'string', 'max' => 255],
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
            'bussiness_name' => 'Bussiness Name',
            'gst_no' => 'VAT No',
            'mail' => 'Mail',
            'number' => 'Number',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'discount' => 'Discount',
            'status' => 'Status',
        ];
    }
}
