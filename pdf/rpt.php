<?php 
ob_start();
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
$cand_ref_id=$applic_entres['cand_ref_id'];
$appl_id = $applic_entres['appl_id'];#CH by Anees M Aon APril 7 2021
if($emp_dob != NULL){
    $embod=date('d-m-Y', strtotime($emp_dob));
}
else{
    $embod='';
}
$emp_id=$applic_entres['clnt_emp_id'];
$case_rv_dt2=$applic_entres['case_rv_dt'];
$finlreprtdte2=$applic_entres['finl_rpt_dt'];
$rptii_sta=$applic_entres['rptii_status'];
$rptii_type=$applic_entres['rptii_type'];
$fnl_verifist=$applic_entres['finlverifi_sta'];
$clicop_loicee=$applic_entres['clicomlocii'];
/*$finlreprtdte=date("d-m-Y", strtotime($finlreprtdte2));
$case_rv_dt = date("d-m-Y", strtotime($case_rv_dt2));*/

$finlreprtdte=$finlreprtdte2;
$case_rv_dt = $case_rv_dt2;

//selection client uid
$clqry=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$clqryres=mysqli_fetch_assoc($clqry);
$srv_list=$clqryres['service_name'];
$list_exp=explode(',',$srv_list);
$licnt=count($list_exp)-1;

//$pdf_nme=$cand_ref_id.'-'.$emp_id.'-'.$emp_nme.'-'.'Finalrpt.pdf';#CH - Disabled by Anees MA on April 7 by adding below line by adding 
$pdf_nme=$appl_id.'-'.$emp_id.'-'.$emp_nme.'-'.'Finalrpt.pdf';
$pdf .='<section class="sec">';
$pdf .='<table>';
$pdf .='<tr>';
if($clqryres['is_custom_temp']=='yes'){
    $pdf .='<td>'.'<img style="height:100px" src="'.APP_PATH.'/'.$clqryres['custom_logo_path'].'">'.'</td>';
    $customAddress = $clqryres['custom_address'];
}else{
    $pdf .='<td>'.'<img style="height:100px" src="'.APP_PATH.'/images/logogoldquest.png">'.'</td>';
    $customAddress = '';
}
/*$pdf .='<td style="font-weight:bold;text-align:center">'.'Confidential Background Verification Report'.'</td>';*/
$pdf .='<td style="text-align:right">'.'<img src="'.APP_PATH.'/images/iso.jpg" style="height:100px">'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<div style="font-weight:bold;text-align:center">'.'Confidential background verification report'.'</div>';
$pdf .='<br><br>';
$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="border:1px solid #3e76a5">';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold">'.'Report candidate name'.'</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.ucfirst($emp_nme).'</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold"> Client / organization Name';           $pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.ucfirst($org_nme).'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="border:1px solid #3e76a5">';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold">Application ID';    
$pdf .='</td>';
//$pdf .='<td style="border:1px solid grey">'.$cand_ref_id.'</td>';#CH disabled by Anees by adding below line
$pdf .='<td style="border:1px solid #3e76a5">'.$appl_id.'</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold"> 
Report status  ';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.strtoupper($rptii_sta).'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="border:1px solid #3e76a5">';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold">Date of birth';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.$embod.'</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold"> 
Date of file submitted';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.$case_rv_dt.'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="border:1px solid #3e76a5">';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold">Employee code ';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.$emp_id.'</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold"> 
Clock begin date   ';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.$case_rv_dt.'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="border:1px solid #3e76a5">';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold">Report type ';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.$rptii_type.'</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold"> 
Report closed date';       
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.$finlreprtdte.'</td>';

$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="border:1px solid #3e76a5">';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold">Client company location';    
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5">'.ucfirst($clicop_loicee).'</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-weight:bold"> 
Final verification status';       
$pdf .='</td>';
if(strtolower($fnl_verifist) == 'red'){
                                $clrtii='red';
                            }
                            elseif(strtolower($fnl_verifist) == 'yellow'){
                                $clrtii='yellow';
                            }
                            elseif(strtolower($fnl_verifist) == 'orange'){
                                $clrtii='orange';
                            }
                            elseif(strtolower($fnl_verifist) == 'pink'){
                                $clrtii='pink';
                            }
                            elseif(strtolower($fnl_verifist) == 'green'){
                                $clrtii='green';
                            }
