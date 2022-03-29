<?php if (!isset($_SESSION['UserID']) || $_SESSION["UserTypeID"] != 1){ 
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
  <link rel="stylesheet" href="<?php echo URLROOT?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>

  <script>
    function yesnoCheck(that) {
    if (that.value == "1") {
        document.getElementById("yearPicker").style.display = "block";
    } else {
        document.getElementById("yearPicker").style.display = "none";
    }
    if (that.value == "2") {
        document.getElementById("month").style.display = "block";
    } else {
        document.getElementById("month").style.display = "none";
    }
    if (that.value == "3") {
        document.getElementById("days").style.display = "block";
    } else {
        document.getElementById("days").style.display = "none";
    }
  }
  </script>
  <title>Reports</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/admin">
          <img src="<?php echo URLROOT?>/public/img/logo-nav.jpg">
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
    </nav><br>

    <div class="change-package">
    <h1>Generate Report</h1>
    <form name="reportgenerate" method="post" action="<?php echo URLROOT; ?>/admins/complainreports">
    <label for="sort">Sort By: </label>
      <select name="sort" id="sort" onchange="yesnoCheck(this)">
        <option value="0">--Select an Option--</option>
        <option value="1">Year</option>
        <option value="2">Month</option>
        <option value="3">Days</option>
      </select>

      <select name="yearselect" id="yearPicker" style="display:none">
        <?php
        $thisyear = date("Y");
        for($i=0;$i<15;$i++){
          $previousyear = $thisyear - $i;?>
          <option value="<?php echo $previousyear ?>"><?php echo $previousyear ?></option>
        <?php }?>
      </select>
      <input type="month" name="monthselect" id="month" style="display:none">
      <input type="date" name="day" id="days" style="display:none">

      <label for="reporttype">Report Type: </label>
      <select name="reporttype" id="reporttype">
        <option value="1">Issues Complained</option>
      </select>
      <label for="orderby">Order By: </label>
      <select name="orderby" id="orderby">
        <option value="0">Ascending</option>
        <option value="1">Descending</option>
      </select>
      <button type="submit">Generate Report</button><br><br>
    </form>
  </div>
</section>
</body>
</html>