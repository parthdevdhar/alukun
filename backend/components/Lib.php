<?php

namespace app\components;

use common\models\Frontend;
use common\models\Img_m;
use yii\web\UploadedFile;
use yii;
use Yii\base\Component;
use yii\helpers\Url;
use yii\imagine\Image;


class Lib extends Component
{
    public function front()
    {
        $val =  Frontend::find()->asArray()->all();
        foreach ($val as $v) {
            $site_data[$v['filed']] = $v['value'];

            if (strpos($v['value'], "img") !== false) {
                preg_match_all('!\d+!', $v['value'], $id);
                $id = implode(' ', $id[0]);

                $site_data[$v['filed']] = SELF::img($id);
            }
        }

        return $site_data;
    }

    public function img($id)
    {
        $model = Img_m::findOne(['id' => $id]);
        // echo $id;
        $type = @$model['type'];
        $p = '/../';
        switch ($type) {
            case 1:
                $p .= Yii::$app->params['gallery'];
                break;
            case 2:
                $p .= Yii::$app->params['product'];
                break;
            case 3:
                $p .= Yii::$app->params['product'];
                break;
            case 4:
                $p .= Yii::$app->params['front'];
                break;
            case 5:
                $p .= Yii::$app->params['testimonial'];
                break;
            case 10:
                $p = '';
                break;
            default:
                $p = "#";
                break;
        }

        $path = ($p)? Url::toRoute([$p . @$model->name], $schema = true) : $model->name;
        return $path;
    }

    /**
     * Product img
     */
    public function uploadimg($model, $url, $img = null, $thumb = null)
    {
        $model->img = UploadedFile::getInstance($model, 'img');
        $fileName = $model->generateRandomString() . $model->img->baseName;
        $ext = $model->img->extension;
        $path = Yii::getAlias('@webroot') . '/../../uploads/products/';
        if (!file_exists($path)) //folder exsist or not if not then add
        {
            mkdir($path, 0777, true);
        }
        $targetPath = $path . $fileName . '.' . $ext;
        $model->img->saveAs($targetPath);
        // Generate a thumbnail image
        $originFile = $path . $fileName . '.' . $ext;
        $thumbnFile = $path . $fileName . '-thumb' . '.' . $ext;
        // Generate a thumbnail image
        Image::thumbnail($originFile, 500, 500)->save($thumbnFile, ['quality' => 80]);

        $model->img = $fileName . '.' . $ext;
        $model->thumb = $fileName . '-thumb' . '.' . $ext;


        for ($i = 1; $i <= 2; $i++) {

            switch ($i) {
                case 1:
                    $up = Img_m::findOne(['id' => $img]);
                    break;
                case 2:
                    $up = Img_m::findOne(['id' => $thumb]);
                    break;
            }
            if (!$up) {
                $up = new Img_m();
            }
            switch ($i) {
                case 1:
                    $up->name = $model->img;
                    $up->type = 2;
                    $up->save(false);
                    $model->img = $up->id;
                    break;
                case 2;
                    $up->name = $model->thumb;
                    $up->type = 3;
                    $up->save(false);
                    $model->thumb = $up->id;
                    break;
            }
        }
        return $model;
    }

    /**
     * testimonial img
     */
    public function allimg($model, $url, $type, $img = null)
    {
        if ($type !== 10) {
            $model->img = UploadedFile::getInstance($model, 'img');
            $fileName = $this->generateRandomString() . $model->img->baseName;
            $ext = $model->img->extension;
            $path = Yii::getAlias('@webroot') . '/../../' . $url;

            if (!file_exists($path)) //folder exsist or not if not then add
            {
                mkdir($path, 0775, true);
            }
            $targetPath = $path . $fileName . '.' . $ext;
            $model->img->saveAs($targetPath);

            // Generate a thumbnail image
            $originFile = $path . $fileName . '.' . $ext;
            $model->img = $fileName . '.' . $ext;
        }
        $up = '';
        switch ($type) {
            case 1:
                $up = Img_m::findOne(['id' => $img]);
                break;
            case 5:
                $up = Img_m::findOne(['id' => $img]);
                break;
            case 4:
                $up = Img_m::findOne(['id' => $img]);
                break;
            case 10:
                $up = Img_m::findOne(['id' => $img]);
                break;
        }
        if (!$up) {
            $up = new Img_m();
        }


        $up->name = $model->img;
        $up->type = $type;
        $up->save(false);
        $model->img = $up->id;

        return $model;
    }

    public function removeimg($url, $img, $thumb = null)
    {
        $path = '';
        $base = Yii::getAlias('@webroot') . '/../../';
        $model = Img_m::find()->where(['id' => $img])->orWhere(['id' => $thumb])->all();
        foreach ($model as $m) {
            $path = $base . $url . $m->name;
            @unlink($path);
        }
        return true;
    }

    public function deleteentry($url, $img, $thumb = null)
    {
        $path = '';
        $base = Yii::getAlias('@webroot') . '/../../';
        $model = Img_m::find()->where(['id' => $img])->orWhere(['id' => $thumb])->all();

        foreach ($model as $m) {
            $path = $base . $url . $m->name;
            @unlink($path);
            $m->delete();
        }

        return true;
    }

    private static function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . '-';
    }
}
