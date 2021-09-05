<?php

namespace backend\controllers;

use Yii;
use common\models\Customer;
use backend\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\User;
use kartik\mpdf\Pdf;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
                        'actions' => ['create', 'index', 'delete', 'update', 'invoice'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = New User();
        $model = new Customer();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $model->user_id = 1;
            $model->status = 1;

            if($user->validate() && $model->validate()){
                $user->pass = $user::passEncode($user->pass);
                $user->type = 2;
                $user->save(false);
                $model->user_id = $user->id;
                $model->save(false);
                Yii::$app->session->setFlash('success', "Customer added successfully.");
                return $this->redirect(['index']);
            }
            else {
                Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
            }
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = ''   ;
        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){
            Yii::$app->session->setFlash('success', "Customer updated successfully.");
            return $this->redirect(['index']);
            }
            else {
            Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
        }
        } 

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionInvoice($id)
    {
        date_default_timezone_set('Asia/Calcutta');
        $model = \common\models\Order::findOne($id);
        $customer = Customer::find()->where(['user_id' => $model->user_id])->one();
        $admin = Customer::find()->where(['user_id' => 1])->one();
        $filename = 'Invoice' . str_pad($model->id, 4, "0", STR_PAD_LEFT);
        $pdf = new Pdf([
            'content' => $this->renderPartial('invoice', ['model' => $model, 'customer' => $customer, 'admin' => $admin]),
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'Invoice',
                'SetHeader' => ['| Invoice |'],
                'SetFooter' => ['|Page {PAGENO}|'],
            ],
            'cssInline' => '.page-invoice-table{margin-top:40px;margin-bottom:20px}.page-invoice-table tbody{border-bottom:1px solid #e4eaec}.page-invoice-table .table>tbody>tr>td,.page-invoice-table .table>tbody>tr>th,.page-invoice-table .table>tfoot>tr>td,.page-invoice-table .table>tfoot>tr>th,.page-invoice-table .table>thead>tr>td,.page-invoice-table .table>thead>tr>th{padding:15px 8px}.page-invoice-amount{padding-top:10px;margin-bottom:40px;font-size:20px;border-top:1px solid #e4eaec}@media (max-width:767px){.page-invoice .page-content .btn-animate{margin-bottom:10px}}
                .panel-body { position: relative; padding: 30px;}.panel {position: relative; margin-bottom: 2.143rem; background-color: #fff; border: 0 solid transparent; border-radius: .286rem; }
                .container-fluid { width: 100%; padding-right: 1.0715rem; padding-left: 1.0715rem; margin-right: auto; margin-left: auto;}
            ',
        ]);
        return $pdf->render();
    }
}
