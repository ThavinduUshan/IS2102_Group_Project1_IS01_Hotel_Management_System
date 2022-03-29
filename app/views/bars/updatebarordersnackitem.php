<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 4){ 
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
  <title>Update Order Item</title>
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
      <a href="<?php echo URLROOT ?>/users/barman">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashbaord</p>
    </div>
  </div>
  

  <div class="sys-right-col">
  <div class="recep-bill-right"><br>
 

    <div class="recep-bill-heading">
      <h1 style="color:#01661b">Update Order Item</h1>
    </div>


    <div class="recep-bill-form">
      
      <form action="" method="post">
        <div class="bill-form-left">
          <label for="fooditem">Food Item</label><br>
          <input type="text" id="foodiem" name="fooditem" value="<?php echo $data['orderitem']->itemName?>" disabled><br><br>
        </div>

        <label for="portion">Portion Type:</label><br>
          <select name="ptype" id="ptype">
            <option value="<?php echo $data['orderitem']->PortionType?>" select = "selected" ><?php echo $data['orderitem']->PortionType?></option>
            <option value="Small">Small</option>
            <option value="Regular">Regular</option>
            <option value="Large">Large</option>
          </select><br><br>

          <label for="quantity" class="recep-bill-form-l1">Quantity</label><br>
          <input type="number" id="quantity" name="quantity" value="<?php echo $data['orderitem']->Quantity?>"><br><br>

        <input type="submit" name="submit" value="Update Order Item"><br><br>
      </form>
    </div>
  </div>
  </div>
</body>
</html>
