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
  <title>Update BOT</title>
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
      <p>Dashboard</p>
    </div>
  </div>
  <div class="sys-right-col"></div>
  <div class="sys-wrapped-col">

    <!-- Add BOT item form-->
            <div>
            <h3 class="BOT-no">Order No :</h3>
            <input type="text"  class = "reserv-no-text" hidden>
            <div>     
            <h3 class ="BOT-no">BOT No :</h3>
            <input type="text"  class = "reserv-no-text" hidden>
            </div>
            <br><br>
                <form action="#" method="POST">
                    <select id="" class="item-adding-form">
                      <option value=""> Select Snack Item </option>
                      <option value="">Bite</option>
                      <option value="">Chicken Devel</option>
                      <option value="">Pork Curry</option>
                      <option value="">Fish Devel</option>
                    </select>
                    <input class="item-adding-form" type="number" placeholder="Quantity">
                    <input class="item-adding-form" type="text" name="" id="" placeholder="Portion">
                  
                </form>
                <button type="submit" class="User-button">Add Snacks</button>
                <br><br><br><br><br><br>
                
              </div>

              <div>
              <label for="bot" class="bot-status">Status: </label>
              <select id="" class="bot-status-text" required>
                <option value="">Pending</option>
                <option value="">Ready</option>
              </select> <br><br><br>
              
              <h3 class="BOT-details">BOT Details :</h3>
            
            
            <table class="bot-table">
              <tr>
              <th>Snack</th>
              <th>Quantity</th>
              <th>Potion</th>
              </tr>
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
              </tr>
            </table><br>
          <div class="BOT-snote">
              <h4 class="special-notes">Special Notes :</h4>
              <textarea name="" id="" cols="30" rows="3"></textarea>
          </div>
                <button type="submit" class="update-bot-button">Update the BOT</button>
                <br><br><br><br><br><br>
              </div>


    </div>
</div>


</body>
</html>
