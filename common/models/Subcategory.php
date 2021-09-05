<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subcategory}}".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $name
 * @property int $status
 */
class Subcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subcategory}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'name', 'status'], 'required'],
            ['name','unique'],
            [['cat_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }

    public static function status($status)
    {
        $data = Category::findOne($status);
        if($data->status == true)
        {
            $v = '<span class="badge badge-success">Active</span>';
        }
        else
        {
            $v = '<span class="badge badge-danger">Inactive</span>';
        }

        return $v;
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }
}
