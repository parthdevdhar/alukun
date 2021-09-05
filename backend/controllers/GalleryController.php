<?php

namespace backend\controllers;

use Yii;
use common\models\Img_m;
use common\models\Img_mSearch;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * GalleryController implements the CRUD actions for Img_m model.
 */
class GalleryController extends Controller
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
                        'actions' => ['create', 'index', 'delete', 'update', 'file'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['file'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all Img_m models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Img_m::find()->where(['type' => 1])->orderBy('id DESC');
        $this->view->title = 'Gallery';
        // $this->view->params['breadcrumbs'][] = $this->view->title;

        $countQuery = clone $model;
        $pages = new Pagination(['defaultPageSize' => 12, 'totalCount' => $countQuery->count(), 'pageParam' => 'page']);
        $model = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Img_m model.
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
     * Creates a new Img_m model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Img_m();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionFile()
    {
        if (Yii::$app->request->isAjax) {
            if ($_FILES['img']['name']) {
                $uploadedFile = '';
                if (!empty($_FILES["img"]["type"])) {
                    $valid_extensions = array("jpeg", 'png', 'jpg'); //validation
                    $temporary = explode(".", $_FILES["img"]["name"]);
                    $file_extension = end($temporary);
                    $fileName = time() . '.' . $file_extension; //random file name

                    if (($_FILES["img"]["type"] == ("image/jpeg" || "image/png" || "image/JPEG" || "image/PNG")) && in_array($file_extension, $valid_extensions)) //check file extension
                    {
                        $sourcePath = $_FILES['img']['tmp_name'];
                        $path = Yii::getAlias('@webroot') . '/../../'.Yii::$app->params['gallery'];
                        if (!file_exists($path)) //folder exsist or not if not then add
                        {
                            mkdir($path, 0755, true);
                        }
                        $targetPath = $path . $fileName;
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            // $uploadedFile = $fileName;

                            $model = new Img_m();

                            $model->name = $fileName;
                            $model->type = 1;
                            $model->save(false);

                            $url = Yii::$app->lib->img($model->id);
                            $durl = Url::to(["//gallery/". $model->id]);
                            $data['msg'] = 'success';
                            $data['status'] = 'Image updated.';
                            $data['data'] = '<li data-type="animal">
                                                <div class="card card-shadow">
                                                    <figure class="card-img-top overlay-hover overlay">
                                                        <img class="overlay-figure overlay-scale" src="'.$url.'" alt="...">
                                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                                            <a class="icon wb-search" href="'.$url.'"></a>
                                                            <a class="icon wb-trash" href="'.$durl.'" title="Remove"></a>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </li>';

                            echo json_encode($data);
                            yii::$app->end();
                        }
                    } else {
                        $data['msg'] = 'error';
                        $data['status'] = 'File is not image.';
                        echo json_encode($data);
                        yii::$app->end();
                    }
                }
            } else {
                $data['msg'] = 'File not found';
                echo json_encode($data);
                yii::$app->end();
            }
        }
    }

    /**
     * Deletes an existing Img_m model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $delete = $this->findModel($id);

        $url = Yii::$app->params['gallery'];
        Yii::$app->lib->deleteentry($url, $id);
        $delete->delete();
        Yii::$app->session->setFlash('success', "Image deleted successfully.");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Img_m model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Img_m the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Img_m::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
