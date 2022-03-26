<?php
  Class Admins extends Controller{
    public function __construct(){
      $this->adminModel = $this->model('Admin');
    }

    public function manageissues(){

      $issues = $this->adminModel->viewissues();

      $data = [
        'issues' => $issues
      ];
      $this->view('admins/manageissues', $data);
    }

    public function manageusers(){
      $users = $this->adminModel->viewusers();

      $data = [
        'users' => $users
      ];

      $this->view('admins/manageusers',$data);
    }

    public function managepackages(){
      $packages = $this->adminModel->viewpackages();

      $data = [
        'packages' => $packages
      ];

      $this->view('admins/managepackages',$data);
    }

    public function changepackage(){

      $data = [
        'roomno' => '',
        'packagetype' => '',
        'price' => '',
        'priceError' => ''
      ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = [
            'roomno' => trim($_POST['roomno']),
            'packagetype' => trim($_POST['packagetype']),
            'price' => trim($_POST['price']),
            'priceError' => ''

          ];

            if(empty($data['price'])){
              $data['priceError'] = 'Price cannot be empty';
            }

            if(empty($data['priceError'])){
              if($this->adminModel->changePackageStatus($data)){
                if($this->adminModel->addNewPackage($data)){
                  header('location' . URLROOT . '/admins/changepacakge');
                }
                else{
                  die('Something went Wrong!');
                }
              }else{
                die('Something went Wrong!');
              }
            }

        }
        else{
          $data = [
            'roomno' => '',
            'packagetype' => '',
            'price' => '',
            'priceError' => ''
          ];
      }
      $this->view('admins/changepackage', $data);
    }

    public function settings(){
      $this->view('admins/settings');
    }

    public function updateissue(){
      $this->view('admins/updateissue');
    }

    public function reservationreports(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'sort' => trim($_POST['sort']),
          'reporttype' => trim($_POST['reporttype']),
          'orderby' => trim($_POST['orderby']),
          'year' => '',
          'month' => '',
          'day' => trim($_POST['day']),
          'results' => ''
        ];

          if(isset($_POST['yearselect'])){
            $data['year'] = trim($_POST['yearselect']);
          }
          
          if(isset($_POST['monthselect'])){

            $year = date("Y", strtotime($_POST['monthselect']));
            $month = date("m", strtotime($_POST['monthselect']));

            $data['year'] = $year;
            $data['month'] = $month;

          }

          $data['results'] = $this->adminModel->generateReservationReport($data);

          if($data['reporttype'] == '1'){
            $this->view('admins/popularroomtypes', $data);
          }
          else if($data['reporttype'] == '2'){
            $this->view('admins/popularroompackages', $data);
          }
          else if($data['reporttype'] == '3'){
            $this->view('admins/popularrooms', $data);
          }
          else{
            die('Something Went Wrong!');
          }

      }else{
        $this->view('admins/reservationreports');
      }
    }

    public function restaurantreports(){
      $this->view('admins/restaurantreports');
    }

    public function barreports(){
      $this->view('admins/barreports');
    }

    public function complainreports(){
      $this->view('admins/complainreports');
    }

    public function reportmanagement(){
      $this->view('admins/reportmanagement');
    }

    public function popularrooms(){
      $this->view('admins/popularrooms');
    }
    public function popularroomtypes(){
      $this->view('admins/popularroomtypes');
    }
    public function popularroompackages(){
      $this->view('admins/popularpackages');
    }

    public function popularfooitems(){
      $this->view('admins/popularfooditems');
    }
    public function popularbaritems(){
      $this->view('admins/popularbaritems');
    }
    public function popularsnackitems(){
      $this->view('admins/popularsnackitems');
    }
    public function issuescomplained(){
      $this->view('admins/issuescomplained');
    }
    public function databases(){
      $this->view('admins/databases');
    }
  }