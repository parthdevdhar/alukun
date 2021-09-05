<?php

namespace app\components;

use common\models\Frontend;
use common\models\Img_m;
use common\models\Product;
use yii;
use Yii\base\Component;
use yii\db\Expression;
use yii\helpers\Json;
use yii\helpers\Url;

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
        switch (@$model->type) {
            case 1:
                $p = Yii::$app->params['gallery'];
                break;
            case 2:
                $p = Yii::$app->params['product'];
                break;
            case 3:
                $p = Yii::$app->params['product'];
                break;
            case 4:
                $p = Yii::$app->params['front'];
                break;
            case 5:
                $p = Yii::$app->params['testimonial'];
                break;
            case 6:
                $p = Yii::$app->params['front'];
                break;
            case 10:
                $p = '';
                break;
            default:
                $p = '#';
        }
        $path = ($p) ? Url::toRoute([$p . @$model->name], $schema = true) : @$model->name;
        return $path;
    }

    public function pro()
    {
        $data='';
        $pro = Product::find()->select('id, name')->orderBy(new Expression('rand()'))->limit('4')->all();
        foreach ($pro as $p) {
            
            $url = 'product/' . strtolower(str_replace(' ', '-', $p->name)) . '/' . $p->id;
            $data .= "<li><a href='".$url."'>$p->name</a></li>";
        }
        return $data;
    }
}
