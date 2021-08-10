<?php
  session_start();
  include './conn/conn.php';
  
//Load Composer's autoloader
            use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
            require 'vendor/autoload.php';
  if(!isset($_SESSION['rand']))
  {
      header("location:admin-forget-pass.php");
  }
  else{
    
    $select=mysqli_query($con,"select * from admin_master where admin_id='{$_SESSION['faid']}'") or die(mysqli_error($con));
    $sd=mysqli_fetch_array($select);
    $email=$sd['admin_email'];
    $name=$sd['admin_name'];
    
    
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug =0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
                $mail->Username = 'projectsolqry@gmail.com';                 // SMTP username
                $mail->Password = 'Digital@Mentoring';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                //Recipients
                $mail->setFrom('projectsolqry@gmail.com', 'SolQry');
                $mail->addAddress($email, $sd['admin_name']);     // Add a recipient
                
                //Attachment
               // $mail->addAttachment('/var/tmp/file.tar.gz'); 

                //Content

                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'SolQry';
                $mail->Body = "Hi $name Your OTP is <b>$_SESSION[rand]</b> For reset Password";
              
                 
                $mail->send();
                echo "<script>alert('OTP SEND...');window.location='admin-check-otp.php';</script>";
                
               }
              
             catch (Exception $e) {
                echo 'msg could not be sent. Mailer Error: ', $mail->ErrorInfo;
           }
  
  }


            

             
   


?>

