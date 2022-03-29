<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/grindlays/public/css/stylen.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
    <title>Sorry!</title>
    <style>
        .error-page-container {
            width: 100opx;
            height: 550px;
            margin-top: 2px;
            padding-top: 100px;
            padding: 60px;
            background: white;
            color: black;
            position: relative;
            border-radius: 30px;
            box-shadow: 0px 0px 11px 7px rgba(0, 0, 0, 0.07);
            background-image: url('<?php echo URLROOT?>/public/img/noresult.png');
            background-size: contain;
            background-repeat: no-repeat;
            /* background-position: center center; */

        }

        .htag {
            z-index: 0;
            position: relative;
            margin-top: 80px;
            margin-right: 1.5%;
            float: right;
            font-size: 65px;
            color: #01661b;
            display: inline-block;
        }
        .error-page-buttons{
            margin-top: 250px;
            margin-left:880px;
            position: absolute;
        }
        .error-page-date {
            width: 250px;
            margin-top: 50px;
            border: none;
            text-decoration: none;
            color: #fff;
            padding:12px 10px;;
            font-size: 16px;
            background: green;
            position: relative;
            cursor: pointer;
            border-radius: 20px;
        }

        .error-back-home {
            width: 200px;
            margin-top: 50px;
            margin-left:30px;
            border: none;
            text-decoration: none;
            color: #fff;
            padding:12px 10px;
            font-size: 16px;
            background: green;
            position: relative;
            cursor: pointer;
            border-radius: 20px;
        }
       table{
            z-index: 0;
            margin-left: 20%;
        }

        body {
            overflow-y: hidden;
            font-size: 40px;

        }
    </style>
</head>
<body>
<section class="register">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
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
    </nav>
  
    <div class="error-page-container">
        <h2 class="htag">Sorry! <br>No result found</h2>
        <div class="error-page-buttons">
        <a href="<?php echo URLROOT ?>/pages/selectdate"><button class="error-page-date" type="submit" name="submit">Look for another date</button></a>
        <a href="<?php echo URLROOT ?>/pages/home"><button class="error-back-home" type="submit" name="submit">Back to home</button></a>
        </div>  
     </div>
   <br><br><br>
  </section>
</body>
</html>