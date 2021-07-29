<?php
class SiteInfo
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSiteInfo(){
        $this->db->query("SELECT * FROM site_info");
        $results = $this->db->resultSet();
        return $results;
    }
    public function addLogo($img){
        $this->db->query("UPDATE site_info SET logo=:img where id=1");
        $this->db->bind(':img',$img);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function featurImg1($img){
        $this->db->query("UPDATE site_info SET featurImg1=:img where id=1");
        $this->db->bind(':img',$img);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function featurImg2($img){
        $this->db->query("UPDATE site_info SET featurImg2=:img where id=1");
        $this->db->bind(':img',$img);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function infoUpdate($data){
        $this->db->query("UPDATE site_info SET title=:title,details=:details,fb=:fb,tw=:tw,ig=:ig where id=1");
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':details',$data['details']);
        $this->db->bind(':fb',$data['fb']);
        $this->db->bind(':tw',$data['tw']);
        $this->db->bind(':ig',$data['ig']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}