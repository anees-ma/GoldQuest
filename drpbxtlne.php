<?php 
$to =$cl_email;
         $subject = "Drop Box Applications";
         
         /*$message = "<b>From $com_nme</b>";*/
         $message .= "<div>Dear $cl_cmpnme,</div><br>
         <div>Greetings from Gold Quest Global !!!!</div><br>
         <div><strong>We acknowledge the receipt of the below mentioned cases. Kindly Find the Reference Numbers for the future
         Communications regarding the same. We will process the checks and revert back in case of any insufficiencies.</strong></div><br>
         <table style='border:1px solid black'>
         <tr style='border:1px solid black'>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>SL</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Application ID</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Client Code</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>GQG Reference ID</th>
         <th style='border:1px solid black;background-color:#337fbf;color:white'>Candidate Name</th>
         </tr>
         $templ
         </table><br>
         <div>Thanks & Best regards</div>
         <div>BGV-Client Support Team</div>
         ";
         
         $header = "From:bgvcst@goldquestglobal.in \r\n";
         $header .= "Cc:manjunath@goldquestglobal.in \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            $ins=mysqli_query($con,"insert into dropbx_mails(client_uid,mail_snd) values('$mcid','$mtdte')");
            if($ins){
                ?>
                <span>Success</span>
                <?php
            }
            else{
                ?>
                <span>Fail!</span>
                <?php
            }
         }else {
            /*echo "Message could not be sent...";*/
         }
?>