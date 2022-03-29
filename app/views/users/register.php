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
  <section class="register">
  <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/admin">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/admins/settings">Settings</a>
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
    <div class="reportmgt-dash-button">
      <a href="<?php echo URLROOT ?>/users/admin">Go Back to Dashboard</a>
        
    </div><br><br>
  <div class="register-form">
    
    <h1>Registration</h1>
    <form name="registerform" action="<?php echo URLROOT; ?>/users/register" method="post">
      <h3>User Infromation<hr></h3>
      <div class="row">
        <div class="register-col">
          <label>First Name *: </label>
          <input type="text" placeholder="First Name" id="fname" name="fname">
          <span class="error">
            <p><?php echo $data['fnameError'];?></p>
          </span>
        </div>
        <div class="register-col">
          <label>Last Name *: </label>
          <input type="text" placeholder="Last Name" id="lname" name="lname">
          <span class="error">
            <p><?php echo $data['lnameError'];?></p>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Email *: </label>
          <input type="email" placeholder="Email" id="email" name="email">
          <span class="error">
            <p><?php echo $data['emailError'];?></p>
          </span>
        </div>
        <div class="register-col">
          <label>NIC *: </label>
          <input type="text" placeholder="NIC Number" id="nic" name="nic">
          <span class="error">
            <p><?php echo $data['nicError'];?></p>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Mobile Number *: </label>
          <input type="text" placeholder="Mobile Number" id="mobilenum" name="mobilenum">
          <span class="error">
            <p><?php echo $data['mobilenumError'];?></p>
          </span>
        </div>
        <div class="register-col">
          <label>Fixed Line *: </label>
          <input type="text" placeholder="Fixed-Line Number" id="fixednum" name="fixednum">
          <span class="error">
            <p><?php echo $data['fixednumError'];?></p>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Date of Birth *: </label>
          <input type="date" placeholder="Date of Birth" id="dob" name="dob">
          <span class="error">
            <p><?php echo $data['dobError'];?></p>
          </span>
        </div>
        <div class="register-col">
          <label for="gender">Gender *:</label>
          <select id="drop" name="gender" >
            <option value="Female" selected="selected">Female</option>
            <option value="Male">Male</option>
          </select>
        </div>
      </div>
      <h3>Account Infromation<hr></h3>
      <div class="row">
        <div class="register-col">
          <label>User Name *: </label>
          <input type="text" placeholder="User Name" id="uname" name="uname">
          <span class="error">
            <p><?php echo $data['unameError'];?></p>
          </span>
        </div>
        <div class="register-col">
          <label for="utypeid">User Type *:</label>
          <select id="drop" name="utypeid" >
            <option value="Admin" selected="selected">Admin</option>
            <option value="Receptionist">Receptionist</option>
            <option value="Cashier">Cashier</option>
            <option value="Barman">Barman</option>
            <option value="HeadChef">Head Chef</option>
            <option value="Moderator">Moderator</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="register-col">
          <label>Password *: </label>
          <input type="password" placeholder="Password" id="psw" name="psw">
          <span class="error">
            <p><?php echo $data['pswError'];?></p>
          </span>
        </div>
        <div class="register-col">
          <label>Re-Enter Password *: </label>
          <input type="password" placeholder="Re-Enter Password" id="repsw" name="repsw">
          <span class="error">
            <p><?php echo $data['repswError'];?></p>
          </span>
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
  <br><br><br>
</section>
</body>
</html>