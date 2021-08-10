<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['fid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "select * from  student_master where b_id='{$_SESSION['fb_id']}'") or die(mysqli_error($con));

       

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
                            echo "<td><a href='chat.php?sid=$row[stu_id]'>$row[stu_name]</a></td>";
                            echo "<td>".count_unseen_msg($row['stu_id'],$_SESSION['fid'],$con)."</td>";
                            
                            echo "<td>$status</td>";
                            
                           
                            
                            echo "</tr>";
                            $i++; 
                      }
                            
                        
?>

