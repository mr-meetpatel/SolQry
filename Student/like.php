<?php
include '../conn/conn.php';
session_start();
$q= mysqli_query($con,"select like1 from discussion_master ") or die(mysqli_error($con));


?>

