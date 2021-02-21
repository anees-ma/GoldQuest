<?php 
include 'config.php';
include 'header.php';
$exrefidc='GQG-PRA-01';/*$_POST['exrefidc'];*/
//selection of client uid
?>
                    <?php 
                    $seserv=mysqli_query($con,"select * from clent_details where client_uid='$exrefidc' order by id DESC");
                    $seservres=mysqli_fetch_assoc($seserv);
                    $serffnme=$seservres['service_name'];
                    $seservexp=explode(',',$serffnme);
                    $servtcnt=count($seservexp)-1;
                    $d=0;
                    $columnHeader = '';
                    for($d=0; $d < $servtcnt; $d++){
                        $servhas=explode('#',$seservexp[$d]);
                        $serfnnme=$servhas[1];
                        $columnHeader = "Application ID" . "\t" . "GQG Reference ID" . "\t" . "Date/Time" . "\t" . "Employee Name" ."\t" . "$serfnnme" ."\t";
                    }
                    $setData = ''; 
                    ?>
                    <?php 
                    $a=1;
                    $q=mysqli_query($con,"select * from applications where client_uid='$exrefidc' order by id DESC");
                    while($rec=mysqli_fetch_assoc($q)){
                        $rowData = '';
                        foreach ($rec as $value) {  
                            $value = '"' . $value . '"' . "\t";  
                            $rowData .= $value;  
                        }
                        $setData .= trim($rowData) . "\n"; 
                        /*$appic_id=$aplselres['ref_id'];
                        $ampmsd=$aplselres['date'];
                        $ampmsdtim=$aplselres['time'];
                        $ampmsd2=date("g:i a",strtotime($ampmsdtim));
                        $appicqry=mysqli_query($con,"select * from applic_entry where appl_id='$appic_id'");
                        $appicqryres=mysqli_fetch_assoc($appicqry);
                        $over_all_sta=$appicqryres['over_status'];*/
    
                    }
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n";  
?>
        