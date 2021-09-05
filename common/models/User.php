<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $pass
 * @property string $type
 * @property string $created_dt
 * @property string $modified_dt
 * @property int $is_deleted
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
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
            [['username'],'unique'],
            ['pass', 'string', 'min' => 6],
            [['type'], 'string'],
            [['is_deleted'], 'integer'],
            [['username', 'pass'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'pass' => 'Password',
            'type' => 'Type',
            'created_dt' => 'Created Dt',
            'modified_dt' => 'Modified Dt',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->pass);
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function passEncode($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function checkactive()
    {
        return $this->is_deleted;
    }

    public function checktype(){
        $a = false;
        if($this->type == 'admin'){
            $a = true;
        }
        return $a;
    }
}
