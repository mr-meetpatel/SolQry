<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['fid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "select * from  discussion_forum_master where f_id='{$_SESSION['fid']}' order by diss_id desc") or die(mysqli_error($con));

       

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                           echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><a href='discussion.php?disid=$row[diss_id]'>$row[diss_title]</a></td>";
                            echo "<td>$row[diss_date]</td>" ;                      
                            
                            echo "</tr>";
                           
                            
                            
                            $i++; 
                      }
                            
                        
?>

