<?php
include '../conn/conn.php';
session_start();
mysqli_query($con, "update student_master set is_active='1' where stu_id='{$_SESSION['sid']}'");
//$on=$_SESSION['onoff'];
//header("location:".$on);
header("location:".$_SESSION['onoff']);
?>


