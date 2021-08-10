<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}

$student= mysqli_query($con, "SELECT
    `appointment_master`.`app_id`
    , `student_master`.`stu_name`
    , `appointment_master`.`appiontment_details`
    , `appointment_master`.`f_id`
    , `appointment_master`.`app_status`
FROM
    `student_master`
    INNER JOIN `appointment_master` 
        ON (`student_master`.`stu_id` = `appointment_master`.`stu_id`) where `appointment_master`.`f_id`='{$_SESSION['aid']}' and `appointment_master`.`u_id`='1' and `appointment_master`.`b_id`='{$_SESSION['b_id']}' ;") ; 


 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            
                            if($row['app_status']=="" || $row['app_status']==1)
                            {
                                echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[stu_name]</td>";
                           
                            
                            echo "<td>$row[appiontment_details]</td>";
                            if($row['app_status']=="")
                            //echo "<td><a href='appointment-accept.php?aaid={$row['app_id']}' onclick='return confirm_accept()'>Accept</a> || <a href='appointment-reject.php?raid={$row['app_id']}' onclick='return confirm_reject()'>Reject</a></td>";
                            echo "<td><button class='btn btn-success' onclick='return confirm_accept($row[app_id])'>Accept</button> || <button class='btn btn-danger' onclick='return confirm_reject($row[app_id])'>Reject</button></td>";
                            
                            else
                            // echo "<td><a href='appointment-completed.php?caid={$row['app_id']}' onclick='return confirm_completed()'>Complete</a></td>";
                            echo "<td><button class='btn btn-primary' onclick='return confirm_completed($row[app_id])'>Complete</button></td>";
                            
                            echo "</tr>";
                            $i++;
                            }
                                
                            
                            
                        }
?>

