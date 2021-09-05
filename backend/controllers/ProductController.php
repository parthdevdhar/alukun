<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Subcategory;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\imagine\Image;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
                        'actions' => ['create', 'index', 'delete', 'update', 'child'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['child'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id' => SORT_DESC];

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

    public function actionCreate()
    {
        $cat = ArrayHelper::map(Category::findAll(['parent_id' => null]), 'id', 'name');
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $cat = (@$_POST['Product']['sub_cat'])? @$_POST['Product']['sub_cat'] : @$_POST['Product']['cat_id'];
            $model->cat_id = @$cat;
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->img && $model->validate()) {
                $model = Yii::$app->lib->uploadimg($model, Yii::$app->params['product']);
                $model->save(false);
                Yii::$app->session->setFlash('success', "Product added successfully.");
                return $this->redirect(['index']);
            } else {
                echo '<pre>';print_r($model);exit;
                Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
            }
        }

        return $this->render('create', [
            'model' => $model,
            'cat' => $cat,
            // 'sub' => $sub,
        ]);
    }

    public function actionUpdate($id)
    {
        $cat = ArrayHelper::map(Category::find()->all(), 'id', 'name');
        $model = $this->findModel($id);
        $img = $model->img;
        $thumb = $model->thumb;

        if ($model->load(Yii::$app->request->post())) {
            //new image
            if (UploadedFile::getInstance($model, 'img')) {
                $model->img = UploadedFile::getInstance($model, 'img');
                if ($model->img && $model->validate()) {
                    //remove old image                    
                    $url = Yii::$app->params['product'];
                    Yii::$app->lib->removeimg($url, $img, $thumb);
                    //image upload
                    $model = Yii::$app->lib->uploadimg($model, Yii::$app->params['product'], $img, $thumb);
                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Product updated successfully.");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                }
            }
            //old image
            else {
                $model->img = $img;
                $thumb = $model->thumb;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Product updated successfully.");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'cat' => $cat,
        ]);
    }


    public function actionDelete($id)
    {
        $delete = $this->findModel($id);

        $url = Yii::$app->params['product'];
        Yii::$app->lib->deleteentry($url, $delete->img, $delete->thumb);
        $delete->delete();
        Yii::$app->session->setFlash('success', "Product deleted successfully.");
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChild()
    {
        /**
         * Dropdown Details
         */
        if (Yii::$app->request->isAjax) {
            $id = @$_POST['cat'];
            $cat = ArrayHelper::map(Category::findAll(['parent_id' => $id]), 'id', 'name');
            $select = '';
            if ($cat) {
                $select .= '<div class="form-group col-md-6 product_sub_cat_' . $id . ' subcat">';
                $select .= '<label class="form-control-label" for="product_sub_cat_' . $id . '">Subcategory</label>';
                $val  = 'product_sub_cat_' . $id;
                $select .= '<select id="product_sub_cat_' . $id . '" class="form-control" name="Product[sub_cat]" onchange="getData(this.value,'."'".$val."'".')">';
                $select .= '<option value="">Select...</option>';
                foreach ($cat as $key => $val) {
                    $select .= '<option value="' . $key . '">' . $val . '</option>';
                }
                $select .= '</select> </div>';
            }
            
            $data['msg'] = 'success';
            $data['status'] = 'Subcategories found.';
            $data['data'] = $select;
            $data['lastId'] = 'sub_cat_' . $id;
            echo json_encode($data);
            yii::$app->end();
        }
    }

    // Private funca
}
