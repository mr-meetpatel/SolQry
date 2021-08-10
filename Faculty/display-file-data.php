<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['fid']))
{
    header("location:logout.php");
}


/*$student= mysqli_query($con, "SELECT
`document_master`.`d_id`
, `document_master`.`document_file`
, `document_master`.`info`

, `document_master`.`upload_time`
, `faculty_master`.`f_name`
FROM
`oms`.`document_master`
INNER JOIN `oms`.`faculty_master` 
    ON (`document_master`.`f_id` = `faculty_master`.`f_id`);") or die(mysqli_error($con));

  */
  $q=mysqli_query($con,"select * from document_master where f_id='{$_SESSION['fb_id']}'") or die(mysqli_error($con));
  

 $i=1;
                        while($row= mysqli_fetch_array($q))
                        {
                            
                               echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><a href='$row[document_file]'>$row[document_file]</a></td>";
                            echo "<td>$row[info]</td>";
                            
                            
                           
                            echo "<td><a href='display-file-data.php?did=$row[d_id]' onclick='return confirm_delete()'>Delete</a></td>";
                            
                            echo "</tr>";
                            $i++; 
                            
                            
                        }
                       
                        if(isset($_GET['did']))
{
    $q1=mysqli_query($con,"select * from document_master where d_id='{$_GET['did']}'");
    $row=mysqli_fetch_array($q1);
    unlink($row['document_file']);
    mysqli_query($con,"delete from document_master where d_id='$_GET[did]'");
    header("location:dis-file.php");
}
?>

