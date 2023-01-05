<?php
  $to="akashbisht072@gmail.com";
  $subject="SSC Selection Process";
  $body="You have passed the test. We will send you the Call letter within 1-2months";
  $sender="From:shoottrouble4@gmail.com";
  if(mail($to,$subject,$body,$sender)){
      echo"email send!";
  }else{
      echo"Error";
  }
?>