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
        $barorderno = $_GET['orderno'];
        $baritemnames= $this->barModel->selectbarorderitems($barorderno);
        $snackitemnames= $this->barModel->selectbarordersnackitems($barorderno);

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

            $barorderno = $_POST['barorderno'];
            $tableno = $_POST['tableno'];
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
                  header('location: ' . URLROOT . '/bars/updateorder?orderno='. $barorderno . '&tableno='.$tableno);
                }else{
                  die('Something went wrong');
                }

    
            }
            else if(empty($data['isbaritemfilled'])){
                if($barorderno){
                  for($i=0;$i<count($baritemName);$i++){
                    $baritemNamei = $baritemName[$i];
                    $barportioni = $barportion[$i];
                    $barquantityi = $barquantity[$i];
                    $temp1 = $this->barModel->selectbaritemid($baritemNamei, $barportioni);
                    $barid = $temp1->barItemId;
                    $this->barModel->addbaroderitem($barid, $barportioni, $barquantityi, $barorderno);
                  }
                  header('location: ' . URLROOT . '/bars/updateorder?orderno='. $barorderno . '&tableno='.$tableno);
                }
            }
            else if(empty($data['issnackitemfilled'])){
                if($barorderno){
                  for($i=0;$i<count($snackitemName);$i++){
                    $snackitemNamei = $snackitemName[$i];
                    $snackportioni = $snackportion[$i];
                    $snackquantityi = $snackquantity[$i];
                    $temp2 = $this->barModel->selectsnackitemid($snackitemNamei, $snackportioni);
                    $snackid = $temp2->fooditemId;
                    $this->barModel->addsnackoderitem($snackid, $snackportioni, $snackquantityi, $barorderno);
                  }
                  header('location: ' . URLROOT . '/bars/updateorder?orderno='. $barorderno . '&tableno='.$tableno);
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
              'baritemnames' => $baritemnames,
              'snackitemnames' => $snackitemnames,
              'barquantity' => '',
              'snackquantity' => '',
              'tablenoError' => '',
              'isbaritemfilled' => '',
              'issnackitemfilled' => ''
            ];
          }

        $this->view('bars/updateorder', $data);
      }

      public function updatebarorderitem(){
        $oderno = $_GET['orderno'];
        $itemno = $_GET['itemno'];
        $orderitem = $this->barModel->getOrderItemDetials($itemno);

        $data = [
          'orderitem' => $orderitem
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = [
            'orderno' => trim($_GET['orderno']),
            'barorderitemno' => trim($_GET['itemno']),
            'volume' => trim($_POST['volume']),
            'quantity' => trim($_POST['quantity'])
          ];

          $orderno = $data['orderno'];

          if($this->barModel->updateOrderItem($data)){
            header('location: '. URLROOT . '/users/barman?status=orderitemupdated');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }

        $this->view('bars/updatebarorderitem', $data);
      }

      public function updatebaritem(){
        $barItemId = $_GET['barItemId'];
        $baritems = $this->barModel->viewbaritem($barItemId);

        $data = [
          'baritems' => $baritems,
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
  
            if($this->barModel->updatebaritem($data, $barItemId)){
              header('location: ' . URLROOT . '/bars/managebaritems');
            }else{
              die('Something Went Wrong!');
            }
          }
  
        }else{
          $data = [
            'baritems' => $baritems,
            'itemName' => '',
            'category' => '',
            'volume' => '',
            'status' => '',
            'price' => '',
            'itemNameError'=>'',
            'priceError' => ''
          ];
        }
        
        $this->view('bars/updatebaritem', $data);
      }

      public function updatebarordersnackitem(){
      
        $orderno = $_GET['orderno'];
        $barordersnackno = $_GET['itemno'];
        $orderitem = $this->barModel->getOrderSnackDetials($barordersnackno);
  
        $data = [
          'orderitem' => $orderitem
        ];
  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'orderno' => trim($_GET['orderno']),
            'barordersnackno' => trim($_GET['itemno']),
            'ptype' => trim($_POST['ptype']),
            'quantity' => trim($_POST['quantity'])
          ];
  
          $orderno = $_GET['orderno'];
  
          if($this->barModel->updateOrderSnack($data)){
            header('location: '. URLROOT . '/users/barman?status=orderitemupdated');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }
  
        $this->view('bars/updatebarordersnackitem',$data);
      }

      public function settings(){
        $this->view('bars/settings');
      }

      public function barbill(){
        $orderno = $_GET['orderno'];
        $baritemnames= $this->barModel->selectbarorderitems($orderno);
        $snackitemnames= $this->barModel->selectbarordersnackitems($orderno);

        $data = [
          'baritemnames' => $baritemnames,
          'snackitemnames'=> $snackitemnames,
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
            'baritemnames' => $baritemnames,
            'snackitemnames'=> $snackitemnames,
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

          $orderno = $_GET['orderno'];
  
          //validating the inputs
  
          if(($data['discount']) < 0){
            $data['discountError'] = 'Discount cant be negative';
          }
  
          if(($data['amount']) < $data['disprice']){
            $data['amountError'] = 'Amount must be greater than price after discount';
          }
  
          //making sure all the errors are empty
          if(empty($data['discountError']) && empty($data['amountError'])){
  
            if($this->barModel->issuebarbill($data, $orderno)){
              if($this->barModel->updatebarorderstatus($data, $orderno)){
                header('location: ' . URLROOT . '/users/barman');
              }else{
                die('Something Went Wrong!');
              }
             
            }else{
              die('Something Went Wrong!');
            }
          }
  
        }

        $this->view('bars/barbill', $data);
      }

      public function cancelbarorder(){
        $orderno = $_GET['orderno'];

        if($this->barModel->cancelBarOrder($orderno)){
          header('location: '. URLROOT . '/users/barman?status=ordercanceled');
        }else{
          die('Something went Wrong!');
        }
      }

      public function deleteorderitem(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'itemid' => trim($_GET['itemid'])
          ];
  
  
          if($this->barModel->deleteorderbarItem($data)){
            header('location: '. URLROOT . '/users/barman?delete=item deleted');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }
      }

      public function deletesnackorderitem(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'itemid' => trim($_GET['itemid'])
          ];
  
  
          if($this->barModel->deleteordersnackItem($data)){
            header('location: '. URLROOT . '/users/barman?delete=item deleted');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }
      }

      public function completedorders(){
        $completedorders=$this->barModel->selectbilldetails();

        $data =[
          'completedorders' => $completedorders
        ];

        $this->view('bars/completedorders', $data);
      }

      public function deleteitem(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
          $data = [
            'itemid' => trim($_GET['itemid'])
          ];
    
    
          if($this->barModel->deletebarItem($data)){
             header('location: '. URLROOT . '/users/barman?delete=item deleted');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }
      }
      
      public function deletesnack(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
          $data = [
            'itemid' => trim($_GET['itemid'])
          ];
    
    
          if($this->barModel->deletesnackItem($data)){
             header('location: '. URLROOT . '/users/barman?delete=item deleted');
            exit();
          }
          else{
            die('Something went Wrong!');
          }
        }
      }

    }
