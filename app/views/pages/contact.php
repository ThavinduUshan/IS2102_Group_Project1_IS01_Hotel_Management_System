<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Contact Us</title>
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
          <li><a href="<?php echo URLROOT; ?>/pages/issues">Issues</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <h1>Contact Us</h1>
    <p>The Grindlays Regency achieved several awards and social media ratings in the industry</br> to be competitive in the market to gain the best in profits and customers loyalty towards the hotel.</p>
  </section>

  <!--location-->

  <Section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15830.25281551804!2d80.2442619!3d7.2904342!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8edd189ca72a072!2sGrindlays%20Regency!5e0!3m2!1sen!2slk!4v1631827475125!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </Section>

  <!--contact us-->

  <section class="contact">
    <div class="row">
      <div class="contact-col">
        <div>
          <i class="fa fa-home"></i>
          <span>
              <h5>Ranwala Rd, Alawwatha, Alawwa 60280, Sri Lanka</h5>
          </span>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <span>
              <h5>+94 372 277 555</h5>
              <h5>+94 713 409 409</h5>
              <h5>+94 713 366 409</h5>
          </span>
        </div>
        <div>
          <i class="fa fa-envelope-o"></i>
          <span>
              <h5>grindlaysregencyrm@gmail.com</h5>
              <h5>grindlaysregency@gmail.com</h5>
          </span>
        </div>
      </div>
      <div class="contact-col">
        <form action="">
          <input type="text" placeholder="Enter Your Name" required>
          <input type="text" placeholder="Enter Your Email Address" required>
          <input type="text" placeholder="Enter Your Subject" required>
          <textarea rows="8" placeholder="Enter Your Message" requried></textarea>
          <button type="submit" class="hero-btn">Send Message</button>
        </form>
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