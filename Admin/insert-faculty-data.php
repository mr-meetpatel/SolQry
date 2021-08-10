<?php
include '../conn/conn.php';
session_start();

if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['phn'])  && isset($_POST['email'])  && isset($_POST['pass']))
$name= strtoupper(mysqli_real_escape_string($con,$_POST['name']));
$gender= mysqli_real_escape_string($con,$_POST['gender']);
$phn= mysqli_real_escape_string($con,$_POST['phn']);

$checkphn=mysqli_query($con,"select * from faculty_master where f_phn='{$phn}'");
$checkphndata= mysqli_fetch_array($checkphn);
$checkphnrow= mysqli_num_rows($checkphn);

if($checkphnrow==0){
    
$email= mysqli_real_escape_string($con,$_POST['email']);
$checkemail=mysqli_query($con,"select * from faculty_master where f_email='{$email}'");
$checkemaildata= mysqli_fetch_array($checkemail);
$checkemailrow= mysqli_num_rows($checkemail);
if($checkemailrow==0){
    $pass= sha1(mysqli_real_escape_string($con,$_POST['pass']));
    $q= mysqli_query($con,"INSERT INTO `faculty_master` (`u_id`, `b_id`, `f_name`, `f_gender`, `f_phn`, `f_email`, `f_pass`,  `staus`) VALUES ( '2', '{$_SESSION['b_id']}', '{$name}', '{$gender}', '{$phn}', '$email', '{$pass}',  '1');") or die(mysqli_error($con));
                       if($q)
                       {
                          echo "Registration Successfull...";
                       }
                       
}
else{
    echo "This Email Id is Already Taken.";
}
}
else{
    echo "This Phone Number is Already Taken."; 
}


                   
?>