<?php
  class Page{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function  addIssues($data){

      //prepared statement
      $this->db->query('INSERT INTO issues (cusName, cusEmail, subject, description, status)
      VALUES (:cusName, :cusEmail, :subject, :description, :status)');

      //bind values with parameters
      $this->db->bind(':cusName', $data['cusName']);
      $this->db->bind(':cusEmail', $data['cusEmail']);
      $this->db->bind(':subject', $data['subject']);
      $this->db->bind(':description', $data['description']);
      $this->db->bind(':status', $data['status']);

      //execute function
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
      
    }

  }