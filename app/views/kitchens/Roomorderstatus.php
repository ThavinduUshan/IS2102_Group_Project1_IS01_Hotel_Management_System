<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 5){ 
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
  <title>Order details</title>
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
          <a href="<?php echo URLROOT?>/kitchens/settings">Settings</a>
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
  </div>
  <div class="sys-right-col">
    <h5 class="Kitchen-orderlist2">Order No :<?php echo $_GET['roomorderno']?></h5>
      
    <table class="Kitchen-table">
      <tr>
          <th>Food Item</th>
          <th>Portion</th>
          <th>Quantity</th>
          </tr>
          <?php foreach($data['orderitems'] as $orderitem): ?>
      <tr>
          <td><?php echo $orderitem->itemName?></td>
          <td><?php echo $orderitem->PortionType?></td>
          <td><?php echo $orderitem->Quantity?></td>
      </tr>
      <?php endforeach; ?>
  </table><br><br>
  <form action="<?php echo URLROOT ?>/kitchens/Roomorderstatus?roomorderno=<?php echo $_GET['roomorderno']?>" method="post">
  <label class="Kitchen-text">Status</label><br><br>
      <select id="Status" name="Status"  class="Kitchen-text2" hidden>
        <option value="" selected disabled hidden><?php echo $orderitem->Status?></option>
        <option value="Pending">Pending</option>
        <option value="Prepared">Prepared</option>
        
      </select><br>
      
 <input type="submit" value="Prepared" class ="Kitchen-button5" >
  </form>
  </div>

</body>
</html>