<?php  
include 'config.php';

extract($_POST);

$exrefidc=$exrefid;
//selection of services 
$servqry=mysqli_query($con,"select * from clent_details where client_uid='$exrefidc'");
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
    if($fnmeimplo=='insta_drug_test'){
        $fnmeimplo = 'insta_drug_panel';
    }
    $tio;
    $tio=$fnmeimplo.','.$tio;
}
$lowe=strtolower($tio);
//$ghui=substr($lowe, 0,-1);#CH
$ghui=substr($lowe, 0,-1);
$poi=strtoupper($ghui);

/*******************************************************************************************************************/
/*$q=mysqli_query($con,"select ref_id,company_name,emp_name,date,time,$ghui,status from applications where client_uid='$exrefidc'");*/
/*******************************************************************************************************************/


/*$q=mysqli_query($con,"select ref_id,company_name,emp_name,applic_entry.finl_rpt_dt,time,$ghui,applic_entry.over_status from applications join applic_entry on applic_entry.appl_id =  applications.ref_id where ref_id='$exrefidc'");*/

/*$q=mysqli_query($con,"select ref_id,company_name,emp_name,applic_entry.finl_rpt_dt,time,applic_entry.over_status from applications join applic_entry on applic_entry.appl_id =  applications.ref_id where ref_id='GQG-MSC-1-21'");*/

// $q=mysqli_query($con,"select ref_id,company_name,emp_name,applic_entry.finl_rpt_dt,time,$ghui,applic_entry.over_status from applications join applic_entry on applic_entry.appl_id =  applications.ref_id where client_uid='$exrefidc'");

$where = ($appication_status!="")?" AND applic_entry.over_status='".$appication_status."'":"";

$q=mysqli_query($con,"select applic_entry.case_rcvd_month,ref_id,applic_entry.case_rv_dt,company_name,applic_entry.cand_ref_id,emp_name,applic_entry.cont_num,applic_entry.fat_ful_nme,applic_entry.dob_fath,applic_entry.gen,applic_entry.marital_stats,applic_entry.nationlty,applic_entry.pa_full_address,applic_entry.pa_pos_from,applic_entry.pa_pos_to,applic_entry.pa_landmark,applic_entry.pa_residence_mobile_no,applic_entry.pa_state,applic_entry.pa_court_address,applic_entry.ca_full_address,applic_entry.ca_landmark,applic_entry.ca_residence_mobile_no,applic_entry.ca_state,applic_entry.ca_court_address,current_address,permanent_address,emp_hr_1,emp_hr_2,emp_hr_3,emp_hr_4,emp_hr_5, emp_hr_6,post_graduation,graduation,12th_std,10th_std,diploma,pro_reference_1,pro_reference_2,pro_reference_3,insta_drug_panel,criminal_police_record,criminal_court_record,court_record_curr,criminal_database,credit_verification,national_id_check_1,national_id_check_2,company_site_visit,applic_entry.insf_ra_dt,applic_entry.insuf_rmrks,applic_entry.insuf_clr_dt,applic_entry.over_status,applic_entry.finl_rpt_dt from applications join applic_entry on applic_entry.appl_id = applications.ref_id where client_uid='$exrefidc'".$where);

$poiArray = explode(',',$poi);
$columnHeader = '';  

//INSTA_DRUG_PANEL."\t""EMP_HR_3"."\t""EMP_HR_1"."\t".


$columnHeaderSegment = substr($columnHeaderSegment, 0, -1);
//$columnHeader = "Application ID" . "\t" . "Company name" . "\t" . "Employe Name" . "\t" . "Reported Date" . "\t" . "Time" . "\t" . "$columnHeaderSegment" . "\t" . "Overall Status" ."\t";
//$columnHeader .= "Application ID" . "\t" . "Company name" . "\t" . "Employe Name" . "\t" . "Reported Date" . "\t" . "Time" . "\t"; //. "$columnHeaderSegment" . "\t" . "Overall Status" ."\t";

