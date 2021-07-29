<?php
class Admin {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    // Login User
    public function login($username, $password){
        $this->db->query('SELECT * FROM `admin` WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_password = $row->password;
        /*if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }*/
        if($password == $hashed_password){
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM `admin` WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    // Find user by email
    public function findUserByusernName($username){
        $this->db->query('SELECT * FROM `admin` WHERE username = :username');
        // Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    // Find user by id
    public function getUserById($id){
        $this->db->query('SELECT * FROM `admin` WHERE id = :id');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;

    }


}