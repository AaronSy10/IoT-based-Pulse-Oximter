<?php
include_once ('connect.php');
$query = "SELECT * FROM data ORDER BY Date, Time Desc limit 20";
$prresult = mysqli_query($conn,$query);
$bolresult = mysqli_query($conn,$query);
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
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Pulse Rate'],

          <?php
            while($rows=mysqli_fetch_assoc($prresult))
            {
                echo "['".$rows['Date']." ".$rows['Time']."',".$rows['PulseRate']."],"; 
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

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Blood Oxygen Level'],

            <?php
            while($rows1=mysqli_fetch_assoc($bolresult))
            {
                echo "['".$rows1['Date']." ".$rows1['Time']."',".$rows1['PulseRate']."],"; 
            }
            ?>
        ]);

        var options = {
          title: 'Blood Oxygen Level',
          color: ['red'],
          legend: { position: 'bottom' }
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('oxy_chart'));

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
    <div id="chart-holder">
    <div id="pulse_chart" class="chart"></div>
    <div id="oxy_chart" class="chart"></div>
    </div>
</body>
</html>
