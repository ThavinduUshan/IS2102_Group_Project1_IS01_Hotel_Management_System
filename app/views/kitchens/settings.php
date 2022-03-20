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
  <title>Update User settings</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/headchef">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/kitchens/settings">Settings</a>
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

  <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/headchef">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashborad</p>
    </div>

    <div class="bar-dash-plus2">
      <a href="<?php echo URLROOT ?>/kitchens/managefooditems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View food Items</p>
    </div>

    <div class="bar-dash-plus3">
      <a href="<?php echo URLROOT ?>/kitchens/addsnackitem">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Add Snack Item</p>
    </div>
  </div>
  <div class="sys-right-col">

  <div class="right">
    <h5 class ="User-heading">Update Your Settings</h5><br>
    <h5 class ="User-subheading">User Details</h5>
    <hr class="User-hr">

    <div class = "User-detailset">
      <label class="User-detailset-labels">Name :</label>
      <input type="text"  class = "User-detailset-spaces1" placeholder="first name" > <input type="text"  class = "User-detailset-spaces" placeholder="last name" > <br>
      <label class="User-detailset-labels">Email :</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text"  class = "User-detailset-spaces2" ><br>
      <label class="User-detailset-labels">Mobile Phone :</label>
      <input type="text"  class = "User-detailset-spaces2" ><br>
      <label class="User-detailset-labels">Land Phone :</label>&nbsp;&nbsp;&nbsp;
      <input type="text"  class = "User-detailset-spaces2" ><br>
      <label class="User-detailset-labels">Date of Birth :</label>
      <input type="text"  class = "User-detailset-spaces3" ><i class="fa fa-calendar" aria-hidden="true"></i><br>
      <label class="User-detailset-labels">Address :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text"  class = "User-detailset-spaces2" ><br>
    </div><br><br>

    <h5 class ="User-subheading">Account Details</h5>
  <hr class="User-hr">

  <div class = "User-detailset2">
    <label class="User-detailset-labels">User Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text"  class = "User-detailset-spaces" > <br>
    <label class="User-detailset-labels">Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text"  class = "User-detailset-spaces" ><br>
    <label class="User-detailset-labels">New Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text"  class = "User-detailset-spaces" ><br>
    <label class="User-detailset-labels">Re enter New Password:</label>
    <input type="text"  class = "User-detailset-spaces" ><br>
    <button type="submit" class="User-button" name='update'>Update Details</button>
  </div><br><br>
  </div>

  </div>

</body>
</html>
