<?php
include '../conn/conn.php';
session_start();
mysqli_query($con, "update faculty_master set is_active='0' where f_id='{$_SESSION['fid']}'");
if(isset($_SESSION['fid']))
{
    session_destroy();
}


    header("location:../login.php");
    ?>

