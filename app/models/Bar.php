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

    public function viewavailablebaritems(){

      $this->db->query('SELECT * FROM baritems WHERE status="1" GROUP BY itemName');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewavailablesnackitems(){

      $this->db->query('SELECT * FROM fooditems WHERE category="Bar Snack" AND status="1" GROUP BY itemName ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addbarorder($tableno,$date,$time,$status){
      $this->db->query('INSERT INTO `barorders` (`TableNo`, `Date`, `Time`, `Status`, `PlacedBy`) VALUES (:tableno, :date, :time, :status, :placedby)');
  
      $this->db->bind(':tableno',$tableno);
      $this->db->bind(':date', $date);
      $this->db->bind(':time', $time);
      $this->db->bind(':status', $status);
      $this->db->bind(':placedby', $_SESSION['UserName']);
  
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function selectbarorderno($date, $time){
      $this->db->query('SELECT BarOrderNo FROM barorders WHERE date=:date AND time=:time');
      $this->db->bind(':date', $date);
      $this->db->bind(':time', $time);
      $result = $this->db->single();
      return $result;
    }

    public function selectbaritemid($baritemNamei, $barportioni){
      $this->db->query('SELECT `barItemId` FROM `baritems` WHERE `itemName`=:itemName AND `volume`=:portion');
      $this->db->bind(':itemName', $baritemNamei);
      $this->db->bind(':portion', $barportioni);
      $result = $this->db->single();
      return $result;
    }
  
    public function addbaroderitem($barid, $barportioni, $barquantityi, $barorderno){
      $this->db->query('INSERT INTO `barorderitems` (`barItemid`, `Volume`, `Quantity`, `BarOrderNo`) VALUES (:itemid, :portion, :quantity, :restaurantorderno)');
  
      $this->db->bind(':itemid', $barid);
      $this->db->bind(':portion', $barportioni);
      $this->db->bind(':quantity', $barquantityi);
      $this->db->bind(':restaurantorderno', $barorderno);
  
      $this->db->execute();
    }

    public function selectsnackitemid($snackitemNamei, $snackportioni){
      $this->db->query('SELECT `fooditemId` FROM `fooditems` WHERE `itemName`=:itemName AND `portion`=:portion');
      $this->db->bind(':itemName', $snackitemNamei);
      $this->db->bind(':portion', $snackportioni);
      $result = $this->db->single();
      return $result;
    }
  
    public function addsnackoderitem($snackid, $snackportioni, $snackquantityi, $barorderno){
      $this->db->query('INSERT INTO `barordersnacks` (`fooditemId`, `PortionType`, `Quantity`, `BarOrderNo`) VALUES (:itemid, :portion, :quantity, :restaurantorderno)');
  
      $this->db->bind(':itemid', $snackid);
      $this->db->bind(':portion', $snackportioni);
      $this->db->bind(':quantity', $snackquantityi);
      $this->db->bind(':restaurantorderno', $barorderno);
  
      $this->db->execute();
    }

    public function selectbarorderitems($orderno){
      $this->db->query('SELECT barorderitems.*, baritems.* FROM barorderitems INNER JOIN baritems ON barorderitems.barItemid = baritems.barItemId WHERE barorderitems.BarOrderNo = :orderno ');
      $this->db->bind(':orderno', $orderno);
      $results = $this->db->resultset();
      return $results;
    }

    public function selectbarordersnackitems($orderno){
      $this->db->query('SELECT barordersnacks.*, fooditems.* FROM barordersnacks INNER JOIN fooditems ON barordersnacks.fooditemid = fooditems.fooditemId WHERE barordersnacks.BarOrderNo = :orderno ');
      $this->db->bind(':orderno', $orderno);
      $results = $this->db->resultset();
      return $results;
    }

    public function viewbaritem($barItemId){
      $this->db->query('SELECT * FROM `baritems` WHERE `barItemId`=:barItemId');
      $this->db->bind(':barItemId', $barItemId);
      $results = $this->db->single();
      return $results;
    }

    public function viewsnackitem($fooditemId){
      $this->db->query('SELECT * FROM `fooditems` WHERE `fooditemId`=:fooditemId');
      $this->db->bind(':fooditemId', $fooditemId);
      $results = $this->db->single();
      return $results;
    }

    public function updatebaritem($data, $barItemId){
      $this->db->query('UPDATE `baritems` SET `itemName` =:itemName , `category` =:category , `volume` =:volume , `status` =:status , `price` =:price WHERE `barItemId`=:barItemId');
      $this->db->bind(':itemName',$data['itemName']);
      $this->db->bind(':category',$data['category']);
      $this->db->bind(':volume',$data['volume']);
      $this->db->bind(':status',$data['status']);
      $this->db->bind(':price',$data['price']);
      $this->db->bind(':barItemId', $barItemId);

      if($this->db->execute()){
       return true;
     }else{
       return false;
     }

    }

    public function updatesnackitem($data, $fooditemId){
      $this->db->query('UPDATE `fooditems` SET `itemName` =:itemName , `category` =:category , `portion` =:portion , `status` =:status , `price` =:price WHERE `fooditemId`=:fooditemId');
      $this->db->bind(':itemName',$data['itemName']);
      $this->db->bind(':category',$data['category']);
      $this->db->bind(':portion',$data['portion']);
      $this->db->bind(':status',$data['status']);
      $this->db->bind(':price',$data['price']);
      $this->db->bind(':fooditemId', $fooditemId);

      if($this->db->execute()){
       return true;
     }else{
       return false;
     }

    }

    public function issuebarbill($data, $orderno){
      $this->db->query('INSERT INTO `barbills` (`BarOrderNo`, `TotalPrice`, `Amount`, `Discount`, `DiscountedPrice`, `Balance`, `Date`, `Time`) VALUES (:orderno, :tprice, :amount, :discount, :disprice, :balance, :date, :time)');
  
      $this->db->bind(':discount',$data['discount']);
      $this->db->bind(':disprice', $data['disprice']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':balance', $data['balance']);
      $this->db->bind(':tprice',$data['tprice']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':time', $data['time']);
      $this->db->bind(':orderno', $orderno);
  
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function updatebarorderstatus($data,$orderno){
      $this->db->query('UPDATE barorders SET `Status` = :status WHERE `BarOrderNo` = :orderno');

      $this->db->bind(':status',$data['status']);
      $this->db->bind(':orderno', $orderno);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function getOrderItemDetials($itemno){
      $this->db->query('SELECT barorderitems.*, baritems.* FROM barorderitems INNER JOIN baritems ON barorderitems.`barItemId` = baritems.`barItemId` WHERE `BarOrderItemNo` = :barorderitemno');

      $this->db->bind(':barorderitemno', $itemno);

      $result = $this->db->single();

      return $result;
    }

    public function updateOrderItem($data){
      $this->db->query('UPDATE barorderitems SET `Volume` = :volume, `Quantity` = :quantity WHERE `BarOrderItemNo` = :barorderitemno');

      $this->db->bind(':volume', $data['volume']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':barorderitemno', $data['barorderitemno']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }

    }

    public function getOrderSnackDetials($barordersnackno){
      $this->db->query('SELECT barordersnacks.*, fooditems.* FROM barordersnacks INNER JOIN fooditems ON barordersnacks.`fooditemid` = fooditems.`fooditemId` WHERE `BarOrderSnackNo` = :barordersnackno');

      $this->db->bind(':barordersnackno', $barordersnackno);

      $result = $this->db->single();

      return $result;
    }

    public function updateOrderSnack($data){
      $this->db->query('UPDATE barordersnacks SET `PortionType` = :ptype, `Quantity` = :quantity WHERE `BarOrderSnackNo` = :barordersnackno');

      $this->db->bind(':ptype', $data['ptype']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':barordersnackno', $data['barordersnackno']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }

    }

    public function cancelBarOrder($orderno){
      $this->db->query('UPDATE barorders SET `Status`="Cancelled" WHERE `BarOrderNo` = :orderno');

      $this->db->bind(':orderno', $orderno);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function deleteorderbarItem($data){
      $this->db->query('DELETE FROM barorderitems WHERE BarOrderItemNo=:BarOrderItemNo');
  
      $this->db->bind(':BarOrderItemNo',$data['itemid']);
  
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function deleteordersnackItem($data){
      $this->db->query('DELETE FROM barordersnacks WHERE BarOrderSnackNo=:BarOrderSnackNo');
  
      $this->db->bind(':BarOrderSnackNo',$data['itemid']);
  
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function selectbilldetails(){
      $this->db->query('SELECT * FROM barbills ORDER BY BarBillNo ASC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function deletebarItem($data){
      $this->db->query('DELETE FROM baritems WHERE BarItemId=:itemid');
  
      $this->db->bind(':itemid',$data['itemid']);
  
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function deletesnackItem($data){
      $this->db->query('DELETE FROM fooditems WHERE fooditemId=:itemid');
  
      $this->db->bind(':itemid',$data['itemid']);
  
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }
  

  }  