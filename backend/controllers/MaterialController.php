<?php

namespace backend\controllers;

use Yii;
use common\models\Material;
use backend\models\MaterialSearch;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
class MaterialController extends Controller
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
     * Lists all Material models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Material model.
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
     * Creates a new Material model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Material();

         if ($model->load(Yii::$app->request->post())) {
           
            $model->mat_img = UploadedFile::getInstance($model, 'mat_img');
            if($model->mat_img && $model->validate()){
              
        
                $fileName = $model->generateRandomString(10) . $model->mat_img->baseName;
                $ext = $model->mat_img->extension;
                $path = Yii::getAlias('@webroot') . '/../../uploads/material/';
                if (!file_exists($path)) //folder exsist or not if not then add
                {
                    mkdir($path, 0777, true);
                }
                $targetPath = $path . $fileName . '.' . $ext;
                $model->mat_img->saveAs($targetPath);
                $model->mat_img = $fileName . '.' . $ext;

                $model->save(false);
                Yii::$app->session->setFlash('success', "Category added successfully.");
                return $this->redirect(['index']);
            }
            else{
                Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Material model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);
        
        $mimg = $model->mat_img;

        if ($model->load(Yii::$app->request->post()) ) {
            //new image
         if(UploadedFile::getInstance($model, 'mat_img'))
            {
                $model->mat_img = UploadedFile::getInstance($model, 'mat_img');
                if (UploadedFile::getInstance($model, 'mat_img')) {
                    //$model->banner_img = $img;
                    if ($model->mat_img) {
                        //remove old banner image
                        $url = Yii::getAlias('@webroot') . '/../../uploads/material/' . $img;
                        @unlink($url);
                        $fileName = $model->generateRandomString(10) . $model->mat_img->baseName;
                        $ext = $model->mat_img->extension;
                        $path = Yii::getAlias('@webroot') . '/../../uploads/material/';
                        if (!file_exists($path)) //folder exsist or not if not then add
                        {
                            mkdir($path, 0777, true);
                        }
                        $targetPath = $path . $fileName . '.' . $ext;
                        $model->mat_img->saveAs($targetPath);
                        $model->mat_img = $fileName . '.' . $ext;
                    } else {
                        $model->mat_img = $mimg;
                    }

                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Category updated successfully.");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                }
            }
            //old image
            else{
              
                $model->mat_img = $mimg;
                if($model->save()){
                    Yii::$app->session->setFlash('success', "Category updated successfully.");
                    return $this->redirect(['index']);
                }
                else{
                    Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
     private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . '-';
    }

    /**
     * Deletes an existing Material model.
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
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Material the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
