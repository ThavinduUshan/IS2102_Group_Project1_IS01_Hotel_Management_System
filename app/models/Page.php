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

    public function selectavailablerooms($data){
      $this->db->query('SELECT `rooms`.*, packages.* FROM `rooms` INNER JOIN `packages` ON `packages`.`RoomNo` = `rooms`.`RoomNo` AND `packages`.`PackageId` = :package LEFT JOIN `reservations` ON `rooms`.`RoomNo` = `reservations`.`RoomNo` WHERE (`rooms`.`RoomCount` = :peoplecount) AND (((:checkin AND :checkout < `reservations`.`Checkin`) OR (:checkin AND :checkout > `reservations`.`Checkout`)) OR `rooms`.`Status` = 1)  GROUP BY `rooms`.`RoomNo`');

      $this->db->bind(':peoplecount', $data['peoplecount']);
      $this->db->bind(':checkin', $data['checkin']);
      $this->db->bind(':checkout', $data['checkout']);
      $this->db->bind(':package', $data['package']);

      $results = $this->db->resultSet();

      return $results;
    }

  }