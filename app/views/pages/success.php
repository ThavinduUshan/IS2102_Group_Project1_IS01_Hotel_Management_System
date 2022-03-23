<?php
if(empty($_GET['resno'])){
  header('location: '. URLROOT . '/pages/');
}
?>
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
  <title>Success</title>
</head>
<body>
  <section class="roomselect">
    <nav>
      <a href="<?php echo URLROOT ?>/pages/">
        <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="nav-links" id="navLinks">
          <ul>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages">Home</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/about">About</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/facilities">Facilities</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/gallery">Gallery</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/issues">Complains</a></li>
          </ul>
        </div>
    </nav><br><br><br>

  <div class="success">
    <h1>Your Booking has been Placed!</h1>
    <h2>Reference No : <?php echo $_GET['resno']?></h2>
    <h3>For more info please contact :</h3>
    <div class="contact-col-success">
        <div>
          <i class="fa fa-globe"></i>
          <span>
              <h5>grindlayshotels.com</h5>
          </span>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <span>
              <h5>+94 372 277 555 / 0332278044</h5>
          </span>
        </div>
        <div>
          <i class="fa fa-envelope-o"></i>
          <span>
              <h5>grindlaysregencyrm@gmail.com</h5>
          </span>
        </div>
      </div>
      <br><br>
      <a href="<?php echo URLROOT?>/pages/"><p> Go Back to Home</a>
  </div>
</section>
</body>
</html>