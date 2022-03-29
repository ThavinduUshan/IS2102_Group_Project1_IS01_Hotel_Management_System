<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 3){ 
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
  <title>Manage Food Items</title>
</head>
<body>
  <section class="system-single">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/cashier">
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
  <br>
  <div class="single-color-dashborad">
    <div class="rest-dash-button">
      <form action="<?php echo URLROOT ?>/users/cashier">
        <input type="submit" value="Go Back to Dashboard">
      </form>
    </div>
    <div class="rest-man-head">
      <p>Completed Orders</p>
    </div>

    <div class="rest-man-food">
      <table>
        <tr>
            <th>RestaurantBillNo</th>
            <th>RestaurantOrderNo</th>
            <th>Total Price</th>
            <th>Discount</th>
            <th>Discounted Price</th>
            <th>Amount</th>
            <th>Balance</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        <?php foreach($data['completedorders'] as $completedorders): ?>
        <tr>
            <td><?php echo $completedorders->RestaurantBillNo?></td>
            <td><?php echo $completedorders->RestaurantOrderNo?></td>
            <td><?php echo $completedorders->TotalPrice?></td>
            <td><?php echo $completedorders->Discount?></td>
            <td><?php echo $completedorders->DiscountedPrice?></td>
            <td><?php echo $completedorders->Amount?></td>
            <td><?php echo $completedorders->Balance?></td>
            <td><?php echo $completedorders->Date?></td>
            <td><?php echo $completedorders->Time?></td>
            <td><a href=""><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  </section>
</body>
</html>
