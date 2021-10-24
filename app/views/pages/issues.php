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
  <title>Complains</title>
</head>
<body>

  <!--Landing-->

  <section class="sub-header" >
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
    <h1>Submit Your Complain</h1>
    <p>You can submit your valuable feedback and complains from here.</p>
  </section>


  <!--Issues-->

  <section class="issues">
      <div class="issues-col">
        <form name="issues" action="<?php echo URLROOT ?>/pages/issues" method="post">
          <input type="text" name="cusName" placeholder="Enter Your Name" required >
          <input type="text" name="cusEmail" placeholder="Enter Your Email Address" required >
          <input type="text" name="subject" placeholder="Enter the Subject of the Complain" required>
          <textarea rows="8" name="description" placeholder="Describe the Complain" requried></textarea>
          <input type="text" name="status" value="Pending" hidden>
          <button type="submit" name="submit" class="hero-btn">Send Message</button>
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