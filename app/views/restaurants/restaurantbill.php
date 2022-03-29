<?php if (!isset($_SESSION['UserID']) || $_SESSION["UserTypeID"] != 3){ 
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
  <title>Restaurant Bill</title>
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
  </style>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/cashier">
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

<div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).on("change keyup keydown blur", "#discount", function() {

var grandtotal =0;
var dis =0;
dis = $("#discount").val();
var subtotal = $("#tprice").val();
var pamount = $("#amount").val();
if(dis !=0 && dis>0 && dis< 101){
    grandtotal =  (parseFloat(subtotal)*(100-parseFloat(dis)))/100;
    
    if (pamount != 0 && pamount>0){
       var  balance =  parseFloat(pamount )- parseFloat(grandtotal);
       $('#balance').val( balance.toFixed(2));
       $('#disprice').val( grandtotal.toFixed(2));
    }else{
      $('#balance').val(null);
    $('#disprice').val( grandtotal.toFixed(2));
        }
    // $('#balance').val(null );

}else{
  $('#disprice').val( subtotal);
}

});
$(document).on("change keyup keydown blur", "#amount", function() {

var balance =0;
var pamount = $("#amount").val();
var grandtotal = $("#disprice").val();
if(pamount !=0 && pamount > 0){
    balance =  parseFloat(pamount )- parseFloat(grandtotal);

    $('#balance').val( balance.toFixed(2));
}else{
  $('#balance').val(balance);
}

});


</script>
  <!-- <script>
        getDiscount = function() {
            var numVal1 = Number(document.getElementById("tprice").value);
            var numVal2 = Number(document.getElementById("discount").value) / 100;
            if(!(numVal2 <= 0)){
              var totalValue = numVal1 - (numVal1 * numVal2)
              document.getElementById("disprice").value = totalValue.toFixed(2);
            }else if(numVal2 == NULL){
              document.getElementById("disprice").value = numVal1.toFixed(2);         
            }
        }

        getBalance = function(){
          var discountedTotal = Number(document.getElementById("disprice").value);
          var amount = Number(document.getElementById("amount").value);
          if(amount >= discountedTotal){
            var balance = amount - discountedTotal;
            document.getElementById("balance").value = balance;
          }else{
            document.getElementById("balance").value = 'NaN';
          }
        }
    </script> -->
  </div>

  <!-- System Block -->

  <div class="sys-left-col">
  <div class="rest-dash-plus1">
      <a href="<?php echo URLROOT ?>/restaurants/placekot">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Place Order</p>
    </div>

    <div class="rest-dash-plus2">
      <a href="<?php echo URLROOT ?>/restaurants/managefooditems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View Food Items</p>
    </div>

    <div class="rest-dash-plus3">
      <a href="<?php echo URLROOT; ?>/users/cashier">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>
  </div>
  
<!-- Right Block Bill -->

  <div class="sys-right-col">
 
<!-- Bill Heading -->

    <div class="rest-bill-date">
      <table>
        <tr>
          <td>Order No:<?php echo $_GET['orderno']?></td>
        </tr>
      </table>
    </div>

    <div class="rest-bill-heading">
      <p>Bill Details</p>
    </div>

<!-- Bill -->



    <div class="rest-bill-1">
      <table>
        <tr>
          <td style="width: 30%;">Food Item</td>
          <td style="width: 20%;">Portion</td>
          <td style="width: 30%;">Quantity</td>
          <td style="width: 20%;">Price</td>
        </tr>
      </table>
    </div>

    <div class="rest-bill-2">
      <table>
      <?php foreach($data['fooditemnames'] as $fooditemnames): ?>
        <tr>
          <td style="width: 30%;"><?php echo $fooditemnames->itemName; ?></td>
          <td style="width: 20%;"><?php echo $fooditemnames->PortionType; ?></td>
          <td style="width: 30%;"><?php echo $fooditemnames->Quantity; ?></td>
          <td style="width: 20%;"><?php echo $fooditemnames->price * $fooditemnames->Quantity; ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <div class="rest-bill-3">
      <form action="" method="post">
      <?php $total=0;?>
      <?php foreach($data['fooditemnames'] as $fooditemnames): ?>
        <?php $total +=$fooditemnames->price * $fooditemnames->Quantity; ?>
      <?php endforeach; ?>
        <input type="number" id="status" name="status" value="Completed" hidden><br>
        <label for="tprice">Total Price:</label>
        <input type="number" id="tprice" name="tprice" value="<?php echo $total;?>" readonly><br>
        <label for="discount">Discount:</label>
        <input type="number" id="discount" name="discount" min="0"></br>
        <label for="discount">Discounted Price:</label>
        <input type="number" id="disprice" name="disprice" readonly></br>
        <label for="discount">Amount:</label>
        <input type="number" id="amount" name="amount" min="1" required></br>
        <label for="balance">Balance:</label>
        <input type="number" id="balance" name="balance" min="0" readonly><br>
        <input type="text" id="status" name="status" value="Completed" hidden><br>
        <input type="submit" value="Issue Bill"><br><br>
      </form>
      <span class="error">
            <p><?php echo $data['discountError'];?></p>
        </span>
        <span class="error">
            <p><?php echo $data['amountError'];?></p>
        </span>
        <br>
    </div>
   
  </div>

</body>
</html>
