
<html>
   
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php

      $services_mail_body = '';
      if(empty($services_email)==false){
         $services_mail_body .= "<h4>Selected services are given below in detail</h4>
         <table style='width: 50%; border-collapse:collapse; margin-bottom: 80px;'>
            <tbody>
               <tr>
                  <th style='text-align: center;background-color: #337fbf; color: white; padding: 8px'><b>Service name</b></th>
                  <th style='text-align: center;background-color: #337fbf; color: white; padding: 8px'><b>Price</b></th>
               </tr>";
               $flag_tr = 0;
         foreach ($services_email as $key => $value) {
            if($flag_tr % 2 == 0){ 
                 $bgc = ''; 
             } 
             else{ 
                 $bgc = 'background-color: #E7E7E7'; 
             } 
            $services_mail_body .= "
               <tr style='".$bgc."'>
                  <td style='border: none; padding: 6px; padding: 6px'>".strtoupper(str_replace('_', ' ', $key))."</td>
                  <td style='border: none; padding: 6px; text-align: center'>".$value."</td>
               </tr>";
               $flag_tr++;
         }
         $services_mail_body .= "</tbody></table>";
      
      }

         
         $to ='bgvcst@goldquestglobal.in';
         $subject = "You got new application from the client $com_nme";
         
         /*$message = "<b>From $com_nme</b>";*/
         $message .= "<div>Dear BGVCST Team,</div><br>
         <div>Greetings !!!!</div><br>
         <div><strong>M/S $com_nme uploaded the documents for below list of Employees.</strong></div><br>
         <table style='border:1px solid black;width: 50%; border-collapse:collapse'>
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
         <div>$services_mail_body</div>
         <div>Remarks: $rm_mr</div><br>
         <div><strong>Documents:</strong></div><br>
         <div>$msty</div><br>
         <div>Kindly acknowledge the same at the earliest</div><br>
         <div>Best regards</div>
         <div><strong>$com_nme</strong></div>
         <div><a href='http://www.goldquestglobal.in'>Please Click here to login</a><br><br>
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