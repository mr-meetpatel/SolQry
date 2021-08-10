<?php
include '../conn/conn.php';
$sem_id=$_POST['datapost'];
$sub= mysqli_query($con, "select * from subject_master where sub_sem='{$sem_id}'");
$i=1;
while($row= mysqli_fetch_array($sub))
{
    
            echo "<tr>";
            echo "<td>{$i}</td>";
            echo "<td>{$row['sub_name']}</td>";
            echo "<td>{$sem_id}</td>";
            echo "</tr>";
            $i++;
}
?>
