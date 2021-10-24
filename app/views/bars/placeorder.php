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
  <title>Place Order</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/barman">
          <img src="<?php echo URLROOT?>/public/img/logo-nav.jpg">
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
      <a href="<?php echo URLROOT ?>/users/barman">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>

    <div class="bar-dash-plus2">
      <a href="<?php echo URLROOT ?>/bars/managebaritems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View Bar Items</p>
    </div>

    <div class="bar-dash-plus3">
      <a href="<?php echo URLROOT ?>/bars/addbaritem">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Add Bar Items</p>
    </div>

  </div>
  <div class="sys-right-col"></div>
  <div class="sys-wrapped-col">

    <!-- Add Bar item -->
    <div>
                  
      <h3 class="bar-add">Table No :</h3>
      <input type="text"  class = "bot-form-text" required>  
      <br>
      <form action="#" method="POST">
        <select id="" class="add-item-form">
          <option value=""> Select an Item </option>
          <option value="">Arrack</option>
          <option value="">Wiskey</option>
          <option value="">Sprite</option>
          <option value="">Coca Cola</option>
        </select>
        <input class="add-item-form" type="number" placeholder="Quantity">
        <input class="add-item-form" type="text" name="" id="" placeholder="Portion">
                  
        </form><br>
        <button type="submit" class="add-item">Add item</button>
        </div>

<!-- Bar Item Details -->
              <div>
              <h2 class="bar-item-details">Bar Item Details</h2>
              <br>
            
            <table class="item-details-table">
              <tr>
              <th>Item no</th>
              <th>Potion</th>
              <th>Quantity</th>
              <th>Status</th>
              </tr>
              <tr>
              <td></td>
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
                <td></td>
                <td><a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
                <td><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
              </tr>
            </table>
            <br><br><br>
                
            </div>

            <!-- Room KOT Details -->
            <div class="bar-bot-detail-heading">       
              <h2>BOT Details</h2>
              <a href="<?php echo URLROOT ?>/bars/placebot"><button type="submit">Place BOT</button></a>
            </div>

            <!-- KOT Item Details -->
             
            <div class="bar-bot-details">
            <table>
              
              <tr>
              <th style="width:20%;">BOT No</th>
              <th style="width:20%;">Time</th>
              <th style="width:40%;">Status</th>
              <th style="width:10%;"></th>
              <th style="width:10%;"></th>
              </tr>
              
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>

              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>

              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>

            </table><br><br>

            <div class="bar-bot-details-place-button"> 
              <a href="#roomplaceorder"><button type="submit">Place the Order</button></a>
            </div>
            <br><br>
                
            </div>


    </div>
</div>


</body>
</html>
