<?php 
include 'config.php';
extract($_POST);
//variables declaration
$appl_id='GQG-SHR-05-1';
//selection of services
$sel_serv=mysqli_query($con,"select * from applications where ref_id='$appl_id'");
$sel_servres=mysqli_fetch_assoc($sel_serv);
$client_uid=$sel_servres['client_uid'];
$emp_nme=$sel_servres['emp_name'];
$org_nme=$sel_servres['company_name'];

//selection of applic entry
$applic_ent=mysqli_query($con,"select * from applic_entry where appl_id='$appl_id'");
$applic_entres=mysqli_fetch_assoc($applic_ent);
$emp_dob=$applic_entres['dob_fath'];
$emp_id=$applic_entres['clnt_emp_id'];

//selection client uid
$clqry=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$clqryres=mysqli_fetch_assoc($clqry);
$srv_list=$clqryres['service_name'];
$list_exp=explode(',',$srv_list);
$licnt=count($list_exp)-1;

$pdf_nme=$appl_id.'-'.$emp_id.'-'.$emp_nme.'-'.'Finalrpt';
$pdf .='<section class="sec">';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td>'.'<img style="width:350px" src="http://www.goldquestglobal.com/images/logo.png">'.'</td>';
$pdf .='<td style="font-weight:bold;text-align:center">'.'Confidential Background Verification Report'.'</td>';
$pdf .='<td style="text-align:right">'.'<img src="https://farmocart.com/newp/images/verified.jpg" style="width:50px;">'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey">'.'Report Candidate Name'.'</td>';
$pdf .='<td style="border:1px solid grey">'.ucwords($emp_nme).'</td>';
$pdf .='<td style="border:1px solid grey"> Client / Organization Name';           $pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.ucwords($org_nme).'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey">GQG Reference No';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$client_uid.'</td>';
$pdf .='<td style="border:1px solid grey"> 
Report Status  ';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">';  
$pdf .='</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey">Date Of Birth';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$emp_dob.'</td>';
$pdf .='<td style="border:1px solid grey"> 
Date of File Submitted';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">';  
$pdf .='</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey">Employee Code ';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$emp_id.'</td>';
$pdf .='<td style="border:1px solid grey"> 
Clock Begin Date   ';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">';  
$pdf .='</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey">Report Type ';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'; 
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey"> 
Report Closed Date';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">';  
$pdf .='</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey">Client Company Location';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'; 
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey"> 
Final Verification Status';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">';  
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
//back step1 st
$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr>';
$pdf .='<th style="background-color:cornflowerblue;font-weight:bold;text-align:center;padding:5px;border:1px solid white;border-left:1px solid grey;font-size:12px">'.'REPORT COMPONENT'.'</th>';
$pdf .='<th style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid white;font-size:12px">'.'INFORMATION SOURCE'.'</th>';
$pdf .='<th style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid white;font-size:12px">'.'LOCATION'.'</th>';
$pdf .='<th colspan="2" style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid white;border-right:1px solid grey;font-size:12px">'.'COMPONENT STATUS'.'</th>';
$pdf .='</tr>';
$pdf.='<tr style="border:1px solid black">';
$pdf .='<td style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;font-size:12px">'.''.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;font-size:12px">'.''.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;font-size:12px">'.''.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;border-right:1px solid white;font-size:12px">'.'Completed'.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;font-size:12px">'.'Verification Status'.'</td>';
$pdf.='</tr>';
//selection of services
$m=0;
for($m=0; $m < $licnt; $m++){
                            $bck=$list_exp[$m];
                            $bck2=explode('#',$bck);
                            $bck3=$bck2[0];
                            $bckf;
                            $bckf=$bck3.','.$bckf;
                        }
                        $etexp=explode(',',$bckf);
                        $et=array_unique($etexp);
                        $etcnt=count($et)-1;
