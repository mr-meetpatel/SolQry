<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['sid']))
{
    header("location:logout.php");
}


$student= mysqli_query($con, "SELECT
`document_master`.`d_id`
, `document_master`.`document_file`
, `document_master`.`info`


, `faculty_master`.`f_name`
FROM
`oms`.`document_master`
INNER JOIN `oms`.`faculty_master` 
    ON (`document_master`.`f_id` = `faculty_master`.`f_id`);") or die(mysqli_error($con));

  
 // $q=mysqli_query($con,"select * from document_master where b_id='{$_SESSION['fb_id']}'") or die(mysqli_error($con));
  

 $i=1;
                        while($row= mysqli_fetch_array($student))
                        {
                            
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[f_name]</td>";
                            echo "<td><a href='../Faculty//$row[document_file]'>$row[document_file]</a></td>";
                            echo "<td>$row[info]</td>";
                             
                            
                             
                           
                            
                            echo "</tr>";
                            $i++; 
                            
                            
                        }
                       
?>

