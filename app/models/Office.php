<?php
class Office
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllOfficeInfo(){
        $this->db->query("SELECT * FROM office");
        $results = $this->db->resultSet();
        return $results;
    }
    public function addOffice($data){
        $this->db->query("INSERT INTO office (address, mobile, telephone,fax,email) VALUES(:address, :mobile, :telephone,:fax,:email)");
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':mobile',$data['mobile']);
        $this->db->bind(':telephone',$data['telephone']);
        $this->db->bind(':fax',$data['fax']);
        $this->db->bind(':email',$data['email']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function editOffice($data){
        $this->db->query("UPDATE office SET address=:address, mobile=:mobile, telephone=:telephone,fax=:fax,email=:email WHERE id=:id");
        $this->db->bind(':address',$data['editaddress']);
        $this->db->bind(':mobile',$data['editmobile']);
        $this->db->bind(':telephone',$data['edittelephone']);
        $this->db->bind(':fax',$data['editfax']);
        $this->db->bind(':email',$data['editemail']);
        $this->db->bind(':id',$data['id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function deleteOffice($data){
        $this->db->query("DELETE FROM office WHERE id=:id");
        $this->db->bind(':id',$data['id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
