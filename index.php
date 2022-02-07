<?php
include_once ('connect.php');
$query = "SELECT * FROM data ORDER BY `data`.`Date` DESC, `data`.`Time` DESC limit 20";
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


</head>
<body>
    <div id="page-head">
        <div class="bg"></div>
        <img src="icon.svg" alt="pulse icon" id="logo">
        <h1>Pulso</h1>
        <p class="title">IoT-based Pulse Oximeter</p>
        <div class="update-button" onclick="updateData()">
            <p>Update</p>
        </div>
        <div class="show-charts" onclick="openCharts()">
            <p>Show Charts</p>
        </div>
        <div class="show-all-data" onclick="openAllData()">
            <p>Show All Data</p>
        </div>
    </div>
    <table id="data-table">
        <tr id="header">
            <th>Date<br>(yyyy-mm-dd)</th>
            <th>Time<br>(hh:mm:ss)</th>
            <th>Pulse Rate</th>
            <th>Blood Oxygen Level</th>
            <th>Remark</th>
        </tr>

        <?php
            while($rows=mysqli_fetch_assoc($result))
            {
        ?>
            <tr>
                <td><?php echo $rows['Date']; ?></td>
                <td><?php echo $rows['Time']; ?></td>
                <td><?php echo $rows['PulseRate']; ?></td>
                <td><?php echo $rows['BloodOxygenLevel']; ?></td>
                <td><?php echo $rows['Remarks']; ?></td>
            </tr> 
        <?php
            }
            ?>
    </table>

</body>
<script>
    function updateData()
    {
    	location.reload();
    }
    function openCharts()
    {
        window.location.assign("showcharts.php");
    }
    function openAllData()
    {
        window.location.assign("alldata.php");
    }
</script>
</html>