$columnHeader = "SL NO" . "\t" . "CASE RECEIVED MONTH" . "\t" . "GQG APPLICATION ID" . "\t" . "CASE RECEIVED DATE" . "\t"."CLIENT COMPANY FULL NAME" . "\t" . "CLIENT EMPLOYEE ID" . "\t" . "CANDIDATE FULL NAME" . "\t" . "MOBILE NUMBER" ."\t" . "FATHER FULL NAME" ."\t" . "DATE OF BIRTH" . "\t" . "GENDER" . "\t" . "MARITAL STATUS" . "\t" . "NATIONALITY" . "\t"."PERMANENT FULL ADDRESS" . "\t" . "PERIOD OF STAY" . "\t" . "PERMANENT ADDRESS LANDMARK" . "\t" . "RESIDENCE MOBILE NUMBER" ."\t" . "STATE" ."\t" ."CURRENT FULL ADDRESS" . "\t" . "CURRENT ADDRESS LANDMARK" . "\t" . "RESIDENCE MOBILE NO" . "\t" . "STATE" . "\t"."COURT PERMANENT ADDRESS" . "\t" . "COURT CURRENT ADDRESS" . "\t" . "PERMANENT ADDRESS" . "\t" . "CURRENT ADDRESS" ."\t" . "POST GRADUATION" ."\t" . "GRADUATION" . "\t" . "12th STD" . "\t" . "10th STD" . "\t" . "DIPLOMA" . "\t"."Ex-Emp-1" . "\t" . "Ex-Emp-2" . "\t" . "Ex-Emp-3" . "\t" . "Ex-Emp-4" ."\t" . "PROFFESSIONAL REF-1" ."\t" ."PROFFESSIONAL REF-2" . "\t" . "PROFFESSIONAL REF-3" . "\t" . "NATIONAL ID 1" . "\t" . "NATIONAL ID 2" . "\t". "CIBIL - CREDIT CHECK" . "\t" . "INSTA DRUG TEST" ."\t" . "POLICE VERBAL" ."\t" . "COURT RECORD PERM" ."\t" .  "COURT RECORD CURR" ."\t" ."GLOBAL DATABASE" ."\t" ."COMPANY SITE VISIT" ."\t" ."INSUFF RAISED DATE" . "\t" . "INSUFF REMARKS" . "\t" . "INSUFF CLEARED DATE" . "\t" . "OVERALL STATUS" . "\t"."REPORT DATE" ."\t\t"."TOTAL COUNT";

$setData = '';
  $sl_no=1; 
  $rec = mysqli_fetch_assoc($q);
  while ($rec = mysqli_fetch_assoc($q)) {  
    $rowData = '';  
    $rowData = $sl_no . "\t" . $rec['case_rcvd_month'] . "\t". $rec['ref_id'] ."\t". $rec['case_rv_dt'] ."\t". $rec['company_name'] ."\t". $rec['cand_ref_id'] ."\t". $rec['emp_name'] ."\t". $rec['cont_num'] ."\t". $rec['fat_ful_nme'] ."\t". $rec['dob_fath'] ."\t". $rec['gen'] ."\t". $rec['marital_stats'] ."\t". $rec['nationlty'] ."\t". $rec['pa_full_address'] ."\t". $rec['pa_pos_from'] ." - ".$rec['pa_pos_to']."\t". $rec['pa_landmark'] ."\t". $rec['pa_residence_mobile_no'] ."\t". $rec['pa_state'] ."\t".  $rec['ca_full_address'] ."\t". $rec['ca_landmark'] ."\t". $rec['ca_residence_mobile_no'] ."\t". $rec['ca_state'] ."\t".$rec['pa_court_address'] . "\t". $rec['ca_court_address'] ."\t". $rec['permanent_address'] ."\t". $rec['current_address'] ."\t".$rec['post_graduation'] ."\t". $rec['graduation'] ."\t". $rec['12th_std'] ."\t". $rec['10th_std'] ."\t". $rec['diploma'] . "\t". $rec['emp_hr_1'] ."\t". $rec['emp_hr_2'] ."\t". $rec['emp_hr_3'] ."\t". $rec['emp_hr_4'] ."\t". $rec['pro_reference_1'] ."\t". $rec['pro_reference_2'] ."\t". $rec['pro_reference_3'] ."\t".$rec['national_id_check_1'] ."\t".$rec['national_id_check_2'] ."\t".$rec['credit_verification'] ."\t". $rec['insta_drug_panel'] ."\t". $rec['criminal_police_record'] ."\t". $rec['criminal_court_record'] ."\t". $rec['court_record_curr'] ."\t". $rec['criminal_database'] ."\t". $rec['company_site_visit'] ."\t". $rec['insf_ra_dt'] ."\t". $rec['insuf_rmrks'] ."\t". $rec['insuf_clr_dt'] ."\t". $rec['over_status'] ."\t". $rec['finl_rpt_dt']; 

    $setData .= "\n".trim($rowData);  
    $sl_no++;
}

$setData .= "\t\t\t".($sl_no-1) . "\n";
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=$exrefidc.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . $setData . "\n";  
 ?> 