<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "pr_category".
 *
 * @property int $oldpass
 * @property string $newpass
 * @property string $repetnewpass
 */
class Forgot extends Model
{
    public $email;
    public $repassword;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password', 'repassword'], 'required'],
            ['email', 'findemail'],
            ['email', 'email'],
            [['password', 'repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function findemail($attribute, $params)
    {
        $user = User::findByUsername($this->email);
        if (empty($user))
            $this->addError($attribute, 'Email address not found.');
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'Name',
            'phone' => 'Phone',
            'password' => 'Password',
            'repassword' => 'Confirm Password',
            'terms' => 'I agree to the',
        ];
    }
}
