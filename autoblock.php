<?php 
include 'config.php';

//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('Y').'-'.date('m').'-'.date('d');
//time ed//

$q=mysqli_query($con,"select * from clent_details");
while($qres=mysqli_fetch_assoc($q)){
$agr_st=$qres['dsagre'];  
$expsel=$qres['dsagreepero'];
$client_uid=$qres['client_uid'];

if($expsel != 'Unless Terminated'){
    $yrs=explode(' ',$expsel);
    $yrs2=$yrs[0];
    
    $agr_stexp=explode('-',$agr_st);
    $agr_stexp2=$agr_stexp[0]+$yrs2;
    
    $finl=$agr_stexp2.'-'.$agr_stexp[1].'-'.$agr_stexp[2];
    if(strtotime($finl) < strtotime($dap)){
        //update the status
        $inacti='In Active';
        $upqry=mysqli_query($con,"update clent_details set status='$inacti' where client_uid='$client_uid'");
        /*if($upqry){
            echo 'updated';
        }*/
    }
}

}
?>