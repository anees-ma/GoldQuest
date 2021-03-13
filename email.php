<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Sending HTML email using PHP</title>
   </head>
   <body>
      <?php
         $to ='pratapreddy.thupakula@gmail.com';
         $subject = "Client Registration";
         /*$message = "<b>From GQG HR SERVICES</b>";*/
         $message .= "<div>Dear $cmpnme,</div><br>
         <div>Greetings!!!!</div><br>
         <div>A warm welcome to <strong>GQVTS - GoldQuest Verification Tracking System.</strong> Please review the service level agreement and scope of services selected for your Organisation updated in BGV portal to proceed further.</div><br>
         <div>Feel free to respond back for modifications if any.</div><br>
         <div>We assure our best services at all the time.</div><br>
         <div>Our customer service team will be available for any support  24 x 7.</div><br>
         <div>Login Details:</div>
         <div>Email:$email</div>
         <div>Password:$psd</div><br>
         <div><a href='http://www.goldquestglobal.in/customerlogin/'>Please Click here to login</a><br><br>
         <div>Best Regards</div>
         <div>GoldQuest BGV Team</div>
         ";
         $header = "From:bgvcst@goldquestglobal.in \r\n";
         $header .= "Cc:pratapreddybbm@outlook.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($to,$subject,$message,$header);
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
   </body>
</html>