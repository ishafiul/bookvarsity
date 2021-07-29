<?php
class Browse extends Controller
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
    public function index(){
        $pageno = '';
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        if (isset($_GET['perpage'])){
            $no_of_records_per_page =intval($_GET['perpage']);
        }
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_rows = $this->productModel->getTotalRow();


        if (isset($_GET['sort']) && !isset($_GET['price'])){
            $sort = explode("-",$_GET['sort']);
            $products = $this->productModel->getPaginationBySort($offset, $no_of_records_per_page,$sort);
            //$total_rows = $this->productModel->getTotalRowBysort();
            //$products = $this->productModel->getPaginationAll($offset, $no_of_records_per_page);
        }
        elseif (!isset($_GET['sort']) && isset($_GET['price'])){
            $price = explode("-",$_GET['price']);
            $products = $this->productModel->getPaginationByPrice($offset, $no_of_records_per_page,$price);
            $total_rows = $this->productModel->getTotalRowByPrice($price);
        }
        elseif(isset($_GET['sort']) && isset($_GET['price'])){
            $sort = explode("-",$_GET['sort']);
            $price = explode("-",$_GET['price']);
            $products = $this->productModel->getPaginationBySortPrice($offset, $no_of_records_per_page,$sort,$price);
            //$total_rows = $this->productModel->getTotalRowByPrice($price);
        }
        else{
            $products = $this->productModel->getPaginationAll($offset, $no_of_records_per_page);
        }
        $total_pages = ceil($total_rows[0]->total_row / $no_of_records_per_page);
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $info = $this->siteInfoModel->getSiteInfo();
        $categoryChild = $this->categoryModel->getChildCategory();
        $brands = $this->brandModel->getBrands();
        $relatedProducts = '';
        $img= '';
        $data = [
            'page_title' => 'Products',
            'description' => '',
            'info' => $info,
            'products' => $products,
            'total_pages' =>$total_pages,
            'pageno'=>$pageno,
            'related_products' => $relatedProducts,
            'childCategory' => $categoryChild,
            'brands'=>$brands,
            'img'=>$img,
            'product_succ'=>'',
            'img_err'=>'',
            'primary_cat'=>$primary_cat,
            'child'=>$child

        ];
        if (isset($_POST['perpage'])){
            redirect('browse?perpage='.intval($_POST['perpage']));
        }
        if (isset($_POST['sort'])){
            if (isset($_POST['perpageforsort']) && !empty($_POST['perpageforsort'])){
                redirect('browse'.$_POST['perpageforsort'].'&sort='.$_POST['sort']);
            }
            else{
                redirect('browse?sort='.$_POST['sort']);
            }

        }
        $this->view('browse/index',$data);
    }
    public function category($id){
        $pageno = '';
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        if (isset($_GET['perpage'])){
            $no_of_records_per_page =intval($_GET['perpage']);
        }
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_rows = $this->productModel->getTotalRowByCatId($id);


        if (isset($_GET['sort']) && !isset($_GET['price'])){
            $sort = explode("-",$_GET['sort']);
            $products = $this->productModel->getPaginationBySortCatId($offset, $no_of_records_per_page,$sort,$id);
            //$total_rows = $this->productModel->getTotalRowBysort();
            //$products = $this->productModel->getPaginationAll($offset, $no_of_records_per_page);
        }
        elseif (!isset($_GET['sort']) && isset($_GET['price'])){
            $price = explode("-",$_GET['price']);
            $products = $this->productModel->getPaginationByPriceCatId($offset, $no_of_records_per_page,$price,$id);
            $total_rows = $this->productModel->getTotalRowByPriceCatId($price,$id);
        }
        elseif(isset($_GET['sort']) && isset($_GET['price'])){
            $sort = explode("-",$_GET['sort']);
            $price = explode("-",$_GET['price']);
            $products = $this->productModel->getPaginationBySortPriceCatId($offset, $no_of_records_per_page,$sort,$price,$id);
            //$total_rows = $this->productModel->getTotalRowByPrice($price);
        }
        else{
            $products = $this->productModel->getPaginationAllCatId($offset, $no_of_records_per_page,$id);
        }
        $total_pages = ceil($total_rows[0]->total_row / $no_of_records_per_page);
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $info = $this->siteInfoModel->getSiteInfo();
        $categoryChild = $this->categoryModel->getChildCategory();
        $brands = $this->brandModel->getBrands();
        $relatedProducts = '';
        $img= '';
        $data = [
            'page_title' => 'Products',
            'description' => '',
            'info' => $info,
            'products' => $products,
            'total_pages' =>$total_pages,
            'pageno'=>$pageno,
            'related_products' => $relatedProducts,
            'childCategory' => $categoryChild,
            'brands'=>$brands,
            'img'=>$img,
            'product_succ'=>'',
            'img_err'=>'',
            'primary_cat'=>$primary_cat,
            'child'=>$child

        ];
        if (isset($_POST['perpage'])){
            redirect('browse/category/'.$id.'?perpage='.intval($_POST['perpage']));
        }
        if (isset($_POST['sort'])){
            if (isset($_POST['perpageforsort']) && !empty($_POST['perpageforsort'])){
                redirect('browse/category/'.$id.$_POST['perpageforsort'].'&sort='.$_POST['sort']);
            }
            else{
                redirect('browse/category/'.$id.'?sort='.$_POST['sort']);
            }

        }
        $this->view('browse/index',$data);
    }
    public function brand($id){
        $pageno = '';
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        if (isset($_GET['perpage'])){
            $no_of_records_per_page =intval($_GET['perpage']);
        }
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_rows = $this->productModel->getTotalRowByBrandId($id);


        if (isset($_GET['sort']) && !isset($_GET['price'])){
            $sort = explode("-",$_GET['sort']);
            $products = $this->productModel->getPaginationBySortBrandId($offset, $no_of_records_per_page,$sort,$id);
            //$total_rows = $this->productModel->getTotalRowBysort();
            //$products = $this->productModel->getPaginationAll($offset, $no_of_records_per_page);
        }
        elseif (!isset($_GET['sort']) && isset($_GET['price'])){
            $price = explode("-",$_GET['price']);
            $products = $this->productModel->getPaginationByPriceBrandId($offset, $no_of_records_per_page,$price,$id);
            $total_rows = $this->productModel->getTotalRowByPriceBrandId($price,$id);
        }
        elseif(isset($_GET['sort']) && isset($_GET['price'])){
            $sort = explode("-",$_GET['sort']);
            $price = explode("-",$_GET['price']);
            $products = $this->productModel->getPaginationBySortPriceBrandId($offset, $no_of_records_per_page,$sort,$price,$id);
            //$total_rows = $this->productModel->getTotalRowByPrice($price);
        }
        else{
            $products = $this->productModel->getPaginationAllBrandId($offset, $no_of_records_per_page,$id);
        }
        $total_pages = ceil($total_rows[0]->total_row / $no_of_records_per_page);
        $primary_cat = $this->categoryModel->getPrimaryCategory();
        $child = $this->categoryModel->getChildCategory();
        $info = $this->siteInfoModel->getSiteInfo();
        $categoryChild = $this->categoryModel->getChildCategory();
        $brands = $this->brandModel->getBrands();
        $relatedProducts = '';
        $img= '';
        $data = [
            'page_title' => 'Products',
            'description' => '',
            'info' => $info,
            'products' => $products,
            'total_pages' =>$total_pages,
            'pageno'=>$pageno,
            'related_products' => $relatedProducts,
            'childCategory' => $categoryChild,
            'brands'=>$brands,
            'img'=>$img,
            'product_succ'=>'',
            'img_err'=>'',
            'primary_cat'=>$primary_cat,
            'child'=>$child

        ];
        if (isset($_POST['perpage'])){
            redirect('browse/brand/'.$id.'?perpage='.intval($_POST['perpage']));
        }
        if (isset($_POST['sort'])){
            if (isset($_POST['perpageforsort']) && !empty($_POST['perpageforsort'])){
                redirect('browse/brand/'.$id.$_POST['perpageforsort'].'&sort='.$_POST['sort']);
            }
            else{
                redirect('browse/brand/'.$id.'?sort='.$_POST['sort']);
            }

        }
        $this->view('browse/index',$data);
    }
}