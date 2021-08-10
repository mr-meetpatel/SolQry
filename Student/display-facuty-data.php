<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['sid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "select * from  faculty_master where b_id='{$_SESSION['sbid']}'") or die(mysqli_error($con));

       

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            if($row['is_active']==1)
                            {
                                $status="<span class='text-success'>Online</span>";
                            }
                            else
                            {
                                $status="<span class='text-danger'>Offline</span>";
                            }    
                                echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><a href='chat.php?fid=$row[f_id]'>$row[f_name]</a></td>";
                            //echo "<td>".fetch_typing_notification('2',$_SESSION['f_id'],$con)."</td>";
                            echo "<td>".count_unseen_msg($row['f_id'],$_SESSION['sid'],$con)."</td>";
                            echo "<td>$status</td>";
                            
                           
                            
                            echo "</tr>";
                            $i++; 
                      }
                            
                        
?>

