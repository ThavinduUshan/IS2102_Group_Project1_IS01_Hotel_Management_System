<?php
  Class Kitchens extends Controller{
    public function __construct(){
      $this->kitchenModel = $this->model('Kitchen');
    }

    public function headchefroom(){
      $this->view('kitchens/headchefroom');
    }

    public function headchefpub(){
      $this->view('kitchens/headchefpub');
    }

    public function headchefmenu(){
      $this->view('kitchens/headchefmenu');
    }

    public function menuavailability(){
      $this->view('kitchens/menuavailability');
    }

    public function addsnackitem(){

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

          if($this->kitchenModel->addfooditems($data)){
            header('location: ' . URLROOT . '/kitchens/addsnackitem');
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
      $this->view('kitchens/addsnackitem', $data);
    }

    public function managefooditems(){

      $fooditems = $this->kitchenModel->viewfooditems();

      $data = [
        'fooditems' => $fooditems
      ];

      $this->view('kitchens/managefooditems', $data);
    }

    public function updateorderstatus(){
      $this->view('kitchens/updateorderstatus');
    }

    public function settings(){
      $this->view('kitchens/settings');
    }
  }