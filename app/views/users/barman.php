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
  <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Barman</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo APPROOT ?>/views/users/login.php">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/bars/settings">Settings</a>
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
  <!-- Left Block -->
  <div class="sys-left-col">
    <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/bars/placeorder">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Place Order</p>
    </div>

    <div class="bar-dash-plus2">
      <a href="<?php echo URLROOT ?>/bars/managebaritems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View Bar Items</p>
    </div>

    <div class="bar-dash-plus3">
      <a href="<?php echo URLROOT ?>/bars/addbaritem">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Add Bar Items</p>
    </div>

  </div>
  
  <!-- Right Block -->

  <div class="sys-right-col">
    
    <div class="bar-dash-search">
      <form action="/action_page.php">
        <input type="text" placeholder="Search Order" name="search">
        <button type="submit"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
      </form>
    </div>

    <!-- Order Details -->

    <div class="bar-dash-order">
      <table cellspacing="0" cellpadding="0">
      <?php foreach($data['barorderdetails'] as $barorderdetails): ?>
        <tr>
          <td class="col1" style="width: 40%;">Order No:<?php echo $barorderdetails->BarOrderNo; ?></br>Table No:<?php echo $barorderdetails->TableNo; ?></td>
          <td class="col2" style="width: 40%;">Status:<?php echo $barorderdetails->Status; ?></td>
          <td class="col3" style="width: 10%;"><a href="<?php echo URLROOT ?>/bars/updateorder"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
        </tr>
        <?php endforeach; ?>  
      </table>
    </div>

  </div>

</body>
</html>
