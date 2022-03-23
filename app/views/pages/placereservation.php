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
    </nav>
    
</section>

  <!-- System Block -->

  <div class="sys-left-col">
    <div class="place-res-img">
      <a href="<?php echo URLROOT ?>/pages/">
        <img src="<?php echo URLROOT ?>/public/img/logo.png">
      </a>
    </div>
  </div>
  
  <div class="sys-right-col">
    
    <div class="recep-resform-right">

    <div class="recep-reserv-form">

      <form action="<?php echo URLROOT?>/pages/placereservation" method="post">

        <h1>Enter Your Info</h1>
        <input type="hidden" name="roomno" value="<?php echo $data['roomno']?>">
        <input type="hidden" name="checkin" value="<?php echo $data['checkin']?>">
        <input type="hidden" name="checkout" value="<?php echo $data['checkout']?>">
        <input type="hidden" name="packagetypeid" value="<?php echo $data['packagetypeid']?>">
        <input type="hidden" name="peoplecount" value="<?php echo $data['peoplecount']?>">
        <label for="cname">Customer Name: *</label>
        <input type="text" id="cname" name="cname"><br><br>

        <label for="cid">Customer ID: *</label>
        <input type="text" id="cid" name="cid"><br><br>

        <label for="cnum">Customer Mobile: *</label>
        <input type="text" id="cnum" name="cnum"><br><br>

        <select id="status" name="status" class="res-status">
          <option value="Booked" select="selected">Booked</option>
        </select><br><br>

        <label for="snotes">Special Notes:</label><br><br>
        <textarea name="snotes" id="" cols="30" rows="3"></textarea> <br><br>

        <button type="submit">Place Reservation</button><br><br>
       </form>
      </div>
    </div>

  </div>
</body>
</html>
