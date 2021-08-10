<?php
include '../conn/conn.php';
session_start();
$query= mysqli_query($con,"SELECT
    `sub_allocation_master`.`s_a_id`
    , `user_type_master`.`u_name`
    , `faculty_master`.`f_name`
    , `subject_master`.`sub_sem`
    , `subject_master`.`sub_name`
    ,`sub_allocation_master`.`b_id`
    
FROM
    `faculty_master`
    INNER JOIN `sub_allocation_master` 
        ON (`faculty_master`.`f_id` = `sub_allocation_master`.`id`)
    INNER JOIN `subject_master` 
        ON (`subject_master`.`sub_id` = `sub_allocation_master`.`sub_id`)
    INNER JOIN `user_type_master` 
        ON (`user_type_master`.`u_id` = `sub_allocation_master`.`u_id`) where `sub_allocation_master`.`b_id`='{$_SESSION['b_id']}' and  `subject_master`.`sub_sem`='{$_POST['datapost']}';") or die(mysqli_error($con));
$i=1;
while($row= mysqli_fetch_array($query))
{
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>$row[sub_name]</td>";
    echo "<td>$row[f_name]</td>";
    echo "<td>$row[u_name]</td>";
    echo "<td>$row[sub_sem]</td>";
   
    echo "</tr>";
    $i++;
}
        ?>