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
    
    $tio;
    $tio=$fnmeimplo.','.$tio;
}
$lowe=strtolower($tio);
$ghui=substr($lowe, 0,-1);
$poi=strtoupper($ghui);

$q=mysqli_query($con,"select ref_id,company_name,emp_name,date,time,$ghui,status from applications where client_uid='$exrefidc'");
$columnHeader = '';  
$columnHeader = "Application ID" . "\t" . "Company name" . "\t" . "Employe Name" . "\t" . "Date" . "\t" . "Time" . "\t" . "$poi" . "\t" . "Overall Status" ."\t";
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