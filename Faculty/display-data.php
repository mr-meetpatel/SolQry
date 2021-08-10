<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['fid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con,"select * from events where f_id='{$_SESSION['fid']}' and u_id=2") or die(mysqli_error($con)); 


 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            
                            
                                echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[title]</td>";
                            echo "<td>$row[start_event]</td>";
                            echo "<td>$row[start_event_time]</td>";
                            
                            echo "<td>$row[end_event_time]</td>";
                            
                            
                            //echo "<td><a href='appointment-accept.php?aaid={$row['app_id']}' onclick='return confirm_accept()'>Accept</a> || <a href='appointment-reject.php?raid={$row['app_id']}' onclick='return confirm_reject()'>Reject</a></td>";
                            
                            echo "</tr>";
                            $i++;
                            
                                
                            
                            
                        }
?>

