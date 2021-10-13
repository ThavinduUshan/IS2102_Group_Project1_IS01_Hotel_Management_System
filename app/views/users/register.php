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
  <link rel="stylesheet" href="<?php echo URLROOT;?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Register</title>
</head>
<body>
  <section class="register">
    <div>
      <nav>
        <a href="<?php echo URLROOT ?>/users/admin">
          <img src="<?php echo URLROOT;?>/public/img/logo-nav.jpg">
        </a>
      </nav>
    </div>
  <div class="register-form">
    <h1>Registration</h1>
    <form name="registerform" action="<?php echo URLROOT; ?>/users/register" method="post">
      <h3>User Infromation<hr></h3>
      <div class="row">
        <div class="register-col">
          <label>First Name: </label>
          <input type="text" placeholder="First Name" id="fname" name="fname">
        </div>
        <div class="register-col">
          <label>Last Name: </label>
          <input type="text" placeholder="Last Name" id="lname" name="lname">
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Email: </label>
          <input type="email" placeholder="Email" id="email" name="email">
        </div>
        <div class="register-col">
          <label>NIC: </label>
          <input type="text" placeholder="NIC Number" id="nic" name="nic">
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Mobile Number: </label>
          <input type="text" placeholder="Mobile Number" id="mobilenum" name="mobilenum">
        </div>
        <div class="register-col">
          <label>Fixed Line: </label>
          <input type="text" placeholder="Fixed-Line Number" id="fixednum" name="fixednum">
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Date of Birth: </label>
          <input type="date" placeholder="Date of Birth" id="dob" name="dob">
        </div>
        <div class="register-col">
          <label for="gender">Gender :</label>
          <select id="drop" name="gender" >
            <option value="Female" selected="selected">Female</option>
            <option value="Male">Male</option>
          </select>
        </div>
      </div>
      <h3>Account Infromation<hr></h3>
      <div class="row">
        <div class="register-col">
          <label>User Name: </label>
          <input type="text" placeholder="User Name" id="uname" name="uname">
        </div>
        <div class="register-col">
          <label for="utypeid">User Type: :</label>
          <select id="drop" name="utypeid" >
            <option value="Admin" selected="selected">Admin</option>
            <option value="Receptionist">Receptionist</option>
            <option value="Cashier">Restaurant Cashier</option>
            <option value="Barman">Barman</option>
            <option value="HeadChef">Head Chef</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Password: </label>
          <input type="password" placeholder="Password" id="psw" name="psw">
        </div>
        <div class="register-col">
          <label>Re-Enter Password: </label>
          <input type="password" placeholder="Re-Enter Password" id="repsw" name="repsw">
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          
        </div>
        <div class="register-col">
          <button type="submit" name="submit">Register the User</button>
        </div>
      </div>
    </form>
  </div>
</section>
</body>
</html>