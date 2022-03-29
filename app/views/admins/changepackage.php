<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 1){ 
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
  <title>Change Package</title>
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
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>

    <div class="reportmgt-dash-button">
      <a href="<?php echo URLROOT ?>/users/admin">Go Back to Dashboard</a>
        
    </div>

    <div class="change-package">
    <h1>Package Change</h1>
    <form name="packagechange" method="post" action="<?php echo URLROOT; ?>/admins/changepackage">
      <label for="roomno">Room No:</label>
      <select name="roomno" id="roomno">
        <option value="1">Room 1</option>
        <option value="2">Room 2</option>
        <option value="3">Room 3</option>
        <option value="4">Room 4</option>
        <option value="5">Room 5</option>
        <option value="6">Room 6</option>
        <option value="7">Room 7</option>
        <option value="8">Room 8</option>
      </select>
      <label for="packagetype">Package Type: </label>
      <select name="packagetype" id="packagetype">
        <option value="1">Room Only</option>
        <option value="2">Bed and Breakfast</option>
        <option value="3">Half Board</option>
        <option value="4">Full Board</option>
      </select>
      <label for="price">New Price: </label>
      <input type="text" name="price" id="price" placeholder="Enter new price here">
      <div class="error">
        <?php echo $data['priceError']; ?>
      </div>
      <button type="submit">Change Package</button>
    </form>
  </div>
</section>
</body>
</html>