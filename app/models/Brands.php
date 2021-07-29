<?php
class Brands
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getBrands(){
        $this->db->query("SELECT brands.id,brands.name,brands.category_id,categorys.name as cat_name FROM `brands` JOIN categorys ON brands.category_id = categorys.id");
        $results = $this->db->resultSet();
        return $results;
    }
    public function addBrands($data){
        $this->db->query("INSERT INTO brands (name, category_id) VALUES(:name, :category_id)");
        $this->db->bind(':name',$data['brand_name']);
        $this->db->bind(':category_id',$data['cat_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function deleteBrand($data){
        $this->db->query("DELETE FROM brands where id = :id");
        $this->db->bind(':id',$data['id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function editBrands($data){
        $this->db->query("UPDATE brands SET name=:name,category_id=:category_id where id = :id");
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':name',$data['brand_name']);
        $this->db->bind(':category_id',$data['cat_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}