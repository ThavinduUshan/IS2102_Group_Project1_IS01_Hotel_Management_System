<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 6){ 
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
  <link rel="stylesheet" href="<?php echo URLROOT?>/public/css/issues.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Manage Issues</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/moderator">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/moderators/settings">Settings</a>
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
  </section>
  <!-- System Block -->
  <!-- Left Block -->
  <div class="sys-left-col">
  <div class="admin-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/moderator">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>
  </div>
  </div>
  
  <!-- Right Block -->

  <div class="sys-right-col">
    
    <div class="rest-dash-search">
      <form action="<?php echo URLROOT ?>/users/moderator" method="post">
        <input type="text" placeholder="Search Issue" name="search">
        <button type="submit"><i class="fa fa-search fa-2x"></i></button>
      </form>
    </div>

    <!-- Order Details -->

    <div class="rest-dash-order">
      <table>
        <?php foreach($data['issues'] as $issue): ?>
        <tr>
          <td ><h3>Issue No: <?php echo $issue->issuesId?></h3></td>
          <td><h3>Subject: <?php echo $issue->subject?></h3></td>
          <td><h3>Status: <?php echo $issue->status?></h3></td>
          <td><a href="<?php echo URLROOT ?>/moderators/updateissue?id=<?php echo $issue->issuesId?>" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
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
