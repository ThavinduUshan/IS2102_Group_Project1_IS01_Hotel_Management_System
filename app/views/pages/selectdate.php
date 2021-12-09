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
  <title>Select Date</title>
</head>
<body>
  <section class="login">
    <nav>
      <a href="<?php echo APPROOT ?>/views/users/login.php">
        <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
    </nav>

  <div class="select-date">
    <h1>Select the Dates</h1>
    <form name="selectdate" method="post" action="<?php echo URLROOT; ?>/pages/roomselect">
      <label for="check-in">Check In: *</label>
      <input type="date" name="check-in" id="checkin" placeholder="CheckIn Date" required>
      <label for="check-out">Check Out: *</label>
      <input type="date" name="check-out" id="checkout" placeholder="CheckOut Date" required>
      <label for="npeople">No. of People: *</label>
      <select name="people" id="npeople">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value=">3">More than 3</option>
      </select>
      <button type="submit">Check availabity</button>
    </form>
  </div>
</section>
</body>
</html>