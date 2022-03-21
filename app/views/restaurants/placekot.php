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
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/styled.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#dynamic_table tr").length;
 $rowno=$rowno+1;
 $("#dynamic_table tr:last").after("<tr id='row"+$rowno+"'><td><select id='itemName' name='itemName[]'><?php foreach($data['fooditems'] as $fooditems): ?><option value='<?php echo $fooditems->itemName; ?>'><?php echo $fooditems->itemName; ?></option><?php endforeach; ?></select></td><td><select id='portion' name='portion[]'><option value='Small'>Small</option></select></td><td><input type='text' id='quantity' name='quantity[]'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<title>Place KOT</title>
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
          <a href="<?php echo URLROOT ?>/restaurants/settings">Settings</a>
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
      <a href="<?php echo URLROOT; ?>/restaurants/addfooditem">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Add Food Items</p>
    </div>
  </div>

  <div class="sys-right-col">

  <div class="kot-div">

    <div class="dynamic_form">
      <form method="post" action="<?php echo URLROOT; ?>/restaurants/placekot">

      <label for="tableno">Table No:</label>
      <input type="text" id="tableno" name="tableno"><br><br>

      <input type="button" onclick="add_row();" value="ADD ROW"><br><br>

        <table id="dynamic_table" align=center>
        <tr id="row1">
          <td>
              <select id="itemName" name="itemName[]">
              <?php foreach($data['fooditems'] as $fooditems): ?>
              <option value="<?php echo $fooditems->itemName; ?>"><?php echo $fooditems->itemName; ?></option>
              <?php endforeach; ?>
              </select>
          </td>
          <td>
              <select id="portion" name="portion[]">
                <option value="Small">Small</option>
                <option value="Regular">Regular</option>
                <option value="Large">Large</option>
              </select>
          </td>
          <td>
              <input type="text" id="quantity" name="quantity[]" placeholder="Quantity">
          </td>
        </tr>
        </table>
              <select id="status" name="status" hidden>
                <option value="pending" select=selected>pending</option>
                <option value="prepared">prepared</option>
                <option value="closed">closed</option>
              </select>
        <input type="submit" name="submit_row" value="SUBMIT">
      </form>
    </div>

  </div>

  </div>

</body>
</html>