<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>GrindLay's Regency</title>
</head>
<body>

  <!--Landing-->

  <section class="header">
      <nav class="cus-nav">
        <a href="<?php echo URLROOT; ?>/pages">
          <img src="<?php echo URLROOT ?>/public/img/logo.png">
        </a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
          <li><a href="<?php echo URLROOT; ?>/pages">Home</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/about">About</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/facilities">Facilities</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/gallery">Gallery</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
          <li><a href="<?php echo URLROOT; ?>/pages/issues">Issues</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>

    <div class="text-box">
      <h1>Relax, Unwind, Enjoy!</h1>
      <p>Grindlays Regency Hotel is a luxury hotel with the vision to be exactly what you wanted and more. <br/>
        And we understand that good service can only occur when every other element runs smoothly,<br/> and professionally from well maintained facilities to well maintained staff.</p>
      <a href="<?php echo URLROOT; ?>/pages/selectdate" class="hero-btn">Let's Reserve a Room!</a>
      </div>
  </section>


  <!--Services We Offer-->

  <section class="services">
    <h1>Our Services</h1>
    <div class="row">
      <div class="services-col">
        <img src="<?php echo URLROOT ?>/public/img/Hotel.jpg">
        <h3>The Hotel</h3>
        <p>Premier indigenous hotel with luxury rooms (Standard / Deluxe / Suite)</p>
      </div>
      <div class="services-col">
        <img src="<?php echo URLROOT ?>/public/img/Pool.jpg">
        <h3>The Pool</h3>
        <p>Leave your stress at home and take a jump to the pool and freshen your mood</p>
      </div>
      <div class="services-col">
        <img src="<?php echo URLROOT ?>/public/img/Airport.jpg">
        <h3>PickUps & Drops</h3>
        <p>Providing Airport drops & pickup to the guest. Drivers’ accommodation if needed</p>
      </div>
    </div>
  </section>

    <!--testomonials-->

    <section class="testimonials">
      <h1>What Our Customers Say</h1>
      <div class="row">
        <div class="testimonial-col">
          <img src="<?php echo URLROOT ?>/public/img/User1.jpg">
          <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi sapiente reprehenderit voluptates quasi molestiae hic aperiam nemo recusandae? Quod, adipisci voluptas! Beatae ab facere laboriosam unde aliquid quas dolore?</p>
            <h3>Thavindu Ushan</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
        <div class="testimonial-col">
          <img src="<?php echo URLROOT ?>/public/img/User1.jpg">
          <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi sapiente reprehenderit voluptates quasi molestiae hic aperiam nemo recusandae? Quod, adipisci voluptas! Beatae ab facere laboriosam unde aliquid quas dolore?</p>
            <h3>Sethiya Nisal</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
        <div class="testimonial-col">
          <img src="<?php echo URLROOT ?>/public/img/User1.jpg">
          <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi sapiente reprehenderit voluptates quasi molestiae hic aperiam nemo recusandae? Quod, adipisci voluptas! Beatae ab facere laboriosam unde aliquid quas dolore?</p>
            <h3>Sethiya Nisal</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
        <div class="testimonial-col">
          <img src="<?php echo URLROOT ?>/public/img/User1.jpg">
          <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi sapiente reprehenderit voluptates quasi molestiae hic aperiam nemo recusandae? Quod, adipisci voluptas! Beatae ab facere laboriosam unde aliquid quas dolore?</p>
            <h3>Sethiya Nisal</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
    </div>
    </section>

  <!--Places to visit-->

  <section class="places">
    <h1>Places to Visit</h1>
    <div class="row">
      <div class="places-col">
        <img src="<?php echo URLROOT ?>/public/img/Thunodola.jpg">
        <div class="layer">
          <h3>Thundola</h3>
        </div>
      </div>
      <div class="places-col">
        <img src="<?php echo URLROOT ?>/public/img/ranagala.jpeg">
        <div class="layer">
          <h3>Thundola</h3>
        </div>
      </div>
      <div class="places-col">
        <img src="<?php echo URLROOT ?>/public/img/Pinnawala.jpg">
        <div class="layer">
          <h3>Thundola</h3>
        </div>
      </div>
      <div class="places-col">
        <img src="<?php echo URLROOT ?>/public/img/bambaragala.jpg">
        <div class="layer">
          <h3>Thundola</h3>
        </div>
      </div>
      <div class="places-col">
        <img src="<?php echo URLROOT ?>/public/img/Mahamevnawa.jpg">
        <div class="layer">
          <h3>Thundola</h3>
        </div>
      </div>
    </div>
  </section>

  <!--Facilities-->

  <section class="facilities">
    <h1>Facilities We Provide</h1>
    <div class="row">
      <div class="facilities-col">
        <img src="<?php echo URLROOT ?>/public/img/conference.jpg">
        <h3>Conference Room</h3>
        <p>Premier indigenous hotel with luxury rooms (Standard / Deluxe / Suite)</p>
      </div>
      <div class="facilities-col">
        <img src="<?php echo URLROOT ?>/public/img/rooftop.jpg">
        <h3>Roof Top</h3>
        <p>Leave your stress at home and take a jump to the pool and freshen your mood</p>
      </div>
      <div class="facilities-col">
        <img src="<?php echo URLROOT ?>/public/img/garden.jpg">
        <h3>Garden</h3>
        <p>Providing Airport drops & pickup to the guest. Drivers’ accommodation if needed</p>
      </div>
    </div>
  </section>

  <!--call to action-->

  <section class="cta">
    <h1>A luxurious Hotel for a Budget Price</h1>
    <a href="#" class="hero-btn">Reserve a Room</a>
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