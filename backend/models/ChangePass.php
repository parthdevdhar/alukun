<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use Common\models\User;

/**
 * This is the model class for table "pr_category".
 *
 * @property int $oldpass
 * @property string $newpass
 * @property string $repetnewpass
 */
class ChangePass extends Model
{
    public $oldpass;
    public $newpass;
    public $repeatnewpass;

    public function rules(){
        return [
            [['oldpass','newpass','repeatnewpass'],'required'],
            ['oldpass','findPasswords'],
            [['newpass','repeatnewpass'],'string','min'=>5],
            ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ['newpass','compare','compareAttribute'=>'oldpass','operator' => '!=','message'=>'New Password should not same as "Old Password".'],
        ];
    }

    public function findPasswords($attribute, $params){
        $user = User::find()->where(['id'=>yii::$app->user->id])->one();
        if(empty($user->validatePassword($this->oldpass)))
            $this->addError($attribute,'Old password is incorrect');
    }

    public function attributeLabels(){
        return [
            'oldpass'=>'Old Password',
            'newpass'=>'New Password',
            'repeatnewpass'=>'Repeat New Password',
        ];
    }

}