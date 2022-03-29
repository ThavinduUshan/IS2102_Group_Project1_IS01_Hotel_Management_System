<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 2){ 
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
  <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Receptionist</title>
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
  <!-- Left Block -->
  <div class="sys-left-col">

  <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/receptionist">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>

    <div class="recep-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/selectdate">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Place Reservation</p>
    </div>
    <div class="reservation-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/completedreservations">
        <i class="fa fa-list-alt fa-4x" aria-hidden="true"></i>
      </a>
      <p>Completed<br> Reservations</p>
    </div>
  </div>
  
  <!-- Right Block -->

  <div class="sys-right-col">
    
    <div class="recep-dash-search">
      <form action="<?php echo URLROOT ?>/users/receptionist" method="post">
        <input type="text" placeholder="Search Reservation" name="search">
        <button type="submit"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
      </form>
      <?php if(isset($_GET['status'])){?>
        <?php if($_GET['status'] == "resplaced"){?>
        <h3 class="success-stat"><?php echo "Reservation Placed!"?></h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "updated"){?>
        <h3 class="success-stat"><?php echo "Reservation Updated!"?></h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "completed"){?>
        <h3 class="success-stat"><?php echo "Reservation Completed!"?></h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "orderitemupdated"){?>
        <h3 class="success-stat"><?php echo "Order item Updated!"?></h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "rescanceled"){?>
        <h3 class="error"><?php echo "Reservation Cancelled"?></h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "orderitemdeleted"){?>
        <h3 class="error"><?php echo "Order Item Deleted"?></h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "orderdeleted"){?>
          <h3 class="error">Reservation Deleted!</h3>
        <?php
        }
        ?>
        <?php if($_GET['status'] == "orderdeleted"){?>
          <h3 class="error">Reservation Deleted!</h3>
        <?php
        }
        ?>
        <?php
        }
        ?>
      <?php if(!empty($data['searchError'])){?>
      <h3 class="error"><?php echo $data['searchError']?></h3>
      <?php
      }
      ?>
    </div>

    
        
    <!-- Order Details -->

    <div class="recep-dash-order">
      <table cellspacing="0" cellpadding="0">
      <?php
      if(!empty($data['reservations'])){?>
        <?php foreach($data['reservations'] as $res): ?>
        <tr>
          <td style="width: 40%;"><b>Reservation No</b>:<?php echo "  " . $res->ResNo?></br>Customer name: <?php echo "  " .$res->CusName?></td>
          <td style="width: 40%;">Status:<?php echo "  " .$res->Status?><br>Room No:<?php echo "  " .$res->RoomNo?></td>
          <td style="width: 10%;"><a href="<?php echo URLROOT ?>/reservations/updatereservation?resno=<?php echo $res->ResNo?>&roomno=<?php echo $res->RoomNo?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
        </tr>
      <?php endforeach; ?>
      </table>
      <?php
      }else
      {?>
        <h3 class="error"><?php echo $data['resultsEmpty']?></h3>
      <?php
      }
      ?>
    </div>

  </div>

</body>
</html>
