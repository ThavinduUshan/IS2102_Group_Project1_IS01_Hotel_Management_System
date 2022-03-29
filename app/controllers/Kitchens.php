<?php
  Class Kitchens extends Controller{
    public function __construct(){
      $this->kitchenModel = $this->model('Kitchen');
    }

    


    public function headchefpub(){
      $snackitems = $this->kitchenModel->viewbarorders();

      $data = [
        'snackitems' => $snackitems
      ];

      $this->view('kitchens/headchefpub', $data);
    }
    public function headchefroom(){
      $roomorders = $this->kitchenModel->viewroomorders();

      $data = [
        'roomorders' => $roomorders
      ];

      $this->view('kitchens/headchefroom', $data);
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
        'Status' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'orderitems' => $orderitems,
          'orderno' => trim($_GET['orderno']),
          'Status' => trim($_POST['Status'])
          
        ];
      

      
          if($this->kitchenModel->updateRestaurantOrderStatus($data)) {
            header('location: ' . URLROOT . '/users/headchef');
        }else{
          die('Something Went Wrong!');
        }
      
      }
      else{
        $data = [
          'Status' => '',
          'orderitems'=>$orderitems
        ];

        $this->view('kitchens/Restaurantorderstatus',$data);
      }
      
      
     
      
      //var_dump($orderitems);
      $this->view('kitchens/Restaurantorderstatus',$data);
    }
    
    public function Puborderstatus(){
      $barorderno = $_GET['barorderno'];

      $orderitems = $this->kitchenModel->viewbarorderdetails($barorderno);

        $data = [
          'Status' => ''
        ];
  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'orderitems' => $orderitems,
            'barorderno' => trim($_GET['barorderno']),
            'Status' => trim($_POST['Status'])
            
          ];
              
            if($this->kitchenModel->updateBarOrderStatus($data)) {
              header('location: ' . URLROOT . '/kitchens/headchefpub');
          }else{
            die('Something Went Wrong!');
          }
        
        }
        else{
          $data = [
            'Status' => '',
            'orderitems'=>$orderitems
          ]; 
  
       
        //var_dump($orderitems);
        $this->view('kitchens/Puborderstatus',$data);
      }
    
    }
  

   
      

    public function Roomorderstatus(){
      $roomorderno = $_GET['roomorderno'];

      $orderitems = $this->kitchenModel->viewroomorderdetails($roomorderno);
      $data = [
        'Status' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $roomorderno = $_GET['roomorderno'];

        $data = [
          'orderitems' => $orderitems,
          'roomorderno' => trim($_GET['roomorderno']),
          'Status' => trim($_POST['Status'])
          
        ];
      

      
          if($this->kitchenModel->updateRoomOrderStatus($data)) {
            header('location: ' . URLROOT . '/kitchens/headchefroom');
        }else{
          die('Something Went Wrong!');
        }
      
      }
      else{
        $data = [
          'Status' => '',
          'orderitems'=>$orderitems
        ]; 

     
      //var_dump($orderitems);
      $this->view('kitchens/Roomorderstatus',$data);
    }
  
  }
   
  }