<?php

namespace frontend\models;

use common\models\Customer;
use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * This is the model class for table "pr_category".
 *
 * @property int $oldpass
 * @property string $newpass
 * @property string $repetnewpass
 */
class Register extends Model
{
    public $mail;
    public $name;
    public $phone;
    public $password;
    public $repassword;
    public $terms = true;

    public function rules()
    {
        return [
            [['mail', 'password', 'repassword', 'phone', 'name'], 'required'],
            [['phone'], 'number', 'numberPattern' => '/^\s*?[0-9]*?[0-9]+([eE][-+]?[0-9]+)?\s*$/', 'message' => 'Field must contain digits.'],
            ['phone', 'string', 'max' => 10, 'min' =>10, 'message' => 'Field must contain exactly 10 digits.'],
            ['phone', 'is8NumbersOnly'],
            ['terms', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms of Service to continue'],
            ['mail', 'findemail'],
            ['mail', 'email'],
            ['mail', 'findusername'],
            [['password', 'repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function findusername($attribute, $params)
    {
        $user = \common\models\User::findByUsername($this->mail);
        // echo '<pre>';print_r($user);exit;
        if (!empty($user->username)) {
            $this->addError($attribute, 'Already registered with this email.');
        }
    }

    public function findemail($attribute, $params)
    {
        $user = Customer::find()->where(['mail' => $this->mail])->one();
        if (!empty($user->mail))
            $this->addError($attribute, 'Already registered with this email.');
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

    public function is8NumbersOnly($attribute)
    {
        if (!preg_match('/^[0-9]{10}$/', $this->$attribute)) {
            $this->addError($attribute, 'must contain exactly 10 digits.');
        }
    }
}
