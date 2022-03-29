<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 4){ 
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
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/styled.css?ver=1.1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function add_row1()
{
 $rowno=$("#dynamic_table1 tr").length;
 $rowno=$rowno+1;
 $("#dynamic_table1 tr:last").after("<tr id='row"+$rowno+"'><td><select id='baritemName' name='baritemName[]'><option value='select an option' select='selected'>--select an item--</option><?php foreach($data['baritems'] as $baritems): ?><option value='<?php echo $baritems->itemName; ?>'><?php echo $baritems->itemName; ?></option><?php endforeach; ?></select></td><td><select id='barportion' name='barportion[]'><option value='select an option' select='selected'>--select an item--</option><option value='Pint'>Pint ~475ml</option><option value='Shot'>Shot ~50ml</option><option value='Fifth'>Fifth</option><option value='Liter'>Liter 1000ml</option><option value='Tower'>Tower 2000ml</option></select></td><td><input type='number' placeholder='Quantity' id='barquantity' name='barquantity[]' min='1'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}

function add_row2()
{
 $rowno=$("#dynamic_table2 tr").length;
 $rowno=$rowno+1;
 $("#dynamic_table2 tr:last").after("<tr id='row"+$rowno+"'><td><select id='snackitemName' name='snackitemName[]'><option value='select an option' select='selected'>--select an item--</option><?php foreach($data['snackitems'] as $snackitems): ?><option value='<?php echo $snackitems->itemName; ?>'><?php echo $snackitems->itemName; ?></option><?php endforeach; ?></select></td><td><select id='snackportion' name='snackportion[]'><option value='select an option' select='selected'>--select an item--</option><option value='Small'>Small</option></select></td><td><input type='number' placeholder='Quantity' id='quantity' name='snackquantity[]' min='1'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}

</script>
  <title>Place Order</title>
</head>
<body>
  
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/barman">
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
      <a href="<?php echo URLROOT ?>/users/barman">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>

    <div class="bar-dash-plus2">
      <a href="<?php echo URLROOT ?>/bars/managebaritems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View Bar Items</p>
    </div>

    <div class="bar-dash-plus3">
      <a href="<?php echo URLROOT ?>/bars/addbaritem">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Add Bar Items</p>
    </div>

  </div>
  <div class="sys-right-col"></div>
  <div class="sys-wrapped-col">

    <!-- Add Bar item -->
          <div class="kot-div">

            <div class="dynamic_form">
              <form method="post" action="<?php echo URLROOT; ?>/bars/placeorder">

              <label for="tableno" name="tableno">Table No:</label><br><br>
              <select name="tableno" id="tableno">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="101">101</option>
              </select>

                <h2 class="bar-item-details">Add Bar Item</h2><br>
              

              <input type="button" onclick="add_row1();" value="ADD ROW"><br><br>

                <table id="dynamic_table1">
                <tr id="row1">
                  <td>
                      <select id="baritemName" name="baritemName[]">
                      <option select="selected" value="select an option"> -- select an option -- </option>
                      <?php foreach($data['baritems'] as $baritems): ?>
                      <option value="<?php echo $baritems->itemName; ?>"><?php echo $baritems->itemName; ?></option>
                      <?php endforeach; ?>
                      </select>
                  </td>
                  <td>
                      <select id="barportion" name="barportion[]">
                      <option select="selected" value="select an option"> -- select an option -- </option> 
                        <option value="Shot">Shot ~50ml</option>
                        <option value="Pint">Pint ~475ml</option>
                        <option value="Fifth">Fifth</option>
                        <option value="Liter">Liter 1000ml</option>
                        <option value="Tower">Tower 2000ml</option>
                      </select>
                  </td>
                  <td>
                      <input type="number" id="barquantity" name="barquantity[]" placeholder="Quantity" min="1">
                  </td>
                </tr>
                </table>
     
              <h2 class="bar-bot-detail-heading">Add Snack Item</h2><br>

              <input type="button" onclick="add_row2();" value="ADD ROW"><br><br>

                <table id="dynamic_table2">
                <tr id="row1">
                  <td>
                      <select id="snackitemName" name="snackitemName[]">
                      <option  select="selected" value="select an option"> -- select an option -- </option> 
                      <?php foreach($data['snackitems'] as $snackitems): ?>
                      <option value="<?php echo $snackitems->itemName; ?>"><?php echo $snackitems->itemName; ?></option>
                      <?php endforeach; ?>
                      </select>
                  </td>
                  <td>
                      <select id="snackportion" name="snackportion[]">
                      <option select="selected" value="select an option"> -- select an option -- </option> 
                        <option value="Small">Small</option>
                        <option value="Regular">Regular</option>
                        <option value="Large">Large</option>
                      </select>
                  </td>
                  <td>
                      <input type="number" id="snackquantity" name="snackquantity[]" placeholder="Quantity" min="1">
                  </td>
                </tr>
                </table>

                <select id="status" name="status" hidden>
                  <option value="Pending" select="selected">pending</option>
                  <option value="Prepared">prepared</option>
                  <option value="Completed">closed</option>
                </select>
                <br>
                <input type="submit" name="submit_row" value="SUBMIT">

              </form>
            </div>
                        <br><br><br>
            </div>

          </div>


    </div>
</div>


</body>
</html>
