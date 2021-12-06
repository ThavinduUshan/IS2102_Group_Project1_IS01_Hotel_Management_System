<?php
  Class Pages extends Controller{
    public function __construct(){
      $this->pageModel = $this->model('Page');
      
    }

    public function index(){
      $this->view('pages/index');
    }

    public function about(){
      $this->view('pages/about');
    }

    public function contact(){
      $this->view('pages/contact');
    }

    public function facilities(){
      $this->view('pages/facilities');
    }

    public function gallery(){
      $this->view('pages/gallery');
    }

    public function issues(){

      $data = [
        'cusName' => '',
        'cusEmail' => '',
        'subject' => '',
        'description' => '',
        'status' => '',
        'cusNameError' => '',
        'cusEmailError' => '',
        'subjectError' => '',
        'descriptionError' => ''

      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'cusName' =>trim($_POST['cusName']),
          'cusEmail' => trim($_POST['cusEmail']),
          'subject' => trim($_POST['subject']),
          'description' => trim($_POST['description']),
          'status' => trim($_POST['status']),
          'cusNameError' => '',
          'cusEmailError' => '',
          'subjectError' => '',
          'descriptionError' => ''
  
        ];

        //validating the inputs

        if(empty($data['cusName'])){
          $data['cusNameError'] = 'Please Enter the Name';
        }

        if(empty($data['cusEmail'])){
          $data['cusEmailError'] = 'Please Enter the Email';
        }

        if(empty($data['subject'])){
          $data['subjectError'] = 'Please Enter a Subject';
        }

        if(empty($data['description'])){
          $data['descriptionError'] = 'Please Enter a Description';
        }

        //making sure all errors are empty

        if(empty($data['cusNameError']) && empty($data['cusEmailError']) && empty($data['subjectError']) && empty($data['descriptionError'])){
          
          if($this->pageModel->addIssues($data)){
            header('location: ' . URLROOT . '/pages/issues');
          }else{
            die('Something Went Wrong!');
          }
        }
      }else{
        $data = [
          'cusName' => '',
          'cusEmail' => '',
          'subject' => '',
          'description' => '',
          'status' => '',
          'cusNameError' => '',
          'cusEmailError' => '',
          'subjectError' => '',
          'descriptionError' => ''
  
        ];
      }

      $this->view('pages/issues', $data);
    }

    public function selectdate(){

      $data = [
        'check-in' => '',
        'check-out' => '',
        'people' => '',
        'checkinError' => '',
        'dateError' => ''
      ];
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'check-in' => trim($_POST['check-in']),
          'check-out' => trim($_POST['check-out']),
          'people' => trim($_POST['people']),
          'checkinError' => '',
          'dateError' => ''
        ];
        $currentDate = new DateTime();
        $checkinDate = new DateTime($data['check-in']);
        $checkoutDate =  new DateTime($data['check-out']);
        

        if($currentDate > $checkinDate){
          $data['checkinError'] = 'Previous dates cant be selected';
        }

        if($checkinDate> $checkoutDate){
          $data['dateError'] = 'Checkout must be greater than checkin';
        }

        if(empty($data['dateError']) && empty($data['checkinError'])){
          $this->view('pages/roomselect', $data);
        }
      }
      else{

        $data = [
          'check-in' => '',
          'check-out' => '',
          'people' => '',
          'checkinError' => '',
          'dateError' => ''
        ];
      }
      $this->view('pages/selectdate', $data);
    }

    public function roomselect(){
      $this->view('pages/roomselect');
    }

    public function placereservation(){
      $this->view('pages/placereservation');
    }
  }