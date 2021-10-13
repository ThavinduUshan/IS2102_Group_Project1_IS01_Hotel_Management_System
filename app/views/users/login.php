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
  <title>Login</title>
</head>
<body>
  <section class="login">
    <nav>
      <a href="<?php echo APPROOT ?>/views/users/login.php">
        <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
    </nav>

  <div class="login-form">
    <h1>Login</h1>
    <h2>Welcome back!</h2>
    <form name="logform" action ="<?php echo URLROOT; ?>/users/login" method = "POST">
      <label>Username</label>
      <input type="text" placeholder="Enter your username" id="uname" name="uname">
      <label>Password</label>
      <input type="password" placeholder="Enter your password" id="psw" name="psw">
      <button type="submit" name="submit">Login</button>
      <span class="error">
        <p><?php echo $data['unameError'];?></p>
      </span>
      <span class="error">
        <p><?php echo $data['pswError'];?></p>
      </span>
    </form>
  </div>
</section>
</body>
</html>