<?php
  class Kitchen{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addfooditems($data){

      //prepared statement
      $this->db->query('INSERT INTO `fooditems` (`itemName`, `category`, `portion`, `status`, `price`) VALUES (:itemName, :category, :portion, :status, :price)');

      //binding values
      $this->db->bind(':itemName', $data['itemName']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':portion', $data['portion']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':price', $data['price']);

      //execute function
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function viewfooditems(){

      $this->db->query('SELECT * FROM fooditems ORDER BY fooditemId ASC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewbarorderdetails(){

      $this->db->query('SELECT barorders.BarOrderNo, barorders.TableNo, barorders.Status FROM barorders INNER JOIN barordersnacks ON barorders.BarOrderNo = barordersnacks.BarOrderNo ORDER BY BarOrderNo ASC');

      $results = $this->db->resultSet();

      return $results;
    }

  }