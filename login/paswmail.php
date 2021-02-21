
<html>
   
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
         $to =$usr_email;
         $subject = "Forgot Password";
         
         $message = "<b>From GQG HR SERVICES</b>";
         $message .= "<div>Dear $mal,</div><br>
         <div>Greetings of the day!!!</div><br><br>
         <div>We welcome to GoldQuest <strong>Verification Tracking System</strong></div><br>
         <div>Your OTP to change the password is : <strong>$rand</strong></div>
         
         <div>Thanks and Best Regards</div><br>
         <div>GoldQuest Management</div>
         ";
         
         $header = "From:bgvcst@goldquestglobal.in \r\n";
         /*$header .= "Cc:afgh@somedomain.com \r\n";*/
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         /*if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }*/
      ?>
      
   </body>
</html>