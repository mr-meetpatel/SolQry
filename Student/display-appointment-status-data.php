<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['sid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "SELECT
    `appointment_master`.`app_id`
    , `faculty_master`.`f_name`
    , `appointment_master`.`stu_id`
    , `appointment_master`.`app_date`
    , `appointment_master`.`app_time`
    , `appointment_master`.`appiontment_details`
    , `appointment_master`.`app_status`
    , `appointment_master`.`msg`
FROM
    `appointment_master`
    INNER JOIN `faculty_master` 
        ON (`appointment_master`.`f_id` = `faculty_master`.`f_id`) where `appointment_master`.`stu_id`='{$_SESSION['sid']}';") ; 

if(isset($_GET['aid']))
{
   $d= mysqli_query($con, "update appointment_master set app_status=2 where app_id='{$_GET['aid']}'") or die(mysqli_error($con));
   if($d)
   {
       echo "<script>alert('Appointment Remove from your list');window.location='dis-appointment-status.php';</script>";
   }
}
 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            
                            if($row['app_status']==1)
                            {
                                echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[f_name]</td>";
                           
                            
                            echo "<td>$row[appiontment_details]</td>";
                            echo "<td>$row[app_date]</td>";
                            echo "<td>$row[app_time]</td>";
                            echo "<td>-----</td>";

                            echo "<td>Accepted</td>";
                            
                            echo "</tr>";
                            $i++;
                            }
                            else{
                                echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[f_name]</td>";
                           
                            
                            echo "<td>$row[appiontment_details]</td>";
                            echo "<td>-----</td>";
                            echo "<td>-----</td>";
                            echo "<td>$row[msg]</td>";
                            if($row['app_status']==null)
                            echo "<td>In Queue</td>";
                            else
                            echo "<td>Rejected</td>";
                            echo "</tr>";
                            $i++;
                            }
                                
                            
                            
                        }
?>

