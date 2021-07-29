<?php

class Signup extends Controller
{
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
        $office = $this->officeModel->getAllOfficeInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();
        $data = [
            'page_title' => 'Contacts Us',
            'description' => '',
            'info'=>$info,
            'office'=>$office,
            'primary_cat'=>$primary_cat,
            'child'=>$child,
            'brands'=>$brand,
            'f_name'=>'',
            'l_name'=>'',
            'mail'=>'',
            'phone'=>'',
            'zip'=>'',
            'address'=>'',
            'pass1'=>'',
            'pass2'=>'',
            'f_name_err'=>'',
            'l_name_err'=>'',
            'mail_err'=>'',
            'phone_err'=>'',
            'zip_err'=>'',
            'address_err'=>'',
            'pass1_err'=>'',
            'pass2_err'=>'',
            'password'=>'',
            'success_msg'=>''
        ];

        if (isset($_POST['signup'])){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'page_title' => 'Contacts Us',
                'description' => '',
                'info'=>$info,
                'office'=>$office,
                'primary_cat'=>$primary_cat,
                'child'=>$child,
                'brands'=>$brand,
                'f_name'=>$_POST['fname'],
                'l_name'=>$_POST['l_name'],
                'mail'=>$_POST['mail'],
                'phone'=>$_POST['phone'],
                'zip'=>$_POST['zip'],
                'address'=>$_POST['address'],
                'pass1'=>$_POST['pass1'],
                'pass2'=>$_POST['pass2'],
                'f_name_err'=>'',
                'l_name_err'=>'',
                'mail_err'=>'',
                'phone_err'=>'',
                'zip_err'=>'',
                'address_err'=>'',
                'pass1_err'=>'',
                'pass2_err'=>'',
                'password'=>'',
                'success_msg'=>''
            ];

            if(empty($data['mail'])){
                $data['mail_err'] = 'Please enter email';
            }
            else {
                // Check email
                if($this->userModel->findUserByEmail($data['mail'])){
                    $data['mail_err'] = 'Email is already taken';
                }
            }
            if(empty($data['phone'])){
                $data['phone_err'] = 'Please enter phone number';
            }
            if(empty($data['zip'])){
                $data['zip_err'] = 'Please enter zip number';
            }
            if(empty($data['f_name'])){
                $data['f_name_err'] = 'Please enter first name';
            }
            // Validate Name
            if(empty($data['l_name'])){
                $data['l_name_err'] = 'Please enter last name';
            }

            // Validate Password
            if(empty($data['pass1'])){
                $data['pass1_err'] = 'Please enter password';
            } elseif(strlen($data['pass1']) < 6){
                $data['pass1_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if(empty($data['pass2'])){
                $data['pass2_err'] = 'Pleae confirm password';
            } else {
                if($data['pass1'] != $data['pass2']){
                    $data['pass2_err'] = 'Passwords do not match';
                }
            }
            if (
                empty($data['mail_err']) &&
                empty($data['phone_err']) &&
                empty($data['zip_err']) &&
                empty($data['f_name_err']) &&
                empty($data['l_name_err']) &&
                empty($data['pass1_err']) &&
                empty($data['pass2_err'])
            )
            {
                // Register User
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('login');
                } else {
                    die('Something went wrong');
                }
            }
        }
        $this->view('signup/index', $data);
    }
}