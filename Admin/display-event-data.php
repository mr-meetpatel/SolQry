<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}
if(isset($_POST['id']))
 {
    $d= mysqli_query($con, "delete from events where id='{$_POST['id']}'") or die(mysqli_error($con));
    if($d)
    {
        echo "Your Event Data Deleted Successfully!";
        die();
    }
}

$event= mysqli_query($con, "select * from events where u_id=1 and f_id='{$_SESSION['aid']}'");


         

 $i=1;
                        while($row= mysqli_fetch_array($event))
                        {
                            
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[title]</td>";
                            echo "<td>$row[start_event]</td>";
                            
                            
                            echo "<td>$row[start_event_time]</td>";
                            echo "<td>$row[end_event_time]</td>";
                            
                            
                            echo "<td><button class='btn btn-danger' onclick='return confirm_delete($row[id])'>Delete</button></td>";
                            
                            echo "</tr>";
                            $i++; 
                            
                            
                        }
?>

