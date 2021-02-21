<?php 
$to ='manjunath@goldquestglobal.in';
         $subject = "Time Stamp Applications";
         
         /*$message = "<b>From $com_nme</b>";*/
         $message .= "<div>Dear BGVCST Team,</div><br>
         <div>Greetings !!!!</div><br>
         <div><strong>Please find the below list of cases TAT-Turn Around Time is delayed, Kindly Complete the cases an priority basis without further reminders.</strong></div><br>
         <table style='border:1px solid black'>
         <tr style='border:1px solid black'>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>SL</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Application ID</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Client Code</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>GQG Reference ID</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Candidate Name</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>TAT-Notification</th>
         </tr>
         $remin
         </table><br>
         <div>Kindly acknowledge the same to Client at the earliest.</div><br>
         <div>Best regards</div>
         <div>Gold Quest BGV Team</div>
         ";
         
         $header = "From:bgvcst@goldquestglobal.in \r\n";
         /*$header .= "Cc:manjunath@goldquestglobal.in \r\n";*/
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            /*$ins=mysqli_query($con,"insert into dropbx_mails(client_uid,mail_snd) values('$mcid','$mtdte')");
            if($ins){
                ?>
                <span>Success</span>
                <?php
            }
            else{
                ?>
                <span>Fail!</span>
                <?php
            }*/
         }else {
            /*echo "Message could not be sent...";*/
         }
?>