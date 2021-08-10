<?php

session_start();
include '../conn/conn.php';
$q= mysqli_query($con, "update faculty_master set is_typing='{$_POST['is_typing']}' where f_id='{$_SESSION['fid']}'") or die(mysqli_error($con));
//echo "<script>alert('hello')</script>";
?>

