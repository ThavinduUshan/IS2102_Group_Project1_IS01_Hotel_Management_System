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
  <title>Place Reservation</title>
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
  </div>
  
  <div class="sys-right-col">
    
    <div class="recep-resform-right">
      
      <!-- Reservation Heading -->

    <div class="recep-resform-room">
      <h3>Room No:</h3>
    </div>

    <div class="recep-reserv-form">
      
      <form action="recerve.php">

        <label for="cname">Customer Name:</label>
        <input type="text" id="cname" name="cname"><br><br>

        <label for="cid">Customer ID:</label>
        <input type="text" id="cid" name="cid"><br><br>

        <label for="cnum">Customer Mobile:</label>
        <input type="text" id="cnum" name="cnum"><br><br>

        <label for="ptype">Package Type:</label>
        <select id="ptype" name="ptype">
          <option value="" disabled selected hidden></option>
          <option value="">Type 1</option>
          <option value="">Type 2</option>
          <option value="">Type 3</option>
        </select><br><br>

        <label for="people">No of People:</label>
        <select id="people" name="people">
          <option value="" disabled selected hidden></option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
        </select><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="" disabled selected hidden></option>
          <option value="">Available</option>
          <option value="">Unavaialable</option>
        </select><br><br>

        <label for="snotes">Special Notes:</label><br><br>
        <textarea name="" id="" cols="30" rows="3"></textarea>

      </form>
    </div>


    <!-- Room KOT Details -->
    <div class="res-kot-detail-heading">       
      <h2>KOT Details</h2>
      <a href="<?php echo URLROOT ?>/reservations/placekot"><button type="submit">Place KOT</button></a>
    </div>

    <!-- KOT Item Details -->
             
    <div class="res-kot-details">
      <table>
              
        <tr>
          <th style="width:10%;">KOT no</th>
          <th style="width:15%;">Date</th>
          <th style="width:15%;">Meal Type</th>
          <th style="width:10%;">Quantity</th>
          <th style="width:20%;">Status</th>
          <th style="width:10%;"></th>
          <th style="width:10%;"></th>
              </tr>
              
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="<?php echo URLROOT ?>/reservations/updatekot"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="<?php echo URLROOT ?>/reservations/updatekot"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="<?php echo URLROOT ?>/reservations/updatekot"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>

            </table><br><br>

            <div class="res-kot-details-place-button"> 
              <a href="#roomplaceorder"><button type="submit">Place the Reservation</button></a>
            </div>
            <br><br>
                
            </div>

  </div>

  </div>

</body>
</html>
