<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* Include the Composer generated autoload.php file. */
require 'vendor\autoload.php';
   $mail = new PHPMailer(TRUE);
   try {
       /* Set the mail sender. */
       $mail->setFrom('mbhubneshwari@gmail.com', 'Maa Bhubhneshwari Enterprises');
    
       /* Add a recipient. */
       $mail->addAddress($_SESSION["email_id"], $_SESSION["uname"]);
    
       /* Set the subject. */
       $mail->Subject = 'Your Order has been Confirmed';
        $mail->isHTML(true);
       /* Set the mail message body. */
        $mail->Body = 'Hello Suraj, 
                      <p>Your Order has been received. It will arrive to your shopping address within 2 buisness days.</p>
                      <p>Thanks for shoppping on Maa Bhubhneshwari Enterprises. Have questions or feedback? You can contact us anytime at(9149200639)</p>
                       Himanshu Badoni
                       Maa Bhubhneshwari Enterprises';
       $mail->isSMTP();
       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 587;
       $mail->SMTPAuth = true;
       $mail->SMTPSecure = 'tls';

       /* Username (email address). */
       $mail->Username = 'mbhubneshwari@gmail.com';

       /* Google account password. */
       $mail->Password = 'Wrong@123';
       $mail->send();
       // echo"email sent";
       }
       catch (Exception $e)
       {
       /* PHPMailer exception. */
       echo $e->errorMessage();
       }
       catch (\Exception $e)
       {
       /* PHP exception (note the backslash to select the global namespace Exception class). */
       echo $e->getMessage();
       }
?>