<?php
  class User{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function register($data){
      //prepared statement
      $this->db->query('INSERT INTO users (FirstName, LastName, Email, NIC, Mobile, FixedLine, DOB, Gender, UserName, UserTypeID, Password)
       VALUES (:FirstName, :LastName, :Email, :NIC, :Mobile, :FixedLine, :DOB, :Gender, :UserName, :UserTypeID, :Password)');

       //bind values
       $this->db->bind(':FirstName', $data['fname']);
       $this->db->bind(':LastName', $data['lname']);
       $this->db->bind(':Email', $data['email']);
       $this->db->bind(':NIC', $data['nic']);
       $this->db->bind(':Mobile', $data['mobilenum']);
       $this->db->bind(':FixedLine', $data['fixednum']);
       $this->db->bind(':DOB', $data['dob']);
       $this->db->bind(':Gender', $data['gender']);
       $this->db->bind(':UserName', $data['uname']);
       $this->db->bind(':UserTypeID', $data['utypeid']);
       $this->db->bind(':Password', $data['psw']);

       //execute function
       if($this->db->execute()){
         return true;
       }else{
         return false;
       }
       
    }

    public function login($data){
      $this->db->query('SELECT * FROM users WHERE UserName = :UserName');

      //bind values
      $this->db->bind(':UserName', $data['uname']);

      $row = $this->db->single();

      $hasedPassword = $row->Password;

      if(password_verify($data['psw'], $hasedPassword)){
        return $row;
      }else{
        return false;
      }

    }

    public function findUserByEmail($email){
      //prepared statement
      $this->db->query('SELECT * FROM users WHERE email= :email');

      //email parameter will bind with the email variable
      $this->db->bind(':email', $email);

      //check email is alredy avaialble
      if($this->db->rowCount() > 0){
        return true;
      }else{
        return false;
      }
    }

    public function findUserName($uname){
      $this->db->query('SELECT * FROM users WHERE UserName= :uname');

      $this->db->bind(':uname', $uname);

      if($this->db->rowCount() > 0){
        return true;
      }else{
        return false;
      }
    }

    public function viewissues(){
      $this->db->query('SELECT * FROM issues ORDER BY issuesId DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getReservations(){
      
      $this->db->query('SELECT * FROM reservations WHERE Status = "Booked" ORDER BY ResNo DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getCustomReservations($data){
      $this->db->query('SELECT * FROM reservations WHERE Status = "Booked" AND `ResNo` = :ResNo OR `RoomNo` = :RoomNo OR `CusMobile` = :mobile OR `CusName` LIKE "%":search"%"');

      $this->db->bind(':search', $data['search']);
      $this->db->bind(':ResNo', $data['search']);
      $this->db->bind(':RoomNo', $data['search']);
      $this->db->bind(':mobile', $data['search']);

      $results = $this->db->resultSet();

      return $results;

    }

    public function getRoomsBooked(){
      $this->db->query('SELECT COUNT(ResNo) AS NoOfCounts FROM reservations WHERE Status = "Booked" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;

    }

    public function getResOrderspalced(){
      $this->db->query('SELECT COUNT(RestaurantOrderNo) AS NoOfCounts FROM restaurantorders WHERE Status = "Completed" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function getBarOrderspalced(){
      $this->db->query('SELECT COUNT(BarOrderNo) AS NoOfCounts FROM barorders WHERE Status = "Completed" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function getIssuesComplained(){
      $this->db->query('SELECT COUNT(issuesId) AS NoOfCounts FROM issues WHERE Status != "Canceled" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function getRoomsCanceled(){
      $this->db->query('SELECT COUNT(ResNo) AS NoOfCounts FROM reservations WHERE Status = "Canceled" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function getResCanceled(){
      $this->db->query('SELECT COUNT(RestaurantOrderNo) AS NoOfCounts FROM restaurantorders WHERE Status = "Canceled" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function getBarCanceled(){
      $this->db->query('SELECT COUNT(BarOrderNo) AS NoOfCounts FROM barorders WHERE Status = "Canceled" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function getIssuesSolved(){
      $this->db->query('SELECT COUNT(issuesId) AS NoOfCounts FROM issues WHERE Status = "Solved" AND YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }
    
    public function earningsFromRooms(){
      $this->db->query('SELECT SUM(`DiscountedPrice`) AS Earnings FROM roombills WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function earningsFromRestaurants(){
      $this->db->query('SELECT SUM(`DiscountedPrice`) AS Earnings FROM restaurantbills WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    public function earningsFromBars(){
      $this->db->query('SELECT SUM(`DiscountedPrice`) AS Earnings FROM barbills WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE())');

      $result = $this->db->single();

      return $result;
    }

    //cashier section

    public function viewrestaurantorderdetails(){

      $this->db->query('SELECT * FROM restaurantorders WHERE `Status` != "Completed" ORDER BY RestaurantOrderNo DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    //barman section

    public function viewbarorderdetails(){

      $this->db->query('SELECT * FROM barorders WHERE `Status` != "Completed" ORDER BY BarOrderNo DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getBarOrders($data){
      $this->db->query('SELECT * FROM barorders WHERE `Status`!="Completed" AND (`BarOrderNo` = :BarOrderNo OR `TableNo` = :TableNo)');

      $this->db->bind(':BarOrderNo', $data['search']);
      $this->db->bind(':TableNo', $data['search']);

      $results = $this->db->resultSet();

      return $results;

    }

    public function getRoomsBookedToday(){
      $this->db->query('SELECT COUNT(`ResNo`) AS NoofCounts FROM reservations WHERE `Date` = :date');

      $date = date("Y/m/d");
      $this->db->bind(':date', $date);

      $result = $this->db->single();

      return $result;
    }

    public function getResPlacedToday(){
      $this->db->query('SELECT COUNT(`RestaurantOrderNo`) AS NoofCounts FROM restaurantorders WHERE `Date` = :date');

      $date = date("Y/m/d");
      $this->db->bind(':date', $date);

      $result = $this->db->single();

      return $result;
    }

    public function getBarPlacedToday(){
      $this->db->query('SELECT COUNT(`BarOrderNo`) AS NoofCounts FROM barorders WHERE `Date` = :date');

      $date = date("Y/m/d");
      $this->db->bind(':date', $date);

      $result = $this->db->single();

      return $result;
    }

    public function getRoomsEarningsToday(){
      $this->db->query('SELECT SUM(`DiscountedPrice`) AS Total FROM roombills WHERE `Date` = :date');

      $date = date("Y/m/d");
      $this->db->bind(':date', $date);

      $result = $this->db->single();

      return $result;
    }

    public function getResEarningsToday(){
      $this->db->query('SELECT SUM(`DiscountedPrice`) AS Total FROM restaurantbills WHERE `Date` = :date');

      $date = date("Y/m/d");
      $this->db->bind(':date', $date);

      $result = $this->db->single();

      return $result;
    }

    public function getBarEarningsToday(){
      $this->db->query('SELECT SUM(`DiscountedPrice`) AS Total FROM barbills WHERE `Date` = :date');

      $date = date("Y/m/d");
      $this->db->bind(':date', $date);

      $result = $this->db->single();

      return $result;
    }

    public function popularRooms(){
      $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS RoomCount FROM reservations WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(`Date`) = MONTH(CURRENT_DATE()) GROUP BY `RoomNo`');

      $result = $this->db->resultSet();

      return $result;
    }

    public function topfivefooditems(){
      $this->db->query('SELECT restaurantorderitems.`fooditemId`, fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoofCounts FROM restaurantorderitems INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` INNER JOIN fooditems ON `restaurantorderitems`.`fooditemid` = `fooditems`.`fooditemId` WHERE YEAR(restaurantorders.`Date`) = YEAR(CURRENT_DATE()) AND MONTH(restaurantorders.`Date`) = MONTH(CURRENT_DATE()) GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoofCounts DESC LIMIT 5');

      $result = $this->db->resultSet();

      return $result;
    }

    public function topfivebaritems(){
      $this->db->query('SELECT barorderitems.`baritemId`, baritems.`itemName`, COUNT(barorderitems.`baritemId`) AS NoofCounts FROM barorderitems INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` INNER JOIN baritems ON barorderitems.`barItemId` = baritems.`barItemId` WHERE YEAR(barorders.`Date`) = YEAR(CURRENT_DATE()) AND MONTH(barorders.`Date`) = MONTH(CURRENT_DATE()) GROUP BY barorderitems.`baritemId` ORDER BY NoofCounts DESC LIMIT 5');

      $result = $this->db->resultSet();

      return $result;
    }


    public function getRestaurantOrders($data){
      $this->db->query('SELECT * FROM restaurantorders WHERE `Status` != "Completed" AND `RestaurantOrderNo` = :RestaurantOrderNo OR `TableNo` = :TableNo');

      $this->db->bind(':RestaurantOrderNo', $data['search']);
      $this->db->bind(':TableNo', $data['search']);

      $results = $this->db->resultSet();

      return $results;

    }

    public function getCustomIssues($data){
      $this->db->query('SELECT * FROM issues WHERE `issuesId` = :issueid OR `CusEmail` = :email OR `ComplainType` = :ctype OR `CusName` LIKE "%":search"%"');

      $this->db->bind(':issueid', $data['search']);
      $this->db->bind(':email', $data['search']);
      $this->db->bind(':ctype', $data['search']);
      $this->db->bind(':search', $data['search']);

      $results = $this->db->resultSet();

      return $results;
    }
  }