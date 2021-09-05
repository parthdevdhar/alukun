<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Cart;
use common\models\Customer;
use common\models\Img_m;
use common\models\LoginForm;
use common\models\Order;
use common\models\Orderp;
use common\models\Product;
use common\models\ProductCount;
use common\models\Testimonial;
use common\models\User;
use frontend\models\Forgot;
use frontend\models\Payment;
use frontend\models\Register;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actions()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['checkout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['promo', 'index'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'webhook') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionPromo()
    {
        $site_data = yii::$app->lib->front();
        $this->layout = 'index';
        return $this->render('promo', ['site_data' => $site_data]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionIndex()
    {
        $gallery = Img_m::findAll(['type' => 1]);
        $testi = Testimonial::find()->all();
        $site_data = yii::$app->lib->front();
        $banner = Banner::find()->orderBy(['order_id' => SORT_ASC])->all();

        $new = Product::find()->orderBy(new Expression('rand()'))->limit(12)->all();
        $feature = Product::find()->orderBy(new Expression('rand()'))->limit(12)->all();
        $this->view->title = 'Rowdy Machines';
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('index', [
            'new' => $new,
            'feature' => $feature,
            'gallery' => $gallery,
            'testi' => $testi,
            'site_data' => $site_data,
            'banner' => $banner,
        ]);
    }

    public function actionProcess($any)
    {
        $pay = new Payment();
        $model = Cart::find()->where(['user_id' => yii::$app->user->id])->all();
        if ($model) {
            $amount = 0;
            foreach ($model as $m) {
                $amount += (float)$m->price;
            }
            $amount = number_format($amount, 2, '.', '');

            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey(Yii::$app->params['moillie-key']);
            $orderId = \time();
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => $amount
                ],
                "description" => "Order #" . $orderId,
                "redirectUrl" => Yii::$app->urlManager->createAbsoluteUrl('/order'),
                "webhookUrl"  => Yii::$app->urlManager->createAbsoluteUrl('/webhook'),
                "metadata" => ["order_id" => $orderId],
            ]);

            $orders = '';
            foreach ($model as $m) {
               // echo '<pre>';print_r($m);exit;
                $orderp = new Orderp();
                $orderp->product_id = $m->product_id;
                $orderp->user_id = $m->user_id;
                $orderp->qty = $m->qty;
                $orderp->door_type = $m->door_type;
                $orderp->color = $m->color;
                $orderp->accessories = $m->accessories;
                $orderp->status = 0;
                
                $orderp->save();
                $orders = $orderp->id.','.$orders;
            }
            $order = New Order();
            $order->order_id = (string)$orderId;
            $order->payment_status = $payment->status;
            $order->order_product = rtrim($orders,',');
            if($order->save()){
                Cart::deleteAll(['user_id' => yii::$app->user->id]);
            }


            \header("Location: " . $payment->getCheckoutUrl(), \true, 303);
        } else {
            echo "Error : Something went wrong please contact system admin";
        }
    }

    public function actionWebhook()
    {
        try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey(Yii::$app->params['moillie-key']);

            /*
            * Retrieve the payment's current state.
            */
            $payment = $mollie->payments->get($_POST["id"]);
            $orderId = $payment->metadata->order_id;

            $pay = Order::find()->where(['order_id' => $orderId])->one();
            $pay->payment_status = $payment->status;
            $pay->save();

            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
                /*
                * The payment is paid and isn't refunded or charged back.
                * At this point you'd probably want to start the process of delivering the product to the customer.
                */
            } elseif ($payment->isOpen()) {
                /*
                * The payment is open.
                */
            } elseif ($payment->isPending()) {
                /*
                * The payment is pending.
                */
            } elseif ($payment->isFailed()) {
                /*
                * The payment has failed.
                */
            } elseif ($payment->isExpired()) {
                /*
                * The payment is expired.
                */
            } elseif ($payment->isCanceled()) {
                /*
                * The payment has been canceled.
                */
            } elseif ($payment->hasRefunds()) {
                /*
                * The payment has been (partially) refunded.
                * The status of the payment is still "paid"
                */
            } elseif ($payment->hasChargebacks()) {
                /*
                * The payment has been (partially) charged back.
                * The status of the payment is still "paid"
                */
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    public function actionCheckout($any)
    {
        $a = base64_decode($any);
        if (Yii::$app->user->isGuest && $a) {
            // Yii::$app->session->setFlash('error', 'Login Or Register before checkout.');
            return $this->redirect(['login']);
        } elseif (!Yii::$app->user->isGuest && $a) {

            $model = Customer::find()->where(['user_id' => yii::$app->user->id])->one();
            if (empty($model)) {
                $model = new Customer();
            }

            if ($model->load(Yii::$app->request->post())) {
                $model->user_id = yii::$app->user->id;
                if ($model->save()) {
                    //Yii::$app->session->setFlash('success', 'Order placed successfully.');
                    return $this->redirect(['process', 'any' => $any]);
                }
            }
            return $this->render('customer', [
                'model' => $model,
            ]);
        } else {
            echo 3;
            exit;
        }
    }


    public function actionOrder()
    {
        
        $order = Orderp::find()->where(['user_id' => yii::$app->user->id])->all();
        $arr = array();
        if ($order) {

            $i = 0;
            foreach ($order as $m) {

                $product = Product::find()->where(['id' => $m->product_id])->one();
                if ($product) {
                    $arr[$i]['id'] = $product->id;
                    $arr[$i]['name'] = $product->name;
                    $arr[$i]['price'] = $product->price;
                    $arr[$i]['thumb'] = $product->thumb;
                    $arr[$i]['qty'] = $m->qty;
                    $arr[$i]['status'] = $m->status;
                    $arr[$i]['sub_total'] = $m->qty * $product->price;

                    $i++;
                }
            }
        }

        $model = json_decode(json_encode($arr), FALSE);
        return $this->render('order', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionLogin()
    {
        $this->layout = 'login.php';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome(Yii::$app->request->referrer);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $get = Yii::$app->request->cookies;
            if ($get->getValue('cart') !== null) {
                $arr = array();
                $arr['total'] = 0;
                $i = 0;
                foreach ($get->getValue('cart') as $item) {
                    $product = Product::find()->where(['id' => $item['product_id']])->one();
                    $arr[$i]['id'] = $product->id;
                    $arr[$i]['name'] = $product->name;
                    $arr[$i]['price'] = $product->price;
                    $arr[$i]['thumb'] = $product->thumb;
                    $arr[$i]['qty'] = $item['qty'];
                    $arr[$i]['sub_total'] = $item['qty'] * $product->price;
                    $arr['total'] += $arr[$i]['sub_total'];

                    $cart = Cart::find()->where(['product_id' => $product->id, 'user_id' => yii::$app->user->id])->one();
                    if ($cart) {
                        $cart->qty = $cart->qty + $item['qty'];
                        $cart->save();
                    } else {
                        $ncart = new Cart();
                        $ncart->product_id = $product->id;
                        $ncart->user_id = Yii::$app->user->id;
                        $ncart->qty = $item['qty'];
                        $ncart->price = $product->price;
                        $ncart->save();
                    }
                    $i++;
                }
                $get = Yii::$app->response->cookies;
                // remove a cookie
                $get->remove('cart');
                // equivalent to the following
                unset($get['cart']);
            }
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionCart()
    {
        $site_data = yii::$app->lib->front();

        $get = Yii::$app->request->cookies;
        if ($get->getValue('cart') !== null && Yii::$app->user->isGuest) {
            $arr = array();
            $arr['total'] = 0;
            $i = 0;
            foreach ($get->getValue('cart') as $item) {
                $product = Product::find()->where(['id' => $item['product_id']])->one();
                $arr[$i]['id'] = $product->id;
                $arr[$i]['name'] = $product->name;
                $arr[$i]['price'] = $product->price;
                $arr[$i]['type'] = $item['doortype'];
                $arr[$i]['color'] = $item['color'];
                $arr[$i]['accessories'] = $product['accessories'];
                $arr[$i]['discount_price'] = $product->discount_price;
                $arr[$i]['thumb'] = $product->thumb;
                $arr[$i]['qty'] = $item['qty'];
                if ($product->discount_price)
                    $arr[$i]['sub_total'] = $item['qty'] * $product->discount_price;
                else
                    $arr[$i]['sub_total'] = $item['qty'] * $product->price;
                $arr['total'] += $arr[$i]['sub_total'];
                $i++;
            }
            $model = json_decode(json_encode($arr), FALSE);
        } elseif (!Yii::$app->user->isGuest) {
            $model = Cart::find()->where(['user_id' => yii::$app->user->id])->all();
            if ($model) {
                $arr = array();
                $arr['total'] = 0;
                $i = 0;
                foreach ($model as $m) {
                    $product = Product::find()->where(['id' => $m->product_id])->one();
                    $arr[$i]['id'] = $product->id;
                    $arr[$i]['name'] = $product->name;
                    $arr[$i]['price'] = $product->price;
                    $arr[$i]['type'] = $m->door_type;
                    $arr[$i]['color'] = $m->color;
                    $arr[$i]['accessories'] = $m->accessories;
                    $arr[$i]['discount_price'] = $product->discount_price;
                    $arr[$i]['thumb'] = $product->thumb;
                    $arr[$i]['qty'] = $m->qty;
                    if ($product->discount_price)
                        $arr[$i]['sub_total'] = $m->qty * $product->discount_price;
                    else
                        $arr[$i]['sub_total'] = $m->qty * $product->price;
                    $arr['total'] += $arr[$i]['sub_total'];
                    $i++;
                }
                // echo '<pre>';print_r($arr);exit;
                $model = json_decode(json_encode($arr), FALSE);
            } else {
                $arr['status'] = 1;
                $model = json_decode(json_encode($arr), FALSE);
            }
        } else {
            $arr['status'] = 1;
            $model = json_decode(json_encode($arr), FALSE);
        }


        return $this->render('cart', [
            'model' => $model,
            'site_data' => $site_data
        ]);
    }
    /*
    * Ajax Call
     * */
    public function actionAddcart()
    {
        if (Yii::$app->request->isAjax) {
            if (!yii::$app->user->isGuest) {
                /*
                 * Cart Counter +
                 * */
                $pcount = ProductCount::find()->where(['product_id' => $_POST['id']])->one();
                if ($pcount) {
                    $pcount->incart = $pcount->incart + 1;
                    $pcount->save();
                } else {
                    $count = new ProductCount();
                    $count->product_id = $_POST['id'];
                    $count->view = 0;
                    $count->wishlisted = 0;
                    $count->incart = 1;
                    $count->save();
                }

                /*
                 * cart update
                 * */
                $product = Product::find()->where(['id' => $_POST['id']])->one();
                $cart = new Cart();
                $cart->product_id = $_POST['id'];
                $cart->user_id = yii::$app->user->id;
                $cart->qty = $_POST['qty'];
                $cart->price = $product->price;
                $cart->discount_price = $product->discount_price;
                $cart->door_type = $_POST['doortype'];
                $cart->color = $_POST['color'];
                $cart->accessories = $_POST['accessories'];
                $cart->save();


                $data['status'] = 1;
                $data['message'] = 'Added to cart';
                $arr['product_id'] = $product->id;
                $arr['qty'] = $cart->qty;
                $arr['doortype'] = $cart->door_type;
                $arr['color'] = $cart->color;
                $arr['accessories'] = $cart->accessories;
                $data['data'] = (object)$arr;
                echo Json::encode($data);
            } else {
                /*
                 * Cart Counter +
                 * */
                $pcount = ProductCount::find()->where(['product_id' => $_POST['id']])->one();
                if ($pcount) {
                    $pcount->incart = $pcount->incart + 1;
                    $pcount->save();
                } else {
                    $count = new ProductCount();
                    $count->product_id = $_POST['id'];
                    $count->view = 0;
                    $count->wishlisted = 0;
                    $count->incart = 1;
                    $count->save();
                }

                /*
                 * Guest cart
                 * */
                $cookies = Yii::$app->response->cookies;
                $get = Yii::$app->request->cookies;
                $name = 'cart';
                $cook = $get->getValue($name);
                if (isset($cook[$_POST['id']])) {

                    $a = $get->getValue($name)[$_POST['id']];
                    $cook[$_POST['id']] = array('product_id' => $_POST['id'], 'qty' => $a['qty'] + $_POST['qty'], "doortype" => $_POST['doortype'], 'color' => $_POST['color'], 'accessories' => $_POST['accessories']);

                    $cookies->add(new \yii\web\Cookie([
                        'name' => $name,
                        'value' => $cook,
                        'expire' => time() + 86400 * 365,
                    ]));
                    $qty = 0;
                    foreach ($cook as $co) {
                        $qty += $co['qty'];
                    }
                    $get = Yii::$app->request->cookies;
                    $data['status'] = 1;
                    $data['message'] = 'Added to cart';
                    $arr['product_id'] = $get->getValue($name)[$_POST['id']]['product_id'];
                    $arr['qty'] = $qty;
                    $data['data'] = (object)$arr;
                    echo Json::encode($data);
                } else {


                    if ($get->getValue($name)) {
                        $cook[$_POST['id']] = array(
                            'product_id' => $_POST['id'],
                            'qty' => $_POST['qty'],
                            "doortype" => $_POST['doortype'],
                            'color' => $_POST['color'],
                            'accessories' => $_POST['accessories']
                        );
                    } else {
                        $datacoki[$_POST['id']] = array(
                            'product_id' => $_POST['id'],
                            'qty' => $_POST['qty'],
                            "doortype" => $_POST['doortype'],
                            'color' => $_POST['color'],
                            'accessories' => $_POST['accessories']
                        );
                        //$datacoki[$_POST['id']] = array('product_id' => $_POST['id'], 'qty' => $_POST['qty']);
                        $cook = $datacoki;
                    }
                    $cookies->add(new \yii\web\Cookie([
                        'name' => $name,
                        'value' => $cook,
                        'expire' => time() + 86400 * 365,
                    ]));
                    $qty = 0;
                    foreach ($cook as $co) {
                        $qty += $co['qty'];
                    }
                    $data['status'] = 1;
                    $data['message'] = 'Added to cart';
                    $arr['product_id'] = $_POST['id'];
                    $arr['qty'] = $qty;
                    $data['data'] = (object)$arr;
                    echo Json::encode($data);
                }
            }
        }
    }

    public function actionClear()
    {
        if (Yii::$app->user->isGuest) {
            $get = Yii::$app->response->cookies;
            // remove a cookie
            $get->remove('cart');
            // equivalent to the following
            unset($get['cart']);

            $data['status'] = 1;
            echo Json::encode(true);
        } else {
            $cart = Cart::deleteAll(['user_id' => yii::$app->user->id]);
            return true;
        }
    }

    public function actionRemove()
    {
        if (Yii::$app->request->isAjax) {
            $cart = Cart::find()->where(['product_id' => $_POST['product_id'], 'user_id' => yii::$app->user->id])->one();
            $cart->delete();
            return true;
        }
    }

    public function actionRegister()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Register();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            /*
            * User detail
            * */
            $user = new User();
            $user->username = $model->mail;
            $user->pass = $user::passEncode($model->password);
            $user->type = 'user';
            $user->save(false);
            /*
            * Customer detail
            * */
            $cust = new Customer();
            $cust->mail = $model->mail;
            $cust->name = $model->name;
            $cust->number = $model->phone;
            $cust->user_id = $user->id;
            $cust->address = '';
            $cust->city = '';
            $cust->zip = '';
            $cust->state = '';
            $cust->status = 1;
            $cust->save(false);

            Yii::$app->session->setFlash('success', "Thank you for joining.");
            return $this->redirect(['login']);
        } else {
            $model->password = '';
            $model->repassword = '';
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    public function actionPrivacy()
    {
        return $this->render('privacy');
    }

    public function actionImprint()
    {
        return $this->render('imprint');
    }

    public function actionRehau()
    {
        return $this->render('rehau');
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionGraduatedDiscounts()
    {
        return $this->render('graduated');
    }

    public function actionOrderingInformation()
    {
        return $this->render('ordering');
    }

    public function actionGuarantee()
    {
        return $this->render('guarantee');
    }

    public function actionTermsConditions()
    {
        return $this->render('terms');
    }

    public function actionRightOfWithdrawal()
    {
        return $this->render('rightof');
    }

    public function actionDeclarationOfPerformance()
    {
        return $this->render('declaration');
    }

    public function actionAdopen()
    {
        return $this->render('adopen');
    }

    public function actionRescara()
    {
        return $this->render('rescara');
    }

    public function actionPaymentInformation()
    {
        return $this->render('paymentinfo');
    }

    public function actionShipping()
    {
        return $this->render('shipping');
    }

    private function pay($pay)
    {
    }

    public function actionComingsoon()
    {
        $this->layout = 'empty';
        return $this->render('soon');
    }

    public function actionGetsearch()
    {

        $pro = Product::find()->select('id, name, thumb')->where(['LIKE', 'name', @$_GET['term']])->limit(5)->all();
        $i = 0;
        foreach ($pro as $p) {
            $url = 'product/' . strtolower(str_replace(' ', '-', $p->name)) . '/' . $p->id;
            $name = $p->name;
            $data[$i]['id'] = $p->id;
            $data[$i]['value'] = $name;
            $data[$i]['label'] = '<a href="' . Url::toRoute([$url]) . '">
                                    <img src="' . yii::$app->lib->img($p->thumb) . '" width="50" height="50"/>
                                    <span>' . $name . '</span>
                                </a>';
            $i++;
        }

        echo json_encode($data);
        exit;
    }

    public function actionForgot()
    {
        date_default_timezone_set("America/New_York");
        $startdate = new \DateTime('NOW');

        $this->layout = 'login.php';
        $model = new Forgot();
        if ($model->load(Yii::$app->request->post()) && $model->validate('email')) {
            $data['link'] = Yii::$app->urlManager->createAbsoluteUrl(['reset', 'token' => \base64_encode($model->email . '+' . $startdate->modify('+1 day')->format('Y-m-d H:i:s'))]);
            $data['logo'] = Url::home(true) . 'theme/images/logo.png';
            $data['user'] = $model->email;
            $emailSend = Yii::$app->mailer->compose(['html' => 'forgot-html'], ['data' => $data])
                ->setFrom(["parth@gmail.com"])
                ->setTo(["devdharparth@gmail.com"])
                ->setSubject('Testmail')
                ->setPriority(1);
            if (!$emailSend->send()) {
                Yii::$app->session->setFlash('error', "Something went wrong! Please contact system admin.");
            } else {
                Yii::$app->session->setFlash('success', "Password reset mail sent.");
                return $this->goHome();
            }
        }
        return $this->render('forgot', [
            'model' => $model,
        ]);
    }

    public function actionReset()
    {
        $this->layout = 'login.php';

        $u = \base64_decode($_GET['token']);
        $user = User::findByUsername(strstr("$u", "+", true));

        $date = new \DateTime('NOW');
        $model = new Forgot();
        $d1 = strtotime(substr($u, strpos($u, "+") + 1)); //From url timestamp
        $d2 = strtotime($date->format('Y-m-d H:i:s')); //current timestamp

        if ($d1 <= $d2) {
            yii::$app->session->setFlash('error', 'Link expired.');
            return $this->goHome();
        }

        if ($user) {

            if ($model->load(Yii::$app->request->post()) && $model->validate(['password,repassword'])) {
                $user->pass = $user->passEncode($model->password);
                $user->save(false);
                Yii::$app->session->setFlash('success', "Password udpated successfully!");
                return $this->redirect(['login']);
            }
            return $this->render('reset', [
                'model' => $model,
            ]);
        } else {
            Yii::$app->session->setFlash('error', "Link is invalid");
            return $this->goHome();
        }
    }
}