$pdf .='<td style="border:1px solid #3e76a5">';
$pdf .='<span style="color:'.$clrtii.';font-weight:bold">'.strtoupper($fnl_verifist).'</span>';
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
//back step1 st
/*$pdf .='<style>';
$pdf .='</style>';*/
$pdf .='<table style="border:1px solid #3e76a5;border-collapse: collapse;">';
$pdf .='<tr>';
$pdf .='<th style="width:190;background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;border-right:2px solid white;font-size:12px">'.'Report component'.'</th>';
$pdf .='<th style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;border-right:2px solid white;font-size:12px;width:193">'.'Information source'.'</th>';
$pdf .='<th style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;border-right:2px solid white;font-size:12px;width:100">'.'Location'.'</th>';
$pdf .='<th colspan="2" style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;border-bottom:2px solid white;font-size:12px;width:190">'.'Component status'.'</th>';
$pdf .='</tr>';
$pdf.='<tr>';
$pdf .='<td style="width:190;background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;border-right: 2px solid white;border-top: none;font-size:12px;">'.''.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;border-right: 2px solid white;border-top: 2px solid cornflowerblue;font-size:12px;width:193;">'.''.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;border-right: 2px solid white;border-top: 2px solid cornflowerblue;font-size:12px;width:100;">'.''.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;border-right:2px solid white;font-size:12px;width:80;">'.'Completed'.'</td>';
$pdf .='<td style="background-color:cornflowerblue;color:black;font-weight:bold;text-align:center;padding:5px;font-size:12px;width:110;">'.'Verification status'.'</td>';
$pdf.='</tr>';
//selection of services
$m=0;
for($m=0; $m < $licnt; $m++){
                            $bck=$list_exp[$m];
                            $bck2=explode('#',$bck);
                            $bck3=$bck2[1];
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
                            $bqry=mysqli_query($con,"select * from bck_verification where service_name='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $srcexp=explode('-',$sece_nme);
                            $srcimplo=implode('_',$srcexp);
                            
                            //selection of display name
                            $disqry=mysqli_query($con,"select * from display_names where service_name='$srv_id'");
                            $disqryres=mysqli_fetch_assoc($disqry);
                            $dis_sub=$disqryres['orig_serv'];
                            $did_id=$disqryres['serv_oid'];
                            $necser=$disqryres['service_name'];
                            $necserexp=explode('-',$necser);
                            $necserimplo=implode('_',$necserexp);
                            
                            //selection maj serv
                            $majser=mysqli_query($con,"select * from serv_list where id='$did_id'");
                            $majserres=mysqli_fetch_assoc($majser);
                            $hiserv=$majserres['service_name'];
                            
                            
                            $shqry=mysqli_query($con,"select * from applications where ref_id='$appl_id'");
                            $shqryres=mysqli_fetch_assoc($shqry);
                            //Added bY Anees M A on April 7 2021 for reflecting selected services for the candidate only.
                             $servicesCandidate = json_decode($shqryres['services']);

                             $servicesSelected = array();
                             foreach ($servicesCandidate as $key => $valueS) {

                                 $service = str_replace("-","_",substr($valueS, strpos($valueS, "#") + 1));
                                 array_push($servicesSelected,$service);
                             }

                            //$fnila=$shqryres[$necserimplo];#CH - BY Anees M A on April 7 2021 for reflecting selected services for the candidate only.

                             $srcimploN = $fnila = $servicesSelected[$h];

                            //get the count
    /*$prtry2=mysqli_query($con,"select * from display_names where service_name='$srv_id'");
    $prtryrs2=mysqli_fetch_assoc($prtry2);
    $prt_uid2=$prtryrs2['real_sub'];
    $prt_uidexp2=explode(',',$prt_uid2);
    $prt_uidcnt2=count($prt_uidexp2)-1;
    $vx=0;
    for($vx=0; $vx < $prt_uidcnt2; $vx++){
        $cvx2=$prt_uidexp2[$vx];
        //
    $apfr2=mysqli_query($con,"select * from applications where ref_id='$appl_id'");
    $apfrres2=mysqli_fetch_assoc($apfr2);
    $fr_servn2=$apfrres2[$cvx2];
    if($fr_servn2 != NULL){
        $rthg[$h];
        $rthg[$h]=$fr_servn2.','.$rthg[$h];
    }
    }*/
/*    $finbgcnt2=substr($rthg[$h], 0,-1);
    $finbgexp2=explode(',',$finbgcnt2);*/
    if(in_array($srcimplo,$servicesSelected)){
        if($fnila != 'nil'){
                            
                            $pdf .='<tr style="border:1px solid #3e76a5;padding:20px">';
                            $pdf .='<td style="border:1px solid #3e76a5;text-align:left;width:190">'.strtoupper($dis_sub).'</td>';
                            
                            //selection of source
                            $srco=mysqli_query($con,"select * from $srcimplo where appl_id='$appl_id'");
                            $srcores=mysqli_fetch_assoc($srco);
                            
                            $pdf .='<td style="border:1px solid #3e76a5;text-align:center;width:193">'.ucfirst($srcores['source']).'</td>';
                            $pdf .='<td style="border:1px solid #3e76a5;text-align:center;width:100">'.strtoupper($srcores['location']).'</td>';
                            $pdf .='<td style="border:1px solid #3e76a5;text-align:center;width:80">'.ucfirst($srcores['cmpl_date']).'</td>';
                            if(strtolower($srcores['color_code']) == 'red'){
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
                            $pdf .='<td style="border:1px solid #3e76a5;font-weight:bold;width:110;text-align:center;color:'.$clrt.'">'.strtoupper($srcores['color_code']).'</td>';
                            $pdf .='</tr>';
        } 
    }
                        }
$pdf .='</table>';
$pdf .='<br><br>';
$pdf .='<br>';
$pdf .='<div style="text-align:center;font-weight:bold">'.'End of summary report'.'</div>';
$pdf .='<br>';
$pdf .='<table style="border:1px solid #3e76a5;padding:5px">';
$pdf .='<tr>';
$pdf .='<td style="font-weight:bold;width:60;border:1px solid #3e76a5;font-size:11px;padding-top: 5px;">Legend:</td>';

$pdf .='<td style="border:1px solid #3e76a5;font-size:10px;width:120; height: 40px">';
$pdf .='<span style="border:2px solid #3e76a5;background-color:red;color:red; font-size: 24px">'.'...'.'</span>';
$pdf .='<span>'.' - Major discrepancy'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid #3e76a5;background-color:yellow;color:yellow;font-size: 24px">'.'...'.'</span>';
$pdf .='<span>'.' - Minor discrepancy'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid #3e76a5;background-color:orange;color:orange;font-size: 24px">'.'...'.'</span>';
$pdf .='<span>'.' - Unable to verify'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-size:10px;width:130">';
$pdf .='<span style="border:2px solid #3e76a5;background-color:pink;color:pink;font-size: 24px">'.'...'.'</span>';
$pdf .='<span>'.' - Pending from source'.'</span>';
$pdf .='</td>';
$pdf .='<td style="border:1px solid #3e76a5;font-size:10px;width:120">';
$pdf .='<span style="border:2px solid #3e76a5;background-color:green;color:green;font-size: 24px">'.'...'.'</span>';
$pdf .='<span>'.' - All clear'.'</span>';
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .= '</section>';
/*$pdf .='<section>';*/


$f=0;
$an=1;
$jki=0;
for($f=0; $f < $njcnt; $f++){
    $srv_id=$njexp[$f];
    
    //get the count
    $prtry=mysqli_query($con,"select * from display_names where service_name='$srv_id'");
    $prtryrs=mysqli_fetch_assoc($prtry);
    $iclrd=$prtryrs['service_name'];
    $iclrdexp=explode('-',$iclrd);
    $iclrdimplo=implode('_',$iclrdexp);
    
    $imnila=mysqli_query($con,"select * from applications where ref_id='$appl_id'");
    $imnilares=mysqli_fetch_assoc($imnila);
    $finimla=$imnilares[$iclrdimplo];
/*    $prt_uid=$prtryrs['real_sub'];
    $prt_uidexp=explode(',',$prt_uid);
    $prt_uidcnt=count($prt_uidexp)-1;
    $xv=0;*/
/*    for($xv=0; $xv < $prt_uidcnt; $xv++){
        $cvx=$prt_uidexp[$xv];
        //
    $apfr=mysqli_query($con,"select * from applications where ref_id='$appl_id'");
    $apfrres=mysqli_fetch_assoc($apfr);
    $fr_servn=$apfrres[$cvx];
    if($fr_servn != NULL){
    $nbhj[$jki];
    $nbhj[$jki]=$fr_servn.','.$nbhj[$jki];   
    }
    }
    $finbgcnt=substr($nbhj[$jki], 0,-1);
    $finbgexp=explode(',',$finbgcnt);*/
if(in_array($iclrdimplo,$servicesSelected)){
if($finimla != 'nil'){
    $pdf .='<section class="sec">';
    $bqry=mysqli_query($con,"select * from bck_verification where service_name='$srv_id'");
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
                            //selection of display name2
                            $disqry2=mysqli_query($con,"select * from display_names where service_name='$srv_id'");
                            $disqryres2=mysqli_fetch_assoc($disqry2);
                            $dis_sub2=$disqryres2['orig_serv'];
$pdf .='<div style="background-color:cornflowerblue;padding:10px;color:white;text-align:center;font-weight:bold;border:1px solid #3e76a5">'.ucfirst(strtolower($dis_sub2)).'</div>';
$pdf .='<table style="border:1px solid #3e76a5">';
$pdf .='<tr style="background-color:lightgrey">';
$pdf .='<th colspan="2" style="border-bottom:1px solid #3e76a5;border-left:1px solid #3e76a5;text-align:left;font-weight:bold">'.'Application details'.'</th>';
$pdf .='<th colspan="2" style="border-bottom:1px solid #3e76a5;text-align:left;font-weight:bold;border-right:1px solid #3e76a5">'.'Report details'.'</th>';
$pdf .='</tr>';
$s=0;
for($s=0; $s < $applcnt; $s++){
    $hypen=explode('-',$maj_ser);
    $imploser=implode('_',$hypen);
    //selection particular table
    $partqry=mysqli_query($con,"select * from $imploser where appl_id='$appl_id'");
    $partqryres=mysqli_fetch_assoc($partqry);
    $pht=$partqryres['report'];
    $phtexp=explode(',',$pht);
   
    $phtcnt=count($phtexp)-1;
    
    $pdf .='<tr>';
    $pdf .='<td style="padding:10px;font-weight:bold">'.ucfirst($appl_detexp[$s]).'</td>';
    $pdf .='<td style="padding:10px;text-align:left">'.$partqryres[$appl1exp[$s]].'</td>';
    $pdf .='<td style="padding:10px;font-weight:bold">'.ucfirst($appl_det2exp[$s]).'</td>';
    $pdf .='<td style="padding:10px;text-align:left">'.$partqryres[$appl2exp[$s]].'</td>';
    $pdf .='</tr>';
}
$pdf .='<tr>';
$pdf .='<td colspan="4" style="border:1px solid #3e76a5">'.'<strong>'.'Remarks: '.'</strong>'.ucfirst($partqryres['remarks']).'</td>';
/*$pdf .='<td colspan="3" style="border:1px solid grey">'.'helo'.'</td>';*/
$pdf .='</tr>';
$pdf .='</table>';
/*$pdf .='<div style="border:1px solid grey;padding:10px">'.'<strong>'.'Remarks:&nbsp;'.'</strong>'.ucfirst($partqryres['remarks']).'</div>';*/
$pdf .='<div style="font-weight:bold">'.'Annexure '.'- '.$an.' '.'(A)'.'</div>';
$pdf .='<div style="text-align:center">';
$imageInfo = getimagesize(APP_PATH.'/'.$phtexp[0]);
//echo '<img src="../'.$phtexp[0].'" '.$imageInfo[3].'" '.$imageInfo[3].'>';exit;
//echo '../'.$phtexp[0].'" '.$imageInfo[3];exit;
//$pdf .='<img src="'.APP_PATH.'/'.$phtexp[0].'" '.$imageInfo[3].'>';
$pdf .='<img src="'.APP_PATH.'/'.$phtexp[0].'" '.$imageInfo[3].'>';
$pdf .='</div>';
 $ph=1;
 for($ph=1; $ph < $phtcnt; $ph++){
     $abc=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','v','w','x','y','z');
     $adph=$ph+1;
     $abcfin=($adph-1);
     $pdf .='<section class="sec">';
     $pdf .='<div style="text-align:center">';
     $pdf .='<div style="font-weight:bold">'.'Annexure '.'- '.$an.' '.'('.$abc[$abcfin].')'.'</div>';
     $pdf .='<br>';
     $imageInfo = getimagesize(APP_PATH.'/'.$phtexp[$ph]);
     $pdf .='<img src="'.APP_PATH.'/'.$phtexp[$ph].'" '.$imageInfo[3].'>';
     $pdf .='</div>';
     $pdf .='</section>';
 }
$pdf .='</section>';
$an++;
}
}
$jki++;
}

$pdf .='<section class="sec">';
$pdf .='<div style="background-color:cornflowerblue;font-weight:bold;text-align:center;color:white">'.'Disclaimer'.'</div>';
$pdf .='<div style="line-height:1.1">'.'This report is confidential and is meant for the exclusive use of the Client. This report has been prepared solely for the 
purpose set out pursuant to our letter of engagement (LoE)/Agreement signed with you and is not to be used for any other 
purpose. The Client recognizes that we are not the source of the data gathered and our reports are based on the information
purpose. The Client recognizes that we are not the source of the data gathered and our reports are based on the information
responsible for employment decisions based on the information provided in this report.
'.'</div>';
$pdf .='<div style="font-weight:bold;text-align:center;border:1px solid #3e76a5;padding:10px">'.'End of detail report'.'</div>';
$pdf .='</section>';
?>
<?php 
require('TCPDF/tcpdf.php');
if($customAddress==''){
    $address = 'No 293/154/172, IndiQube Gamma, 4th Floor, Outer Ring Road, Kadubeesanahalli, Marathahalli, Bangalore-560103 | www.goldquestglobal.in';
}else{
    $address = '$customAddress';
}

//<img src="'.APP_PATH.'/images/verified.jpg""></p>

// $imageInfo = getimagesize(APP_PATH.'/images/verified-footer.jpg');
//      print_r($imageInfo);exit;

class MYPDF extends TCPDF {

    function __construct( $footer , $orientation, $unit, $format ) 
    {
        parent::__construct( $orientation, $unit, $format, true, 'UTF-8', false );

        $this->footerAddress = $footer ;
        
        //...
    }

    // Page footer
    public function Footer() {

        $logoX = 100; // 
        $logoFileName = APP_PATH.'/images/verified.jpg';
        $logoWidth = 20; // 15mm
        $logoY = 275;
        $logo = $this->Image($logoFileName, $logoX, $logoY, $logoWidth);
        // Position at 15 mm from bottom
        $this->SetY(-19);
        // Set font
        $this->SetFont('helvetica', 'I', 9);

        // $this->SetRightMargin(60);
        // $this->SetLeftMargin(60);
        // Page number
        $this->Cell(0, 10, $this->footerAddress, 0, false, 'C', 0, '', 0, false, 'T', 'M');
       // $this->Cell(20, 10, $logo, 0, false, 'C', 0, '', 0, false, 'T', 'M'); 
    }
}
//$tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$tcpdf = new MYPDF($address,PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

/*$tcpdf->SetProtection(array('print', 'copy','modify'), "gold", "ourcodeworld-master", 0, null);*/

// set title of pdf
$tcpdf->SetTitle($pdf_nme);

// set margins
$tcpdf->SetMargins(10, 10, 10, 10);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// my DB stuff here
//$datafromdb = getDataFromDB();



// set header and footer in pdf
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(true);
//$tcpdf->Footer();
$tcpdf->setListIndentWidth(3);

// set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, 12);

// set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

/*$tcpdf->AddPage();*/

$tcpdf->SetFont('roboto', '', 10);
$tcpdf->setCellPaddings( $left = '', $top = '1.5', $right = '', $bottom = '1.5');
$delimiter = '<section class="sec">';
/*$html = file_get_contents('rdata.php');*/
$chunks = explode($delimiter, $pdf);
$cnt = count($chunks);
for ($i = 0; $i < $cnt; $i++) {
$tcpdf->writeHTML($delimiter . $chunks[$i], true, 0, true, 0);
if ($i < $cnt - 1) {
//$tcpdf->AddPage();#CH
$tcpdf->AddPage('P', 'Letter');
}
}
$tcpdf->lastPage();
/*$tcpdf->writeHTML($pdf, true, false, false, false, '');*/

//Close and output PDF document
/*$string = $pdf->Output($filename, 'S');freeserif*/
ob_end_clean();
ini_set('memory_limit', '-1');
$tcpdf->Output($pdf_nme, true);
exit;
?>