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
        }

        $nameValidation = "/^[a-zA-Z0-9]*$/";
        $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

        //userName Validation
        if(empty($data['uname'])){
          $data['unameError'] = 'Please Enter Your UserName';
        }else if(!preg_match($nameValidation,$data['uname'])){
          $data['unameError'] = 'Name can only have letters and Numbers';
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

    }

    public function logout(){
      unset($_SESSION['UserID']);
      unset($_SESSION['UserName']);
      unset($_SESSION['UserTypeID']);
      header('location: '. URLROOT . '/users/login');
    }

    public function admin(){
      $this->view('users/admin');
    }
    public function receptionist(){
      $this->view('users/receptionist');
    }
    public function cashier(){
      $this->view('users/cashier');
    }
    public function headchef(){
      $this->view('users/headchef');
    }
    public function barman(){
      $this->view('users/barman');
    }

    
  }