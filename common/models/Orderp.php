<?php


namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%orderp}}".
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $qty
 * @property string|null $door_type
 * @property string|null $color
 * @property string|null $accessories
 * @property string $status 0-pending, 1-inproccess, 2-delivered, 3-cancelled
 * @property string $created_dt
 */
class Orderp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orderp}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'user_id', 'qty', 'status'], 'required'],
            [['product_id', 'user_id', 'qty'], 'integer'],
            [['status'], 'string'],
            [['created_dt'], 'safe'],
            [['door_type', 'color', 'accessories'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'qty' => 'Qty',
            'door_type' => 'Door Type',
            'color' => 'Color',
            'accessories' => 'Accessories',
            'status' => 'Status',
            'created_dt' => 'Created Dt',
        ];
    }

    public static function status($id)
    {
        $v = '';
        switch ($id) {
            case "0":
                $v = '<span class="badge badge-default">Order Received</span>';
                break;
            case "1":
                $v = '<span class="badge badge-info">In-Process</span>';
                break;
            case "2":
                $v = '<span class="badge badge-dark">In Printing</span>';
                break;
            case "3":
                $v = '<span class="badge badge-primary">Order is Ready</span>';
                break;
            case "4";
                $v = '<span class="badge badge-success">Dispatched</span>';
                break;
            case "5";
                $v = '<span class="badge badge-success">Delivered</span>';
                break;
            case "6";
                $v = '<span class="badge badge-danger">Cancelled</span>';
                break;
        }
        return $v;
    }

    public static function drop($id, $oid)
    {
        $v = '';
        switch ($id) {
            case "0":
                $v = [
                    'class' => 'default',
                    'name' => 'Received'
                ];
                break;
            case "1":
                $v = [
                    'class' => 'info',
                    'name' => 'In-Process'
                ];
                break;
            case "3":
                $v = [
                    'class' => 'primary',
                    'name' => 'Order is Ready'
                ];
                break;
            case "4":
                $v = [
                    'class' => 'success',
                    'name' => 'Dispatched'
                ];
                break;
            case "5":
                $v = [
                    'class' => 'success',
                    'name' => 'Delivered'
                ];
                break;
        }
        $a = '<button type="button" class="btn btn-' . $v['class'] . ' dropdown-toggle" id="exampleColorDropdown1"
                            data-toggle="dropdown" aria-expanded="false">
                            ' . $v['name'] . '
                          </button>
                          <div class="dropdown-menu dropdown-menu-success" aria-labelledby="exampleColorDropdown1" role="menu">
                            <span class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="status(0,' . $oid . ')">Received</span>
                            <span class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="status(1,' . $oid . ')">In-Process</span>
                            <span class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="status(3,' . $oid . ')">Order is Ready</span>
                            <span class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="status(4,' . $oid . ')">Dispatched</span>
                            <span class="dropdown-item" href="javascript:void(0)" role="menuitem" onclick="status(5,' . $oid . ')">Delivered</span>
                          </div>';
        return $a;
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function pdf($id)
    {
        $ufile = Url::toRoute(['customer/invoice', 'id' => $id]);
        $url = Html::a('<i class="icon fa-file-pdf-o" aria-hidden="true"></i>', $ufile, ['class' => "btn btn-sm btn-icon btn-flat btn-danger", 'target' => '_blank', 'data-pjax' => '0', 'data-toggle' => "tooltip", 'data-original-title' => "Download Invoice", 'data-container' => "body"]);

        return $url;
    }
}
