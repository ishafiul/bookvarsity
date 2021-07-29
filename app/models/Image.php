<?php
class Image
{
    private $db;
    private $dbCore;

    public function __construct()
    {
        $this->db = new Database;
        $this->dbCore = new coreDb;
    }
    public function getImgByProductId($product){
        $this->db->query("SELECT * FROM image where product_id=:id");
        $this->db->bind(':id', $product['0']->url);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
    public function addImg($name,$id,$base64){
        $this->dbCore->query("INSERT INTO image (img, product_id,base64,site_id) VALUES(:img, :product_id,:base64,:site_id)");
        $this->dbCore->bind(':img', $name);
        $this->dbCore->bind(':product_id', $id);
        $this->dbCore->bind(':base64', $base64);
        $this->dbCore->bind(':site_id', 1);
        $results = $this->dbCore->resultSet();
        if ($results) {
            return $results;
        }
    }
    public function deleteImg($id){
        $this->db->query("DELETE FROM image WHERE id=:id");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        }
    }
    public function editImg($name,$id){
        $this->db->query("UPDATE image SET img=:img WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->bind(':img', $name);
        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        }
    }
}