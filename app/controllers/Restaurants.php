<?php
  Class Restaurants extends Controller{
    public function __construct(){
      $this->restaurantModel = $this->model('Restaurant');
      
    }

    public function addfooditem(){

      $data = [
        'itemName' => '',
        'category' => '',
        'portion' => '',
        'status' => '',
        'price' => '',
        'itemNameError'=>'',
        'priceError' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'itemName' => trim($_POST['itemName']),
          'category' => trim($_POST['category']),
          'portion' => trim($_POST['portion']),
          'status' => trim($_POST['status']),
          'price' => trim($_POST['price']),
          'itemNameError'=>'',
          'priceError' => ''
        ];

        //validating the inputs

        if(empty($data['itemName'])){
          $data['itemNameError'] = 'Please Enter the Name';
        }

        if(empty($data['price'])){
          $data['priceError'] = 'Please Enter the Price';
        }

        //making sure all the errors are empty
        if(empty($data['itemNameError']) && empty($data['priceError'])){

          if($this->restaurantModel->addfooditems($data)){
            header('location: ' . URLROOT . '/restaurants/addfooditem');
          }else{
            die('Something Went Wrong!');
          }
        }

      }else{
        $data = [
          'itemName' => '',
          'category' => '',
          'portion' => '',
          'status' => '',
          'price' => '',
          'itemNameError'=>'',
          'priceError' => ''
        ];
      }
      $this->view('restaurants/addfooditem', $data);
    }

    public function placekot(){
      $this->view('restaurants/placekot');
    }

    public function managefooditems(){

      $fooditems = $this->restaurantModel->viewfooditems();

      $data = [
        'fooditems' => $fooditems
      ];

      $this->view('restaurants/managefooditems', $data);
    }

    public function updatefooditem(){
      $this->view('restaurants/updatefooditem');
    }
    public function updatekot(){
      $this->view('restaurants/updatekot');
    }

    public function settings(){
      $this->view('restaurants/settings');
    }

    public function restaurantbill(){
      $this->view('restaurants/restaurantbill');
    }
  }

