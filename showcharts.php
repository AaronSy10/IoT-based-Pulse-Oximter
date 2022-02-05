<?php
include_once ('connect.php');
$query = "SELECT * FROM data ORDER BY Date, Time Desc limit 20";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Pulse Rate'],

          <?php
            while($rows=mysqli_fetch_assoc($result))
            {
                echo "['".$rows['Date']."',".$rows['PulseRate']."],"; 
            }
            ?>
        ]);

        var options = {
          title: 'Pulse Rate',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('pulse_chart'));

        chart.draw(data, options);
      }

    function back()
    {
        window.location.assign("index.php");
    }
    </script>

</head>
<body>

<div id="page-head">
    <div class="bg"></div>
    <img src="icon.svg" alt="pulse icon" id="logo">
    <h1>Pulso</h1>
    <p class="title">IoT-based Pulse Oximeter</p>
    <div class="update-button" onclick="back()">
        <p>Home</p>
    </div>
    </div>
    <div id="pulse_chart" style="width: 900px; height: 500px;"></div>
</body>
</html>
