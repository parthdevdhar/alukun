<?php
use yii\helpers\Url;
?>
<div class="page">
    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <h3>
                            <img class="mr-10" src="<?= Url::home(true); ?>theme/logo.png" alt="LOGO" width="35px">&nbsp;Adarsh Printing Press
                        </h3>
                    </div>
                </div>
                <div >
                    <table class="table ">
                            <tr style="border-color: ; !important; ">
                                <td>
                                    <address>
                                        <?//=  wordwrap($admin->address,22,"<br>");?>
                                        <br>
                                        <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;<?//=$admin->phone?>
                                        <br>
                                    </address>
                                </td>
                                <td class="text-right">
                                    To,
                                    <h4><?= $customer->name?></h4>

                                    <address>
                                        <?=  wordwrap($customer->address,20,"<br>\n");?>
                                        <br>
                                        <abbr title="Mail">E-mail:</abbr>&nbsp;&nbsp;<?//= $customer->email?>
                                        <br>
                                        <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;<?=$customer->phone?>
                                    </address>
                                </td>
                            </tr>
                    </table>
                    <p>Invoice No&nbsp;:&nbsp;<?= str_pad($model->id, 4, "0", STR_PAD_LEFT)?></p>
                </div>

                <div class="page-invoice-table table-responsive">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%">#</th>
                            <th class="text-left">Description</th>
                            <th class="text-right" style='width:10%'>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $p = 0;
                        $i = 1;
                        $product = \common\models\Product::find()->where(['id'=>$model->product_id])->one();
                        echo '<tr>
                        <td class="text-center" id="'.$model->id.'">'.$i.'</td>
                        <td class="text-left">'.$product->name.'&nbsp;<small>(&nbsp;'.$product->description.'&nbsp;)</small></td>
                        <td class="text-right">&#8377;'.$product->price.'</td>
                    </tr>';
                        $p = $product->price;
                        $c = (empty($model->ext_charge)) ? 0: $model->ext_charge;
                        $gt = $p+$c;
                        ?>
                        </tbody>
                    </table>
                </div>
                <p class="page-invoice-amount"></p>
                <div class="text-right clearfix">
                    <div class="float-right">
                        <p>Sub - Total amount:
                            <span>&#8377;<?=$product->price?></span>
                        </p>
                        <p>Other Charges:
                            <span>&#8377;<?=$model->ext_charge?></span>
                        </p>
                        <p class="page-invoice-amount"><b>Grand Total:
                                <span>&#8377;<?= $gt?></span></b>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Panel -->
    </div>
</div>
<?php //exit;?>