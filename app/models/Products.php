<?php

class Products
{
    private $db;
    private $dbCore;

    public function __construct()
    {
        $this->db = new Database;
        $this->dbCore = new coreDb;

    }
    public function getTotalRow()
    {
        $this->db->query("SELECT COUNT(*) as total_row FROM products");
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getPagination($offset, $no_of_records_per_page)//for all product admin
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id
 where products.top_f=0 and products.boottom_f=0 LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $results = $this->db->resultSet();
        return $results;
    }

    //browse index
    public function getPaginationAll($offset, $no_of_records_per_page)//for all product
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPaginationBySort($offset, $no_of_records_per_page,$sort)//for all product
    {
        if ($sort[0] == 1){
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id order by products.price desc LIMIT :limit OFFSET :offset ");

        }
        else{
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id order by products.price asc LIMIT :limit OFFSET :offset ");

        }
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPaginationByPrice($offset, $no_of_records_per_page,$price)//for all product
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.price BETWEEN :low AND :high LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalRowByPrice($price)//for all product
    {
        $this->db->query("SELECT COUNT(*) as total_row FROM products WHERE price BETWEEN :low AND :high");
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }

    public function getPaginationBySortPrice($offset, $no_of_records_per_page,$sort,$price)//for all product
    {
        if ($sort[0] == 1){
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.price BETWEEN :low AND :high order by products.price desc LIMIT :limit OFFSET :offset ");

        }
        else{
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.price BETWEEN :low AND :high order by products.price asc LIMIT :limit OFFSET :offset ");

        }
        //$this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id WHERE products.price BETWEEN :low AND :high LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $results = $this->db->resultSet();
        return $results;
    }

    /*end*/
    public function getPaginationAllCatId($offset, $no_of_records_per_page,$id)//for all product
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.category = :id GROUP BY products.id LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalRowByCatId($id){
        $this->db->query("SELECT COUNT(*) as total_row FROM products where category=:id");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getPaginationBySortCatId($offset, $no_of_records_per_page,$sort,$id){
        if ($sort[0] == 1){
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.category = :id GROUP BY products.id order by products.price desc LIMIT :limit OFFSET :offset ");

        }
        else{
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.category = :id GROUP BY products.id order by products.price asc LIMIT :limit OFFSET :offset ");

        }
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPaginationByPriceCatId($offset, $no_of_records_per_page,$price,$id)//for all product
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.category = :id and products.price BETWEEN :low AND :high GROUP BY products.id LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalRowByPriceCatId($price,$id)//for all product
    {
        $this->db->query("SELECT COUNT(*) as total_row FROM products WHERE category = :id and price BETWEEN :low AND :high");
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getPaginationBySortPriceCatId($offset, $no_of_records_per_page,$sort,$price,$id)//for all product
    {
        if ($sort[0] == 1){
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.category = :id and products.price BETWEEN :low AND :high GROUP BY products.id order by products.price desc LIMIT :limit OFFSET :offset ");

        }
        else{
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.category = :id and products.price BETWEEN :low AND :high GROUP BY products.id order by products.price asc LIMIT :limit OFFSET :offset ");

        }
        //$this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id WHERE products.price BETWEEN :low AND :high LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
/**/
    public function getPaginationAllBrandId($offset, $no_of_records_per_page,$id)//for all product
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.brand = :id GROUP BY products.id LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalRowByBrandId($id){
        $this->db->query("SELECT COUNT(*) as total_row FROM products where brand=:id");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getPaginationBySortBrandId($offset, $no_of_records_per_page,$sort,$id){
        if ($sort[0] == 1){
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.brand = :id GROUP BY products.id order by products.price desc LIMIT :limit OFFSET :offset ");

        }
        else{
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.brand = :id GROUP BY products.id order by products.price asc LIMIT :limit OFFSET :offset ");

        }
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPaginationByPriceBrandId($offset, $no_of_records_per_page,$price,$id)//for all product
    {
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.brand = :id and products.price BETWEEN :low AND :high GROUP BY products.id LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalRowByPriceBrandId($price,$id)//for all product
    {
        $this->db->query("SELECT COUNT(*) as total_row FROM products WHERE brand = :id and price BETWEEN :low AND :high");
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getPaginationBySortPriceBrandId($offset, $no_of_records_per_page,$sort,$price,$id)//for all product
    {
        if ($sort[0] == 1){
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.brand = :id and products.price BETWEEN :low AND :high GROUP BY products.id order by products.price desc LIMIT :limit OFFSET :offset ");

        }
        else{
            $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id WHERE products.brand = :id and products.price BETWEEN :low AND :high GROUP BY products.id order by products.price asc LIMIT :limit OFFSET :offset ");

        }
        //$this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id WHERE products.price BETWEEN :low AND :high LIMIT :limit OFFSET :offset ");
        $this->db->bind(':limit', $no_of_records_per_page);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':low', $price[0]);
        $this->db->bind(':high', $price[1]);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTopF(){
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id
  where top_f=1");
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getBottomF(){
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id
 where boottom_f=1");
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getHomeproduct(){
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name,image.base64 as product_base_img FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id JOIN image ON products.url = image.product_id where products.add_to_home=1 GROUP BY products.id");
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getProductByUrl($Url){
        $this->db->query("SELECT products.*, categorys.name AS cat_name,brands.name AS brand_name FROM products JOIN categorys ON products.category = categorys.id JOIN brands ON products.brand = brands.id where products.url=:url");
        $this->db->bind(':url', $Url);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function addProduct($data){
        $this->dbCore->query("INSERT INTO products(product_name, price, short_info,product_details,more_info,category,brand,url,pdf,site_id) VALUES(:product_name, :price, :short_info,:product_details,:more_info,:category,:brand,:url,:pdf,:site_id)");
        $this->dbCore->bind(':product_name', $data['name']);
        $this->dbCore->bind(':price', $data['price']);
        $this->dbCore->bind(':short_info', $data['short_info']);
        $this->dbCore->bind(':product_details', $data['details']);
        $this->dbCore->bind(':more_info', $data['more_info']);
        $this->dbCore->bind(':category', $data['category']);
        $this->dbCore->bind(':brand', $data['brand']);
        $this->dbCore->bind(':url', $data['url']);
        $this->dbCore->bind(':pdf', $data['pdf']);
        $this->dbCore->bind(':site_id', $data['site_id']);
        $this->dbCore->resultSet();
        return $this->dbCore->lastInsertId();
    }
    public function deleteproduct($data){
        $this->db->query("DELETE FROM products where id=:id");
        $this->db->bind(':id', $data);
        $this->db->execute();
    }
    public function addTopF($id){
        $this->db->query("UPDATE products SET top_f=1 where id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function removeTopF($id){
        $this->db->query("UPDATE products SET top_f=0 where id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function addBottomF($id){
        $this->db->query("UPDATE products SET boottom_f=1 where id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function removeBottomF($id){
        $this->db->query("UPDATE products SET boottom_f=0 where id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function updateProduct($data){
        $this->db->query("UPDATE products SET product_name=:product_name,price=:price,short_info=:short_info,product_details=:product_details,more_info=:more_info,category=:category,brand=:brand where id=:id");
        $this->db->bind(':product_name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':short_info', $data['short_info']);
        $this->db->bind(':product_details', $data['details']);
        $this->db->bind(':more_info', $data['more_info']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':id', $data['id']);
        $this->db->execute();
    }
    public function addToHome($id){
        $this->db->query("UPDATE products SET add_to_home=1 where id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function removeFromHome($id){
        $this->db->query("UPDATE products SET add_to_home=0 where id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function getRelatedProduct($product){
        $this->db->query("SELECT products.*,RAND() as IDX,image.base64 as product_base_img FROM `products` JOIN image ON products.url = image.product_id WHERE category=:id GROUP BY products.id ORDER by IDX LIMIT 4");
        $this->db->bind(':id', $product[0]->category);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getCartProduct($id){
        $this->db->query("SELECT products.*, image.base64 as product_base_img FROM products JOIN image ON products.url = image.product_id where products.id in ($id) GROUP BY products.id");
        //$this->db->bind(':ids', $id);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getAllProduct(){
        $this->db->query("SELECT * FROM products");
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function getproductlist(){

    }
}