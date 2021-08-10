<?php
include '../conn/conn.php';
$sem_id=$_POST['datapost'];
$sub= mysqli_query($con, "select * from subject_master where sub_sem='{$sem_id}'");
$i=1;
while($row= mysqli_fetch_array($sub))
{
    
            echo "<option value='$row[sub_id]'>$row[sub_name]</option>";
}
?>
