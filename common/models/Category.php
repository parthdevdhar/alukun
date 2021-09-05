<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $menu_img
 * @property int $parent_id
 */
class Category extends \yii\db\ActiveRecord
{
    private static $i = 0;
    private static $j = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name', 'menu_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'menu_img' => 'Menu Img',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Backend
     **/
    public static function bmenu()
    {
        $model = Self::find()->groupBy('parent_id,id')->orderBy('parent_id ASC')->all();

        $menu = SELF::mpreparemenu($model);
        return $menu;
    }
    /**
     * Backend
     **/
    private static function mpreparemenu(array $items, $pid = 0)
    {
        $output = [];
        foreach ($items as $item) {
            if ((int)$item->parent_id == $pid) {
                $arr = [];
                $action_url = "#mm" . $item->id;

                if ($children = self::mpreparemenu($items, $item->id)) {
                    $arr['text'] = $item->name;
                    $arr['href'] = $action_url;
                    $arr['id'] = $item->id;
                    $arr['nodes'] = $children;
                } else {
                    $arr['text'] = $item->name;
                    $arr['href'] = $action_url;
                    $arr['id'] = $item->id;
                }
                # Fill the output
                $output[] = $arr;
            }
        }
        return $output;
    }

    /**
     * Frontend
     **/
    public static function menu()
    {
        $model = Self::find()->groupBy('parent_id,id')->orderBy('parent_id ASC')->all();

        $menu = SELF::test($model);
        // echo '<pre>';print_r($menu);exit;
        return $menu;
    }
    /**
     * Frontend
     **/
    private static function preparemenu(array $items, $pid = 0)
    {
        $output = [];
        foreach ($items as $item) {
            if ((int)$item->parent_id == $pid) {
                $arr = [];
                $name = strtolower(str_replace(' ', '-', trim($item->name)));
                $name = ucfirst(str_replace("'", '', $name));
                $action_url = Url::home(true) . "shop/" . $name . '/' . $item->id;

                if ($children = self::preparemenu($items, $item->id)) {
                    $arr['text'] = $item->name;
                    $arr['href'] = $action_url;
                    $arr['id'] = $item->id;
                    $arr['child'] = $children;
                } else {
                    $arr['text'] = $item->name;
                    $arr['href'] = $action_url;
                    $arr['id'] = $item->id;
                }
                # Fill the output
                $output[] = $arr;
            }
        }
        return $output;
    }

    public static function test(array $items, $pid = 0)
    {

        $output = '';

        foreach ($items as $item) {
            if ((int)$item->parent_id == $pid) {
                $arr = '';
                $name = strtolower(str_replace(' ', '-', trim($item->name)));
                $name = str_replace("'", '', $name);
                $action_url = Url::home(true) . "shop/" . $name . '/' . $item->id;

                if ($children = self::test($items, $item->id)) {
                    $arr .= "<li>";
                    $arr .= "<a  href='". $action_url . "' >" . ucfirst($item->name) . "</a>"; //href
                    $arr .= "<ul >"; //ul inner
                    $arr .= $children;
                    $arr .= "</ul>"; //ul inner end
                    $arr .= '</li>'; // li end
                } else {
                    if (!$item->parent_id) {
                        SELF::$i = $item->id;
                        /**
                         * Top menu li
                         */
                        $arr .= "<li >"; //li start
                        $arr .= "<a  href='" . $action_url . "'>" . ucfirst($item->name) . "</a>"; // a
                    } else {

                        $arr .= "<li>"; //li start
                        $arr .= "<a  href='" . $action_url . "'>" . ucfirst($item->name) . "</a>"; // a
                    }
                    $arr .= "</li>"; //li end
                }
                # Fill the output
                $output .= $arr;
            }
        }
        return $output;
    }
}
