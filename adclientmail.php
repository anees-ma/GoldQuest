<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Sending HTML email using PHP</title>
   </head>
   <body>
      <?php
         $to =$email;
         $subject = "Client Registration";
         /*$message = "<b>From GQG HR SERVICES</b>";*/
         $message .= "<div>Dear $cmpnme,</div><br>
         <div>Greetings!!!!</div><br>
         <div>A warm welcome to <strong>GQVTS - GoldQuest Verification Tracking System.</strong> Please review the service level agreement and scope of services selected for your Organisation updated in BGV portal to proceed further.</div><br>
         <div>Please Find the attached <strong>Onboarding Process PPT </strong> to understand the GoldQuest Global Verification Process in Detail.</div><br>
         <div><a style='color:white;background-color:#3e76a5;padding:5px' href='http://www.goldquestglobal.in/bgvforms/GOLDQUEST_GLOBAL_BGV_ONBOARDING_PROCESS.pdf'>PPT</a></div><br>
         <div>Feel free to respond back for modifications if any in client company information page.</div><br>
         <div>We assure our best services at all the time.</div><br>
         <div>Our customer service team will be available for any support  24 x 7.</div><br>
         <div>Login Details:</div>
         <div>Email:$email</div>
         <div>Password:$psd</div><br>
         <div><a href='".APP_PATH."/customerlogin/'>Please Click here to login</a><br><br>
         <div>Best Regards</div>
         <div>GoldQuest BGV Team</div>
         ";
         $header = "From:bgvcst@goldquestglobal.in \r\n";
         $header .= "Cc:manjunath@goldquestglobal.in,$email2,$email3 \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($to,$subject,$message,$header);
         if( $retval == true ) {
            /*echo "Message sent successfully...";*/
         }else {
            /*echo "Message could not be sent...";*/
         }
      ?>
   </body>
</html>