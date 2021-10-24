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
  <title>Add Snack Item</title>
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
  
  <div class="sys-right-col">
    
    <div class="rest-add-food">
      <p>Item Details:</p>
    </div>

    <div class="rest-add-food-form">
      
      <form action="<?php echo URLROOT ?>/kitchens/addsnackitem" name="add-food-item-form" method="post">
        <label for="itemname">Item Name:</label><br>
        <input type="text" id="itemname" name="itemName" placeholder="Enter the Name"><br>
        <span class="error">
            <p><?php echo $data['itemNameError'];?></p>
        </span>

        <label for="category">Food Category:</label><br>
        <select id="category" name="category">
          <option value="Starter" disabled>Starter</option>
          <option value="Soup" disabled>Soup</option>
          <option value="Dish" disabled>Dish</option>
          <option value="Dessert" disabled>Dessert</option>
          <option value="Beverage" disabled>Beverage</option>
          <option value="Bar Snack" select="selected">Bar Snack</option>
        </select><br>

        <label for="portion">Portion:</label><br>
        <select id="portion" name="portion">
          <option value="Small">Small</option>
          <option value="Regular">Regular</option>
          <option value="Large">Large</option>
        </select><br>

        <label for="status">Availability</label><br>
        <select id="status" name="status">
            <option value="Available" selected="selected">Available</option>
            <option value="Unavailable">Unavailable</option>
          </select><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" placeholder="Price">
        <span class="error">
            <p><?php echo $data['priceError'];?></p>
        </span>
        <br><br>
        <input type="submit" name="submit" value="Add Item">
      </form>
    </div>

  </div>

</body>
</html>
