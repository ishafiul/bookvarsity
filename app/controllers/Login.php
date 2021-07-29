<?php

class Login extends Controller
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
            'password' => '',
            'username' => '',
            'username_err' => '',
            'password_err' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'page_title' => 'Contacts Us',
                'description' => '',
                'info'=>$info,
                'office'=>$office,
                'primary_cat'=>$primary_cat,
                'child'=>$child,
                'brands'=>$brand,
                'password' => trim($_POST['password']),
                'username' => trim($_POST['username']),
                'username_err' => '',
                'password_err' => ''
            ];
            if(empty($data['username'])){
                $data['username_err'] = 'Please enter mail';
            }

            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if($this->userModel->findUserByEmail($data['username'])){
                // User found
            } else {
                // User not found
                $data['username_err'] = 'No user found';
            }
            if(empty($data['username_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if($loggedInUser){
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('login/index', $data);
                }
            }
        }
        $this->view('login/index', $data);
    }
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->fname;
        //$_SESSION['user_type'] = $user->type;
        redirect('');
    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('login');
    }
}