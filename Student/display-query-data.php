<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['sid']))
{
    header("location:logout.php");
}
$stu= mysqli_query($con, "select * from student_master where stu_id='{$_SESSION['sid']}'") or die(mysqli_error($con));
$stu_data=mysqli_fetch_array($stu);
$student= mysqli_query($con, "select * from discussion_forum_master where stu_sem='{$stu_data['stu_sem']}' and b_id='{$stu_data['b_id']}' order by diss_id desc") or die(mysqli_error($con));

        

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            $faculty= mysqli_query($con, "select * from faculty_master where f_id='{$row['f_id']}'") or die(mysqli_error($con));
                            $facultyname=mysqli_fetch_array($faculty);
                            
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><a href='discussion.php?disid=$row[diss_id]'>$row[diss_title]</a></td>";
                            echo "<td>$facultyname[f_name]</td>";
                            
                            
                            
                           
                            
                           
                            echo "</tr>";
                            $i++; 
                            
                            
                        }
?>

