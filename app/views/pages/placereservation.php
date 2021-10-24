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
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
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
      
      <!-- Reservation Heading -->

    <div class="recep-resform-room">
      <table>
        <tr>
          <td>Room No:</td>
        </tr>
      </table>
    </div>

    <div class="recep-reserv-form">
      
      <form action="recerve.php">

        <label for="cname">Customer Name:</label>
        <input type="text" id="cname" name="cname"><br><br>

        <label for="cid">Customer ID:</label>
        <input type="text" id="cid" name="cid"><br><br>

        <label for="cnum">Customer Mobile:</label>
        <input type="text" id="cnum" name="cnum"><br><br>

        <label for="ptype">Package Type:</label>
        <select id="ptype" name="ptype">
          <option value="" disabled selected hidden></option>
          <option value="">Type 1</option>
          <option value="">Type 2</option>
          <option value="">Type 3</option>
        </select><br><br>

        <label for="people">No of People:</label>
        <select id="people" name="people">
          <option value="" disabled selected hidden></option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
        </select><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="" disabled selected hidden></option>
          <option value="">Available</option>
          <option value="">Unavaialable</option>
        </select><br><br>

        <label for="snotes">Special Notes:</label><br><br>
        <textarea name="" id="" cols="30" rows="3"></textarea>

      </form>
    </div>
    <div class="cus-res-place-button"> 
        <a href="<?php echo URLROOT ?>/pages/"><button type="submit">Place the Reservation</button></a>
    </div>
    <br><br>
                
            </div>

  </div>

  </div>

</body>
</html>
