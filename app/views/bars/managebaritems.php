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
  <title>Manage Bar Item</title>
</head>
<body>
  <section class="system-single">
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
  <br>
  <div class="single-color-dashborad">
    <div class="admin-dash-button">
        <form action="<?php echo URLROOT ?>/users/barman">
          <a href="<?php echo URLROOT ?>/bars/addbaritem">Add Bar Item</a>
          <a href="<?php echo URLROOT ?>/users/barman">Go Back to Dashboard</a>
        </form>
    </div>
    <div class="rest-man-head">
      <p>Bar Item List</p>
    </div>

    <div class="rest-man-food">
      <table>
        <tr>
          <th style="width: 25%;">Bar Item</th>
          <th style="width: 25%;">Category</th>
          <th style="width: 20%;">Volume</th>
          <th style="width: 20%;">Price</th>
          <th style="width: 5%;"></th>
          <th style="width: 5%;"></th>
        </tr>
        <?php foreach($data['baritems'] as $baritem): ?>
        <tr>
          <td style="width: 25%;"><?php echo $baritem->itemName?></td>
          <td style="width: 25%;"><?php echo $baritem->category?></td>
          <td style="width: 20%;"><?php echo $baritem->volume?></td>
          <td style="width: 20%;"><?php echo $baritem->price?></td>
          <td><a href="<?php echo URLROOT .'/bars/updatebaritem?barItemId='. $baritem->barItemId?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
          <td><form action="<?php echo URLROOT .'/bars/deleteitem?itemid='. $baritem->barItemId ?>"method="POST"><button type="submit"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></button></form></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <br><br><br>
    </div>
    <div class="rest-man-head">
      <p>Snack Item List</p>
    </div>

    <div class="rest-man-food">
      <table>
        <tr>
          <th style="width: 25%;">Food Item</th>
          <th style="width: 25%;">Food Category</th>
          <th style="width: 20%;">Portion</th>
          <th style="width: 20%;">Price</th>
          <th style="width: 5%;"></th>
          <th style="width: 5%;"></th>
        </tr>
        <?php foreach($data['snackitems'] as $snackitem): ?>
        <tr>
          <td style="width: 25%;"><?php echo $snackitem->itemName?></td>
          <td style="width: 25%;"><?php echo $snackitem->category?></td>
          <td style="width: 20%;"><?php echo $snackitem->portion?></td>
          <td style="width: 20%;"><?php echo $snackitem->price?></td>
          <td style="width: 5%;"><a href="<?php echo URLROOT .'/restaurants/updatesnackitem?itemName='. $snackitem->itemName . '&portion='.$snackitem->portion ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
          <td><form action="<?php echo URLROOT .'/bars/deletesnack?itemid='. $snackitem->fooditemId ?>"method="POST"><button type="submit"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></button></form></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <br><br><br>
    </div>
    </section>

</body>
</html>
