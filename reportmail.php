<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Sending HTML email using PHP</title>
   </head>
   <body>
      <?php
         $to =$client_email;
         $subject = "Final Report";
         /*$message = "<b>From GQG HR SERVICES</b>";*/
         $message .= "<div>Dear $clfnme,</div><br>
         <div>Greetings!!!!</div><br>
         <div><strong>$canfnme</strong> Final Background Verification Report is ready in GoldQuest VTS Portal, Kindly download.</div>
         <div>We assure our best services at all the time.</div><br>
         <div>Our customer service team will be available for any support  24 x 7.</div><br>
         <div>Best Regards</div><br>
         <div>GoldQuest BGV Team</div>
         ";
         $header = "From:bgvcst@goldquestglobal.in \r\n";
         $header .= "Cc:manjunath@goldquestglobal.in \r\n";
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