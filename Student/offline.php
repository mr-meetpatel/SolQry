<?php
include '../conn/conn.php';
session_start();
mysqli_query($con, "update student_master set is_active='0' where stu_id='{$_SESSION['sid']}'");
//$off=$_SESSION['onoff'];


header("location:".$_SESSION['onoff']);
?>