<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 1){ 
      header('location: ' . URLROOT .  '/users/login');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Report Management</title>
</head>
<body>
<section class="system">
    <nav class="sys-nav" id="res-room-select-nav">
      <a href="<?php echo URLROOT ?>/users/admin">
          <img src="<?php echo URLROOT?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
    <div class="reportmgt-dash-button">
      <a href="<?php echo URLROOT ?>/users/admin">Go Back to Dashboard</a>
    </div><br><br>
    <div class="rooms-section">
      <div class="report-card">
          <h2>Reservation</h2>
          <h5>reports</h5>
          <img src="<?php echo URLROOT?>/public/img/Reservation.png" alt="Room Image">
          <br><br>
          <input type="hidden" name="packagetypeid" value="">
          <input type="hidden" name="roomno" value="">
          <input type="hidden" name="checkin" value="">
          <input type="hidden" name="checkout" value="">
          <input type="hidden" name="peoplecount" value="">
          <a href="<?php echo URLROOT ?>/admins/reservationreports"><input type="submit" value="Generate"></a>
      </div>
      <div class="report-card">
          <h2>Restaurant</h2>
          <h5>reports</h5>
          <img src="<?php echo URLROOT?>/public/img/Restaurant.png" alt="Room Image">
          <br><br>
          <input type="hidden" name="packagetypeid" value="">
          <input type="hidden" name="roomno" value="">
          <input type="hidden" name="checkin" value="">
          <input type="hidden" name="checkout" value="">
          <input type="hidden" name="peoplecount" value="">
          <a href="<?php echo URLROOT ?>/admins/restaurantreports"><input type="submit" value="Generate"></a>
      </div>
      <div class="report-card">
          <h2>Pub</h2>
          <h5>reports</h5>
          <img src="<?php echo URLROOT?>/public/img/Bar.png" alt="Room Image">
          <br><br>
          <input type="hidden" name="packagetypeid" value="">
          <input type="hidden" name="roomno" value="">
          <input type="hidden" name="checkin" value="">
          <input type="hidden" name="checkout" value="">
          <input type="hidden" name="peoplecount" value="">
          <a href="<?php echo URLROOT ?>/admins/barreports"><input type="submit" value="Generate"></a>
      </div>
      <div class="report-card">
          <h2>Complains</h2>
          <h5>reports</h5>
          <img src="<?php echo URLROOT?>/public/img/Issue.png" alt="Room Image">
          <br><br>
          <input type="hidden" name="packagetypeid" value="">
          <input type="hidden" name="roomno" value="">
          <input type="hidden" name="checkin" value="">
          <input type="hidden" name="checkout" value="">
          <input type="hidden" name="peoplecount" value="">
          <a href="<?php echo URLROOT ?>/admins/complainreports"><input type="submit" value="Generate"></a>
      </div>
    </div>
  </section>
</body>
</html>