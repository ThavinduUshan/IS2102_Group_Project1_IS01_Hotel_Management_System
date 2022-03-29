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
        $fooditemId = $_GET['itemid'];
        $fooditems = $this->restaurantModel->viewfooditem($fooditemId);

        $data = [
          'fooditems' => $fooditems,
          'itemName' => '',
          'category' => '',
          'portion' => '',
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
  
            if($this->restaurantModel->updatefooditem($data, $fooditemId)){
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

    public function updateorderfooditem(){
        $orderno = $_GET['orderno'];
        $RestaurantOrderItemNo = $_GET['itemno'];
        $orderitem = $this->restaurantModel->getOrderFoodItemDetials($RestaurantOrderItemNo);
  
        $data = [
          'orderitem' => $orderitem
        ];
  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'orderno' => trim($_GET['orderno']),
            'RestaurantOrderItemNo' => trim($_GET['itemno']),
            'ptype' => trim($_POST['ptype']),
            'quantity' => trim($_POST['quantity'])
          ];
  
          $orderno = $_GET['orderno'];
  
          if($this->restaurantModel->updateOrderItem($data)){
            header('location: '. URLROOT . '/users/cashier?status=orderitemupdated');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }

      $this->view('restaurants/updateorderfooditem', $data);
    }

    public function settings(){
      $this->view('restaurants/settings');
    }

    public function restaurantbill(){

      $orderno = $_GET['orderno'];
      $fooditemnames= $this->restaurantModel->selectrestaurantorderitems($orderno);

      $data = [
        'fooditemnames' => $fooditemnames,
        'discount' => '',
        'disprice' => '',
        'amount' => '',
        'balance' => '',
        'tprice' => '',
        'status' => '',
        'discountError'=>'',
        'amountError' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'fooditemnames' => $fooditemnames,
          'discount' => trim($_POST['discount']),
          'disprice' => trim($_POST['disprice']),
          'amount' => trim($_POST['amount']),
          'balance' => trim($_POST['balance']),
          'tprice' => trim($_POST['tprice']),
          'status' => trim($_POST['status']),
          'date' => date("Y/m/d"),
          'time' => date("H:i:sa"),
          'discountError'=>'',
          'amountError' => ''
        ];
        //validating the inputs

        if(!($data['discount'] >= 0) ){
          $data['discountError'] = 'Discount cant be a negative value';
        }

        if($data['amount'] < $data['disprice']){
          $data['amountError'] = 'Amount must be greater than discounted value';
        }

        //making sure all the errors are empty
        if(empty($data['discountError']) && empty($data['amountError'])){

          if($this->restaurantModel->issuerestaurantbill($data, $orderno)){
            if($this->restaurantModel->updaterestaurantorderstatus($data, $orderno)){
              header('location: ' . URLROOT . '/users/cashier');
            }else{
              die('Something Went Wrong!');
            }
           
          }else{
            die('Something Went Wrong!');
          }
        }

      }

      $this->view('restaurants/restaurantbill', $data);
    }

    public function completedorders(){
      $completedorders=$this->restaurantModel->selectbilldetails();

      $data =[
        'completedorders' => $completedorders
      ];

      $this->view('restaurants/completedorders', $data);
    }

    public function delete(){
      $fooditemId=$_GET['itemid'];
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'itemid' => trim($_GET['itemid'])
        ];


        if($this->restaurantModel->deletefoodItem($data)){
          header('location: '. URLROOT . '/users/managefooditems?delete=item deleted');
          exit();
        }
        else{
          die('Something went Wrong!');
        }
      }

    }

    public function deleteorderitem(){
      $RestaurantOrderItemNo = $_GET['itemno'];
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'RestaurantOrderItemNo' => trim($_GET['itemno'])
        ];


        if($this->restaurantModel->deleteorderfoodItem($data)){
          header('location: '. URLROOT . '/users/cashier?status=itemdeleted');
          exit();
        }
        else{
          die('Something went Wrong!');
        }
      }

    }

    public function cancelorder(){
      $orderno = $_GET['orderno'];

      if($this->restaurantModel->cancelRestaurantOrder($orderno)){
        header('location: '. URLROOT . '/users/cashier?status=ordercanceled');
      }else{
        die('Something went Wrong!');
      }
    }


    
  }

