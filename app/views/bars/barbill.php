<?php if (!isset($_SESSION['UserID'])){ 
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
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Bar Bill</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/barman">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT ?>/bars/settings">Settings</a>
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
  <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/bars/placeorder">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Place Order</p>
    </div>

    <div class="bar-dash-plus2">
      <a href="<?php echo URLROOT ?>/bars/managebaritems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View Bar Items</p>
    </div>

    <div class="bar-dash-plus3">
      <a href="<?php echo URLROOT ?>/users/barman">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>
  </div>
  
<!-- Right Block Bill -->

  <div class="sys-right-col">

  <div class="bar-bill-right">
 
<!-- Bill Heading -->

    <div class="bar-bill-date">
      <table>
        <tr>
          <td>Order No:</td>
          <td>Date:</td>
        </tr>
      </table>
    </div>

    <div class="bar-bill-heading">
      <p>Bill Details</p>
    </div>

<!-- Bill -->

<!-- Bill Bar Item Table -->

  <div class="bar-bill-1">
      <table>
        <tr>
          <td style="width: 30%;">Bar Item</td>
          <td style="width: 20%;">volume</td>
          <td style="width: 30%;">Quantity</td>
          <td style="width: 20%;">Price</td>
        </tr>
      </table>
    </div>

    <div class="bar-bill-2">
      <table>
        <tr>
          <td style="width: 30%;">Sky Vodka</td>
          <td style="width: 20%;">Liter</td>
          <td style="width: 30%;">1</td>
          <td style="width: 20%;">Rs.8000</td>
        </tr>
      </table>
    </div>



<!-- Bill Snack Table -->


    <div class="bar-bill-1">
      <table>
        <tr>
          <td style="width: 30%;">Snack Item</td>
          <td style="width: 20%;">Portion</td>
          <td style="width: 30%;">Quantity</td>
          <td style="width: 20%;">Price</td>
        </tr>
      </table>
    </div>

    <div class="bar-bill-2">
      <table>
        <tr>
          <td style="width: 30%;">Mixed Rice</td>
          <td style="width: 20%;">Large</td>
          <td style="width: 30%;">2</td>
          <td style="width: 20%;">Rs.1200</td>
        </tr>

        <tr>
          <td style="width: 30%;">Mixed Rice</td>
          <td style="width: 20%;">Large</td>
          <td style="width: 30%;">2</td>
          <td style="width: 20%;">Rs.1200</td>
        </tr>

        <tr>
          <td style="width: 30%;">Mixed Rice</td>
          <td style="width: 20%;">Large</td>
          <td style="width: 30%;">2</td>
          <td style="width: 20%;">Rs.1200</td>
        </tr>
      </table>
    </div>

    <div class="bar-bill-3">
      <form action="bill.php">
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount"></br>
        <label for="tprice">Total Price:</label>
        <input type="text" id="tprice" name="tprice"><br>
        <label for="balance">Balance:</label>
        <input type="text" id="balance" name="balance"><br>
        <input type="submit" value="Issue Bill">
      </form>
    </div>
  </div>

  </div>

</body>
</html>
