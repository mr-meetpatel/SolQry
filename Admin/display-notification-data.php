<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "SELECT
    `notification_master`.`n_id`
    , `user_type_master`.`u_name`

    , `notification_master`.`notification`
    , `notification_master`.`n_time`
    , `notification_master`.`id`
     , `notification_master`.`status`
FROM
    `oms`.`user_type_master`
    INNER JOIN `oms`.`notification_master` 
        ON (`user_type_master`.`u_id` = `notification_master`.`n_from`) where `notification_master`.`n_to`='Admin' and id='{$_SESSION['aid']}';");

        if(isset($_GET['nid']))
{
   $d= mysqli_query($con, "update notification_master set status=0 where n_id='{$_GET['nid']}'") or die(mysqli_error($con));
   if($d)
   {
       echo "<script>alert('remove Successful');window.location='dis-notifications.php';</script>";
   }
}

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            if($row['status']==1)
                            {
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[notification]</td>";
                            echo "<td>$row[u_name]</td>";
                            
                            
                            
                           
                            
                            echo "<td><a href='display-notification-data.php?nid={$row['n_id']}'>Seen</a></td>";
                            echo "</tr>";
                            $i++; 
                            }
                            
                        }
?>

