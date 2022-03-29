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
  <title>Completed Reservations</title>
</head>
<body>
  <section class="system-single">
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
  <div class="single-color-dashborad">
    <div class="rest-dash-button">
      <form action="<?php echo URLROOT ?>/users/receptionist">
        <input type="submit" value="Go Back to Dashboard">
      </form>
        
    </div>
    <div class="rest-man-head">
      <p>Completed Reservations</p>
    </div><br>

    <div class="rest-man-food">
      <table>
        <tr>
          <th>Bill No.</th>
          <th>ResNo</th>
          <th>Customer Name</th>
          <th>Customer Mobile</th>
          <th>Total Price</th>
          <th>Discount</th>
          <th>Discounted Price</th>
          <th>Amount</th>
          <th>Balance</th>
          <th>Date</th>
          <th>Time</th>
          <th ></th>
        </tr>
        <?php foreach($data['results'] as $item) :?>
        <tr>
         
            <td><?php echo $item->RoomBillNo?></td>
            <td><?php echo $item->ResNo?></td>
            <td><?php echo $item->CusName?></td>
            <td><?php echo $item->CusMobile?></td>
            <td><?php echo $item->TotalPrice?></td>
            <td><?php echo $item->Discount?></td>
            <td><?php echo $item->DiscountedPrice?></td>
            <td><?php echo $item->Amount?></td>
            <td><?php echo $item->Balance?></td>
            <td><?php echo $item->Date?></td>
            <td><?php echo $item->Time?></td>
            <td style="width: 5%;"><a href="<?php echo URLROOT .'/reservations/viewbill?billno='. $item->RoomBillNo ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
        </tr>
        <?php endforeach;?>
      </table>
      <br><br><br>
    </div>
  </div>
  </section>
</body>
</html>
