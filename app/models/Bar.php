<?php
  class Bar{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addbaritems($data){
      
      //prepared statement
      $this->db->query('INSERT INTO `baritems` (`itemName`, `category`, `volume`, `status`, `price`) VALUES (:itemName, :category, :volume, :status, :price)');

      //binding values
      $this->db->bind(':itemName', $data['itemName']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':volume', $data['volume']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':price', $data['price']);

      //execute function
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function viewbaritems(){

      $this->db->query('SELECT * FROM baritems ORDER BY barItemId ASC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewsnackitems(){

      $this->db->query('SELECT * FROM fooditems WHERE category="Bar Snack" ORDER BY fooditemId ASC');

      $results = $this->db->resultSet();

      return $results;
    }
  }
  