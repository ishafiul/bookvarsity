<?php


class Profile extends Controller
{
    public function __construct(){
        //your models gose here . example : $this->ModelName = $this->model('model_class_name');
        $this->sliderModel = $this->model('Slider');
        $this->siteInfoModel = $this->model('SiteInfo');
        $this->officeModel = $this->model('Office');
        $this->categoryModel = $this->model('Category');
        $this->brandModel = $this->model('Brands');
        $this->productModel = $this->model('Products');
        $this->imgModel = $this->model('Image');

        $this->paymentModel = $this->model('Payment');
    }
    public function index(){
        $info = $this->siteInfoModel->getSiteInfo();
        $office = $this->officeModel->getAllOfficeInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();

         $_SESSION['user_email'];
        $allpayment = $this->paymentModel->findPaymentByUser($_SESSION['user_email']);
        //print_r($allpayment);
        $musicid=[];
        foreach ($allpayment as $payment) {
            if (!empty($payment->products_ids)) {
                $arr = explode(',', $payment->products_ids);
                $musicid =array_merge($musicid,$arr);
            }
        }
        $m_ids = implode(",", $musicid);
        $accessMusic=[];
        if (!empty($m_ids)) {
            // echo $m_ids;
            $accesspdf= $this->productModel->getproductlist($m_ids);
        }
        $data = [
            'page_title' => 'Contacts Us',
            'description' => '',
            'info'=>$info,
            'office'=>$office,
            'primary_cat'=>$primary_cat,
            'child'=>$child,
            'brands'=>$brand,
            'pdf'=>$accesspdf
        ];
        $this->view('profile/index', $data);
    }
}