<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pt_door_type".
 *
 * @property int $id
 * @property string $type
 * @property int $img
 */
class DoorType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt_door_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'img'], 'required'],
            [['img'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'img' => 'Img',
        ];
    }
}
