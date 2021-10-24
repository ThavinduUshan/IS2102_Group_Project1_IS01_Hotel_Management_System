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
  <title>Admin</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/admin">
          <img src="<?php echo URLROOT?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/admins/settings">Settings</a>
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
    <div class="admin-dashboard">
    <span class="admin-button-set">
        <button type="button" class="admin-button"><a href="<?php echo URLROOT; ?>/admins/manageusers">Manage Users</a></button>
        <button type="button" class="admin-button"><a href="<?php echo URLROOT; ?>/users/register">Add Users</a></button>
        <button type="button" class="admin-button"><a href="#">Reports</a></button>
        <button type="button" class="admin-button"><a href="<?php echo URLROOT; ?>/admins/manageissues">Issues</a></button>
    </span>
    <div class="row">
      <div class="admin-dashboard-col">
        <img src="<?php echo URLROOT;?>/public/img/sales-dashboard.png">
      </div>
      <div class="admin-dashboard-col">
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Rooms Booked</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey">16</h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Restaruant Orders</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey">245</h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Bar Orders</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey">123</h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Issues Complained</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey">8</h1>
          </div>
        </div>  
        <hr>
      </div>
    </div>
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
</body>
</html>
