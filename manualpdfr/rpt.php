<?php 
include '../config.php';
extract($_POST);
//variables declaration
/*$appl_id='GQG-SHR-05-1';*/
/*$appl_id='GQG-TATA-06-1';*/
$appl_id=$_REQUEST['reff_id'];
//selection of services
$sel_serv=mysqli_query($con,"select * from applications where ref_id='$appl_id'");
$sel_servres=mysqli_fetch_assoc($sel_serv);
$client_uid=$sel_servres['client_uid'];
$emp_nme=$sel_servres['emp_name'];
$org_nme=$sel_servres['company_name'];
$dofsub=$sel_servres['date'];

//selection of applic entry
$applic_ent=mysqli_query($con,"select * from applic_entry where appl_id='$appl_id'");
$applic_entres=mysqli_fetch_assoc($applic_ent);
$emp_dob=$applic_entres['dob_fath'];
$emp_id=$applic_entres['clnt_emp_id'];
$case_rv_dt=$applic_entres['case_rv_dt'];

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
$pdf .='<td>'.'<img style="width:250px" src="https://admin.goldquestglobal.in/images/logoquestglobal200new.png">'.'</td>';
/*$pdf .='<td style="font-weight:bold;text-align:center">'.'Confidential Background Verification Report'.'</td>';*/
$pdf .='<td style="text-align:right">'.'<img src="https://admin.goldquestglobal.in/images/verified.jpg" style="width:80px;">'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<div style="font-weight:bold;text-align:center">'.'Confidential Background Verification Report'.'</div>';
$pdf .='<br><br>';
$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-weight:bold">'.'Report Candidate Name'.'</td>';
$pdf .='<td style="border:1px solid grey">'.ucwords($emp_nme).'</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold"> Client / Organization Name';           $pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.ucwords($org_nme).'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-weight:bold">GQG Reference No';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$client_uid.'</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold"> 
Report Status  ';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.'Closed'.'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-weight:bold">Date Of Birth';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$emp_dob.'</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold"> 
Date of File Submitted';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$case_rv_dt.'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-weight:bold">Employee Code ';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$emp_id.'</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold"> 
Clock Begin Date   ';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.$case_rv_dt.'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-weight:bold">Report Type ';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.'Final'.'</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold"> 
Report Closed Date';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">';  
$pdf .='</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-weight:bold">Client Company Location';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'; 
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold"> 
Final Verification Status';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey">'.'Verified Clear'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
//back step1 st
$pdf .='<table style="border:1px solid grey">';
$pdf .='<tr>';
$pdf .='<th style="width:190;background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border-right:1px solid white;border-left:1px solid grey;border-bottom:1px solid #3e76a5;font-size:12px">'.'REPORT COMPONENT'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border-right:1px solid white;border-bottom:1px solid #3e76a5;font-size:12px;width:193">'.'INFORMATION SOURCE'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border-right:1px solid white;border-bottom:1px solid #3e76a5;border-left:1px solid white;font-size:12px;width:100">'.'LOCATION'.'</th>';
$pdf .='<th colspan="2" style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid white;border-right:1px solid grey;font-size:12px;width:190">'.'COMPONENT STATUS'.'</th>';
$pdf .='</tr>';
$pdf.='<tr style="border:1px solid black">';
$pdf .='<td style="width:190;background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border-right: 1px solid white;font-size:12px">'.''.'</td>';
$pdf .='<td style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border-right: 1px solid white;font-size:12px;width:193">'.''.'</td>';
$pdf .='<td style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border-right: 1px solid white;font-size:12px;width:100">'.''.'</td>';
$pdf .='<td style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;border-right:1px solid white;font-size:12px;width:80">'.'Completed'.'</td>';
$pdf .='<td style="background-color:#3e76a5;color:white;font-weight:bold;text-align:center;padding:5px;border:1px solid cornflowerblue;font-size:12px;width:110">'.'Verification Status'.'</td>';
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
                        $trc=substr($bckf, 0, -1);
                        $trcexp=explode(',',$trc);
                        /*$trccount=count($trcexp);*/
                        /*$arunq=array_unique($trcexp);
                        $arunqcnt=count($arunq);*/
                        foreach (array_unique($trcexp) as $d) {
                            $nj;
                            $nj=$d.','.$nj;
                            
                        }
                        $njexp=explode(',',$nj);
                        $njcnt=count($njexp)-1;
