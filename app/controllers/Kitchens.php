<?php
  Class Kitchens extends Controller{
    public function __construct(){
      $this->kitchenModel = $this->model('Kitchen');
    }

    public function headchefroom(){
      $this->view('kitchens/headchefroom');
    }


    public function headchefpub(){
      $snackitems = $this->kitchenModel->viewbarorderdetails();

      $data = [
        'snackitems' => $snackitems
      ];

      $this->view('kitchens/headchefpub', $data);
    }
    public function menuavailability($fooditemId){

      $fooditems = $this->kitchenModel->findItemById($fooditemId);
     
      $data = [
        
        'fooditems' => $fooditems,
        'itemName' => '',
        'status' => '',
       

      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'fooditemId'=>$fooditemId,
          'fooditems' => $fooditems,
          'itemName' => trim($_POST['itemName']),
          'status' => trim($_POST['status']),
         
          
        ];
         
          if($this->kitchenModel->updateAvailability($data)){
            header('location: ' . URLROOT . '/kitchens/managefooditems');
          }
          else{
            die('Something Went Wrong!');
        }
      
      }
          $this->view('kitchens/menuavailability', $data); 
      }
      
      public function delete($fooditemId){

        $fooditems = $this->kitchenModel->findItemById($fooditemId);
 
       $data = [
       'fooditems'=> $fooditems, 
      'itemName' => '',
      'category' => '',
      'portion' => '',
      'status' => '',
      'price' => ''
      
       ];
 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
         if($this->kitchenModel->deleteItem($fooditemId)){
            header('location: ' . URLROOT . '/kitchens/managefooditems');
          }
         else{
         die('Something Went Wrong!');
   }
     }
     $this->view('kitchens/managefooditems', $data);
   }

    // public function menuavailability(){
    //   $this->view('kitchens/menuavailability');
    // }

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


       $this->view('kitchens/Restaurantorderstatus');
   }

    public function settings(){
      $this->view('kitchens/settings');
    }

    public function Restaurantorderstatus(){
      $orderno = $_GET['orderno'];

      $orderitems = $this->kitchenModel->viewrestaurantorderdetails($orderno);

      $data = [

        'orderitems'=>$orderitems,
        'orderno'=>$orderno
        // 'itemName'=>'',
        // 'PortionType'=>'',
        // 'Quantity'=>''
      ];
      //  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //   $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //  }
      

      //var_dump($orderitems);
      $this->view('kitchens/Restaurantorderstatus',$data);
    }

    public function Roomorderstatus(){
      $this->view('kitchens/Roomorderstatus');
    }
  }