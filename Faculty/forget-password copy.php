<?php
  
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug =0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
                $mail->Username = 'solqry@gmail.com';                 // SMTP username
                $mail->Password = 'Digital@Mentoring';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                //Recipients
                $mail->setFrom('solqry@gmail.com', ',XNCKJVH');
                $mail->addAddress("manthanbutani@gmail.com", "akki");     // Add a recipient
                
                //Attachment
               // $mail->addAttachment('/var/tmp/file.tar.gz'); 

                //Content

                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Mail testing';
                $mail->Body = "Mail feature Is Working";
              
                 
                $mail->send();
               echo "mail send";
            } catch (Exception $e) {
                echo 'msg could not be sent. Mailer Error: ', $mail->ErrorInfo;
           }

             
   


?>

