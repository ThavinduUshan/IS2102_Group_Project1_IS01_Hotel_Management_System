<?php
  class User{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function register($data){
      //prepared statement
      $this->db->query('INSERT INTO users (FirstName, LastName, Email, NIC, Mobile, FixedLine, DOB, Gender, UserName, UserTypeID, Password)
       VALUES (:FirstName, :LastName, :Email, :NIC, :Mobile, :FixedLine, :DOB, :Gender, :UserName, :UserTypeID, :Password)');

       //bind values
       $this->db->bind(':FirstName', $data['fname']);
       $this->db->bind(':LastName', $data['lname']);
       $this->db->bind(':Email', $data['email']);
       $this->db->bind(':NIC', $data['nic']);
       $this->db->bind(':Mobile', $data['mobilenum']);
       $this->db->bind(':FixedLine', $data['fixednum']);
       $this->db->bind(':DOB', $data['dob']);
       $this->db->bind(':Gender', $data['gender']);
       $this->db->bind(':UserName', $data['uname']);
       $this->db->bind(':UserTypeID', $data['utypeid']);
       $this->db->bind(':Password', $data['psw']);

       //execute function
       if($this->db->execute()){
         return true;
       }else{
         return false;
       }
       
    }

    public function login($data){
      $this->db->query('SELECT * FROM users WHERE UserName = :UserName');

      //bind values
      $this->db->bind(':UserName', $data['uname']);

      $row = $this->db->single();

      $hasedPassword = $row->Password;

      if(password_verify($data['psw'], $hasedPassword)){
        return $row;
      }else{
        return false;
      }

    }

    public function findUserByEmail($email){
      //prepared statement
      $this->db->query('SELECT * FROM users WHERE email= :email');

      //email parameter will bind with the email variable
      $this->db->bind(':email', $email);

      //check email is alredy avaialble
      if($this->db->rowCount() > 0){
        return true;
      }else{
        return false;
      }
    }

  }