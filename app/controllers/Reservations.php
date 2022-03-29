<?php
  Class Reservations extends Controller{
    public function __construct(){
      $this->receptionistModel = $this->model('Reservation');
      
    }

    public function placereservation(){

      $data = [
        'roomno' => '',
        'checkin' => '',
        'checkout' => '',
        'packagetypeid' => '',
        'peoplecount' => '',
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'roomno' => trim($_POST['roomno']),
          'checkin' => trim($_POST['checkin']),
          'checkout' => trim($_POST['checkout']),
          'packagetypeid' => trim($_POST['packagetypeid']),
          'peoplecount' => trim($_POST['peoplecount']),
          'cnameError' => '',
          'cidError' => '',
          'cnumError' => '',
          'packageid' => ''
        ];

        if(isset($_POST['cname'])){
          $data = [
          'roomno' => trim($_POST['roomno']),
          'checkin' => trim($_POST['checkin']),
          'checkout' => trim($_POST['checkout']),
          'packagetypeid' => trim($_POST['packagetypeid']),
          'peoplecount' => trim($_POST['peoplecount']),
          'cname' => trim($_POST['cname']),
          'cid' => trim($_POST['cid']),
          'cnum' => trim($_POST['cnum']),
          'status' => trim($_POST['status']),
          'snotes' => trim($_POST['snotes']),
          'packageid' => '',
          ];

          if(empty($data['cname'])){
            $data['cnameError'] = 'Customer name cant be empty';
          }
          if(empty($data['cname'])){
            $data['cidError'] = 'Customer Id cant be empty';
          }
          if(empty($data['cnum'])){
            $data['cnumError'] = 'Customer Number cant be empty';
          }

          if(!empty($data['roomno']) && !empty($data['packagetypeid'])){
            $roomno = $data['roomno'];
            $packagetypeid = $data['packagetypeid'];
            $packageid = $this->receptionistModel->getPackageId($roomno, $packagetypeid);
            $data['packageid'] = $packageid->PackageId;
          }

          if(empty($data['cnameError']) && empty($data['cidError']) && empty($data['cnumError'])){
            if($data['packageid']){
              if($this->receptionistModel->addReservations($data)){
                $result = $this->receptionistModel->getResNo();
                $resno = $result->ResNo;
                header('location: '. URLROOT . '/users/receptionist?status=resplaced');
              }
              else{
              die('Something Went Wrong');
              }
            }
            else{
              die('Something Went Wrong');
            } 
          }
        }

        $this->view('reservations/placereservation', $data);

      }else{

        $data = [
          'roomno' => '',
          'checkin' => '',
          'checkout' => '',
          'packageid' => '',
          'peoplecount' => '',
          'cnameError' => '',
          'cidError' => '',
          'cnumError' => ''
        ];
      }
      $this->view('reservations/placereservation', $data);
    }

    public function updatereservation(){

      $resno = trim($_GET['resno']);
      $roomno = trim($_GET['roomno']);

      $resdetail = $this->receptionistModel->getReservationById($resno);
      $kotdetails = $this->receptionistModel->getKotDetailsByResId($resno);

      $data = [
        'resdetail' => $resdetail,
        'kotdetails' => $kotdetails,
        'resno' => $resno,
        'roomno' => $roomno,
        'cusName' => '',
        'cusId' => '',
        'cusMobile' => '',
        'notes' => '',
        'cusNameError'=> '',
        'cusIdError' => '',
        'cusMobileError' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'resdetail' =>$resdetail,
          'kotdetails' => $kotdetails,
          'resno' => $resno,
          'roomno' => $roomno,
          'cusName' => trim($_POST['cname']),
          'cusId' => trim($_POST['cid']),
          'cusMobile' => trim($_POST['cnum']),
          'snotes' => trim($_POST['snotes']),
          'cusNameError'=> '',
          'cusIdError' => '',
          'cusMobileError' => ''
        ];

        if(empty($data['cusName'])){
          $data['cusNameError'] = 'Customer Name cant be empty';
        }

        if(empty($data['cusId'])){
          $data['cusIdError'] = 'Customer ID cant be empty';
        }

        if(empty($data['cusMobile'])){
          $data['cusMobileError'] = 'Customer Mobile cant be empty';
        }

        if(empty($data['cusNameError']) && empty($data['cusIdError']) && empty($data['cusMobileError'])){
          if($this->receptionistModel->updateReservation($data)){
            header('location: '. URLROOT . '/users/receptionist?status=updated');
          }
          else{
            die('Something Went Wrong!');
          }
        }

      }

      $this->view('reservations/updatereservation',$data);
    }

    public function placekot(){

      $resno = $_GET['resno'];
      $roomno = $_GET['roomno'];
      $fooditems = $this->receptionistModel->viewavailablefooditems();

      $data = [
        'resno' => $resno,
        'roomno' => $roomno,
        'fooditems' => $fooditems,
        'resnoError' => '',
        'roomnoError' => '',
        'isbaritemfilled' => ''
        
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $itemName = $_POST['itemName'];
        $portion = $_POST['portion'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $resno = $_GET['resno'];
        $roomno = $_GET['roomno'];
        $date = date("Y/m/d");
        $time = date("H:i:sa");

        if(empty($resno)){
          $data['resnoEroor'] = 'Reservation Number cant be Empty';
        }
        if(empty($roomno)){
          $data['roomnoError'] = 'Room Number Cant be Empty!';
        }

        for($i=0;$i<count($itemName);$i++){
          if($itemName[$i] == "select an option" || $portion[$i] == "select an option" || $quantity[$i] == 0){
            $data['isbaritemfilled'] = 'All Sections must be filled';
          }
        }

        if(empty($data['isbaritemfilled']) && empty($data['resnoError']) && empty($data['roomnoError'])){
          if($this->receptionistModel->addRoomOrder($resno, $roomno, $date, $time, $status)){
            $roomorders = $this->receptionistModel->selectRoomOrderNo($date, $time);
            $roomorderno = $roomorders->RoomOrderNo;
            if($roomorderno){
              for($i=0;$i<count($itemName);$i++){
                $itemNamei = $itemName[$i];
                $portioni = $portion[$i];
                $quantityi = $quantity[$i];
                $temp = $this->receptionistModel->selectfooditemid($itemNamei, $portioni);
                $foodid = $temp->fooditemId;
                $this->receptionistModel->addRoomOrderItem($foodid, $portioni, $quantityi, $roomorderno);
              }

              header('location: '. URLROOT . '/reservations/updatereservation?resno=' . $resno . '&roomno=' . $roomno . '&status=success');
            }else{
              die('Something went wrong');
            }
          }else{
            die('something went Wrong!');
          }
        }

      }
      $this->view('reservations/placekot',$data);
    }

    public function updatekot(){

      $roomorderno = $_GET['roomorderno'];
      
      $roomorderitems = $this->receptionistModel->getOrderItemsDetails($roomorderno);

      $data = [
        'roomorderitems' => $roomorderitems
      ];

      $this->view('reservations/updatekot', $data);
    }

    public function roombill(){

      $resno = $_GET['resno'];
      $roomno = $_GET['roomno'];

      $results = $this->receptionistModel->getBillDetails($resno);

      $data = [
        'resno' => $resno,
        'roomno' => $roomno,
        'results' => $results,
        'tpriceError' => '',
        'discountError' => '',
        'dtpriceError' => '',
        'amountError' => '',
        'balanceError' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        $data = [
          'resno'=> trim($_GET['resno']),
          'roomno'=> trim($_GET['roomno']),
          'results' => $results,
          'tprice' => trim($_POST['tprice']),
          'discount' => trim($_POST['tprice']),
          'dtprice' => trim($_POST['dtprice']),
          'amount' => trim($_POST['amount']),
          'balance' => trim($_POST['balance']),
          'date' => date("Y/m/d"),
          'time' => date("H:i:sa"),
          'tpriceError' => '',
          'discountError' => '',
          'dtpriceError' => '',
          'amountError' => '',
          'balanceError' => ''
        ];

        if(empty($data['tprice'])){
          $data['tpriceError'] = 'Total Cant be Empty!';
        }

        if($data['discount'] < 0){
          $data['discountError'] = 'Discount cant be a negative value!';
        }

        if(empty($data['dtprice'])){
          $data['dtpriceError'] = 'Discounted Total Cant be Empty!';
        }

        if($data['amount'] < $data['dtprice']){
          $data['amountError'] = 'Amount Cant be lesser than Discounted Total!';
        }

        if(empty($data['tpriceError']) && empty($data['discountError']) && empty($data['tpriceError'])
         && empty($data['dtpriceError']) && empty($data['amountError']) && empty($data['balanceError'])){
           if($this->receptionistModel->completeReservation($data)){
            if($this->receptionistModel->generateBill($data)){
              header('location: '. URLROOT . '/users/receptionist?status=completed');
            }else{
              die('something went wrong!');
            }
         }else{
           die('Something went wrong!');
         }
        }

      }

      $this->view('reservations/roombill', $data);
    }

    public function settings(){
      $this->view('reservations/settings');
    }

    public function selectdate(){
      $this->view('reservations/selectdate');
    }
    
    public function roomselect(){

      $data = [
        'checkin' => '',
        'checkout' =>'',
        'peoplecount' => '',
        'package' => '',
        'results' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'checkin' => trim($_POST['check-in']),
          'checkout' =>trim($_POST['check-out']),
          'peoplecount' => trim($_POST['people']),
          'package' => trim($_POST['package']),
          'results' => ''
        ];

        if(!empty($data['checkin']) && !empty($data['checkout']) && !empty($data['peoplecount'])){
          $possiblerooms = $this->receptionistModel->selectavailablerooms($data);
          $bookedrooms= $this->receptionistModel->selectbookedrooms($data);

          $size = count((array)$bookedrooms);

          if(!empty($bookedrooms)){
            for($i=0;$i<$size;$i++){
              foreach($possiblerooms as $subk => $subarr){
                if(strcmp($bookedrooms[$i]->RoomNo,$subarr->RoomNo) == 0){
                  unset($possiblerooms[$subk]);
                }
              }
            }

            
          }

          $data = [
            'checkin' => trim($_POST['check-in']),
            'checkout' =>trim($_POST['check-out']),
            'peoplecount' => trim($_POST['people']),
            'package' => trim($_POST['package']),
            'results' => $possiblerooms,
            'results2' => $bookedrooms,
            'size' => $size
          ];

          if(empty($data['results'])){
            header('location: '. URLROOT . '/reservations/noreservationsfound');
          }

          $this->view('reservations/roomselect', $data);

        }
        else{
          die('Something went Wrong');
        } 

      }
      else{
        $data = [
          'checkin' => '',
          'checkout' => '',
          'peoplecount' => '',
          'results' => ''
        ];

        $this->view('reservations/roomselect', $data);
      }
    }

    public function updateorderitem(){
      
      $roomorderno = $_GET['roomorderno'];
      $roomorderitemno = $_GET['itemno'];
      $orderitem = $this->receptionistModel->getOrderItemDetials($roomorderitemno);

      $data = [
        'orderitem' => $orderitem
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'roomorderno' => trim($_GET['roomorderno']),
          'roomorderitemno' => trim($_GET['itemno']),
          'ptype' => trim($_POST['ptype']),
          'quantity' => trim($_POST['quantity'])
        ];

        $roomorderno = $data['roomorderno'];

        if($this->receptionistModel->updateOrderItem($data)){
          header('location: '. URLROOT . '/users/receptionist?status=orderitemupdated');
          exit();
        }
        else{
          die('Something went Wrong!');
        }
      }

      $this->view('reservations/updateorderitem',$data);
    }

    public function noreservationsfound(){
      $this->view('reservations/noreservationsfound');
    }
    public function completedreservations(){

      $results = $this->receptionistModel->getCompleteResOrders();

      $data = [
        'results' => $results
      ];
      $this->view('reservations/completedreservations',$data);
    }

    public function cancelreservation(){
      $resno = $_GET['resno'];
      if($this->receptionistModel->cancelReservation($resno)){
        header('location: '. URLROOT . '/users/receptionist?status=rescanceled');
      }else{
        die('Something went Wrong!');
      }
    }
  
    public function viewbill(){
      $billno = $_GET['billno'];

      $result = $this->receptionistModel->viewBill($billno);
       
      $data = [
        'results'=> $result
      ];

      $this->view('reservations/viewbill',$data);

    }

    public function deletekot(){
      $orderno = $_GET['roomorderno'];

      if($this->receptionistModel->deleteRoomOrderItems($orderno)){
        if($this->receptionistModel->deleteRoomOrder($orderno)){
          header('location: '. URLROOT . '/users/receptionist?status=orderdeleted');
        }
        else{
          die('Something went Wrong!');
        }
      }else{
        die('Something went wrong!');
      }
    }

    public function deleteorderitem(){
      $itemno = $_GET['itemno'];
      if($this->receptionistModel->deleteOrderItem($itemno)){
        header('location: '. URLROOT . '/users/receptionist?status=orderitemdeleted');
      }else{
        die('Something went Wrong!');
      }
    }
  }