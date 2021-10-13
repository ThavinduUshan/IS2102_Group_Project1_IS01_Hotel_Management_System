<?php
  Class Pages extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
      
    }

    public function index(){
      $this->view('pages/index');
    }

    public function about(){
      $this->view('pages/about');
    }

    public function contact(){
      $this->view('pages/contact');
    }

    public function facilities(){
      $this->view('pages/facilities');
    }

    public function gallery(){
      $this->view('pages/gallery');
    }

    public function issues(){
      $this->view('pages/issues');
    }

    public function selectdate(){
      $this->view('pages/selectdate');
    }

    public function roomselect(){
      $this->view('pages/roomselect');
    }
    
  }