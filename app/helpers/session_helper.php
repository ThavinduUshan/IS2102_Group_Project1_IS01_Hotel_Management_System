<?php
  session_start();

  function isLoggedIn(){
    if (isset($_SESSION['UserID'])){
      return true;
    }else{
      return false;
    }
  }