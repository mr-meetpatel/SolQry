<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "SELECT
    `student_master`.`stu_id`
    , `branch_master`.`b_name`
    , `student_master`.`stu_name`
    , `student_master`.`stu_gender`
    , `student_master`.`stu_enroll`
    , `student_master`.`stu_email`
    , `student_master`.`stu_sem`
    , `student_master`.`stu_img`
    , `student_master`.`status`
FROM
    `oms`.`branch_master`
    INNER JOIN `oms`.`student_master` 
        ON (`branch_master`.`b_id` = `student_master`.`b_id`)where `student_master`.`b_id`='{$_SESSION['b_id']}' ;") or die(mysqli_error($con));

        if(isset($_GET['sid']))
{
   $d= mysqli_query($con, "update student_master set status=1 where stu_id='{$_GET['sid']}'") or die(mysqli_error($con));
   if($d)
   {
       echo "<script>alert('Active Successful');window.location='dis-student.php';</script>";
   }
}

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            if($row['status']==0)
                            {
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[stu_name]</td>";
                            echo "<td>$row[stu_gender]</td>";
                            
                            echo "<td>$row[stu_sem]</td>";
                            echo "<td>$row[b_name]</td>";
                            echo "<td>$row[stu_email]</td>";
                            echo "<td><a href='display-deleted-student-data.php?sid={$row['stu_id']}' onclick='return confirm_active()'>Active</a></td>";
                            echo "</tr>";
                            $i++; 
                            }
                            
                        }
?>

