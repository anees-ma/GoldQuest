<?php
//ob_start();
   $pdf = '<section class="sec">';
   $pdf .= '<div><h1 style="text-align: center">Candidate Form Data</h1></div>';
   $pdf .= '<div><h3>Company Name: '.$company_name.'</h3></div>';
   $pdf .= '<div><h4>Position: '.$applied_position.'</h4></div>';
   $pdf .= '<div><h4>Job Location: '.$job_location.'</h4></div>';
   $pdf .= '<div><h2 style="text-align: center">Personal Information</h2></div>';
   $pdf .= '<table style="width:100%;border-collapse: collapse">
               <tbody>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Full Name</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;font-size: 15px;text-align:center">'.$post["personal_information"]["full_name"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Former Name</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["former_name"].'</td>
                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Father'."'".'s Name</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["father_name"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">DOB</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["dob"].'</td>
                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Gender</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["gender"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Social Security Number</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["ssn"].'</td>
                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Nationality</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["nationality"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Marital Status</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["marital_status"].'</td>
                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Current Address</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["current_address"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Period Of Stay(current)</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.date("d-m-Y",strtotime($post["personal_information"]["ps_from_date"])).' TO '.date("d-m-Y",strtotime($post["personal_information"]["ps_to_date"])).'</td>
                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Residence Number(current)</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["residence_landline_number"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Mobile Number(current)</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["mb_no"].'</td>

                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Permanent Address</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["permanent_address"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Period Of Stay(permanent)</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.date("d-m-Y",strtotime($post["personal_information"]["pa_ps_from_date"])).' TO '.date("d-m-Y",strtotime($post["personal_information"]["pa_ps_to_date"])).'</td>
                  </tr>
                  <tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Residence Number(permanent)</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["pa_residence_landline_number"].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Mobile Number(permanent)</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$post["personal_information"]["pa_mb_no"].'</td>
                  </tr>                 
               </tbody>
            </table>
            ';
            $pdf .= '</section>';

            $pdf .= '<section class="sec">';
            $pdf .= '<div><h2 style="text-align: center">Educational Details</h2></div>';

            $countEduArray = count($ed['college_name']);

            //$mail_body_part = '';
            for($i=0;$i<$countEduArray;$i++){
               $pdf .= '<h4 style="">'.($i+1).'. College Name: '.strtoupper($ed["college_name"][$i]).'</h4>';
               $pdf .= '
               <table style="width: 100%; border-collapse:collapse;">
               <tbody>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">College Name</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$ed["college_name"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">College Address</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$ed["college_address"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Qualification Gained</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$ed["qualification_gained"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Full Time/ Part Time</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$ed["part_full_time"][$i].'</td>
                  </tr>

                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Roll No</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$ed["roll_no"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Dates Attended</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.date("d-m-Y",strtotime($ed["dates_attended_from_date"][$i])).' TO: '.date("d-m-Y",strtotime($ed["dates_attended_to_date"][$i])).'</td>
                  </tr>
                  <tr>
                     
                  </tr>';
                  $edu_certificates = "";
                  if(isset($ed["edu_marksheet"][$i]) && $ed["edu_marksheet"][$i] == 1){
                     $edu_certificates .= "Marksheet,";
                  }
                  if(isset($ed["edu_provosional_certificate"][$i]) && $ed["edu_provosional_certificate"][$i] == 1){
                     $edu_certificates .= "Provisional Certificate,";
                  }
                  if(isset($ed["edu_degree_certificate"][$i]) && $ed["edu_degree_certificate"][$i] == 1){
                     $edu_certificates .= "Degree Certificate,";
                  }
                  if(isset($ed["edu_none"][$i]) && $ed["edu_none"][$i] == 1){
                     $edu_certificates = "None";
                  }
                  $edu_certificates = rtrim($edu_certificates, ",");
                  $edu_certificates = explode(",",$edu_certificates);
                  
                  $count_ec = count($edu_certificates);
                  for($p=1;$p<$count_ec;$p++){
                        $edu_certificates[$p] = ' '.$edu_certificates[$p];
                  }
                  $edu_certificates = implode(",",$edu_certificates);
                  $pdf .= '<tr>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Certificates Attached</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$edu_certificates.'</td>
                  </tr>
                  </tbody>
                  </table>
                  ';
            }
            $pdf .= '</section>';

            $pdf .= '<section class="sec">';
            $pdf .= '<div><h2 style="text-align: center">Employment Details</h2></div>';

            $countEmpArray = count($emp["employee_code"]);

            for($i=0;$i<$countEmpArray;$i++){
               $pdf .= '<h4 style="">'.($i+1).'. Employer Name:  '.strtoupper($emp["current_employer_name"][$i]).'</h4>';
               $pdf .= '
               <table style="width: 100%; border-collapse:collapse;">
               <tbody>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Employer Name</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["current_employer_name"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Employer Address</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["current_employer_address"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Telephone No</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["employee_tel"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Candidate Employee ID</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["employee_code"][$i].'</td>
                  </tr>

                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Designation</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["employee_designation"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Department</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["employee_department"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Employment Period</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.date("d-m-Y",strtotime($emp["employment_period_from_date"][$i])).' - '.date("d-m-Y",strtotime($emp["employment_period_to_date"][$i])).'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Manager Name</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["manager_name"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Manager Contact No</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["manager_contact_no"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Manager Email</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["manager_email"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Reason for leaving</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["reason_leaving"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">First Drwan Salary</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["first_salary"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Second Drwan Salary</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["second_salary"][$i].'</td>
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Position Type</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["position_type"][$i].'</td>
                  </tr>
                  <tr style="background-color: #E7E7E7">
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Agency Details</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp["agency_details"][$i].'</td>';

                  $emp_certificates = "";
                  if(isset($emp["emp_relieving_letter"][$i]) && $emp["emp_relieving_letter"][$i] == 1){
                     $emp_certificates .= "Marksheet,";
                  }
                  if(isset($emp["emp_offer_letter"][$i]) && $emp["emp_offer_letter"][$i] == 1){
                     $emp_certificates .= "Provisional Certificate,";
                  }
                  if(isset($emp["emp_service_certificate"][$i]) && $emp["emp_service_certificate"][$i] == 1){
                     $emp_certificates .= "Degree Certificate,";
                  }
                  if(isset($emp["emp_other_doc"][$i]) && $emp["emp_other_doc"][$i] == 1){
                     $emp_certificates .= "Others";
                  }
                  if(isset($emp["emp_none"][$i]) && $emp["emp_none"][$i] == 1){
                     $emp_certificates = "None";
                  }
                  $emp_certificates = rtrim($emp_certificates, ",");
                  $emp_certificates = explode(",",$emp_certificates);
                  
                  $count_ec = count($emp_certificates);
                  for($k=1;$p<$count_ec;$k++){
                        $emp_certificates[$k] = ' '.$emp_certificates[$k];
                  }
                  $emp_certificates = implode(",",$emp_certificates);
                  $pdf .= '
                     <td style="border: 1px solid black;font-size: 15px;background-color:#055C88; color: white; padding: 5px">Certificates Attached</td>
                     <td style="background-color: #E7E7E7;border: 1px solid black;font-size: 15px;text-align:center">'.$emp_certificates.'</td>
                  </tr>
                  </tbody>
                  </table>
                  ';
            }

            //echo $pdf;exit;

            $pdf_nme = "Candidate-".$candidate_id."-form-".$client_id.".pdf";
          //  exit;
            require("pdf/TCPDF/tcpdf.php");
$tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

/*$tcpdf->SetProtection(array("print", "copy","modify"), 'gold', 'ourcodeworld-master', 0, null);*/

// set title of pdf
$tcpdf->SetTitle($pdf_nme);

// set margins
$tcpdf->SetMargins(10, 10, 10, 10);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set header and footer in pdf
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(true);
$tcpdf->setListIndentWidth(3);

// set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, 12);

// set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

/*$tcpdf->AddPage();*/

$tcpdf->SetFont("roboto", "", 10);
$tcpdf->setCellPaddings( $left = "", $top = "1.5", $right = "", $bottom = "1.5");
$delimiter = '<section class="sec">';
/*$html = file_get_contents("rdata.php");*/
$chunks = explode($delimiter, $pdf);
$cnt = count($chunks);
for ($i = 0; $i < $cnt; $i++) {
$tcpdf->writeHTML($delimiter . $chunks[$i], true, 0, true, 0);
if ($i < $cnt - 1) {
$tcpdf->AddPage();
}
}
$tcpdf->lastPage();
/*$tcpdf->writeHTML($pdf, true, false, false, false, "");*/

//Close and output PDF document
/*$string = $pdf->Output($filename, "S");freeserif*/
$formPdfRoot = APP_FILE_PATH.'assets/candidate/'.$client_id.'/'.$candidate_id.'/form/';
$pdfFile = $formPdfRoot.$pdf_nme;
if(!is_dir($formPdfRoot)){
  mkdir($formPdfRoot,0777,true);
}
ob_end_clean();
$tcpdf->Output($pdfFile, 'F');

include 'candidate_application_generation_mail.php';

?>