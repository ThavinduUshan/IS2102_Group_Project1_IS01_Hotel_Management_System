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
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Popular Rooms</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/admin">
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

  <div class="report-dashboard">
    <div class="admin-dash-button">
      <form action="<?php echo URLROOT ?>/users/admin">
        <button onclick="window.print()">Download PDF</button>
      </form> 
    </div>
    <div class="rest-man-head">
      <p>Rooms List</p>
    </div>

    <div class="rest-man-food">
      <table>
        <tr>
        <th style="width: 10%;">Item Id</th>
          <th style="width: 40%;">Snack Item</th>
          <th style="width: 50%;">No of Times Ordered</th>
        </tr>
        <?php foreach($data['results'] as $result) : ?>
        <tr>
          <td style="width: 40%;"><?php echo $result->fooditemId?></td>
          <td style="width: 40%;"><?php echo $result->itemName?></td>
          <td style="width: 50%;"><?php echo $result->NoOfCounts?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  </section>
</body>
</html>