$h=0;
                        for($h=0; $h < $njcnt; $h++){
                            $srv_id=$njexp[$h];
                            $bqry=mysqli_query($con,"select * from bck_verification where id='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $srcexp=explode(' ',$sece_nme);
                            $srcimplo=implode('_',$srcexp);
                            $pdf .='<tr style="border:1px solid grey;padding:20px">';
                            $pdf .='<td style="border:1px solid grey;text-align:left;width:190">'.strtoupper($sece_nme).'</td>';
                            //selection of source
                            $srco=mysqli_query($con,"select * from $srcimplo where appl_id='$appl_id'");
                            $srcores=mysqli_fetch_assoc($srco);
                            
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:193">'.ucwords($srcores['source']).'</td>';
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:100">'.strtoupper($srcores['location']).'</td>';
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:80">'.ucwords($srcores['cmpl_date']).'</td>';
                            if($srcores['color_code'] == 'red'){
                                $clrt='red';
                            }
                            elseif(strtolower($srcores['color_code']) == 'yellow'){
                                $clrt='yellow';
                            }
                            elseif(strtolower($srcores['color_code']) == 'orange'){
                                $clrt='orange';
                            }
                            elseif(strtolower($srcores['color_code']) == 'pink'){
                                $clrt='pink';
                            }
                            elseif(strtolower($srcores['color_code']) == 'green'){
                                $clrt='green';
                            }
                            $pdf .='<td style="border:1px solid grey;font-weight:bold;width:110;text-align:center;color:'.$clrt.'">'.strtoupper($srcores['color_code']).'</td>';
                            $pdf .='</tr>';
                        }
$pdf .='</table>';
$pdf .='<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
$pdf .='<br>';
$pdf .='<div style="text-align:center;font-weight:bold">'.'End of Summary Report'.'</div>';
$pdf .'<br><br><br><br><br>';
$pdf .='<table style="border:1px solid grey;padding:5px">';
$pdf .='<tr>';
$pdf .='<td style="font-weight:bold;width:60;border:1px solid grey;font-size:11px">'.'Legend:'.'</td>';

$pdf .='<td style="border:1px solid grey;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:red;color:red">'.'majj'.'</span>';
$pdf .='<span>'.' - Major Discrepancy'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:yellow;color:yellow">'.'majj'.'</span>';
$pdf .='<span>'.' - Minor Discrepancy'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:orange;color:orange">'.'majj'.'</span>';
$pdf .='<span>'.' - Unable to verify'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey;font-size:10px;width:130">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:pink;color:pink">'.'majj'.'</span>';
$pdf .='<span>'.' - Pending from source'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid grey;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid grey;padding:10px;background-color:green;color:green">'.'majj'.'</span>';
$pdf .='<span>'.' - All Clear'.'</span>';
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .= '</section>';
/*$pdf .='<section>';*/
$f=0;
$an=1;
for($f=0; $f < $njcnt; $f++){
    $pdf .='<section class="sec">';
    $srv_id=$njexp[$f];
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
$pdf .='<div style="background-color:#3e76a5;padding:10px;color:white;text-align:center;font-weight:bold;border:1px solid cornflowerblue">'.strtoupper($maj_ser).'</div>';
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
    $pdf .='<td style="padding:10px;font-weight:bold">'.ucwords($appl_detexp[$s]).'</td>';
    $pdf .='<td style="padding:10px;text-align:left">'.$partqryres[$appl1exp[$s]].'</td>';
    $pdf .='<td style="padding:10px;font-weight:bold">'.ucwords($appl_det2exp[$s]).'</td>';
    $pdf .='<td style="padding:10px;text-align:left">'.$partqryres[$appl2exp[$s]].'</td>';
    $pdf .='</tr>';
}
$pdf .='</table>';
$pdf .='<div style="border:1px solid grey;padding:10px">'.'<strong>'.'Remarks:&nbsp;'.'</strong>'.ucwords($partqryres['remarks']).'</div>';
$pdf .='<div style="font-weight:bold">'.'ANNEXURE '.'- '.$an.'</div>';
$pdf .='<div style="text-align:center">';
if($partqryres['report'] != NULL){
 $pdf .='<img src="https://admin.goldquestglobal.in/'.$partqryres['report'].'" style="height:550px;width:400px">';   
 $pdf .='<br><br><br><br><br><br><br><br>';
}
$pdf .='</div>';
$pdf .='</section>';
$an++;
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
?>
<?php 
require('TCPDF/tcpdf.php');
$tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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

$tcpdf->SetFont('roboto', '', 10);

$delimiter = '<section class="sec">';
/*$html = file_get_contents('rdata.php');*/
$chunks = explode($delimiter, $pdf);
$cnt = count($chunks);
for ($i = 0; $i < $cnt; $i++) {
$tcpdf->writeHTML($delimiter . $chunks[$i], true, 0, true, 0);
if ($i < $cnt - 1) {
$tcpdf->AddPage();
}
}
$tcpdf->lastPage();
/*$tcpdf->writeHTML($pdf, true, false, false, false, '');*/

//Close and output PDF document
/*$string = $pdf->Output($filename, 'S');freeserif*/
$tcpdf->Output($pdf_nme);
?>