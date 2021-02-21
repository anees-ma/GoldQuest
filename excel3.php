<?php  
include 'config.php';

extract($_POST);

$dmyy=$apmnth.'-'.$apyer;
$exrefidc=$dmyy;
//selection of services 
/*$servqry=mysqli_query($con,"select * from clent_details where client_uid='$exrefidc'");
$servqryres=mysqli_fetch_assoc($servqry);
$servlist=$servqryres['service_name'];
$servexp=explode(',',$servlist);
$servcnt=count($servexp)-1;

$j=0;
for($j=0; $j < $servcnt; $j++){
    $sernme=$servexp[$j];
    $hasexp=explode('#',$sernme);
    $fnme=$hasexp[1];
    $fnmeexp=explode('-',$fnme);
    $fnmeimplo=implode('_',$fnmeexp);
    
    $tio;
    $tio=$fnmeimplo.','.$tio;
}
$lowe=strtolower($tio);
$ghui=substr($lowe, 0,-1);
$poi=strtoupper($ghui);
*/
$q=mysqli_query($con,"select ref_id,company_name,emp_name,date,time,status,current_address,permanent_address,emp_hr_1,emp_hr_2,emp_hr_3,emp_hr_4,emp_hr_5,
emp_hr_6,emp_hr_7,emp_hr_8,post_graduation,graduation,12th_std,10th_std,diploma,pro_reference_1,pro_reference_2,5_panel,6_panel,10_panel,12_panel,
criminal_police_record,criminal_court_record,criminal_database,credit_verification,national_id_check,company_site_visit from applications where date like '%$exrefidc'");
$columnHeader = '';  
$columnHeader = "Application ID" . "\t" . "Company name" . "\t" . "Employe Name" . "\t" . "Date" . "\t" . "Time" . "\t" . "Overall Status" ."\t" . "CURRENT ADDRESS" ."\t" . "PERMANENT ADDRESS" ."\t" . "EMP HR-1" ."\t"
. "EMP HR-2" ."\t" . "EMP HR-3" ."\t" . "EMP HR-4" ."\t" . "EMP HR-5" ."\t" . "EMP HR-6" ."\t" . "EMP HR-7" ."\t" . "EMP HR-8" ."\t" . "POST GRADUATION" ."\t" . "GRADUATION" ."\t" . "12-STD" ."\t" . "10-STD" ."\t" . "DIPLOMA" ."\t" . "PROFESSIONAL REFERENCE -1" ."\t" . "PROFESSIONAL REFERENCE -2" ."\t" . "5-PANEL" ."\t" . "6-PANEL" ."\t" . "10-PANEL" ."\t"
. "12-PANEL" ."\t" . "CRIMINAL POLICE-RECORD" ."\t" . "CRIMINAL COURT-RECORD" ."\t" . "CRIMINAL DATABASE" ."\t" . "CREDIT VERIFICATION" ."\t" . "NATIONAL ID CHECK" ."\t" . "COMPANY SITE VISIT" ."\t";
$setData = '';  
  while ($rec = mysqli_fetch_row($q)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=$exrefidc.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 