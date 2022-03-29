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

      public function viewbarorderdetails($barorderno){

      $this->db->query('SELECT barorderitems.`Volume`,barorderitems.`Quantity`,baritems.`itemName`,barorders.`Status` FROM barorderitems INNER JOIN baritems ON barorderitems.`barItemId` = baritems.`barItemId` INNER JOIN barorders ON barorderitems.`BarOrderNo`= barorders.`BarOrderNo` WHERE barorderitems.`BarOrderNo` = :barorderno');
      $this->db->bind(':barorderno', $barorderno);

      $results = $this->db->resultSet();

     return $results;
    }
    
    public function viewrestaurantorderdetails($orderno){

    // $this->db->query('SELECT fooditemid,PortionType,Quantity FROM restaurantorderitems ');
    $this->db->query('SELECT restaurantorderitems.`PortionType`,restaurantorderitems.`Quantity`,fooditems.`itemName`, restaurantorders.`Status` FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorderitems.`RestaurantOrderNo`= restaurantorders.`RestaurantOrderNo` WHERE restaurantorderitems.`RestaurantOrderNo` = :orderno');
    $this->db->bind(':orderno', $orderno);
   

     
     $results = $this->db->resultSet();
      return $results;
    }
    public function viewroomorderdetails($roomorderno){

      $this->db->query('SELECT roomorderitems.`PortionType`,roomorderitems.`Quantity`,fooditems.`itemName`, roomorders.`Status` FROM roomorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = roomorderitems.`fooditemId` INNER JOIN roomorders ON roomorderitems.`RoomOrderNo`= roomorders.`RoomOrderNo` WHERE roomorderitems.`RoomOrderNo` = :roomorderno');
      $this->db->bind(':roomorderno', $roomorderno);

      $results = $this->db->resultSet();

     return $results;
    }

    
    public function updateRestaurantOrderStatus($data){
      $this->db->query('UPDATE restaurantorders SET `Status` = :Status WHERE `RestaurantOrderNo` = :orderno');
      
      $this->db->bind(':orderno',$data['orderno']);
      $this->db->bind(':Status',$data['Status']);
 
      if($this->db->execute()){
       return true;
     }else{
       return false;
     }
    }

    public function viewbarorders(){

      $this->db->query('SELECT BarOrderNo,TableNo,Status FROM barorders WHERE `Status`="Pending" ORDER BY Time');

      $results = $this->db->resultSet();

     return $results;
    }
    public function viewroomorders(){

      $this->db->query('SELECT RoomOrderNo,RoomNo,ResNo,Status FROM roomorders WHERE `Status`="Pending" ORDER BY TIME ');

      $results = $this->db->resultSet();

     return $results;
    }

    public function updateRoomOrderStatus($data){
      $this->db->query('UPDATE roomorders SET `Status` = :Status WHERE `RoomOrderNo` = :roomorderno');
      
      $this->db->bind(':roomorderno',$data['roomorderno']);
      $this->db->bind(':Status',$data['Status']);
 
      if($this->db->execute()){
       return true;
     }else{
       return false;
     }
    }
  
    public function updateBarOrderStatus($data){
      $this->db->query('UPDATE barorders SET `Status` = :Status WHERE `BarOrderNo` = :barorderno');
      
      $this->db->bind(':barorderno',$data['barorderno']);
      $this->db->bind(':Status',$data['Status']);
 
      if($this->db->execute()){
       return true;
     }else{
       return false;
     }
    }
   
    

  }