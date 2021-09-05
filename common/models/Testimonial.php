<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%testimonial}}".
 *
 * @property int $id
 * @property string $name
 * @property string $designation
 * @property string $text
 * @property int $img
 */
class Testimonial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%testimonial}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'star'], 'required'],
            [['star'],'number'],
            [['img'], 'file', 'skipOnEmpty' => !$this->isNewRecord, 'extensions' => 'png, jpg, jpeg'],
            // [['img'], 'integer'],
            [['name', 'designation', 'text'], 'string', 'max' => 255],
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
            'designation' => 'Designation',
            'text' => 'Testimonial',
            'img' => 'Image',
            'star' => 'Star',
        ];
    }
}
