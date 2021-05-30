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

$q=mysqli_query($con,"select ref_id,company_name,emp_name,applic_entry.finl_rpt_dt,time,$ghui,applic_entry.over_status from applications join applic_entry on applic_entry.appl_id =  applications.ref_id where client_uid='$exrefidc'");

$poiArray = explode(',',$poi);
$columnHeader = '';  

//INSTA_DRUG_PANEL."\t""EMP_HR_3"."\t""EMP_HR_1"."\t".


$columnHeaderSegment = substr($columnHeaderSegment, 0, -1);
//echo $columnHeaderSegment;exit;
//$columnHeader = "Application ID" . "\t" . "Company name" . "\t" . "Employe Name" . "\t" . "Reported Date" . "\t" . "Time" . "\t" . "$columnHeaderSegment" . "\t" . "Overall Status" ."\t";
$columnHeader .= "Application ID" . "\t" . "Company name" . "\t" . "Employe Name" . "\t" . "Reported Date" . "\t" . "Time" . "\t"; //. "$columnHeaderSegment" . "\t" . "Overall Status" ."\t";
foreach ($poiArray as $key => $valuePa) {
    $columnHeader .= $valuePa."\t";
}
$columnHeader .= "Overall Status" ."\t";

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