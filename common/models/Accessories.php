<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pt_accessories".
 *
 * @property int $id
 * @property string $name
 * @property int $img
 */
class Accessories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt_accessories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img'], 'required'],
            [['img'], 'integer'],
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
            'name' => 'Name',
            'img' => 'Img',
        ];
    }
}
