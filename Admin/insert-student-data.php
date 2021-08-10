<?php
include '../conn/conn.php';
session_start();
if(isset($_POST['name']))
{
    $name= strtoupper(mysqli_real_escape_string($con,$_POST['name']));
    $gender= mysqli_real_escape_string($con,$_POST['gender']);
    $phn= mysqli_real_escape_string($con,$_POST['phn']);
    $enroll= mysqli_real_escape_string($con,$_POST['enroll']);
    
    $enrollment=mysqli_query($con,"select stu_id from student_master where stu_enroll='{$enroll}'");
    $enroll_row=mysqli_num_rows($enrollment);
    if($enroll_row>0){
        echo "Enrollment Is already Taken";
        die();
    }

    $phone=mysqli_query($con,"select stu_id from student_master where stu_phn='{$phn}'");
    $phone_row=mysqli_num_rows($phone);
    if($phone_row>0){
        echo "Phone Is already Taken";
        die();
    }
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $emailid=mysqli_query($con,"select stu_id from student_master where stu_email='{$email}'");
    $emailid_row=mysqli_num_rows($emailid);
    if($emailid_row>0){
        echo "Email Is already Taken";
        die();
    }
    $sem= mysqli_real_escape_string($con,$_POST['sem']);
    
    
    $pass= sha1(mysqli_real_escape_string($con,$_POST['pass']));
    $cpass= sha1(mysqli_real_escape_string($con,$_POST['cpass']));
    
    
    
    
    
            
        $q= mysqli_query($con,"INSERT INTO `student_master` (`b_id`, `u_id`, `stu_name`, `stu_gender`, `stu_phn`, `stu_enroll`, `stu_email`, `stu_pass`, `stu_sem`, `status`) VALUES ('{$_SESSION['b_id']}', '3', '{$name}', '{$gender}', '{$phn}', '{$enroll}', '{$email}', '{$pass}', '{$sem}', '1');") or die(mysqli_error($con));
        
        //$notifications= mysqli_query($con, "INSERT INTO `notification_master` ( `n_from`, `n_to`,`b_id`,`id`,`notification`, `status`) VALUES ( '3', 'Admin','{$branch}','{$iddata['admin_id']}','New Student Added', '1');");
        
        if($q)
        {
            echo "Registration Successfull!";
        }
        
                
               
       
}           
    
?>