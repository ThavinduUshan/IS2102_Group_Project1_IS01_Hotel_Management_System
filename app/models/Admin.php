<?php
  class Admin{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function viewissues(){
      $this->db->query('SELECT * FROM issues ORDER BY issuesId DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewusers(){
      $this->db->query('SELECT * FROM users ORDER BY UserID');

      $results = $this->db->resultSet();

      return $results;
    }

    public function viewpackages(){
      $this->db->query('SELECT * FROM packages WHERE `Status` = 1 ORDER BY PackageId');

      $results = $this->db->resultSet();

      return $results;
    }

    public function changePackageStatus($data){
      $this->db->query('UPDATE packages SET Status = 0 WHERE RoomNo = :roomno AND PackageTypeId = :packagetype');

      $this->db->bind(':roomno', $data['roomno']);
      $this->db->bind(':packagetype', $data['packagetype']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function addNewPackage($data){
      $this->db->query('INSERT INTO `packages`  (`PackageTypeId`, `Price`, `RoomNo`, `Status`) VALUES (:packagetype, :price, :roomno, :status)');

      $this->db->bind(':packagetype', $data['packagetype']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':roomno', $data['roomno']);
      $this->db->bind(':status', 1);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function generateReservationReport($data){

      if($data['reporttype'] == '1'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations GROUP BY `PeopleCount` ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations GROUP BY `PeopleCount` ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years GROUP BY `PeopleCount` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years GROUP BY `PeopleCount` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years AND MONTH(`Date`) = :months GROUP BY `PeopleCount` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years AND MONTH(`Date`) = :months GROUP BY `PeopleCount` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations WHERE `Date` = :date GROUP BY `PeopleCount` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `PeopleCount`, COUNT(`PeopleCount`) AS NoOfCounts FROM reservations WHERE `Date` = :date GROUP BY `PeopleCount` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }



      if($data['reporttype'] == '2'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE YEAR(Date) = :years GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE YEAR(Date) = :years GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE YEAR(Date) = :years AND MONTH(`Date`) = :months GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE YEAR(Date) = :years AND MONTH(`Date`) = :months GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE `Date` = :date GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT packagetypes.`PackageType`, COUNT(packagetypes.`PackageType`) AS NoOfCounts FROM reservations INNER JOIN packages ON reservations.`PackageId` = packages.`PackageId` INNER JOIN packagetypes ON packages.`PackageTypeId` = packagetypes.`PackageTypeId` WHERE `Date` = :date GROUP BY packagetypes.`PackageType` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }


      
      if($data['reporttype'] == '3'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations GROUP BY `RoomNo` ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations GROUP BY `RoomNo` ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years GROUP BY `RoomNo` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years GROUP BY `RoomNo` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years AND MONTH(`Date`) = :months GROUP BY `RoomNo` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations WHERE YEAR(Date) = :years AND MONTH(`Date`) = :months GROUP BY `RoomNo` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations WHERE `Date` = :date GROUP BY `RoomNo` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `RoomNo`, COUNT(`RoomNo`) AS NoOfCounts FROM reservations WHERE `Date` = :date GROUP BY `RoomNo` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }

    }

    public function generateRestaurantReport($data){
      if($data['reporttype'] == '1'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`, fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`, fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`, fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` WHERE YEAR(restaurantorders.`Date`) = :years GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`, fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` WHERE YEAR(restaurantorders.`Date`) = :years GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`,fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` WHERE YEAR(restaurantorders.`Date`) = :years AND MONTH(restaurantorders.`Date`) = :months GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`, fooditems.`itemName`,COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` WHERE YEAR(restaurantorders.`Date`) = :years AND MONTH(restaurantorders.`Date`) = :months GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`,fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` WHERE restaurantorders.`Date` = :date GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT restaurantorderitems.`fooditemId`,fooditems.`itemName`, COUNT(restaurantorderitems.`fooditemId`) AS NoOfCounts FROM restaurantorderitems INNER JOIN fooditems ON fooditems.`fooditemId` = restaurantorderitems.`fooditemId` INNER JOIN restaurantorders ON restaurantorders.`RestaurantOrderNo` = restaurantorderitems.`RestaurantOrderNo` WHERE restaurantorders.`Date` = :date GROUP BY restaurantorderitems.`fooditemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }
    }

    public function generateBarReport($data){
      if($data['reporttype'] == '1'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`, baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`, baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`, baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`, baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`,baritems.`itemName`,  COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years AND MONTH(barorders.`Date`) = :months GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`,baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years AND MONTH(barorders.`Date`) = :months GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`,baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` WHERE barorders.`Date` = :date GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barorderitems.`barItemId`,baritems.`itemName`, COUNT(barorderitems.`barItemId`) AS NoOfCounts FROM barorderitems INNER JOIN baritems ON baritems.`barItemId` = barorderitems.`barItemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barorderitems.`BarOrderNo` WHERE barorders.`Date` = :date GROUP BY barorderitems.`barItemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }

      if($data['reporttype'] == '2'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`, fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`, fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`, fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barordersnacks.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`, fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barordersnacks.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`,fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barordersnacks.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years AND MONTH(barorders.`Date`) = :months GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`,fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barordersnacks.`BarOrderNo` WHERE YEAR(barorders.`Date`) = :years AND MONTH(barorders.`Date`) = :months GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`,fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barordersnacks.`BarOrderNo` WHERE barorders.`Date` = :date GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT barordersnacks.`fooditemId`,fooditems.`itemName`, COUNT(barordersnacks.`fooditemId`) AS NoOfCounts FROM barordersnacks INNER JOIN fooditems ON fooditems.`fooditemId` = barordersnacks.`fooditemId` INNER JOIN barorders ON barorders.`BarOrderNo` = barordersnacks.`BarOrderNo` WHERE barorders.`Date` = :date GROUP BY barordersnacks.`fooditemId` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }
    }

    public function generateComplainReport($data){
      if($data['reporttype'] == '1'){
        if($data['sort'] == '0'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `ComplainType`,  COUNT(`ComplainType`) AS NoOfCounts FROM issues  GROUP BY ComplainType ORDER BY NoOfCounts');

            $results = $this->db->resultSet();

            return $results;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `ComplainType`,  COUNT(`ComplainType`) AS NoOfCounts FROM issues  GROUP BY ComplainType ORDER BY NoOfCounts DESC');

            $results = $this->db->resultSet();

            return $results;
          }else{
            return 0;
          }
        }
        if($data['sort'] == '1'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `ComplainType`, COUNT(`ComplainType`) AS NoOfCounts FROM issues WHERE YEAR(`Date`) = :years GROUP BY ComplainType ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `ComplainType`, COUNT(`ComplainType`) AS NoOfCounts FROM issues WHERE YEAR(`Date`) = :years GROUP BY ComplainType ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '2'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `ComplainType`, COUNT(`ComplainType`) AS NoOfCounts FROM issues WHERE YEAR(`Date`) = :years AND MONTH(`Date`) = :months GROUP BY `ComplainType` ORDER BY NoOfCounts');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `ComplainType`, COUNT(`ComplainType`) AS NoOfCounts FROM issues WHERE YEAR(`Date`) = :years AND MONTH(`Date`) = :months GROUP BY `ComplainType` ORDER BY NoOfCounts DESC');

            $this->db->bind(':years', $data['year']);
            $this->db->bind(':months', $data['month']);

            $result = $this->db->resultSet();

            return $result;

          }else{
            return 0;
          }
        }
        if($data['sort'] == '3'){
          if($data['orderby'] == '0'){
            $this->db->query('SELECT DISTINCT `ComplainType`, COUNT(`ComplainType`) AS NoOfCounts FROM issues WHERE `Date` = :date GROUP BY `ComplainType` ORDER BY NoOfCounts');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;

          }else if($data['orderby'] == '1'){
            $this->db->query('SELECT DISTINCT `ComplainType`, COUNT(`ComplainType`) AS NoOfCounts FROM issues WHERE `Date` = :date GROUP BY `ComplainType` ORDER BY NoOfCounts DESC');

            $this->db->bind(':date', $data['day']);

            $result = $this->db->resultSet();

            return $result;
            
          }else{
            return 0;
          }
        }
      }
    }
  }