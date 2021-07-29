<?php
  class User {
      private $db;
      private $dbCore;

      public function __construct()
      {
          $this->db = new Database;
          $this->dbCore = new coreDb;
    }

    // Regsiter user
    public function register($data){
      $this->dbCore->query("INSERT INTO users (fname,lname, email,phone, password,zip,address,site_id) VALUES(:fname,:lname, :email,:phone, :password,:zip,:address,'1')");
      // Bind values
      $this->dbCore->bind(':fname', $data['f_name']);
      $this->dbCore->bind(':lname', $data['l_name']);
      $this->dbCore->bind(':email', $data['mail']);
      $this->dbCore->bind(':phone', $data['phone']);
      $this->dbCore->bind(':password', $data['pass1']);
      $this->dbCore->bind(':zip', $data['zip']);
      $this->dbCore->bind(':address', $data['address']);

      // Execute
      if($this->dbCore->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($username, $password){
      $this->db->query('SELECT * FROM users WHERE email = :username');
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if($password == $hashed_password){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

        $results = $this->db->resultSet();
        if ($results) {
            return $results;
        } else {
            return $results;
        }
    }
      // Find user by email
      public function findUserByusernName($username){
          $this->db->query('SELECT * FROM users WHERE username = :username');
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
          $this->db->query('SELECT * FROM users WHERE id = :id');
          // Bind value
          $this->db->bind(':id', $id);

          $row = $this->db->single();
          return $row;

      }
  }