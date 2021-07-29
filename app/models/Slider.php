<?php
class Slider
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSlider(){
        $this->db->query("SELECT * FROM slider ");
        $results = $this->db->resultSet();
        return $results;
    }
    public function addSlider($img){
        $this->db->query("INSERT INTO slider (img) VALUES(:img)");
        // Bind values
        $this->db->bind(':img', $img);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function deleteSlide($id){
        $this->db->query("DELETE FROM slider where id=:id");
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function editSlider($imgName,$imgId){
        $this->db->query("UPDATE slider SET img = :img where id = :id");
        $this->db->bind(':img',$imgName);
        $this->db->bind(':id',$imgId);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}