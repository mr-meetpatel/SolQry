<?php

session_start();
include '../conn/conn.php';
$q= mysqli_query($con, "update student_master set is_typing='{$_POST['is_typing']}' where u_id='{$_SESSION['uid']}'") or die(mysqli_error($con));
//echo "<script>alert('hello')</script>";
?>

