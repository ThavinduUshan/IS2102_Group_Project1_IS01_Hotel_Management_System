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
    
    public function viewrestaurantorderdetails($orderno){

    // $this->db->query('SELECT fooditemid,PortionType,Quantity FROM restaurantorderitems ');
    $this->db->query('SELECT restaurantorderitems.`PortionType`,restaurantorderitems.`Quantity`,fooditems.`itemName` FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` WHERE restaurantorderitems.`RestaurantOrderNo` = :orderno');
    $this->db->bind(':orderno', $orderno);
   

     
     $results = $this->db->resultSet();
      return $results;
    }
    public function findItemById($fooditemId){
      $this->db->query('SELECT * FROM fooditems WHERE fooditemId = :fooditemId');
      $this->db->bind(':fooditemId', $fooditemId);
      $row = $this->db->single();
      return $row;
     }
     
     public function updateAvailability($data){
       $this->db->query('UPDATE fooditems SET status = :status WHERE fooditemId = :fooditemId');
       
       $this->db->bind(':fooditemId',$data['fooditemId']);
       $this->db->bind(':status',$data['status']);
  
       if($this->db->execute()){
        return true;
      }else{
        return false;
      }
     }
     public function deleteItem($fooditemId){
      $this->db->query('DELETE FROM fooditems  WHERE fooditemId = :fooditemId');
  
      $this->db->bind(':fooditemId',$fooditemId);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
     }
   
    

  }