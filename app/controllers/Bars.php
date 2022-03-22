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
        $baritems = $this->barModel->viewavailablebaritems();
        $snackitems = $this->barModel->viewavailablesnackitems();

          $data = [
            'baritems' => $baritems,
            'snackitems' => $snackitems,
            'barquantity' => '',
            'snackquantity' => '',
            'tablenoError' => '',
            'isbaritemfilled' => '',
            'issnackitemfilled' => ''
          ];

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $baritemName = $_POST['baritemName'];
            $snackitemName = $_POST['snackitemName'];
            $barportion = $_POST['barportion'];
            $snackportion = $_POST['snackportion'];
            $barquantity = $_POST['barquantity'];
            $snackquantity = $_POST['snackquantity'];
            $status = $_POST['status'];
            $tableno = $_POST['tableno'];
            $date = date("Y/m/d");
            $time = date("H:i:sa");
            
    
            if(empty($tableno)){
              $data['tablenoError'] = 'Table number cant be empty';
            }

            if($baritemName[0] == "select an option" || $barportion[0] == "select an option" || $barquantity[0] == 0){
              $data['isbaritemfilled'] = 'all bar items must be filled';
            }

            if($snackitemName[0] == "select an option" || $snackportion[0] == "select an option" || $snackquantity[0] == 0){
              $data['issnackitemfilled'] = 'all snack items must be filled';
            }

            if(empty($data['isbaritemfilled']) && empty($data['issnackitemfilled'])){
              if($this->barModel->addbarorder($tableno,$date,$time,$status)){
                $barorders = $this->barModel->selectbarorderno($date, $time);
                $barorderno = $barorders->BarOrderNo;
                if($barorderno){
                  for($i=0;$i<count($baritemName);$i++){
                    $baritemNamei = $baritemName[$i];
                    $barportioni = $barportion[$i];
                    $barquantityi = $barquantity[$i];
                    $temp1 = $this->barModel->selectbaritemid($baritemNamei, $barportioni);
                    $barid = $temp1->barItemId;
                    $this->barModel->addbaroderitem($barid, $barportioni, $barquantityi, $barorderno);
                  }
                  for($i=0;$i<count($snackitemName);$i++){
                    $snackitemNamei = $snackitemName[$i];
                    $snackportioni = $snackportion[$i];
                    $snackquantityi = $snackquantity[$i];
                    $temp2 = $this->barModel->selectsnackitemid($snackitemNamei, $snackportioni);
                    $snackid = $temp2->fooditemId;
                    $this->barModel->addsnackoderitem($snackid, $snackportioni, $snackquantityi, $barorderno);
                  }
                }else{
                  die('Something went wrong');
                }
              }
              else{
                die('Something went wrong');
              }
    
            }
            else if(empty($data['isbaritemfilled'])){
              if($this->barModel->addbarorder($tableno,$date,$time,$status)){
                $barorders = $this->barModel->selectbarorderno($date, $time);
                $barorderno = $barorders->BarOrderNo;
                if($barorderno){
                  for($i=0;$i<count($baritemName);$i++){
                    $baritemNamei = $baritemName[$i];
                    $barportioni = $barportion[$i];
                    $barquantityi = $barquantity[$i];
                    $temp1 = $this->barModel->selectbaritemid($baritemNamei, $barportioni);
                    $barid = $temp1->barItemId;
                    $this->barModel->addbaroderitem($barid, $barportioni, $barquantityi, $barorderno);
                  }
                }
              }
            }
            else if(empty($data['issnackitemfilled'])){
              if($this->barModel->addbarorder($tableno,$date,$time,$status)){
                $barorders = $this->barModel->selectbarorderno($date, $time);
                $barorderno = $barorders->BarOrderNo;
                if($barorderno){
                  for($i=0;$i<count($snackitemName);$i++){
                    $snackitemNamei = $snackitemName[$i];
                    $snackportioni = $snackportion[$i];
                    $snackquantityi = $snackquantity[$i];
                    $temp2 = $this->barModel->selectsnackitemid($snackitemNamei, $snackportioni);
                    $snackid = $temp2->fooditemId;
                    $this->barModel->addsnackoderitem($snackid, $snackportioni, $snackquantityi, $barorderno);
                  }
                }
              }
            }
            else{
              die('Something went wrong');
            }
            
          }
          else{
            $data = [
              'baritems' => $baritems,
              'snackitems' => $snackitems,
              'barquantity' => '',
              'snackquantity' => '',
              'tablenoError' => '',
              'isbaritemfilled' => '',
              'issnackitemfilled' => ''
            ];
          }
    
        
        $this->view('bars/placeorder', $data);
      }

      public function placebot(){
        $this->view('bars/placebot');
      }

      public function updateorder(){
        $baritems = $this->barModel->viewavailablebaritems();
        $snackitems = $this->barModel->viewavailablesnackitems();
        $orderno = $_GET['orderno'];
        $baritemnames= $this->barModel->selectbarorderitems($orderno);
        $snackitemnames= $this->barModel->selectbarordersnackitems($orderno);

          $data = [
            'baritems' => $baritems,
            'snackitems' => $snackitems,
            'baritemnames' => $baritemnames,
            'snackitemnames' => $snackitemnames,
            'tablenoError' => '',
            'tablenoError2' => '',
            'isbaritemfilled' => '',
            'issnackitemfilled' => ''
          ];

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $baritemName = $_POST['baritemName'];
            $snackitemName = $_POST['snackitemName'];
            $barportion = $_POST['barportion'];
            $snackportion = $_POST['snackportion'];
            $barquantity = $_POST['barquantity'];
            $snackquantity = $_POST['snackquantity'];
            $status = $_POST['status'];
            $tableno = $_POST['tableno'];
            $date = date("Y/m/d");
            $time = date("H:i:sa");
    
            if(empty($tableno)){
              $data['tablenoError2'] = 'not recognizing';
            }

            if(empty($baritemName) && empty($barportion) && empty($barquantity)){
              $data['isbaritemfilled'] = 'no';
            }

            if(empty($snackitemName) && empty($snackportion) && empty($snackquantity)){
              $data['issnackitemfilled'] = 'no';
            }

            if(empty($data['isbaritemfilled']) && empty($data['issnackitemfilled'])){
              if($this->barModel->addbarorder($tableno,$date,$time,$status)){
                $barorders = $this->barModel->selectbarorderno($date, $time);
                $barorderno = $barorders->BarOrderNo;
                if($barorderno){
                  for($i=0;$i<count($baritemName);$i++){
                    $baritemNamei = $baritemName[$i];
                    $barportioni = $barportion[$i];
                    $barquantityi = $barquantity[$i];
                    $temp1 = $this->barModel->selectbaritemid($baritemNamei, $barportioni);
                    $barid = $temp1->baritemId;
                    $this->barModel->addbaroderitem($barid, $barportioni, $barquantityi, $barorderno);
                  }
                  for($i=0;$i<count($snackitemName);$i++){
                    $snackitemNamei = $snackitemName[$i];
                    $snackportioni = $snackportion[$i];
                    $snackquantityi = $snackquantity[$i];
                    $temp2 = $this->barModel->selectsnackitemid($snackitemNamei, $snackportioni);
                    $snackid = $temp2->fooditemId;
                    $this->barModel->addsnackoderitem($snackid, $snackportioni, $snackquantityi, $barorderno);
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
              'baritems' => $baritems,
              'snackitems' => $snackitems,
              'baritemnames' => $baritemnames,
              'snackitemnames' => $snackitemnames,
              'tablenoError' => '',
              'tablenoError2' => ''
            ];
          }


        $this->view('bars/updateorder', $data);
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
