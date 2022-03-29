<?php
  class Reservation{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function selectavailablerooms($data){
      $this->db->query('SELECT `rooms`.*, `packages`.* FROM `rooms` INNER JOIN `packages` ON `rooms`.`RoomNo` = `packages`.`RoomNo` WHERE `rooms`.`RoomCount` = :peoplecount AND `packages`.`PackageTypeId` = :package AND `packages`.`Status` = 1');

      $this->db->bind(':peoplecount', $data['peoplecount']);
      $this->db->bind(':package', $data['package']);

      $results = $this->db->resultSet();

      return $results;
    }

    public function selectbookedrooms($data){
      $this->db->query('SELECT `rooms`.`RoomNo` FROM `rooms` INNER JOIN `reservations` ON `rooms`.`RoomNo` = `reservations`.`RoomNo` WHERE reservations.`PeopleCount` = :peoplecount AND ((`reservations`.`Checkin` <= :checkin AND `reservations`.`Checkout` >= :checkin) OR (`reservations`.`Checkin` <= :checkout AND `reservations`.`Checkout` >= :checkout) OR (`reservations`.`Checkin` >= :checkin AND `reservations`.`Checkout` <= :checkout)) AND `reservations`.`Status` = "Booked" GROUP BY `rooms`.`RoomNo`');

      $this->db->bind(':peoplecount', $data['peoplecount']);
      $this->db->bind(':checkin', $data['checkin']);
      $this->db->bind(':checkout', $data['checkout']);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getPackageId($roomno, $packagetypeid){
      $this->db->query('SELECT `PackageId` FROM `packages` WHERE `RoomNo` = :roomno AND `PackageTypeId` = :packagetypeid AND Status = 1');

      $this->db->bind(':roomno', $roomno);
      $this->db->bind(':packagetypeid', $packagetypeid);

      $results = $this->db->single();

      return $results;
    }

    public function addReservations($data){
      $this->db->query('INSERT INTO `reservations` (`CusName`, `CusId`, `CusMobile`, `PackageId`, `PeopleCount`, `Checkin`, `Checkout`,
      `SpecialNotes`, `Status`, `RoomNo`, `Date`, `Time` ) VALUES (:cname, :cid, :cnum, :packageid, :peoplecount, :checkin, :checkout, :snotes, :status, :roomno, :date, :time)');

      $date = date("Y/m/d");
      $time = date("H:i:sa");

      $this->db->bind(':cname', $data['cname']);
      $this->db->bind(':cid', $data['cid']);
      $this->db->bind(':cnum', $data['cnum']);
      $this->db->bind(':packageid', $data['packageid']);
      $this->db->bind(':peoplecount', $data['peoplecount']);
      $this->db->bind(':checkin', $data['checkin']);
      $this->db->bind(':checkout', $data['checkout']);
      $this->db->bind(':snotes', $data['snotes']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':roomno', $data['roomno']);
      $this->db->bind(':date', $date);
      $this->db->bind(':time', $time);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function getResNo(){
      $this->db->query('SELECT ResNo FROM reservations ORDER BY ResNo DESC LIMIT 1');
      
      $result = $this->db->single();

      return $result;
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

    public function viewavailablefooditems(){

      $this->db->query('SELECT * FROM fooditems WHERE status="1" GROUP BY itemName');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getReservationById($resno){
      $this->db->query('SELECT reservations.*, packagetypes.* FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE reservations.`ResNo` = :resno');

      $this->db->bind(':resno', $resno);

      $result = $this->db->single();

      return $result;
    }

    public function updateReservation($data){
      $this->db->query('UPDATE reservations SET `CusName` = :cusName, `CusId` = :cusId, `CusMobile` = :cusMobile, `SpecialNotes` = :snotes WHERE `ResNo` = :resno');

      $this->db->bind(':cusName', $data['cusName']);
      $this->db->bind(':cusId', $data['cusId']);
      $this->db->bind(':cusMobile', $data['cusMobile']);
      $this->db->bind(':snotes', $data['snotes']);
      $this->db->bind(':resno', $data['resno']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function addRoomOrder($resno, $roomno, $date, $time, $status){
      $this->db->query('INSERT INTO `roomorders` (`ResNo`, `Date`, `Time`, `Status`, `RoomNo`,`PlacedBy`) VALUES (:resno, :date, :time, :status, :roomno, :placedby)');

      $this->db->bind(':resno',$resno);
      $this->db->bind(':date', $date);
      $this->db->bind(':time', $time);
      $this->db->bind(':status', $status);
      $this->db->bind(':roomno', $roomno);
      $this->db->bind(':placedby', $_SESSION['UserName']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function selectRoomOrderNo($date, $time){

      $this->db->query('SELECT RoomOrderNo FROM roomorders WHERE date=:date AND time=:time');

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

    public function addRoomOrderItem($foodid, $portioni, $quantityi, $roomorderno){
      $this->db->query('INSERT INTO `roomorderitems` (`fooditemid`, `PortionType`, `Quantity`, `RoomOrderNo`) VALUES (:itemid, :portion, :quantity, :roomorderno)');

      $this->db->bind(':itemid', $foodid);
      $this->db->bind(':portion', $portioni);
      $this->db->bind(':quantity', $quantityi);
      $this->db->bind(':roomorderno', $roomorderno);

      $this->db->execute();
    }

    public function getKotDetailsByResId($resno){
      $this->db->query('SELECT * FROM roomorders WHERE `ResNo` = :resno');

      $this->db->bind(':resno', $resno);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getOrderItemsDetails($roomorderno){
      $this->db->query('SELECT `roomorderitems`.*, `fooditems`.* FROM roomorderitems INNER JOIN fooditems ON `roomorderitems`.`fooditemId` = `fooditems`.`fooditemId` WHERE `roomorderitems`.`RoomOrderNo` = :roomorderno');

      $this->db->bind(':roomorderno', $roomorderno);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getBillDetails($resno){
      $this->db->query('SELECT `reservations`.*, `packages`.*, `packagetypes`.`PackageType` FROM reservations INNER JOIN packages ON `reservations`.`PackageId` = `packages`.`PackageId` INNER JOIN packagetypes ON `packages`.`PackageTypeId` = `packagetypes`.`PackageTypeId` WHERE `reservations`.`ResNo` = :resno');

      $this->db->bind(':resno', $resno);

      $result = $this->db->single();

      return $result;
      
    }

    public function generateBill($data){
      $this->db->query('INSERT INTO roombills (`ResNo`,`TotalPrice`,`Amount`,`Discount`,`DiscountedPrice`,`Balance`,`Date`,`Time`) VALUES (:resno, :tprice, :amount, :discount, :dtprice, :balance, :date, :time)');

      $this->db->bind(':resno', $data['resno']);
      $this->db->bind(':tprice', $data['tprice']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':discount', $data['discount']);
      $this->db->bind(':dtprice', $data['dtprice']);
      $this->db->bind(':balance', $data['balance']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':time', $data['time']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function completeReservation($data){
      $this->db->query('UPDATE reservations SET Status="Completed" WHERE ResNo = :resno');

      $this->db->bind(':resno', $data['resno']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function getOrderItemDetials($roomorderitemno){
      $this->db->query('SELECT roomorderitems.*, fooditems.* FROM roomorderitems INNER JOIN fooditems ON roomorderitems.`fooditemId` = fooditems.`fooditemId` WHERE `RoomOrderItemNo` = :roomorderitemno');

      $this->db->bind(':roomorderitemno', $roomorderitemno);

      $result = $this->db->single();

      return $result;
    }

    public function updateOrderItem($data){
      $this->db->query('UPDATE roomorderitems SET `PortionType` = :ptype, `Quantity` = :quantity WHERE `RoomOrderItemNo` = :roomorderitemno');

      $this->db->bind(':ptype', $data['ptype']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':roomorderitemno', $data['roomorderitemno']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }

    }

    public function CancelReservation($resno){
      $this->db->query('UPDATE reservations SET Status = "Cancelled" WHERE ResNo = :resno');

      $this->db->bind(':resno', $reso);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function getCompleteResOrders(){
      $this->db->query('SELECT roombills.*, reservations.`CusName`, reservations.`CusMobile` FROM roombills INNER JOIN reservations ON reservations.`ResNo` = roombills.`ResNo` WHERE reservations.`Status`="Completed"');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewBill($billno){
      $this->db->query('SELECT roombills.*, `reservations`.*, `packages`.*, `packagetypes`.`PackageType` FROM reservations INNER JOIN packages ON `reservations`.`PackageId` = `packages`.`PackageId` INNER JOIN packagetypes ON `packages`.`PackageTypeId` = `packagetypes`.`PackageTypeId`INNER JOIN roombills ON roombills.`ResNo` = reservations.`ResNo` WHERE roombills.`RoomBillNo` = :billno');

      $this->db->bind(':billno', $billno);

      $results = $this->db->single();

      return $results;
    }

    public function deleteRoomOrderItems($orderno){
      $this->db->query('DELETE FROM roomorderitems WHERE RoomOrderNo = :roomorderno');

      $this->db->bind(':roomorderno', $orderno);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function deleteRoomOrder($orderno){
      $this->db->query('DELETE FROM roomorders WHERE RoomOrderNo = :roomorderno');

      $this->db->bind(':roomorderno', $orderno);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function deleteOrderItem($itemno){
      $this->db->query('DELETE FROM roomorderitems WHERE RoomOrderItemNo = :itemno');
      $this->db->bind(':itemno', $itemno);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }
  }