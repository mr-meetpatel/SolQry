<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}
$student= mysqli_query($con, "SELECT
    `branch_master`.`b_name`
    , `faculty_master`.`f_id`
    , `branch_master`.`b_name`
    , `faculty_master`.`f_name`
    , `faculty_master`.`f_gender`
    , `faculty_master`.`f_email`
    , `faculty_master`.`f_img`
    , `faculty_master`.`staus`
FROM
    `oms`.`faculty_master`
    INNER JOIN `oms`.`branch_master` 
        ON (`faculty_master`.`b_id` = `branch_master`.`b_id`) where `faculty_master`.`b_id`='{$_SESSION['b_id']}' ;");

        if(isset($_POST['fid']))
{
   $d= mysqli_query($con, "update faculty_master set staus=1 where f_id='{$_POST['fid']}'") or die(mysqli_error($con));
   if($d)
   {
       echo "Faculty Data Has Restore!";
       die();
   }
}

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            if($row['staus']==0)
                            {
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[f_name]</td>";
                            echo "<td>$row[f_gender]</td>";
                            
                            
                            echo "<td>$row[b_name]</td>";
                            echo "<td>$row[f_email]</td>";
                            echo "<td><button class='btn btn-success' onclick='return confirm_active($row[f_id])'>Restore</button></td>";
                            echo "</tr>";
                            $i++; 
                            }
                            
                        }
?>

