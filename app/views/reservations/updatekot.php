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
  <title>Update KOT</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/reservations/settings">Settings</a>
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
  <div class="recep-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/selectdate">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Place Reservation</p>
    </div>

    <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/receptionist">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>
  </div>
  
  <div class="sys-right-col">
    <div class="KOT-right">

    <!--Place KOT Heading -->

    <div class="KOT-Heading">
      <form action="sendkot.php">

        <div class="kot-form-head1">
          <label for="resno">Reservation No:</label>
          <input type="text" id="resno" name="resno">
        </div>

        <div class="kot-form-head2">
          <label for="roomno">Room No:</label>
          <input type="text" id="roomno" name="roomno">
        </div><br>

        <label for="kotno">KOT No:</label>
        <input type="text" id="kotno" name="kotno"><br>
      </form>
    </div>

    <div class="kot-food-add-form">
      
      <form action="add.php">

        <select id="name" name="name">
          <option value="item 1">item 1</option>
          <option value="item 2">item 2</option>
          <option value="item 3">item 3</option>
        </select><br><br>

        <input type="text" id="quantity" name="quantity" placeholder="Quantity"><br><br>

        <select id="potion" name="portion">
          <option value="Normal">Normal</option>
          <option value="large">large</option>
        </select><br><br>
      
        <input type="submit" value="Add the Food Item"><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="Available">Available</option>
          <option value="Unavailable">Unavailable</option>
        </select><br><br>

      
      </form>
    </div>

    <!-- Room KOT Details -->
    <div class="res-kot-detail-heading">       
      <h2>KOT Details</h2>
    </div>

    <!-- KOT Item Details -->
             
            <div class="res-kot-details">
            <table>
              
              <tr>
              <th style="width:30%;">Food Item</th>
              <th style="width:20%;">Quantity</th>
              <th style="width:30%;">Portion</th>
              <th style="width:10%;"></th>
              <th style="width:10%;"></th>
              </tr>
              
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
              </tr>

            </table><br><br>

            <div class="recep-kot-form">
      
            <form action="sendkot.php">
              <label for="snotes">Special Notes:</label><br>
              <textarea name="" id="" cols="30" rows="3"></textarea><br><br>
              
              <div class="res-kot-details-update-button"> 
                <a href="#roomplaceorder"><button type="submit">Update KOT</button></a>
              </div>

              <div class="res-kot-details-cancel-button"> 
                <a href="#roomplaceorder"><button type="submit">Cancel KOT</button></a>
              </div><br>

            </form>
            
            </div>
                
          </div>



  </div>
  </div>

</body>
</html>
