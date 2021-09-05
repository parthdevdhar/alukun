<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%frontend}}".
 *
 * @property int $id
 * @property string $filed
 * @property string $value
 */
class Frontend extends \yii\db\ActiveRecord
{
    Public $img = 'A';
    Public $type = 0;
    Public $val;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%frontend}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filed', 'value'], 'required'],
            [['filed', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filed' => 'Field',
            'value' => 'Value',
            'img' => 'Value',
            'val' => 'Embedded Code',
        ];
    }
}
