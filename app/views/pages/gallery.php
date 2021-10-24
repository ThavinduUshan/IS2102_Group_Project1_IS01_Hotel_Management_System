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
  <title>Gallery</title>
</head>
<body>
<section class="sub-header">
    <nav class="cus-nav">
      <a href="<?php echo URLROOT; ?>/pages">
        <img src="<?php echo URLROOT; ?>/public/img/logo.png">
      </a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="<?php echo URLROOT; ?>/pages">Home</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/about">About</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/facilities">Facilities</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/gallery">Gallery</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/issues">Complains</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <h1>Gallery</h1>
    <p>Here You can enjoy some beautiful photographs of Our hotel.</p>
  </section>
  <section class="gallery">
    <div class="gallery-box">
      
      <div class="gallery-col">
        <img src="<?php echo URLROOT ?>/public/img/gallery/1.jpg">
        <img src="<?php echo URLROOT ?>/public/img/gallery/2.jpg">
        <img src="<?php echo URLROOT ?>/public/img/gallery/3.jpg">
        <img src="<?php echo URLROOT ?>/public/img/gallery/4.jpg">
        <img src="<?php echo URLROOT ?>/public/img/gallery/5.jpg">
            
      </div>
      <div class="gallery-col">
          <img src="<?php echo URLROOT ?>/public/img/gallery/6.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/7.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/8.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/9.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/10.jpg">
            
      </div>
        <div class="gallery-col">
          <img src="<?php echo URLROOT ?>/public/img/gallery/11.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/12.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/13.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/14.jpg">
          <img src="<?php echo URLROOT ?>/public/img/gallery/15.jpg">     
      </div>
      </div>
  </section>
  </body>
</html>