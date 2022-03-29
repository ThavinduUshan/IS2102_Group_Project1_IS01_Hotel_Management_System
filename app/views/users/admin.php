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
  <link rel="stylesheet" href="<?php echo URLROOT?>/public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <title>Admin</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/admin">
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
    <div class="admin-dashboard">
    <span class="admin-button-set">
        <button type="button" class="admin-button"><a href="<?php echo URLROOT; ?>/admins/manageusers">Manage Users</a></button>
        <button type="button" class="admin-button"><a href="<?php echo URLROOT; ?>/admins/reportmanagement">Reports</a></button>
        <button type="button" class="admin-button"><a href="<?php echo URLROOT; ?>/admins/changepackage">Manage Rooms</a></button>
        <!--<button type="button" class="admin-button"><a href="/<?php echo URLROOT; ?>/admins/manageissues">Issues</a></button> -->
    </span><br><br><br><br>
    
    <br><br><br>
    <h1 class="adminh1">Daily Summary </h1>
    <div>
      <div class="admin-dashboard-col">
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Reservations Placed</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['roomsbookedtoday']->NoofCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Restaruant Orders Placed</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['resplacedtoday']->NoofCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Bar Orders Placed</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['barplacedtoday']->NoofCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Total Earnings</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo "Rs." .$data['earningstoday'] . ".00"?></h1>
          </div>
        </div>  
        <hr>
      </div>
    </div><br><br><br><br><br>
    <h1 class="adminh1">Earnings This Month</h1><br><br>
    <div class="doughnut-chart">
      <canvas id="doughnut-chart" width="500px" ></canvas>
    </div><br><br><br><br><br><br><br>
    <h1 class="adminh1">Insights This Month</h1>
    <div class="row">
    <div class="admin-dashboard-col">
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Rooms Booked</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['roomsbooked']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Restaruant Orders Completed</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['resordersplaced']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Bar Orders Completed</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['barordersplaced']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Pending Issues</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['issuescomplained']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
      </div>
      
      <div class="admin-dashboard-col">
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Reservations Cancelled</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['reservationscanceled']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Restaruant Orders Cancelled</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['resorderscanceled']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Bar Orders Cancelled</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['barorderscanceled']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="admin-data-name-col">
            <h1>Issues Solved</h1>
          </div>
          <div class="admin-data-name-col">
            <h1 style="color:grey"><?php echo $data['issuessolved']->NoOfCounts?></h1>
          </div>
        </div>  
        <hr>
      </div>
    </div><br><br><br><br><br>
    <h1 class="adminh1">Rooms Booked This Month</h1><br><br>
    <div class="bar-chart">
      <canvas id="myChart"></canvas>
    </div><br><br><br><br><br><br><br>
    <div class="pie-charts">
      <div class="pie-chart-resbar">
        <h1 class="adminh1">Top 5 Food Items</h1><br><br>
        <canvas id="pie-chart"></canvas>
      </div>
      <div class="pie-chart-resbar">
        <h1 class="adminh1">Top 5 Bar Items</h1><br><br>
        <canvas id="pie-chart2"></canvas>
      </div>
    </div>
    <br><br><br>
  </section>
  <?php
   $phprooms = [0, 0, 0, 0, 0, 0, 0, 0];
   for($i=1;$i<=8;$i++){
      foreach($data['popularrooms'] as $room){
        if($room->RoomNo == $i){
          $phprooms[$i-1] = $room->RoomCount;
        }
      }
   }
   
   $phpearnings[0] = $data['earnedbyrooms']->Earnings;
   $phpearnings[1] = $data['earnedbyres']->Earnings;
   $phpearnings[2] = $data['earnedbybars']->Earnings;

   $i = 0;
   foreach($data['topfivefooditems'] as $item){
     $topfooditemnames[$i] = $item->itemName;
     $topfooditems[$i] = $item->NoofCounts;
     $i++;
   }

   $j = 0;
   foreach($data['topfivebaritems'] as $item){
     $topbaritemnames[$j] = $item->itemName;
     $topbaritems[$j] = $item->NoofCounts;
     $j++;
   }


  ?>
    <script>
    
    let myChart = document.getElementById('myChart').getContext('2d');

    let roomschart = new Chart(myChart, {
      type : 'bar',
      data : {
        labels : ['room1', 'room2', 'room3', 'room4', 'room5', 'room6', 'room7', 'room8'],
        datasets : [{
          label : 'No of Times Each Room Booked in this month',
          data : <?php echo json_encode($phprooms); ?>,
          backgroundColor: [
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)',
                'rgba(1, 102, 27, 0.5)'
                
            ],
        }]
      },
      options : {}
      });
  </script>
  <script>
    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($topfooditemnames); ?>,
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: <?php echo json_encode($topfooditems); ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
  </script>
  <script>
    new Chart(document.getElementById("pie-chart2"), {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($topbaritemnames); ?>,
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: <?php echo json_encode($topbaritems); ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
  </script>
  <script>
      new Chart(document.getElementById("doughnut-chart"), {
      type: 'doughnut',
      data: {
        labels: ["Reservations", "Restaurant", "Bar"],
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
            data: <?php echo json_encode($phpearnings); ?>,
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Predicted world population (millions) in 2050'
        }
      }
  });
  </script>
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
</body>
</html>
