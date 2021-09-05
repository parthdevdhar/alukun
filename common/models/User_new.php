<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $pass
 * @property string $created_dt
 * @property string $modified_dt
 * @property int $is_deleted
 */
class User_new extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'pass'], 'required'],
            [['created_dt', 'modified_dt'], 'safe'],
            [['is_deleted'], 'integer'],
            [['username', 'pass'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'pass' => 'Pass',
            'created_dt' => 'Created Dt',
            'modified_dt' => 'Modified Dt',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
