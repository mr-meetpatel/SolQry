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
     , `notification_master`.`status`
FROM
    `oms`.`user_type_master`
    INNER JOIN `oms`.`notification_master` 
        ON (`user_type_master`.`u_id` = `notification_master`.`n_from`) where `notification_master`.`n_to`='Admin' ;");

        if(isset($_GET['nid']))
{
   $d= mysqli_query($con, "update notification_master set status=1 where n_id='{$_GET['nid']}'") or die(mysqli_error($con));
   if($d)
   {
       echo "<script>alert('Active Successful');window.location='dis-notifications.php';</script>";
   }
}

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            if($row['status']==0)
                            {
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[notification]</td>";
                            echo "<td>$row[u_name]</td>";
                            
                            
                            
                           
                            
                            echo "<td><a href='display-deleted-notifications.php?nid={$row['n_id']}'>Active</a></td>";
                            echo "</tr>";
                            $i++; 
                            }
                            
                        }
?>

