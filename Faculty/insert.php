<?php
include '../conn/conn.php';
session_start();
date_default_timezone_set("Asia/Calcutta");

if(isset($_POST['title']))
{
    $bid=$_SESSION['fb_id'];
    $fid=$_SESSION['fid'];
    $q= mysqli_query($con, "INSERT INTO `events` (`u_id`,`f_id`,`b_id`,`title`, `start_event`) VALUES ('2','{$fid}','{$bid}','{$_POST['title']}', '{$_POST['start']}');") or die(mysqli_error($con));
    
}
?>
