<?php
  Class Bars extends Controller{
    public function __construct(){
      $this->barModel = $this->model('Bar');
    }

    public function addbaritem(){

        $data = [
          'itemName' => '',
          'category' => '',
          'volume' => '',
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
            'volume' => trim($_POST['volume']),
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
  
            if($this->barModel->addbaritems($data)){
              header('location: ' . URLROOT . '/bars/addbaritem');
            }else{
              die('Something Went Wrong!');
            }
          }
  
        }else{
          $data = [
            'itemName' => '',
            'category' => '',
            'volume' => '',
            'status' => '',
            'price' => '',
            'itemNameError'=>'',
            'priceError' => ''
          ];
        }
        $this->view('bars/addbaritem', $data);
      }

      public function managebaritems(){
        $baritems = $this->barModel->viewbaritems();
        $snackitems = $this->barModel->viewsnackitems();

          $data = [
            'baritems' => $baritems,
            'snackitems' => $snackitems
          ];

        $this->view('bars/managebaritems', $data);

      }

      public function placeorder(){
        $this->view('bars/placeorder');
      }

      public function placebot(){
        $this->view('bars/placebot');
      }

      public function updateorder(){
        $this->view('bars/updateorder');
      }

      public function updatebot(){
        $this->view('bars/updatebot');
      }

      public function updatebaritem(){
        $this->view('bars/updatebaritem');
      }

      public function updatesnackitem(){
        $this->view('bars/updatesnackitem');
      }

      public function settings(){
        $this->view('bars/settings');
      }

      public function barbill(){
        $this->view('bars/barbill');
      }
    }
