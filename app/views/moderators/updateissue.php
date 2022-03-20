<?php if (!isset($_SESSION['UserID'])){ 
      header('location: ' . URLROOT .  '/users/login');
}?>
<?php
  var_dump($data);
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
  <title>Update Issue</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/moderator">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/moderators/settings">Settings</a>
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
  </section>
  <script>
    function dropdown() {
      var x = document.getElementById("sysnav");
      if (x.className === "sys-nav") {
        x.className += " responsive";
      } else {
        x.className = "sys-nav";
      }
    }
  </script>

  <!-- System Block -->

  <div class="sys-left-col">
  <div class="admin-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/moderator">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>
  </div>
  
  <div class="sys-right-col">
    
    <div class="bar-issues-right">
      
    <div class="bar-issues-form">
      
      <form action="<?php echo URLROOT ?>/moderators/updateissue" method="post">

        <input type="hidden" name="id" value="<?php echo $data['issue']->issuesId?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $data['issue']->cusName?>" disabled><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $data['issue']->cusEmail?>" disabled><br><br>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo $data['issue']->subject?>" disabled><br><br>

        <label for="description">Description:</label><br><br>
        <textarea name="description" id="" cols="30" rows="3" disabled><?php echo $data['issue']->description?></textarea><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="Pending"><?php echo $data['issue']->status?></option>
          <option value="Solved">Solved</option>
        </select><br><br>

        <div class="bar-issues-button"> 
          <button type="submit" name="submit">Mark as solved</button>
        </div>
        <br><br>
                
        </div>

      </form>
    </div>

  </div>

  </div>

</body>
</html>
