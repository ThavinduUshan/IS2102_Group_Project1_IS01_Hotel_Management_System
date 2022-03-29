<?php if (!isset($_SESSION['UserID']) || $_SESSION["UserTypeID"] != 2){ 
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
  <title>Update Reservation</title>
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
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
  </section>

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

    <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/completedreservations">
        <i class="fa fa-list-alt fa-4x" aria-hidden="true"></i>
      </a>
      <p>Completed<br> Reservations</p>
    </div>
  </div>
  
  <div class="sys-right-col">
    
    <div class="recep-resform-right">
      
      <!-- Reservation Heading -->

    <div class="recep-resform-room">
      <h3>Room No:<?php echo " " . $_GET['roomno']?></h3>
    </div>

    <div class="recep-reserv-form">
      
      <form action="<?php echo URLROOT ?>/reservations/updatereservation?resno=<?php echo $data['resno']?>&roomno=<?php echo $data['roomno']?>" method="post">

        <label for="cname">Customer Name:</label>
        <input type="text" id="cname" name="cname" value="<?php echo $data['resdetail']->CusName?>"><br><br>
        <?php if(!empty($data['CusNameError'])){?>
          <h3 class="error"><?php echo $data['cusNameError']?></h3>
        <?php
        }
        ?>

        <label for="cid">Customer ID:</label>
        <input type="text" id="cid" name="cid" value="<?php echo $data['resdetail']->CusId?>"><br><br>
        <?php if(!empty($data['CusNameError'])){?>
          <h3 class="error"><?php echo $data['cusIdError']?></h3>
        <?php
        }
        ?>

        <label for="cnum">Customer Mobile:</label>
        <input type="text" id="cnum" name="cnum" value="<?php echo $data['resdetail']->CusMobile?>"><br><br>
        <?php if(!empty($data['CusNameError'])){?>
          <h3 class="error"><?php echo $data['cusMobileError']?></h3>
        <?php
        }
        ?>

        <!--
        <label for="ptype">Package Type:</label>
        <select id="ptype" name="ptype">
          <option value="" disabled selected hidden></option>
          <option value="1">Bed Only</option>
          <option value="2">Bed & Breakfast</option>
          <option value="3">Half Borad</option>
          <option value="4">Full Board</option>
        </select><br><br>-->

        <label for="cnum">Package Type:</label>
        <input type="text" id="ptype" name="ptype" value="<?php echo $data['resdetail']->PackageType?>" readonly><br><br>
        
        <label for="status">Status:</label>
        <select id="status" name="status" readonly>
          <option value="Booked" select="Selected">Booked</option>
        </select><br><br>

        <label for="snotes">Special Notes:</label><br><br>
        <textarea name="snotes" id="snotes" cols="30" rows="3"><?php echo $data['resdetail']->SpecialNotes?></textarea><br><br><br>

        <div class="res-kot-details-update-button"> 
              <button type="submit">Update Reservation</button>
        </div>
      </form>
    </div>
    <br><br><br>

    <!-- Room KOT Details -->
    <div class="res-kot-detail-heading">       
      <h2>Room Order Details</h2>
      <a href="<?php echo URLROOT ?>/reservations/placekot?resno=<?php echo $data['resno']?>&roomno=<?php echo $data['roomno']?>"><button type="submit">Place KOT</button></a>
    </div>

    <!-- KOT Item Details -->
             
            <div class="res-kot-details">
            <table>
              
              <tr>
              <th style="width:15%;">OrderNo</th>
              <th style="width:15%;">Date</th>
              <th style="width:15%;">Time</th>
              <th style="width:20%;">Status</th>
              <th style="width:10%;"></th>
              <th style="width:10%;"></th>
              </tr>
              <?php foreach($data['kotdetails'] as $kotdetail): ?>
              <tr>
              <td><?php echo $kotdetail->RoomOrderNo ?></td>
              <td><?php echo $kotdetail->Date ?></td>
              <td><?php echo $kotdetail->Time ?></td>
              <td><?php echo $kotdetail->Status ?></td>
              <td><a href="<?php echo URLROOT ?>/reservations/updatekot?resno=<?php echo $data['resno']?>&roomno=<?php echo $data['roomno']?>&roomorderno=<?php echo $kotdetail->RoomOrderNo ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="<?php echo URLROOT ?>/reservations/deletekot?roomorderno=<?php echo $kotdetail->RoomOrderNo ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>
              <?php endforeach; ?>

            </table><br><br>

            <div class="res-kot-details-cancel-button"> 
              <a href="<?php echo URLROOT?>/reservations/cancelreservation?resno=<?php echo $data['resno']?>"><button type="submit">Cancel Reservation</button></a>
            </div><br>

            <div class="res-kot-details-close-button"> 
              <a href="<?php echo URLROOT ?>/reservations/roombill?resno=<?php echo $data['resno']?>&roomno=<?php echo $data['roomno']?>"><button type="submit">Close Reservation</button></a>
            </div>
            <br><br>
                
            </div>

  </div>

  </div>
  <script type="text/javascript">

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
