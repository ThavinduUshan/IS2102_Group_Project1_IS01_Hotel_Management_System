<?php
  Class Moderators extends Controller{
    public function __construct(){
      $this->moderatorModel = $this->model('Moderator');
    }

    public function updateissue(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'issueId' => trim($_POST['id']),
          'status' => trim($_POST['status']),
        ];

        if($this->moderatorModel->updateIssue($data)){
          header('location: ' . URLROOT . '/users/moderator?status=success');
        }else{
          die('Something Went Wrong!');
        }

      }else{
        $issueId = $_GET['id'];

        $issue = $this->moderatorModel->getIssueDetails($issueId);

        $data = [
          'issue' => $issue
        ];
        $this->view('moderators/updateissue',$data);
      }
      
    }

    public function settings(){
      $this->view('moderators/settings');
    }

  }