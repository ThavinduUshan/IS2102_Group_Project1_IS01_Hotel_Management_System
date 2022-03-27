<?php
  class Restaurant{
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

    public function updatefooditems($data, $fooditemId){
      // Update food items
      $this->db->query('UPDATE `fooditems` SET `itemName` =:itemName , `category` =:category , `portion` =:portion , `status` =:status , `price` =:price WHERE `fooditemId`=:fooditemId');

      //binding values
      $this->db->bind(':itemName', $data['itemName']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':portion', $data['portion']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':fooditemId', $fooditemId);

      //execute function
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    //view updated food item-Restaurants
    public function viewfooditem($fooditemId){

      $this->db->query('SELECT * FROM `fooditems` WHERE `fooditemId`=:fooditemId');
      $this->db->bind(':fooditemId', $fooditemId);

      $results = $this->db->single();
      return $results;
    }

    public function viewavailablefooditems(){

      $this->db->query('SELECT * FROM fooditems WHERE status="1" GROUP BY itemName');

      $results = $this->db->resultSet();

      return $results;
    }

  public function addrestaurantorder($tableno,$date,$time,$status){
    $this->db->query('INSERT INTO `restaurantorders` (`TableNo`, `Date`, `Time`, `Status`) VALUES (:tableno, :date, :time, :status)');

    $this->db->bind(':tableno',$tableno);
    $this->db->bind(':date', $date);
    $this->db->bind(':time', $time);
    $this->db->bind(':status', $status);

    if($this->db->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function selectrestaurantorderno($date, $time){
    $this->db->query('SELECT RestaurantOrderNo FROM restaurantorders WHERE date=:date AND time=:time');
    $this->db->bind(':date', $date);
    $this->db->bind(':time', $time);
    $result = $this->db->single();
    return $result;
  }

  public function selectfooditemid($itemNamei, $portioni){
    $this->db->query('SELECT `fooditemId` FROM `fooditems` WHERE `itemName`=:itemName AND `portion`=:portion');
    $this->db->bind(':itemName', $itemNamei);
    $this->db->bind(':portion', $portioni);
    $result = $this->db->single();
    return $result;
  }

  public function addrestaurantoderitem($foodid, $portioni, $quantityi, $restaurantorderno){
    $this->db->query('INSERT INTO `restaurantorderitems` (`fooditemid`, `PortionType`, `Quantity`, `RestaurantOrderNo`) VALUES (:itemid, :portion, :quantity, :restaurantorderno)');

    $this->db->bind(':itemid', $foodid);
    $this->db->bind(':portion', $portioni);
    $this->db->bind(':quantity', $quantityi);
    $this->db->bind(':restaurantorderno', $restaurantorderno);

    $this->db->execute();
  }

  public function selectrestaurantorderitems($orderno){
    $this->db->query('SELECT restaurantorderitems.*, fooditems.* FROM restaurantorderitems INNER JOIN fooditems ON restaurantorderitems.fooditemid = fooditems.fooditemId WHERE restaurantorderitems.RestaurantOrderNo = :orderno ');
    $this->db->bind(':orderno', $orderno);
    $results = $this->db->resultset();
    return $results;
  }

  public function selectfooditemnames($foodid){

    $this->db->query('SELECT * FROM `fooditems` WHERE `fooditemId`=:itemid');
    $this->db->bind(':itemid', $foodid);
    $results = $this->db->resultset();
    return $results;
  }
  
}

