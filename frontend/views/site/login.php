 <?php

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap\ActiveForm */
    /* @var $model \common\models\LoginForm */

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Url;

    $this->title = 'Login';
    $this->params['breadcrumbs'][] = $this->title;
    ?>

 <div class="login-register-box">

     <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

     <?= $form->field($model, 'username', ['template' => "<span class='icon-box'><i class='icon-f-72'></i></span>\n{input}\n{error}"])->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

     <?= $form->field($model, 'password', ['template' => "<span class='icon-box'><i class='icon-f-77'></i></span>\n{input}\n{error}"])->passwordInput(['placeholder' => 'Password']) ?>

     <div class="form-group form-check">
         <?= $form->field($model, 'rememberMe')->checkbox(['template' => "<div class=\"form-check-label\">{input} {label}</div>\n{error}", 'class' => 'form-check-input']) ?>

         <?= Html::a('Forgot password?', Url::to(['//forgot'])) ?>
     </div>

     <div class="form-group">
         <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
     </div>

     <?php ActiveForm::end(); ?>
     <div class="social-login">
         <p>Or you can Login with one of the following</p>
         <ul>
             <li><a href="javascript:void(0);"><i class="fab fa-google"></i></a></li>
             <li><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
         </ul>
     </div>
     <p class="login-register-link">Don't have and account? <a href="<?= Url::to(['//register']) ?>">Register</a></p>
     <p class="login-register-link">Go back <a href="<?= Url::to(['//']) ?>">Home</a></p>
 </div>