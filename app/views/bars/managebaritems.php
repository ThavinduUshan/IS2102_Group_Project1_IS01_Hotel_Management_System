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
  <title>Manage Bar Item</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/barman">
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

  <div class="sys-center-col"></div>
  <div class="sys-center-col-wrapped">
    <div class="bar-dash-button">
        <form action="<?php echo URLROOT ?>/users/barman">
          <input type="submit" value="Go Back to Dashboard">
        </form>
    </div>
    <!-- Manage Bar Items-->
            <div>
            <h2 class="manage-items-heading">Bar Items</h2><br>

            <h4 class ="item-list-name">Liqor / Beverages</h4>

            <!-- Drinks Table -->
            <table class="bar-item-table">
              <tr>
              <th>Item</th>
              <th>Category</th>
              <th>Volume</th>
              <th>Price</th>
              </tr>
              <?php foreach($data['baritems'] as $baritem): ?>
              <tr>
                <td><?php echo $baritem->itemName?></td>
                <td><?php echo $baritem->category?></td>
                <td><?php echo $baritem->volume?></td>
                <td><?php echo $baritem->price?></td>
              <th><a href="<?php echo URLROOT .'/bars/updatebaritem?barItemId='. $baritem->barItemId?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></th>
              <th><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></th>
              </tr>
              <?php endforeach; ?>
            </table><br><br><br>
            </div>

            <div>
            <h4 class ="item-list-name">Snacks</h4>

            <!-- Snack Table -->
            <table class="bar-item-table">
              <tr>
              <th>Item</th>
              <th>Category</th>
              <th>Portion</th>
              <th>Price</th>
              </tr>
              <?php foreach($data['snackitems'] as $snackitem): ?>
              <tr>
                <td><?php echo $snackitem->itemName?></td>
                <td><?php echo $snackitem->category?></td>
                <td><?php echo $snackitem->portion?></td>
                <td><?php echo $snackitem->price?></td>
              <th><a href="<?php echo URLROOT .'/bars/updatesnackitem?fooditemId='. $snackitem->fooditemId ?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></th>
              <th><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></th>
              </tr>
            <?php endforeach ?>
            </table><br><br><br><br>
            </div>

            
    </div>
</div>


</body>
</html>