$h=0;
                        for($h=0; $h < $etcnt; $h++){
                            $srv_id=$et[$h];
                            $bqry=mysqli_query($con,"select * from bck_verification where id='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $srcexp=explode(' ',$sece_nme);
                            $srcimplo=implode('_',$srcexp);
                            $pdf .='<tr style="border:1px solid grey;padding:20px">';
                            $pdf .='<td style="border:1px solid grey">'.ucwords($sece_nme).'</td>';
                            //selection of source
                            $srco=mysqli_query($con,"select * from $srcimplo where appl_id='$appl_id'");
                            $srcores=mysqli_fetch_assoc($srco);
                            
                            $pdf .='<td style="border:1px solid grey;text-align:center">'.ucwords($srcores['source']).'</td>';
                            $pdf .='<td style="border:1px solid grey">'.ucwords($srcores['location']).'</td>';
                            $pdf .='<td style="border:1px solid grey">'.ucwords($srcores['cmpl_date']).'</td>';
                            if($srcores['color_code'] == 'red'){
                                $clrt='red';
                            }
                            elseif($srcores['color_code'] == 'yellow'){
                                $clrt='yellow';
                            }
                            elseif($srcores['color_code'] == 'orange'){
                                $clrt='orange';
                            }
                            elseif($srcores['color_code'] == 'pink'){
                                $clrt='pink';
                            }
                            elseif($srcores['color_code'] == 'green'){
                                $clrt='green';
                            }
                            $pdf .='<td style="border:1px solid grey;font-weight:bold;color:'.$clrt.'">'.strtoupper($srcores['color_code']).'</td>';
                            $pdf .='</tr>';
                        }
$pdf .='</table>';
$pdf .='<br><br><br><br><br><br><br><br><br><br><br><br>';
$pdf .='<div>'.'<strong>Address:</strong> # 18, Krishna Summit, Shop No 303 B, 3rd Floor, Marathahalli Outer Ring Road, Bangalore – 560037 | Landmark - Above Khazana Jewellery, Next to Canara Bank | Phone: +91-80-48663693 | www.goldquestglobal.in'.'</div>';
$pdf .='<br>';
$pdf .='<div style="text-align:center;font-weight:bold">'.'End of Summary Report'.'</div>';
$pdf .'<br><br><br><br><br>';
$pdf .='<table style="border:1px solid grey;padding:5px">';
$pdf .='<tr>';
$pdf .='<td style="font-weight:bold">'.'Legend:'.'</td>';
$pdf .='<td style="padding:5px;">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:red;color:red">'.'majj'.'</span>';
$pdf .='<span>'.' - Major Discrepancy'.'</span>';
$pdf .='</td>';
$pdf .='<td style="padding:5px">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:yellow;color:yellow">'.'majj'.'</span>';
$pdf .='<span>'.' - Minor Discrepancy'.'</span>';
$pdf .='</td>';
$pdf .='<td style="padding:5px">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:orange;color:orange">'.'majj'.'</span>';
$pdf .='<span>'.' - Unable to verify'.'</span>';
$pdf .='</td>';
$pdf .='<td style="padding:5px">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:pink;color:pink">'.'majj'.'</span>';
$pdf .='<span>'.' - Pending from source'.'</span>';
$pdf .='</td>';
$pdf .='<td style="padding:5px">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:green;color:green">'.'majj'.'</span>';
$pdf .='<span>'.' - All Clear'.'</span>';
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br>';
$pdf .= '</section>';
/*$pdf .='<section>';*/
$f=0;
for($f=0; $f < $etcnt; $f++){
    $pdf .='<section class="sec">';
    $srv_id=$et[$f];
    $bqry=mysqli_query($con,"select * from bck_verification where id='$srv_id'");
    $bqryrs=mysqli_fetch_assoc($bqry);
    $maj_ser=$bqryrs['service_name'];
    $appl_det=$bqryrs['appl_details'];
    $appl_detexp=explode(',',$appl_det);
    $appl_det2=$bqryrs['report_details'];
    $appl_det2exp=explode(',',$appl_det2);
    $appl1=$bqryrs['appl_shrt'];
    $appl1exp=explode(',',$appl1);
    $applcnt=count($appl1exp)-1;
    
    $appl2=$bqryrs['report_shrt'];
    $appl2exp=explode(',',$appl2);
/*$pdf .='<div style="border-bottom:1px solid grey;padding:5px;text-align:center;font-weight:bold">'.'Background Verification'.'</div>';*/
$pdf .='<div style="background-color:cornflowerblue;padding:10px;color:white;text-align:center;font-weight:bold;border:1px solid cornflowerblue">'.ucwords($maj_ser).'</div>';
$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="background-color:lightgrey">';
$pdf .='<th colspan="2" style="border:1px solid lightgrey;text-align:center;font-weight:bold">'.'Application Details'.'</th>';
$pdf .='<th colspan="2" style="border:1px solid lightgrey;text-align:center;font-weight:bold">'.'Report Details'.'</th>';
$pdf .='</tr>';
$s=0;
for($s=0; $s < $applcnt; $s++){
    $hypen=explode(' ',$maj_ser);
    $imploser=implode('_',$hypen);
    //selection particular table
    $partqry=mysqli_query($con,"select * from $imploser where appl_id='$appl_id'");
    $partqryres=mysqli_fetch_assoc($partqry);
    
    $pdf .='<tr style="padding:5px">';
    $pdf .='<td style="padding:10px">'.ucwords($appl_detexp[$s]).'</td>';
    $pdf .='<td style="padding:10px;text-align:center">'.$partqryres[$appl1exp[$s]].'</td>';
    $pdf .='<td style="padding:10px">'.ucwords($appl_det2exp[$s]).'</td>';
    $pdf .='<td style="padding:10px;text-align:center">'.$partqryres[$appl2exp[$s]].'</td>';
    $pdf .='</tr>';
}
$pdf .='</table>';
$pdf .='<div style="border:1px solid grey;padding:10px;font-weight:bold">'.'Remarks:&nbsp;'.ucwords($partqryres['remarks']).'</div>';
$pdf .='<div style="font-weight:bold">'.'ANNEXURE'.'</div>';
$pdf .='<div style="text-align:center">';
if($partqryres['report'] != NULL){
 $pdf .='<img src="https://farmocart.com/newp/'.$partqryres['report'].'" style="height:550px;width:400px">';   
 $pdf .='<br><br><br><br><br><br><br><br>';
}
$pdf .='</div>';
$pdf .='</section>';
}
$pdf .='<section class="sec">';
$pdf .='<div style="background-color:cornflowerblue;font-weight:bold;text-align:center;color:white">'.'Disclaimer'.'</div>';
$pdf .='<div>'.'This report is confidential and is meant for the exclusive use of the Client. This report has been prepared solely for the 
purpose set out pursuant to our letter of engagement (LoE)/Agreement signed with you and is not to be used for any other 
purpose. The Client recognizes that we are not the source of the data gathered and our reports are based on the information
purpose. The Client recognizes that we are not the source of the data gathered and our reports are based on the information
responsible for employment decisions based on the information provided in this report.
'.'</div>';
$pdf .='<div style="font-weight:bold;text-align:center;border:1px solid grey;padding:10px">'.'End of Detail Report'.'</div>';
$pdf .='</section>';

echo $pdf;
?>