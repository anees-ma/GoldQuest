
<html>
   
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
         $to ='bgvcst@goldquestglobal.in';
         $subject = "You got new application from the client $com_nme";
         
         /*$message = "<b>From $com_nme</b>";*/
         $message .= "<div>Dear BGVCST Team,</div><br>
         <div>Greetings !!!!</div><br>
         <div><strong>M/S $com_nme uploaded the documents for below list of Employees.</strong></div><br>
         <table style='border:1px solid black'>
         <tr style='border:1px solid black'>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>SL</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Employee Name</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Client Code</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Application ID</th>
         </tr>
         <tr style='border:1px solid black'>
         <td style='border:1px solid black'>SL</td>
         <td style='border:1px solid black'>$empnme</td>
         <td style='border:1px solid black'>$client_uid</td>
         <td style='border:1px solid black'>$ref_id</td>
         </tr>
         </table><br>
         <div>Remarks: $rm_mr</div><br>
         <div><strong>Documents:</strong></div><br>
         <div>$msty</div><br>
         <div>Kindly acknowledge the same at the earliest</div><br>
         <div>Best regards</div>
         <div><strong>$com_nme</strong></div>
         <div><a href='https://admin.goldquestglobal.in'>Please Click here to login</a><br><br>
         ";
         
         $header = "From:$email \r\n";
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
      <!--bgvcst@goldquestglobal.in-->
   </body>
</html>