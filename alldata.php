<?php
include_once ('connect.php');
$query = "SELECT * FROM data ORDER BY `data`.`Date` DESC, `data`.`Time` DESC";
$result = mysqli_query($conn,$query);

?>

<!----if searchbar is blank, query all. If given a number, search by date. If no match, echo no match---->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search").keyup(function(){
            $.ajax({
                url: 'data_search.php',
                type: 'POST',
                data: {search: $(this).val()},
                success: function(result){
                    $("#result").html(result);
                }
            });
        });
    });
</script>

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
        <div class="update-button" onclick="back()">
            <p>Back</p>
        </div>
        <div>
            <input type="TEXT" id="search" placeholder = "Search" autocomplete = "off">
        </div>
    </div>
    <div id="result">
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
    </div>

</body>
<script>
    function updateData()
    {
    	location.reload();
    }
    function back()
    {
        window.location.assign("index.php");
    }
</script>
</html>
