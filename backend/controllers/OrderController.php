<?php

namespace backend\controllers;

use Yii;
use common\models\Order;
use backend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
                        'actions' => ['index','status','delete','price','received', 'process','filec','delivered','printing','ready','dispatch','deleted', 'status'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionReceived()
    {
        $this->view->title = 'New Orders';
        $searchModel = new OrderSearch();
        $searchModel->status = 0;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProcess()
    {
        $this->view->title = 'In-Process Orders';
        $searchModel = new OrderSearch();
        $searchModel->status = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReady()
    {
        $this->view->title = 'Ready Orders';
        $searchModel = new OrderSearch();
        $searchModel->status = 3;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPrinting()
    {
        $this->view->title = 'In-Printing Orders';
        $searchModel = new OrderSearch();
        $searchModel->status = 2;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDispatch()
    {
        $this->view->title = 'Dispatched Orders';
        $searchModel = new OrderSearch();
        $searchModel->status = 4;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelivered()
    {
        $this->view->title = 'Delivered Orders';
        $searchModel = new OrderSearch();
        $searchModel->status = 5;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionStatus()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $model = $this->findModel($_REQUEST['id']);
            $model->status = $_REQUEST['status'];
            if ($model->save(false)) {
                $data['msg'] = 'success';
                echo json_encode($data);
            } else {
                $data['msg'] = 'error';
                echo json_encode($data);
            }
        }
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
