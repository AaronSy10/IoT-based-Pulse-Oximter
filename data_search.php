<?php

try{
    $db = new pdo('mysql:host=localhost;dbname=po_data;charset=utf8','root','');
}
catch (PDOEXCEPTION $e){die($e->getMessage());}

if (isset($_POST['search'])){
    $search = $_POST['search'];

    if(strlen($search) < 2){
        $sql = "SELECT * FROM data ORDER BY Date, Time Desc";
        $stmt = $db->prepare($sql);
        $rows = $stmt->execute();
        ?>
        <table id="data-table">
            <tr id="header">
                <th>Date<br>(yyyy-mm-dd)</th>
                <th>Time<br>(hh:mm:ss)</th>
                <th>Pulse Rate</th>
                <th>Blood Oxygen Level</th>
                <th>Remark</th>
            </tr>
        <?php
        while($rows = $stmt->fetch()){
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
        <?php
    }
    elseif(strlen($search) > 1)
    {
        $text = $search;
        $search = "%$search";
        $sql = "SELECT * FROM data WHERE Date LIKE :s ORDER BY Date, Time Desc";
        $stmt = $db->prepare($sql);
        $stmt->bindParam('s', $search);
        $stmt->execute();
        ?>
        <table id="data-table">
            <tr id="header">
                <th>Date<br>(yyyy-mm-dd)</th>
                <th>Time<br>(hh:mm:ss)</th>
                <th>Pulse Rate</th>
                <th>Blood Oxygen Level</th>
                <th>Remark</th>
            </tr>
        <?php
        // check if rows are empty
        $rows = $stmt->fetch();
        if ($rows == 0)
        {
            ?>
            </table>
            <div id="error"><h1>
            <?php
            echo "Sorry there seems to be no results for \"$text\"";
            ?>
            </h1></div>
            <?php
        }
        else{
            do{
        ?>
        <tr>
            <td><?php echo $rows['Date']; ?></td>
            <td><?php echo $rows['Time']; ?></td>
            <td><?php echo $rows['PulseRate']; ?></td>
            <td><?php echo $rows['BloodOxygenLevel']; ?></td>
            <td><?php echo $rows['Remarks']; ?></td>
        </tr>
        <?php
        }while($rows = $stmt->fetch());
        ?>
        </table>
        <?php
        }
    }
}
?>