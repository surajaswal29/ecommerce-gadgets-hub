<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer\autoload.php'; 

$mail = new PHPMailer(TRUE);
    try {
         //Enable SMTP debugging.
         $mail->SMTPDebug = 0;                               
         //Set PHPMailer to use SMTP.
         $mail->isSMTP();            
         //Set SMTP host name                          
         $mail->Host = "smtp.gmail.com";
         //Set this to true if SMTP host requires authentication to send email
         $mail->SMTPAuth = true;                          
         //Provide username and password     
         $mail->Username = "t10gullysports@gmail.com";                 
         $mail->Password = "Manish@123";                           
         //If SMTP requires TLS encryption then set it
         $mail->SMTPSecure = "tls";                           
         //Set TCP port to connect to
         $mail->Port = 587;                                   
         //Send From
         $mail->From = "t10gullysports@gmail.com";
         $mail->FromName = "T10GullySports";
         //Selecting Email From Database
         $mail->addAddress("{$c_email}", "{$c_name}");
         
         $mail->isHTML(true);
         /* Set the subject. */
         $mail->Subject = $c_purpose;
         /* Set the mail message body. */
         $mail->Body =$c_msg;
         /* Finally send the mail. */
         if($mail->send()){
            redirect('contactus.php');
         }
    }
    catch (Exception $e)
    {
       /* PHPMailer exception. */
       $_SESSION['error_msg']=$e->errorMessage();
       echo $_SESSION['error_msg'];
    }
    catch (\Exception $e)
    {
       /* PHP exception (note the backslash to select the global namespace Exception class). */
       $_SESSION['a_error']= $e->getMessage();
       echo $_SESSION['a_error'];
    }
?>