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
class DconfigController extends Controller
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

        $rltd = Product::find()->where(['cat_id' => $product->cat_id])->andWhere(['<>', 'id', $product->id])->orderBy(new Expression('rand()'))->limit(10)->all();

        $this->view->title = "Rowdy Machines | " . $product->name;
        $this->view->params['breadcrumbs'][] = ['label' => 'Wallpapers', 'url' => ['wallpaper']];
        $this->view->params['breadcrumbs'][] = $product->name;

        return $this->render('detail', [
            'product' => $product,
            'random' => $rltd,
            'site_data' => $site_data
        ]);
    }

    public function actionType($id)
    {
        $site_data = yii::$app->lib->front();
        $product = Product::find()->where(['id' => $id])->one();

        $rltd = Product::find()->where(['cat_id' => $product->cat_id])->andWhere(['<>', 'id', $product->id])->orderBy(new Expression('rand()'))->limit(10)->all();

        $this->view->title = "Alukun | " . $product->name;
        $this->view->params['breadcrumbs'][] = ['label' => 'Wallpapers', 'url' => ['wallpaper']];
        $this->view->params['breadcrumbs'][] = $product->name;

        return $this->render('type', [
            'product' => $product,
            'random' => $rltd,
            'site_data' => $site_data
        ]);
    }

    public function actionColour($id)
    {
        $site_data = yii::$app->lib->front();
        $product = Product::find()->where(['id' => $id])->one();

        $rltd = Product::find()->where(['cat_id' => $product->cat_id])->andWhere(['<>', 'id', $product->id])->orderBy(new Expression('rand()'))->limit(10)->all();

        $this->view->title = "Alukun | " . $product->name;
        $this->view->params['breadcrumbs'][] = ['label' => 'Wallpapers', 'url' => ['wallpaper']];
        $this->view->params['breadcrumbs'][] = $product->name;

        return $this->render('colour', [
            'product' => $product,
            'random' => $rltd,
            'site_data' => $site_data
        ]);
    }

    public function actionAccessories($id)
    {
        $site_data = yii::$app->lib->front();
        $product = Product::find()->where(['id' => $id])->one();

        $rltd = Product::find()->where(['cat_id' => $product->cat_id])->andWhere(['<>', 'id', $product->id])->orderBy(new Expression('rand()'))->limit(10)->all();

        $this->view->title = "Alukun | " . $product->name;
        $this->view->params['breadcrumbs'][] = ['label' => 'Wallpapers', 'url' => ['wallpaper']];
        $this->view->params['breadcrumbs'][] = $product->name;

        return $this->render('accessories', [
            'product' => $product,
            'random' => $rltd,
            'site_data' => $site_data
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
}
