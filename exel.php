<?php  
include 'config.php';


$q=mysqli_query($con,"select * from serv_list");
$columnHeader = '';  
$columnHeader = "Application ID" . "\t" . "GQG Reference ID" . "\t" . "Date/Time" . "\t" . "Employee Name" ."\t";
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
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 