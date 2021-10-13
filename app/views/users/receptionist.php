<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
  <title>Receptionist</title>
</head>
<body>
  <section class="login">
    <nav>
      <a href="<?php echo APPROOT ?>/views/users/login.php">
        <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
    </nav>
    <?php if (isset($_SESSION['UserID'])) : ?>
      <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
    <?php else : ?>
      <?php header('location: ' . URLROOT .  '/users/login');?>
    <?php endif; ?> 
</section>
</body>
</html>
