<?php

namespace backend\controllers;

use backend\models\ChangePass;
use backend\models\OrderSearch;
use common\models\LoginForm;
use Common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error', 'forgot'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            $statusCode = $exception->statusCode;
            $name = $exception->getName();
            $message = $exception->getMessage();

            $this->layout = 'error';

            return $this->render('error', [
                'statusCode' => $statusCode,
                'name' => $name,
                'message' => $message
            ]);
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangepassword()
    {
        $model = new ChangePass;
        $modeluser = User::find()->where(['id' => Yii::$app->user->id])->one();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                try {
                    $modeluser->pass = $modeluser->passEncode($model->newpass);
                    if ($modeluser->save()) {
                        Yii::$app->getSession()->setFlash('success', 'Password changed');
                        return $this->redirect(['index']);
                    } else {
                        Yii::$app->getSession()->setFlash('error', 'Password not changed');
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    Yii::$app->getSession()->setFlash('error', "{$e->getMessage()}");
                    return $this->render('changepass', [
                        'model' => $model
                    ]);
                }

            } else {
                return $this->render('changepass', [
                    'model' => $model
                ]);
            }
        } else {
            return $this->render('changepass', [
                'model' => $model
            ]);
        }
    }

    public function actionForgot()
    {
        $this->layout = 'login';
        $model = new Forgot();

        if (isset($_REQUEST['d']) && !empty($_REQUEST['d'])) {
            $pass = New Pass();
            if ($pass->load(Yii::$app->request->post())) {
                $modeluser = User::find()->where(['email' => base64_decode($_REQUEST['d'])])->one();
                if ($pass->validate()) {
                    try {
                        $modeluser->password = $modeluser->passEncode($pass->newpass);
                        if ($modeluser->save()) {
                            Yii::$app->getSession()->setFlash('success', 'Password changed');
                            return $this->redirect(['login']);
                        } else {
                            Yii::$app->getSession()->setFlash('error', 'Password not changed');
                            return $this->redirect(['login']);
                        }
                    } catch (Exception $e) {
                        Yii::$app->getSession()->setFlash('error', "{$e->getMessage()}");
                        return $this->render('changepass1', [
                            'model' => $pass,
                        ]);
                    }

                } else {
                    return $this->render('changepass1', [
                        'model' => $pass,
                    ]);
                }
            } else {
                return $this->render('changepass1', [
                    'model' => $pass,
                ]);
            }

            return $this->render('changepass1', [
                'model' => $pass,
            ]);
        } else {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $en = base64_encode($model->email);
                $this->redirect(['forgot', 'd' => $en]);
            }

            return $this->render('forgot', [
                'model' => $model,
            ]);
        }

    }
}
