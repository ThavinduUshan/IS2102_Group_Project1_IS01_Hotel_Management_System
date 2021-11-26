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
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Room Bill</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
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
  </section>
  <script>
    function dropdown() {
      var x = document.getElementById("sysnav");
      if (x.className === "sys-nav") {
        x.className += " responsive";
      } else {
        x.className = "sys-nav";
      }
    }
  </script>

  <!-- System Block -->

  <div class="sys-left-col">
  <div class="recep-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/selectdate">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Place Reservation</p>
    </div>

    <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/receptionist">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>
  </div>
  
<!-- Right Block Bill -->

  <div class="sys-right-col">
  <div class="recep-bill-right">
 
<!-- Bill Heading -->

    <div class="recep-bill-date">
      <table>
        <tr>
          <td>Reservation No:</td>
          <td>Room No:</td>
        </tr>
      </table>
    </div>

    <div class="recep-bill-heading">
      <p>Bill Details</p>
    </div>

<!-- Bill -->

    <div class="recep-bill-form">
      
      <form action="bill.php">
        <div class="bill-form-left">
          <label for="checkin">Checked In:</label><br>
          <input type="text" id="checkin" name="checkin"><br><br>
        </div>

        <label for="checkout">Cheked Out:</label><br>
        <input type="text" id="checkout" name="checkout"><br><br>

        <div class="bill-form-right">
          <label for="days" class="recep-bill-form-l1">Days:</label><br>
          <input type="text" id="days" name="days"><br><br>
        </div>

        <label for="ptype">Package Type:</label><br>
        <input type="text" id="ptype" name="ptype"><br><br>

      </form>
    </div>

    <div class="recep-bill-2">
      <form action="bill.php">
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount"></br>
        <label for="tprice">Room Total Price:</label>
        <input type="text" id="tprice" name="tprice"><br>
        <input type="submit" name="submit" value="Close Reservation"><br><br>
      </form>
    </div>
  </div>
  </div>
</body>
</html>
