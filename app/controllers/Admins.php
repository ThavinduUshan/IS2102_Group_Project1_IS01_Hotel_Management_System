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

    public function settings(){
      $this->view('admins/settings');
    }

    public function updateissue(){
      $this->view('admins/updateissue');
    }
  }