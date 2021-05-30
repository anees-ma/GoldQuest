<?php

   $mail_body = '<p>Dear '.$candidate_name.',<br><br> Please complete the application process initiated by '.$company_name.' as the part of recruitment by filling the form in the below link.</p><p><a href="'.APP_PATH.'/candidate-portal.php?client_id='.$clientid_cdb.'&cid='.$last_id.'">CLICK HERE</a></p>';

   /*$mail_body = '<h4>Position Applied: '.$applied_position.'</h4>
   <h4>Job Location: '.$job_location.'</h4><br><br><br><br><br><br>

   <h3 style="text-align: center">Personal Information</h3>

   <table style="margin-left: auto; margin-right: auto;width: 50%; border-collapse:collapse;">
      <tbody>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Full Name</td>
            <td style="border: none; padding: 6px">'.$pi['full_name'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">Former Name</td>
            <td style="border: none; padding: 6px">'.$pi['former_name'].'</td>
         </tr>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Name of father</td>
            <td style="border: none; padding: 6px">'.$pi['father_name'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">DOB</td>
            <td style="border: none; padding: 6px">'.$pi['dob'].'</td>
         </tr>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Gender</td>
            <td style="border: none; padding: 6px">'.$pi['gender'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">Social Security</td>
            <td style="border: none; padding: 6px">'.$pi['ssn'].'</td>
         </tr>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Nationality</td>
            <td style="border: none; padding: 6px">'.$pi['nationality'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">Marital Status</td>
            <td style="border: none; padding: 6px">'.$pi['marital_status'].'</td>
         </tr>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Current Address</td>
            <td style="border: none; padding: 6px">'.$pi['current_address'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">Period pf stay</td>
            <td style="border: none; padding: 6px">From: '.date('d-m-Y',strtotime($pi['ps_from_date'])).' - To: '.date('d-m-Y',strtotime($pi['ps_to_date'])).'</td>
         </tr>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Residence Number</td>
            <td style="border: none; padding: 6px">'.$pi['residence_landline_number'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">Mobile Number</td>
            <td style="border: none; padding: 6px">'.$pi['mb_no'].'</td>
         </tr>
         <tr style="background-color: #E7E7E7">
            <td style="border: none; padding: 6px">Permanent Address</td>
            <td style="border: none; padding: 6px">'.$pi['permanent_address'].'</td>
         </tr>
         <tr>
            <td style="border: none; padding: 6px">Period of stay</td>
            <td style="border: none; padding: 6px">From: '.date('d-m-Y',strtotime($pi['pa_ps_from_date'])).' - To: '.date('d-m-Y',strtotime($pi['pa_ps_to_date'])).'</td>
         </tr>
      </tbody>
   </table>
   <h3 style="text-align: center">Educational Details</h3>';

   $countEduArray = count($ed['college_name']);

   $mail_body_part = '';
   for($i=0;$i<$countEduArray;$i++){
      $mail_body_part .= "
      <table style='width: 50%; border-collapse:collapse; margin-bottom: 80px;margin-left: auto; margin-right: auto;'>
      <tbody>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>College Name</td>
            <td style='border: none; padding: 6px'>".$ed['college_name'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>College Address</td>
            <td style='border: none; padding: 6px'>".$ed['college_address'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Qualification Gained</td>
            <td style='border: none; padding: 6px'>".$ed['qualification_gained'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Full Time/ Part Time</td>
            <td style='border: none; padding: 6px'>".$ed['part_full_time'][$i]."</td>
         </tr>

         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Roll No</td>
            <td style='border: none; padding: 6px'>".$ed['roll_no'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Dates Attended</td>
            <td style='border: none; padding: 6px'>From: ".date('d-m-Y',strtotime($ed['dates_attended_from_date'][$i]))." - To: ".date('d-m-Y',strtotime($ed['dates_attended_to_date'][$i]))."</td>
         </tr>";
         $edu_certificates = '';
         if(isset($ed['edu_marksheet'][$i]) && $ed['edu_marksheet'][$i] == 1){
            $edu_certificates .= 'Marksheet   ';
         }
         if(isset($ed['edu_provosional_certificate'][$i]) && $ed['edu_provosional_certificate'][$i] == 1){
            $edu_certificates .= 'Provisional Certificate
      ';
         }
         if(isset($ed['edu_degree_certificate'][$i]) && $ed['edu_degree_certificate'][$i] == 1){
            $edu_certificates .= 'Degree Certificate
      ';
         }
         if(isset($ed['edu_none'][$i]) && $ed['edu_none'][$i] == 1){
            $edu_certificates = 'None';
         }
         $mail_body_part .= "<tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Certificates Attached</td>
            <td style='border: none; padding: 6px'>$edu_certificates</td>
         </tr>
         </tbody>
         </table>
         ";
   }

   $mail_body .= $mail_body_part;

   $countEmpArray = count($emp['employee_code']);

   $mail_body_part = '';
   for($i=0;$i<$countEmpArray;$i++){
      $mail_body_part .= "
      <table style='width: 50%; border-collapse:collapse; margin-bottom: 80px;margin-left: auto; margin-right: auto;'>
      <tbody>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Employer Name</td>
            <td style='border: none; padding: 6px'>".$emp['current_employer_name'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Employer Address</td>
            <td style='border: none; padding: 6px'>".$emp['current_employer_address'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Telephone No</td>
            <td style='border: none; padding: 6px'>".$emp['employee_tel'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Candidate Employee ID</td>
            <td style='border: none; padding: 6px'>".$emp['employee_code'][$i]."</td>
         </tr>

         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Designation</td>
            <td style='border: none; padding: 6px'>".$emp['employee_designation'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Department</td>
            <td style='border: none; padding: 6px'>".$emp['employee_department'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Employment Period</td>
            <td style='border: none; padding: 6px'>From: ".date('d-m-Y',strtotime($emp['employment_period_from_date'][$i]))." - To: ".date('d-m-Y',strtotime($emp['employment_period_to_date'][$i]))."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Manager Name</td>
            <td style='border: none; padding: 6px'>".$emp['manager_name'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Manager Contact No</td>
            <td style='border: none; padding: 6px'>".$emp['manager_contact_no'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Manager Email</td>
            <td style='border: none; padding: 6px'>".$emp['manager_email'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Reason for leaving</td>
            <td style='border: none; padding: 6px'>".$emp['reason_leaving'][$i]."</td>
         </tr>`
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>First Drwan Salary</td>
            <td style='border: none; padding: 6px'>".$emp['first_salary'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Second Drwan Salary</td>
            <td style='border: none; padding: 6px'>".$emp['second_salary'][$i]."</td>
         </tr>
         <tr>
            <td style='border: none; padding: 6px; padding: 6px'>Position Type</td>
            <td style='border: none; padding: 6px'>".$emp['position_type'][$i]."</td>
         </tr>
         <tr style='background-color: #E7E7E7'>
            <td style='border: none; padding: 6px; padding: 6px'>Agency Details</td>
            <td style='border: none; padding: 6px'>".$emp['agency_details'][$i]."</td>
         </tr>";

         $emp_certificates = '';
         if(isset($emp['emp_relieving_letter'][$i]) && $emp['emp_relieving_letter'][$i] == 1){
            $emp_certificates .= 'Marksheet   ';
         }
         if(isset($emp['emp_offer_letter'][$i]) && $emp['emp_offer_letter'][$i] == 1){
            $emp_certificates .= 'Provisional Certificate
      ';
         }
         if(isset($emp['emp_service_certificate'][$i]) && $emp['emp_service_certificate'][$i] == 1){
            $emp_certificates .= 'Degree Certificate
      ';
         }
         if(isset($emp['emp_other_doc'][$i]) && $emp['emp_other_doc'][$i] == 1){
            $emp_certificates = 'Others';
         }
         if(isset($emp['emp_none'][$i]) && $emp['emp_none'][$i] == 1){
            $emp_certificates = 'None';
         }
         $mail_body_part .= "<tr>
            <td style='border: none; padding: 6px; padding: 6px'>Certificates Attached</td>
            <td style='border: none; padding: 6px'>$emp_certificates</td>
         </tr>
         </tbody>
         </table>
         ";
   }

   $mail_body .= $mail_body_part;*/
   $header = "From:bgvcst@goldquestglobal.in \r\n";
   $header .= "Cc:manjunath@goldquestglobal.in \r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";

   $subject = 'Candidate Application';
   //echo $message;exit;
   
   $retval = mail ($email_id,$subject,$mail_body,$header);
?>
      <!--bgvcst@goldquestglobal.in-->