<?php if (!isset($_SESSION['UserID']) || $_SESSION["UserTypeID"] != 2){ 
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
  <title>View Bill</title>
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
    <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/completedreservations">
        <i class="fa fa-list-alt fa-4x" aria-hidden="true"></i>
      </a>
      <p>Completed<br> Reservations</p>
    </div>
  </div>
  </div>
  
<!-- Right Block Bill -->

  <div class="sys-right-col">
 
<!-- Bill Heading -->

    <div class="rest-bill-date">
      <table>
        <tr>
          <td>Res No:<?php echo " " . $data['results']->ResNo?></td>
          <td>Room No:<?php echo " " . $data['results']->RoomNo?></td>
        </tr>
      </table>
    </div>

    <div class="rest-bill-heading">
      <p>Bill Details</p><br>
    </div>

<!-- Bill -->

    <div class="rest-bill-2">
      <table>
        <tr>
          <td style="width: 50%;">Check In</td>
          <td style="width: 50%;"><?php echo $data['results']->Checkin?></td>
        </tr>

        <tr>
          <td style="width: 50%;">Check Out</td>
          <td style="width: 50%;"><?php echo $data['results']->Checkout?></td>
        </tr>
        <?php
          $checkin = strtotime($data['results']->Checkin) / (60* 60*24);
          $checkout = strtotime($data['results']->Checkout) / (60* 60 * 24);

          $days = $checkout - $checkin;

        ?>
        <tr>
          <td style="width: 50%;">No. of Days Spent</td>
          <td style="width: 50%;"><?php echo $days?></td>
        </tr>

        <tr>
          <td style="width: 50%;">Package Type</td>
          <td style="width: 50%;"><?php echo $data['results']->PackageType?></td>
        </tr>
        <!--
        <tr>
          <td style="width: 50%;">Check In</td>
          <td style="width: 50%;">2022-03-21</td>
        </tr>
        -->
      </table>
    </div>

    <div class="rest-bill-3">
      <form action="<?php echo URLROOT ?>/reservations/roombill?resno=<?php echo $data['results']->ResNo?>&roomno=<?php echo $data['results']->RoomNo?>" method="post">
        <label for="tprice">Total Price:</label>
        <input type="text" id="tprice" name="tprice" value="<?php echo $data['results']->TotalPrice?>" readonly><br>
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount" onkeyup="getDiscount()" style="background-color:#e5e5e5" value="<?php echo $data['results']->TotalPrice?>" readonly>  %</br>
        <label for="dtprice">Discounted Total Price:</label>
        <input type="text" id="dtprice" name="dtprice" value="<?php echo $data['results']->DiscountedPrice?>" readonly><br>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" onkeyup="getBalance()" style="background-color:#e5e5e5" value="<?php echo $data['results']->Amount?>" readonly><br>
        <label for="balance">Balance:</label>
        <input type="text" id="balance" name="balance" value="<?php echo $data['results']->Balance?>" readonly><br>
      </form>
    </div>

    </div>
    </section>
    <script>
        getDiscount = function() {
            var numVal1 = Number(document.getElementById("tprice").value);
            var numVal2 = Number(document.getElementById("discount").value) / 100;
            if(!(numVal2 <= 0)){
              var totalValue = numVal1 - (numVal1 * numVal2)
              document.getElementById("dtprice").value = totalValue.toFixed(2);
            }else{
              document.getElementById("dtprice").value = '';
            }
        }

        getBalance = function(){
          var discountedTotal = Number(document.getElementById("dtprice").value);
          var amount = Number(document.getElementById("amount").value);
          if(amount >= discountedTotal){
            var balance = amount - discountedTotal;
            document.getElementById("balance").value = balance;
          }else{
            document.getElementById("balance").value = '';
          }
        }
    </script>
    
</body>
</html>
