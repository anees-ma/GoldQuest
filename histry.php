<?php  
include 'config.php';


$q=mysqli_query($con,"select name,date,ip_address from lgn_history");
$columnHeader = '';  
$columnHeader = "Email" . "\t" . "Login Date/Time" . "\t" . "IP Address" . "\t";
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
header("Content-Disposition: attachment; filename=LoginHistory.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 