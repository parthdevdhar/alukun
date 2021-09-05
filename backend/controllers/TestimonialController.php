<?php

namespace backend\controllers;

use Yii;
use common\models\Testimonial;
use backend\models\TestimonialSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * TestimonialController implements the CRUD actions for Testimonial model.
 */
class TestimonialController extends Controller
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
                        'actions' => ['create', 'index', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Testimonial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestimonialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Testimonial model.
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
     * Creates a new Testimonial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testimonial();

        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->img && $model->validate()) {
                $model = Yii::$app->lib->allimg($model, Yii::$app->params['testimonial'], 5);
                $model->save(false);
                Yii::$app->session->setFlash('success', "Testimonial added successfully.");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Testimonial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->img;

        if ($model->load(Yii::$app->request->post())) {
            //new image
            if (UploadedFile::getInstance($model, 'img')) {
                $model->img = UploadedFile::getInstance($model, 'img');
                if ($model->img && $model->validate()) {
                    //remove old image                    
                    $url = Yii::$app->params['testimonial'];
                    Yii::$app->lib->removeimg($url,$img);
                    //image upload
                    $model = Yii::$app->lib->allimg($model, $url,5, $img);
                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Testimonial updated successfully.");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                }
            }
            //old image
            else {
                $model->img = $img;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Testimonial updated successfully.");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Testimonial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $delete = $this->findModel($id);

        $url = Yii::$app->params['testimonial'];
        Yii::$app->lib->deleteentry($url, $delete->img);
        $delete->delete();
        Yii::$app->session->setFlash('success', "Testimonial deleted successfully.");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Testimonial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Testimonial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testimonial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
