<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 2){ 
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
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Select Date</title>
</head>
<body>
<section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
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

  <div class="select-date">
    <h1>Select the Dates</h1>
    <form name="selectdate" method="post" action="<?php echo URLROOT; ?>/reservations/roomselect" onsubmit = "return validateform()" >
      <label for="check-in">Check In: *</label>
      <input type="date" name="check-in" id="checkin" placeholder="CheckIn Date" required>
      <div class="select-date-error" id="error1">Checkin cant be a past date</div>
      <label for="check-out">Check Out: *</label>
      <input type="date" name="check-out" id="checkout" placeholder="CheckOut Date" required>
      <div class="select-date-error" id="error2">Checkout cant be a past date</div>
      <p id="error3" class="select-date-error">Checkout Can't be Less than Checkin</p>
      <label for="npeople">No. of People: *</label>
      <select name="people" id="npeople">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <label for="packagetype">Package: *</label>
      <select name="package" id="packagetype">
        <option value="1">Room Only</option>
        <option value="2">Bed and Breakfast</option>
        <option value="3">Half Board</option>
        <option value="4">Full Board</option>
      </select>
      <button type="submit">Check availabity</button>
    </form>
  </div>
  <!--<button onclick="validateform()">Click</button>-->
</section>
<script>
    function validateform(){
      var checkin = (new Date(document.forms["selectdate"]["check-in"].value)).getTime();
      var checkout = (new Date(document.forms["selectdate"]["check-out"].value)).getTime();
      var yesterday = (new Date()).getTime() - 24*60*60*1000;

      console.log(checkin);
      console.log(checkout);
      console.log(yesterday);

      if(checkin < yesterday){
        document.getElementById("error1").style.display = "block";
        return false;
      }

      if(checkout < yesterday){
        document.getElementById("error2").style.display = "block";
        return false;
      }

      if(checkout < checkin){
        document.getElementById("error3").style.display = "block";
        return false;
      }
    }
  </script>
</body>
</html>