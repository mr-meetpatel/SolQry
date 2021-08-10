<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['fid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "SELECT
    `appointment_master`.`app_id`
    , `student_master`.`stu_name`
    , `appointment_master`.`appiontment_details`
    , `appointment_master`.`f_id`
    , `appointment_master`.`msg`
    , `appointment_master`.`app_status`
FROM
    `student_master`
    INNER JOIN `appointment_master` 
        ON (`student_master`.`stu_id` = `appointment_master`.`stu_id`) where `appointment_master`.`f_id`='{$_SESSION['fid']}' ;") ; 


 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            
                            if($row['app_status']=="")
                            {
                                echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[stu_name]</td>";
                           
                            
                            echo "<td>$row[appiontment_details]</td>";
                            
                            echo "<td><a href='appointment-accept.php?aaid={$row['app_id']}' onclick='return confirm_accept()'>Accept</a> || <a href='appointment-reject.php?raid={$row['app_id']}' onclick='return confirm_reject()'>Reject</a></td>";
                            
                            echo "</tr>";
                            $i++;
                            }
                                
                            
                            
                        }
?>

