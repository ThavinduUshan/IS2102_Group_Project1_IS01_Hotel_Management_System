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

      $fooditems = $this->restaurantModel->viewavailablefooditems();

      $data = [
        'fooditems' => $fooditems,
        'tablenoError' => '',
        'tablenoError2' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $itemName = $_POST['itemName'];
        $portion = $_POST['portion'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $tableno = $_POST['tableno'];
        $date = date("Y/m/d");
        $time = date("H:i:sa");

        if(empty($tableno)){
          $data['tablenoError2'] = 'not recognizing';
        }

        if(empty($data['tablenoError2'])){
          if($this->restaurantModel->addrestaurantorder($tableno,$date,$time,$status)){
            $restaurantorders = $this->restaurantModel->selectrestaurantorderno($date, $time);
            $restaurantorderno = $restaurantorders->RestaurantOrderNo;
            if($restaurantorderno){
              for($i=0;$i<count($itemName);$i++){
                $itemNamei = $itemName[$i];
                $portioni = $portion[$i];
                $quantityi = $quantity[$i];
                $temp = $this->restaurantModel->selectfooditemid($itemNamei, $portioni);
                $foodid = $temp->fooditemId;
                $this->restaurantModel->addrestaurantoderitem($foodid, $portioni, $quantityi, $restaurantorderno);
              }
            }else{
              die('Something went wrong');
            }
          }
          else{
            $data['tablenoError'] = 'Table Number is Empty';
          }

        }
      }
      else{
        $data = [
          'fooditems' => $fooditems,
          'tablenoError' => '',
          'tablenoError2' => ''
        ];
      }

      $this->view('restaurants/placekot', $data);
    }

    public function managefooditems(){

      $fooditems = $this->restaurantModel->viewfooditems();

      $data = [
        'fooditems' => $fooditems
      ];

      $this->view('restaurants/managefooditems', $data);
    }

    public function updatefooditem(){
        $fooditemId = $_GET['fooditemId'];
        $fooditems = $this->restaurantModel->viewfooditem($fooditemId);

        $data = [
          'fooditems' => $fooditems,
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

            if($this->restaurantModel->updatefooditems($data,$fooditemId)){
              header('location: ' . URLROOT . '/restaurants/managefooditems');
            }else{
              die('Something Went Wrong!');
            }
          }
  
        }else{
          $data = [
            'fooditems' => $fooditems,
            'itemName' => '',
            'category' => '',
            'portion' => '',
            'status' => '',
            'price' => '',
            'itemNameError'=>'',
            'priceError' => ''
          ];
        }
      $this->view('restaurants/updatefooditem', $data);
    }

    public function updatekot(){
      $fooditems = $this->restaurantModel->viewavailablefooditems();
      $orderno = $_GET['orderno'];
      $fooditemnames= $this->restaurantModel->selectrestaurantorderitems($orderno);
  
      
      $data = [
        'fooditemnames' => $fooditemnames,
        'tableno' => '',
        'reataurantorderno' => '',
        'fooditems' => $fooditems,
        'tablenoError' => '',
        'tablenoError2' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $restaurantorderno = $_POST['restaurantorderno'];
        $tableno = $_POST['tableno'];
        $itemName = $_POST['itemName'];
        $portion = $_POST['portion'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $date = date("Y/m/d");
        $time = date("H:i:sa");

        if(empty($tableno)){
          $data['tablenoError2'] = 'not recognizing';
        }

        if(empty($data['tablenoError2'])){
            if($restaurantorderno){
              for($i=0;$i<count($itemName);$i++){
                $itemNamei = $itemName[$i];
                $portioni = $portion[$i];
                $quantityi = $quantity[$i];
                $temp = $this->restaurantModel->selectfooditemid($itemNamei, $portioni);
                $foodid = $temp->fooditemId;
                $this->restaurantModel->addrestaurantoderitem($foodid, $portioni, $quantityi, $restaurantorderno);
              }
              header('location: ' . URLROOT . '/restaurants/updatekot?orderno='. $restaurantorderno . '&tableno='.$tableno);
            }else{
              die('Something went wrong');
            }
          }
          else{
            $data['tablenoError'] = 'Table Number is Empty';
          }
      }
      else{
        $data = [
          'fooditemnames' => $fooditemnames,
          'tableno' => '',
          'reataurantorderno' => '',
          'fooditems' => $fooditems,
          'tablenoError' => '',
          'tablenoError2' => ''
        ];
      }

      $this->view('restaurants/updatekot', $data);
    }

    public function settings(){
      $this->view('restaurants/settings');
    }

    public function restaurantbill(){

      $orderno = $_GET['orderno'];
      $fooditemnames= $this->restaurantModel->selectrestaurantorderitems($orderno);

      $data = [
        'fooditemnames' => $fooditemnames
      ];

      $this->view('restaurants/restaurantbill', $data);
    }
  }

