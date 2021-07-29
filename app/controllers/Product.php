<?php
class Product extends Controller
{
    public function __construct()
    {
        //your models gose here . example : $this->ModelName = $this->model('model_class_name');

        $this->sliderModel = $this->model('Slider');
        $this->siteInfoModel = $this->model('SiteInfo');
        $this->officeModel = $this->model('Office');
        $this->categoryModel = $this->model('Category');
        $this->brandModel = $this->model('Brands');
        $this->productModel = $this->model('Products');
        $this->imgModel = $this->model('Image');
    }
    public function index($url){ // call models
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $info = $this->siteInfoModel->getSiteInfo();
        $categoryChild = $this->categoryModel->getChildCategory();
        $brands = $this->brandModel->getBrands();
        $products = $this->productModel->getProductByUrl($url);
        $relatedProducts = $this->productModel->getRelatedProduct($products);
        $img= $this->imgModel->getImgByProductId($products);
        $data = [
            'page_title' => $products[0]->product_name,
            'description' => strip_tags($products[0]->short_info),
            'info' => $info,
            'products' => $products,
            'related_products' => $relatedProducts,
            'childCategory' => $categoryChild,
            'brands'=>$brands,
            'img'=>$img,
            'product_succ'=>'',
            'img_err'=>'',
            'primary_cat'=>$primary_cat,
            'child'=>$child,

        ];
        if (isset($_POST['addToCart'])){
            if (!isset($_SESSION)){
                session_start();

            }
            $id = $_POST['id'];
            $url = $_POST['url'];
            if (isset($_SESSION['cart'])){
                if (in_array($id,$_SESSION['cart'])){
                    echo '<script>alert("Item Already In Cart");</script>';
                }
                else{
                    $_SESSION['cart'] = array_merge($_SESSION['cart'],$_SESSION['cart']=[$id]);
                    redirect('product/'.$url);
                }

            }
            else{
                $_SESSION['cart'] =[$id];
                redirect('product/'.$url);
            }
            //unset($_SESSION['cart']);
        }
        $this->view('product/index',$data);
    }
}