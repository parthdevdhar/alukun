<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use common\models\Product;
use common\models\ProductCount;
use yii\db\Expression;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ShopController implements the CRUD actions for Product model.
 */
class ShopController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['mailsent'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all Product models.
     */
    public function actionProductdetail($any, $id)
    {
        $site_data = yii::$app->lib->front();
        $product = Product::find()->where(['id' => $id])->one();
        $pcount = ProductCount::find()->where(['product_id' => $id])->one();
        if ($pcount) {
            $pcount->view = $pcount->view + 1;
            $pcount->save();
        } else {
            $count = new ProductCount();
            $count->product_id = $id;
            $count->view = 1;
            $count->wishlisted = 0;
            $count->incart = 0;
            $count->save();
        }

        $cat = Category::find()->select('name')->where(['id'=>$product->cat_id])->one();
        
        $rltd = Product::find()->where(['cat_id' => $product->cat_id])->andWhere(['<>', 'id', $product->id])->orderBy(new Expression('rand()'))->limit(10)->all();

        $this->view->title = "Rowdy Machines | " . $product->name;
        $this->view->params['breadcrumbs'][] = ['label' => 'Wallpapers', 'url' => ['wallpaper']];
        $this->view->params['breadcrumbs'][] = $product->name;

        return $this->render('detail', [
            'product' => $product,
            'random' => $rltd,
            'site_data' => $site_data,
            'cat_name'=>$cat->name
        ]);
    }


    public function actionIndex()
    {
        $site_data = yii::$app->lib->front();
        if (isset($_GET['id'])) {
            $wall = Category::find()->where(['id' => $_GET['id']])->one();
            $product = Product::find()->where(['cat_id' => $_GET['id']]);

            $this->view->title = 'Rowdy Machines | ' . $wall->name;
            $this->view->params['breadcrumbs'][] = ['label' => $wall->name, 'url' => ['wallpaper']];

            $countQuery = clone $product;
            $pages = new Pagination(['defaultPageSize' => 12, 'totalCount' => $countQuery->count(), 'pageParam' => 'page']);
            $model = $product->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('clist', [
                'model' => $model,
                'pages' => $pages,
                'site_data' => $site_data
            ]);
        } else {

            $product = Product::find();
            $this->view->title = 'Rowdy Machines';
            $this->view->params['breadcrumbs'][] = $this->view->title;

            $countQuery = clone $product;
            $pages = new Pagination(['defaultPageSize' => 12, 'totalCount' => $countQuery->count(), 'pageParam' => 'page']);
            $model = $product->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('clist', [
                'model' => $model,
                'pages' => $pages,
                'site_data' => $site_data
            ]);
        }
    }

    public function actionSearch()
    {

        $site_data = yii::$app->lib->front();
        $product = Product::find()->where(['like', 'name', @$_GET['term']]);
        $this->view->title = 'Rowdy Machines';
        $this->view->params['breadcrumbs'][] = $this->view->title;

        $countQuery = clone $product;
        $pages = new Pagination(['defaultPageSize' => 12, 'totalCount' => $countQuery->count(), 'pageParam' => 'page']);
        $model = $product->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', [
            'model' => $model,
            'pages' => $pages,
            'site_data' => $site_data
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /* public function actionTrack()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $password = "NGGBr7RHgqydFKxun98SdL7yS";
            $key = "iOxyqz8wjtmeHkhR";//live 
            // $key = "JGg7PQs1bFXm8nGg";//test 
            $id = "449044304137821";
            $accountNo = "510087640";
            $meterNo = "252796197";//live
            // $meterNo = "119187598";//test
            // Build Authentication
            $request['WebAuthenticationDetail'] = [
                'UserCredential' => [
                    'Key' => $key, //Replace it with FedEx Key,
                    'Password' => $password //Replace it with FedEx API Password
                ]
            ];


            //Build Client Detail
            $request['ClientDetail'] = [
                'AccountNumber' => $accountNo, //Replace it with Account Number,
                'MeterNumber' => $meterNo //Replace it with Meter Number
            ];


            // Build Customer Transaction Id
            $request['TransactionDetail'] = [
                'CustomerTransactionId' => 'API request by using PHP'
            ];


            // Build API Version info
            $request['Version'] = [
                'ServiceId' => 'trck',
                'Major' => 19, // You can change it based on you using api version
                'Intermediate' => 0, // You can change it based on you using api version
                'Minor' => 0 // You can change it based on you using api version
            ];


            // Build Tracking Number info
            $request['SelectionDetails'] = array(
                'PackageIdentifier' => array(
                    'Type' => 'TRACKING_NUMBER_OR_DOORTAG',
                    'Value' => $id //Replace it with FedEx tracking number
                )
            );

            $wsdlPath = '../../TrackService_v19.wsdl';
            $endPoint = 'https://wsbeta.fedex.com:443/web-services'; //You will get it when requesting to FedEx key. It might change based on the API Environments
            // echo $wsdlPath;exit;
            $client = new \SoapClient($wsdlPath, array('trace' => true));
            $client->__setLocation($endPoint);

            $apiResponse = $client->track($request);

            if($apiResponse->HighestSeverity == 'SUCCESS'){
                $res['status'] = 1;
                $res['message'] = 'SUCCESS';
                $res['location'] = @$apiResponse->CompletedTrackDetails->TrackDetails->StatusDetail->Location->City.', '. $apiResponse->CompletedTrackDetails->TrackDetails->StatusDetail->Location->StateOrProvinceCode.', '. $apiResponse->CompletedTrackDetails->TrackDetails->StatusDetail->Location->CountryCode;
                $dt = explode('T',@$apiResponse->CompletedTrackDetails->TrackDetails->StatusDetail->CreationTime);
                $res['date'] = @$dt[0];
                $res['time'] = @$dt[1];
                
            }else{
                $res['status'] = 0;
                $res['message'] = 'ERROR: Data not found';
            }
        } else {
            header("HTTP/1.1 404 Not Found");
            exit;
        }
        return Json::encode($res);
    } */

    public function actionMailsent()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            /* Yii::$app->mailer->compose()
                ->setTo($_POST['email'])
                ->setFrom(['info@brainweblab.com' => 'Parth'])
                ->setSubject('Enquiry for ' . $_POST['window'])
                ->setHtmlBody(
                    '<h2>' . $_POST['window'] . '</h2><br>' .
                        '<b>Full Name :</b>' . $_POST['fname'] . '' . $_POST['lname'] . '<br>' .
                        '<b>Email :</b>' . $_POST['email'] . '<br>' .
                        '<b>Phone-no :</b>' . $_POST['phone-no'] . '<br>' .
                        '<b>Requirement :</b>' . $_POST['comment'] . '<br>'
                )->send(); */
            return true;
        } else {
            return false;
        }
    }
}
