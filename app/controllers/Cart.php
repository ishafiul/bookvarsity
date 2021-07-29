<?php


class Cart extends Controller
{
    private $gateway='';
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Admin');
        $this->sliderModel = $this->model('Slider');
        $this->siteInfoModel = $this->model('SiteInfo');
        $this->categoryModel = $this->model('Category');
        $this->brandModel = $this->model('Brands');
        $this->officeModel = $this->model('Office');
        $this->productModel = $this->model('Products');
        $this->imgModel = $this->model('Image');


    }
    public function index(){
        $info = $this->siteInfoModel->getSiteInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();
        $cart_p = [];
        if (isset($_SESSION['cart'])){
            $cart_p =$_SESSION['cart'];
        }
        $data =[
            'description' => '',
            'page_title'=>'About Us',
            'info'=>$info,
            'primary_cat'=>$primary_cat,
            'child'=>$child,
            'brands'=>$brand,
            'cartArr'=>$cart_p,
            'cart'=>''
        ];
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            $ids ='';
            $count = count($_SESSION['cart']);
            for($i=1;$i<=$count;$i++){
                if($i == 1){
                    $ids .=$_SESSION['cart'][0];
                }
                else{
                    $ids .=','.$_SESSION['cart'][$i-1];
                }
            }
            $cartProduct = $this->productModel->getCartProduct($ids);
            $data['cart'] = $cartProduct;
            if (isset($_POST['deleteCart'])){
                $val = $_POST['id'];
                $arryPosition = array_search($val,$_SESSION['cart'],true);
                $_SESSION['cart'] = array_diff($_SESSION['cart'], array($val));
                 $_SESSION['cart'] = array_values(array_filter($_SESSION['cart']));
                 //print_r($_SESSION['cart']);
                //unset($_SESSION['cart'][1]);
                //reset($_SESSION['cart']);
                redirect('cart');
            }
        }

        $this->view('cart/index',$data);
    }
    public function checkout()
    {
        global $gateway;

        $info = $this->siteInfoModel->getSiteInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();
        $cart_p = [];
        if (isset($_SESSION['cart'])) {
            $cart_p = $_SESSION['cart'];
        }
        $data = [
            'description' => '',
            'page_title' => 'About Us',
            'info' => $info,
            'primary_cat' => $primary_cat,
            'child' => $child,
            'brands' => $brand,
            'cartArr' => $cart_p,
            'cart' => '',
            'cartmusic'=>'',
            'user_info'=>''
        ];
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $ids = '';
            $count = count($_SESSION['cart']);
            for ($i = 1; $i <= $count; $i++) {
                if ($i == 1) {
                    $ids .= $_SESSION['cart'][0];
                } else {
                    $ids .= ',' . $_SESSION['cart'][$i - 1];
                }
            }
            $cartProduct = $this->productModel->getCartProduct($ids);
            $data['cart'] = $cartProduct;

        }
        if (isset($_SESSION['cartmusic']) && !empty($_SESSION['cartmusic'])){
            $mids ='';
            $mcount = count($_SESSION['cartmusic']);
            for ($i = 1; $i <= $mcount; $i++) {
                if ($i == 1) {
                    $mids .= $_SESSION['cartmusic'][0];
                } else {
                    $mids .= ',' . $_SESSION['cartmusic'][$i - 1];
                }
            }
            $cartmusic = $this->musicModel->getCartMusic($mids);
            $data['cartmusic'] = $cartmusic;

        }
        if (isset($_SESSION['user_email'])){
            $user = $this->userModel->findUserByEmail($_SESSION['user_email']);
            $data['user_info'] =$user;
        }
        if (isset($_POST['pay2'])) {
            $data['fname'] =$_POST['fname'];
            $data['lname']=$_POST['l_name'];
            $data['email']=$_POST['mail'];
            $data['phone']=$_POST['phone'];
            $data['zip']=$_POST['zip'];
            $data['address']=$_POST['address'];
            $data['user_id'] = '';
            if (!empty($_POST['user_id'])){
                $data['user_id'] = $_POST['user_id'];
            }
            $data['product_ids']=$_POST['p_ids'];
            $data['musicids'] ='';
            if (isset($_POST['m_ids'])) {
                $data['musicids'] = $_POST['m_ids'];
            }
            $this->paymentModel->pendingpayment($data);
            $id = $this->paymentModel->lastId();
            try {
                $response = $gateway->purchase(array(
                    'amount' => $_POST['amount'],
                    'items' => array(
                        array(
                            'name' => '',
                            'price' => $_POST['amount'],
                            'description' => $id,
                            'quantity' => 1
                        ),
                    ),
                    'currency' => $_ENV['PAYPAL_CURRENCY'],
                    'returnUrl' => $_ENV['PAYPAL_RETURN_URL'],
                    'cancelUrl' => $_ENV['PAYPAL_CANCEL_URL'],
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    echo $response->getMessage();
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
        $this->view('cart/checkout', $data);
    }
    public function success(){
        global $gateway;
        $info = $this->siteInfoModel->getSiteInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();
        $data = [
            'description' => '',
            'page_title' => 'About Us',
            'info' => $info,
            'primary_cat' => $primary_cat,
            'child' => $child,
            'brands' => $brand,
            'id' => '',
            'cart' => '',
            'user_info'=>'',
            'transiction'=>'',
            'transiction_err'=>'',
        ];
        if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
            $transaction = $gateway->completePurchase(array(
                'payer_id'             => $_GET['PayerID'],
                'transactionReference' => $_GET['paymentId'],
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                $payment_id = $arr_body['id'];
                $payer_id= $arr_body['payer']['payer_info']['payer_id'];
                $payer_email = $arr_body['payer']['payer_info']['email'];
                $amount = $arr_body['transactions'][0]['amount']['total'];
                $currency = $_ENV['PAYPAL_CURRENCY'];
                $payment_status = $arr_body['state'];
                $id = $arr_body['transactions'][0]['item_list']['items'][0]['description'];

                $payment =[
                    'paymment_id'=>$payment_id,
                    'payer_id'=>$payer_id,
                    'payer_email'=>$payer_email,
                    'amount'=>$amount,
                    'currency'=>$currency,
                    'payment_status'=>$payment_status,
                    'id'=>$id

                ];
                $this->paymentModel->paymentsuccess($payment);
                if (isset($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                }
                $data['transiction'] = 'Your payment has been processed successfully and you booking is confirmed. Your transaction id is :'.$payment_id;
                $this->view('cart/success',$data);
            } else {
                $data['transiction_err']=$response->getMessage();
            }
        } else {
            $data['transiction_err'] ='Transaction is declined';
        }
        $this->view('cart/success',$data);
    }
}