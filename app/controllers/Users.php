<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      $data=[
        'fname' =>'',
        'lname' =>'',
        'email' =>'',
        'nic' =>'',
        'mobilenum' =>'',
        'fixednum' =>'',
        'dob' =>'',
        'gender' =>'',
        'uname' =>'',
        'utypeid' =>'',
        'psw' =>'',
        'repsw' =>'',
        'fnameError' =>'',
        'lnameError' =>'',
        'emailError' =>'',
        'nicError' =>'',
        'mobilenumError' =>'',
        'fixednumError' =>'',
        'dobError' =>'',
        'unameError' =>'',
        'pswError' =>'',
        'repswError' =>'',
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data=[
          'fname' =>trim($_POST['fname']),
          'lname' =>trim($_POST['lname']),
          'email' =>trim($_POST['email']),
          'nic' =>trim($_POST['nic']),
          'mobilenum' =>trim($_POST['mobilenum']),
          'fixednum' =>trim($_POST['fixednum']),
          'dob' =>trim($_POST['dob']),
          'gender' =>trim($_POST['gender']),
          'uname' =>trim($_POST['uname']),
          'utypeid' =>trim($_POST['utypeid']),
          'psw' =>trim($_POST['psw']),
          'repsw' =>trim($_POST['repsw']),
          'fnameError' =>'',
          'lnameError' =>'',
          'emailError' =>'',
          'nicError' =>'',
          'mobilenumError' =>'',
          'fixednumError' =>'',
          'dobError' =>'',
          'unameError' =>'',
          'pswError' =>'',
          'repswError' =>'',
        ];

        //declaring the user id according to user type
        switch($data['utypeid']){
          case 'Admin':
            $data['utypeid'] = 1;
            break;
          case 'Receptionist':
            $data['utypeid'] = 2;
            break;
          case 'Cashier':
            $data['utypeid'] = 3;
            break;
          case 'Barman':
            $data['utypeid'] = 4;
            break;
          case 'HeadChef':
            $data['utypeid'] = 5;
            break;
          case 'Moderator':
            $data['utypeid'] = 6;
            break;
        }

        $nameValidation = "/^[a-zA-Z0-9]*$/";
        $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

        //userName Validation
        if(empty($data['uname'])){
          $data['unameError'] = 'Please Enter Your UserName';
        }else if(!preg_match($nameValidation,$data['uname'])){
          $data['unameError'] = 'Name can only have letters and Numbers';
        }else{
          //check email is already exists
          if($this->userModel->findUserName($data['uname'])){
            $data['unameError'] = 'Username already taken!';
          }
        }

        //validate email
        if(empty($data['email'])){
          $data['emailError'] = 'Please Enter Your Email Address';
        }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
          $data['emailError'] = 'Email must be in the correct format';
        }else{
          //check email is already exists
          if($this->userModel->findUserbyEmail($data['email'])){
            $data['emailError'] = 'Email is already exists';
          }
        }

        //Password Validation
        if(empty($data['psw'])){
          $data['pswError'] = 'Please Enter the Password';
        }else if(strlen($data['psw'] < 6)){
          $data['pswError'] = 'Password must be atleast 6 Characters';
        }else if(!preg_match($passwordValidation,$data['psw'])){
          $data['pswError'] = 'Password must have one number';
        }

        //Re-Entered Password Validation
        if(empty($data['repsw'])){
          $data['repswError'] = 'Please Re-Enter the Password';
        }else{
          if($data['psw'] != $data['repsw']){
            $data['repswError'] = 'Passwords must be matched';
          }
        }

        //validating first name
        if(empty($data['fname'])){
          $data['fnameError'] = 'Please Enter the First Name';
        }

        //validating nic
        if(empty($data['lname'])){
          $data['lnameError'] = 'Please Enter the Last Name';
        }
        //validating nic
        if(empty($data['nic'])){
          $data['nicError'] = 'Please Enter the NIC';
        }

        //validating mobile number
        if(empty($data['mobilenum'])){
          $data['mobilenumError'] = 'Please Enter the Mobile Number';
        }

        //validating Fixed Line Number
        if(empty($data['fixednum'])){
          $data['fixednumError'] = 'Please Enter the FixedLine Number';
        }

        //validating DOB
        if(empty($data['dob'])){
          $data['dobError'] = 'Please Enter the Date of Birth';
        }

        //make sure all the errors are empty
        if(empty($data['fnameError']) && empty($data['lnameError']) && empty($data['emailError']) &&
        empty($data['nicError']) && empty($data['mobilenumError']) && empty($data['fixednumError']) && empty($data['dobError']) &&
        empty($data['unameError']) && empty($data['pswError']) && empty($data['repswError'])) {

          //password hashing
          $data['psw'] = password_hash($data['psw'], PASSWORD_DEFAULT);

          //register the user from model
          if($this->userModel->register($data)){
            header('location: ' . URLROOT . '/users/admin');
          }else{
            die('Something Went Wrong!');
          }
        }
      }
      $this->view('users/register', $data);
    }

    public function login(){
      $data =[
        'uname' => '',
        'psw' => '',
        'unameError' => '',
        'pswError' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //sanitize post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'uname' => trim($_POST['uname']),
          'psw' => trim($_POST['psw']),
          'unameError' => '',
          'pswError' => ''
        ];

        //validate username
        if(empty($data['uname'])){
          $data['unameError'] = 'Please Enter the User Name';
        }

        //validate password
        if(empty($data['psw'])){
          $data['pswError'] = 'Please Enter the Password';
        }

        //if all errors are empty
        if(empty($data['unameError']) && empty($data['pswError'])){

          $loggedInUser = $this->userModel->login($data);

          if($loggedInUser){
            $this->createUserSession($loggedInUser);
          }else{
            $data['pswError'] = 'Password or User Name Incorrect!';

            $this->view('users/login', $data);
          }
        }

      }else{
        $data =[
          'uname' => '',
          'psw' => '',
          'unameError' => '',
          'pswError' => ''
        ];
      }

      $this->view('users/login', $data);
    }

    public function createUserSession($user){
      session_start();
      $_SESSION['UserID'] = $user->UserID;
      $_SESSION['UserName'] = $user->UserName;
      $_SESSION['UserTypeID'] = $user->UserTypeID;

      if($_SESSION['UserTypeID'] == 1){
        header('location: ' . URLROOT . '/users/admin');
      }

      if($_SESSION['UserTypeID'] == 2){
        header('location: ' . URLROOT . '/users/receptionist');
      }

      if($_SESSION['UserTypeID'] == 3){
        header('location: ' . URLROOT . '/users/cashier');
      }

      if($_SESSION['UserTypeID'] == 4){
        header('location: ' . URLROOT . '/users/barman');
      }

      if($_SESSION['UserTypeID'] == 5){
        header('location: ' . URLROOT . '/users/headchef');
      }

      if($_SESSION['UserTypeID'] == 6){
        header('location: ' . URLROOT . '/users/moderator');
      }

    }

    public function logout(){
      unset($_SESSION['UserID']);
      unset($_SESSION['UserName']);
      unset($_SESSION['UserTypeID']);
      header('location: '. URLROOT . '/users/login');
    }

    public function admin(){

      $roomsbookedtoday = $this->userModel->getRoomsBookedToday();
      $resplacedtoday = $this->userModel ->getResPlacedToday();
      $barplacedtoday = $this->userModel->getBarPlacedToday();
      $roomsearningstoday = $this->userModel->getRoomsEarningsToday();
      $researningstoday = $this->userModel->getResEarningsToday();
      $barearningstoday = $this->userModel->getBarEarningsToday();
      $earningstoday = (int)($roomsearningstoday->Total) + (int)($roomsearningstoday->Total)+ (int)($roomsearningstoday->Total);

      $roomsbooked = $this->userModel->getRoomsBooked();
      $resordersplaced = $this->userModel->getResOrderspalced();
      $barordersplaced = $this->userModel->getBarOrderspalced();
      $issuescomplained =  $this->userModel->getIssuesComplained();
      $reservationscanceled =  $this->userModel->getRoomsCanceled();
      $resorderscanceled =  $this->userModel->getResCanceled();
      $barorderscanceled =  $this->userModel->getBarCanceled();
      $issuessolved =  $this->userModel->getIssuesSolved();
      $earnedbyrooms = $this->userModel->earningsFromRooms();
      $earnedbyres = $this->userModel->earningsFromRestaurants();
      $earnedbybars = $this->userModel->earningsFromBars();

      $popularrooms = $this->userModel->popularRooms();

      $topfivefooditems = $this->userModel->topfivefooditems();
      $topfivebaritems =$this->userModel->topfivebaritems();
 
      $data = [

        'roomsbookedtoday' => $roomsbookedtoday,
        'resplacedtoday' => $resplacedtoday,
        'barplacedtoday' => $barplacedtoday,
        'earningstoday' => $earningstoday,
        'roomsbooked' => $roomsbooked,
        'resordersplaced' => $resordersplaced,
        'barordersplaced' => $barordersplaced,
        'issuescomplained' => $issuescomplained,
        'reservationscanceled' => $reservationscanceled,
        'resorderscanceled' => $resorderscanceled,
        'barorderscanceled' => $barorderscanceled,
        'issuessolved' => $issuessolved,
        'earnedbyrooms' => $earnedbyrooms,
        'earnedbyres' => $earnedbyres,
        'earnedbybars' => $earnedbybars,
        'popularrooms' => $popularrooms,
        'topfivefooditems' => $topfivefooditems,
        'topfivebaritems' => $topfivebaritems
      ];

      $this->view('users/admin', $data);
    }
    public function receptionist(){

      $reservations = $this->userModel->getReservations();

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'reservations' => $reservations,
          'search' => trim($_POST['search']),
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        if(empty($data['search'])){
          $data['searchError'] = 'Search value cant be empty!';
        }

        if(empty($data['searchError'])){
          $results = $this->userModel->getCustomReservations($data);

          if($results){
            $data = [
              'reservations' => $results,
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];
          }else{
            $data = [
              'reservations' => '',
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];

            $data['resultsEmpty'] = 'Sorry! No results Found!';
          }
          
        }

        $this->view('users/receptionist',$data);

      }else{

        $data = [
          'reservations' => $reservations,
          'search' => '',
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        $this->view('users/receptionist',$data);
      }

    }

    public function cashier(){
      $restaurantorderdetails = $this->userModel->viewrestaurantorderdetails();

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'restaurantorderdetails' => $restaurantorderdetails,
          'search' => trim($_POST['search']),
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        if(empty($data['search'])){
          $data['searchError'] = 'Search value cant be empty!';
        }

        if(empty($data['searchError'])){
          $restaurantorderdetails = $this->userModel->getRestaurantOrders($data);

          if($restaurantorderdetails){
            $data = [
              'restaurantorderdetails' => $restaurantorderdetails,
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];
          }else{
            $data = [
              'restaurantorderdetails' => '',
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];

            $data['resultsEmpty'] = 'Sorry! No results Found!';
          }
          
        }

        $this->view('users/cashier', $data);

      }else{

        $data = [
          'restaurantorderdetails' => $restaurantorderdetails,
          'search' => '',
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        $this->view('users/cashier', $data);
      }
    }

    
    public function headchef(){
      $restaurantorders = $this->userModel->viewrestaurantorderdetails();

      $data = [
        'restaurantorders' => $restaurantorders
      ];

      $this->view('users/headchef', $data);
    }

    public function barman(){
      $barorderdetails = $this->userModel->viewbarorderdetails();

      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'barorderdetails' => $barorderdetails,
          'search' => trim($_POST['search']),
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        if(empty($data['search'])){
          $data['searchError'] = 'Search value cant be empty!';
        }

        if(empty($data['searchError'])){
          $barorderdetails = $this->userModel->getBarOrders($data);

          if($barorderdetails){
            $data = [
              'barorderdetails' => $barorderdetails,
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];
          }else{
            $data = [
              'barorderdetails' => '',
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];

            $data['resultsEmpty'] = 'Sorry! No results Found!';
          }
          
        }

        $this->view('users/barman', $data);

      }else{

        $data = [
          'barorderdetails' => $barorderdetails,
          'search' => '',
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        $this->view('users/barman', $data);
      }
    }


    public function moderator(){
      
      $issues = $this->userModel->viewissues();

      $data = [
        'issues' => $issues
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'issues' => $issues,
          'search' => trim($_POST['search']),
          'searchError' => '',
          'resultsEmpty' => ''
        ];

        if(empty($data['search'])){
          $data['searchError'] = 'Search value cant be empty!';
        }

        if(empty($data['searchError'])){
          $results = $this->userModel->getCustomIssues($data);

          if($results){
            $data = [
              'issues' => $results,
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];
          }else{
            $data = [
              'issues' => '',
              'search' => trim($_POST['search']),
              'searchError' => '',
              'resultsEmpty' => '',
            ];

            $data['resultsEmpty'] = 'Sorry! No results Found!';
          }
          
        }

        $this->view('users/moderator',$data);

      }else{
        $data = [
          'issues' => $issues,
          'search' => '',
          'searchError' => '',
          'resultsEmpty' => '',
        ];

        $data['resultsEmpty'] = 'Sorry! No results Found!';
      }

      $this->view('users/moderator', $data);
    }
  }