<?php if (!isset($_SESSION['UserID'])){ 
      header('location: ' . URLROOT .  '/users/login');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Room Select</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="res-room-select-nav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
          <img src="<?php echo URLROOT?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/reservations/settings">Settings</a>
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>

    <div class="room-select">
    <div class="row">
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room1.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room2.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room3.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room4.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room5.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room6.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-user"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room7.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
      <div class="room-select-col">
        <a href="<?php echo URLROOT ?>/reservations/placereservation">
        <img src="<?php echo URLROOT?>/public/img/room8.png">
        <div class="room-row1">
          <div class="row1-col">
            <h3>Status: Unavailable</h3>
          </div>
          <div class="row1-col">
          <i class="fa fa-users"></i>
          </div>
        </div>
        <div class="room-row2">
        </div>
        <div class="room-row3">
          <h1>Price : 2500 LKR</h1>
        </div>
        </a>
      </div>
    </div>
  </div>
</section>
</body>
</html>