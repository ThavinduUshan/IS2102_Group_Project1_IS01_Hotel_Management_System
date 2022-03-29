<?php
  class Page{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function  addIssues($data,$date,$time){

      //prepared statement
      $this->db->query('INSERT INTO issues (cusName, cusEmail, subject, ComplainType, description, status, Date, Time)
      VALUES (:cusName, :cusEmail, :subject, :ctype, :description, :status, :date, :time)');

      $this->db->bind(':cusName', $data['cusName']);
      $this->db->bind(':cusEmail', $data['cusEmail']);
      $this->db->bind(':subject', $data['subject']);
      $this->db->bind(':ctype', $data['ctype']);
      $this->db->bind(':description', $data['description']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':date', $date);
      $this->db->bind(':time', $time);

      //execute function
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
      
    }

    public function selectavailablerooms($data){
      $this->db->query('SELECT `rooms`.*, `packages`.* FROM `rooms` INNER JOIN `packages` ON `rooms`.`RoomNo` = `packages`.`RoomNo` WHERE `rooms`.`RoomCount` = :peoplecount AND `packages`.`PackageTypeId` = :package AND `packages`.`Status` = 1');

      $this->db->bind(':peoplecount', $data['peoplecount']);
      $this->db->bind(':package', $data['package']);

      $results = $this->db->resultSet();

      return $results;
    }

    public function selectbookedrooms($data){
      $this->db->query('SELECT `rooms`.`RoomNo` FROM `rooms` INNER JOIN `reservations` ON `rooms`.`RoomNo` = `reservations`.`RoomNo` WHERE ((`reservations`.`Checkin` <= :checkin AND `reservations`.`Checkout` >= :checkin) OR (`reservations`.`Checkin` <= :checkout AND `reservations`.`Checkout` >= :checkout) OR (`reservations`.`Checkin` >= :checkin AND `reservations`.`Checkout` <= :checkout)) AND `reservations`.`Status` = "Booked" GROUP BY `rooms`.`RoomNo`');

      $this->db->bind(':checkin', $data['checkin']);
      $this->db->bind(':checkout', $data['checkout']);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getPackageId($roomno, $packagetypeid){
      $this->db->query('SELECT `PackageId` FROM `packages` WHERE `RoomNo` = :roomno AND `PackageTypeId` = :packagetypeid AND Status = 1');

      $this->db->bind(':roomno', $roomno);
      $this->db->bind(':packagetypeid', $packagetypeid);

      $results = $this->db->Single();

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
      
      $result = $this->db->Single();

      return $result;
    }
  }