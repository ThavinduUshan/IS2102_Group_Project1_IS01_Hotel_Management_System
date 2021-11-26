<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Facilities</title>
</head>
<body>

  <!--Landing-->

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
    <h1>Facilities</h1>
    <p>The Grindlays Regency achieved several awards and social media ratings in the industry</br> to be competitive in the market to gain the best in profits and customers loyalty towards the hotel.</p>
  </section>

  <section class="about">
    <div class="row">
      <div class="about-col">
        <h1>Conference Room</h1>
        <p>Sponsored Athletes and Sports Teams in their needs for Competitions
          Blood Donation Programes
          Almsgiving
          Help self-employed people around the hotel to gain an income by providing their services or offering products to the hotel.</p>
      </div>
      <div class="about-col">
        <img src="<?php echo URLROOT; ?>/public/img/conference.jpg">
      </div>
    </div>
    <div class="row">
      <div class="about-col">
        <h1>Roof Top</h1>
        <p>Giving the first priority to the people who are around the vicinity to be employed in the company being supportive to increase the employment rate in the country including the less abled.</p>
      </div>
      <div class="about-col">
        <img src="<?php echo URLROOT; ?>/public/img/rooftop.jpg">
      </div>
    </div>
    <div class="row">
      <div class="about-col">
        <h1>Garden</h1>
        <p>Trainings and lectures for the new entrant employees to the Hospitality Industry as Hotel school.
          Practical demonstrations for the students such as cookery and etiquettes in services.
          Cross Exposure programmes of the Hotel, related to service and operations for schools & Institutes.</p>
      </div>
      <div class="about-col">
        <img src="<?php echo URLROOT; ?>/public/img/garden.jpg">
      </div>
    </div>
  </section>



  <!--footer-->

  <section class="footer">
    <h4>About us</h4>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam aspernatur odit natus aut sit!</br> Nemo nobis delectus velit quibusdam, dolor aspernatur quos quaerat quas sit est illo mollitia suscipit vitae.</p>
    <div class="icons">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-linkedin"></i>
      <p>Copyright © 2020-2021 - Grindlays Regency  |  Website by Group IS01<i class="fa fa-heart-o"></i></p>
    </div>
  </section>


  <script>
    var navLinks = document.getElementById("navLinks");

    function showMenu(){
      navLinks.style.right="0"
    }
    function hideMenu(){
      navLinks.style.right="-200px"
    }
  </script>

</body>
</html>