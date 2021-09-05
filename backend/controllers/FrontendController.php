<?php

namespace backend\controllers;

use Yii;
use common\models\Frontend;
use backend\models\FrontendSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FrontendController implements the CRUD actions for Frontend model.
 */
class FrontendController extends Controller
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
     * Lists all Frontend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Frontend model.
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
     * Updates an existing Frontend model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imgr = $model->value;
        if ($model->filed == 'banner') {
            if (strpos($model->value, "img") !== false) {
                preg_match_all('!\d+!', $model->value, $id);
                $id = implode(' ', $id[0]);

                $img =$id;
            }
        }
        if ($model->load(Yii::$app->request->post())) {            
            if ($model->filed == 'banner') {
                //new image
                if (UploadedFile::getInstance($model, 'img')) {
                    $model->img = UploadedFile::getInstance($model, 'img');
                    if ($model->img && $model->validate()) {
                        //remove old image                    
                        $url = Yii::$app->params['front'];
                        Yii::$app->lib->removeimg($url, $img);
                        //image upload
                        $model = Yii::$app->lib->allimg($model, $url, 4, $img);
                        $model->value = $model->img.'_img';
                        $model->save(false);
                        Yii::$app->session->setFlash('success', "Frontend value updated successfully.");
                        return $this->redirect(['index']);
                    } else {
                        Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                    }
                }
                elseif( !empty($_POST['Frontend']['val']) && ($_POST['Frontend']['type'] == 1)){
                    //remove old image                    
                    $url = Yii::$app->params['front'];
                    Yii::$app->lib->removeimg($url, $img);

                    $model->img = $_POST['Frontend']['val'];
                    //image upload
                    $model = Yii::$app->lib->allimg($model, $url, 10, $img);
                    $model->value = $model->img . '_img';
                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Frontend value updated successfully.");
                    return $this->redirect(['index']);
                }
                //old image
                else {
                    $model->value = $imgr;
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', "Frontend value updated successfully.");
                        return $this->redirect(['index']);
                    } else {
                        Yii::$app->session->setFlash('error', "Some error occurs. Please contact system admin.");
                    }
                }
            }
            elseif($model->save()){
                Yii::$app->session->setFlash('success', "Frontend value updated successfully.");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Frontend model.
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
     * Finds the Frontend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Frontend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Frontend::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
