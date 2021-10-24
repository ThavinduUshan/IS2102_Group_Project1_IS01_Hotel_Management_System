<?php
  class Admin{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function viewissues(){
      $this->db->query('SELECT * FROM issues ORDER BY issuesId DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewusers(){
      $this->db->query('SELECT * FROM users ORDER BY UserID');

      $results = $this->db->resultSet();

      return $results;
    }
  }