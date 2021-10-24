<?php
  Class Reservations extends Controller{
    public function __construct(){
      $this->receptionistModel = $this->model('Reservation');
      
    }

    public function placereservation(){
      $this->view('reservations/placereservation');
    }

    public function updatereservation(){
      $this->view('reservations/updatereservation');
    }

    public function placekot(){
      $this->view('reservations/placekot');
    }

    public function updatekot(){
      $this->view('reservations/updatekot');
    }

    public function roombill(){
      $this->view('reservations/roombill');
    }

    public function settings(){
      $this->view('reservations/settings');
    }

    public function selectdate(){
      $this->view('reservations/selectdate');
    }
    
    public function roomselect(){
      $this->view('reservations/roomselect');
    }
  }