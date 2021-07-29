<?php
  class Pages extends Controller {
    public function __construct(){
     //your models gose here . example : $this->ModelName = $this->model('model_class_name');
        $this->sliderModel = $this->model('Slider');
        $this->siteInfoModel = $this->model('SiteInfo');
        $this->officeModel = $this->model('Office');
        $this->categoryModel = $this->model('Category');
        $this->brandModel = $this->model('Brands');
        $this->productModel = $this->model('Products');
        $this->imgModel = $this->model('Image');
    }
    
    public function index(){// function name will define what will be the page url that user will input
        $sliders = $this->sliderModel->getSlider(); // call models
        $info = $this->siteInfoModel->getSiteInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();
        $topF = $this->productModel->getTopF();
        $homeProduct= $this->productModel->getHomeproduct();
        $imgF='';
        if (!empty($topF)){
            $imgF = $this->imgModel->getImgByProductId($topF);
        }
        $bottomF = $this->productModel->getBottomF();
        $imgB = '';
        if (!empty($bottomF)){
            $imgB = $this->imgModel->getImgByProductId($bottomF);
        }

        $data =[
            'description' => '',
            'page_title'=>'Home Page',
            'slider'=>$sliders,
            'info'=>$info,
            'primary_cat'=>$primary_cat,
            'child'=>$child,
            'brands'=>$brand,
            'top_f'=>$topF,
            'bottom_f'=>$bottomF,
            'product_img_top'=>$imgF,
            'product_img_bottom'=>$imgB,
            'home_product'=>$homeProduct,
        ];
        if (isset($_POST['addToCart'])){
            if (!isset($_SESSION)){
                session_start();

            }
            $id = $_POST['id'];
            if (isset($_SESSION['cart'])){
                if (in_array($id,$_SESSION['cart'])){
                    echo '<script>alert("Item Already In Cart");</script>';
                }
                else{
                    $_SESSION['cart'] = array_merge($_SESSION['cart'],$_SESSION['cart']=[$id]);
                    redirect('index/');
                }

            }
            else{
                $_SESSION['cart'] =[$id];
                redirect('index/');
            }

        }
      $this->view('pages/index', $data); // which view will load
    }

    public function about(){
        $info = $this->siteInfoModel->getSiteInfo();
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $brand = $this->brandModel->getBrands();
        $data =[
            'description' => '',
            'page_title'=>'About Us',
            'info'=>$info,
            'primary_cat'=>$primary_cat,
            'child'=>$child,
            'brands'=>$brand
        ];

      $this->view('pages/about', $data);
    }
    public function contact(){
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
          'brands'=>$brand
      ];

      $this->view('pages/contact', $data);
  }
  }