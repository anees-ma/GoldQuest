<?php 
include '../config.php';
extract($_POST);
//request vaariables
$client_uid=$clrefin;
$month_num=$inmnth;
$year_num=$inyer;
$mandyr=$month_num.'-'.$year_num;

$month_name = date("F", mktime(0, 0, 0, $month_num, 10));
$lktm=$month_name.' '.$year_num;
$timezone='Asia/Calcutta';
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$dap=date('d').'-'.date('M').'-'.date('Y');

//variables declaration
/*$client_uid='GQG-SHR-05';*/
/*$client_uid='GQG-TATA-06';*/
//selection client uid
$clqry=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$clqryres=mysqli_fetch_assoc($clqry);
$srv_list=$clqryres['service_name'];
$srv_price=$clqryres['service_price'];
$address=$clqryres['address'];
$gst=$clqryres['gst'];
$state=strtolower($clqryres['state']);
$comp_name=$clqryres['company_name'];
$rand=rand(9999,1000);
$list_exp=explode(',',$srv_list);
$licnt=count($list_exp)-1;

$srv_priceexp=explode(',',$srv_price);
$pdf_nme=$client_uid.'-'.$lktm.'-'.'Invoice';
//page 1
$pdf .='<section>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td>'.'<img style="width:250px;border:none" src="http://www.goldquestglobal.com/images/logo.png">'.'</td>';
$pdf .='<td style="text-align:right">'.'# 18, Krishna Summit, Shop No-303 B <br>3rd Floor, Marathahalli Outer Ring Road, <br>Bangalore, Karnataka - 560037 <br>Phone: +91-80-48663693'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br>';
$pdf .='<div style="text-align:center;font-weight:bold;text-decoration:underline;font-size:18px;color:#3e76a5">'.'INVOICE'.'</div>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td>'.'GoldQuest Global HR Services Private Limited <br># 18, Krishna Summit, Shop No-303 B <br>3rd Floor, Marathahalli Outer Ring Road,<br>Bangalore, Karnataka - 560037'.'</td>';
$pdf .='<td style="text-align:right">'.'GoldQuest GSTIN: 29AAHCG0129Q1Z6 <br>State: Karnataka <br>PAN Number: AAHCG0129Q<br>State Code: 29'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br>';
$pdf .='<div style="background-color:#3e76a5;color:white;text-align:center;font-weight:bold">'.'BILL TO'.'</div>';
/*$pdf .='<br>';*/
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td>'.'<strong>'.ucwords($comp_name).'</strong>'.'<br>'.ucwords($address).'</td>';
$pdf .='<td style="text-align:right">'.'GSTIN: '.$gst.' <br>State: '.ucfirst($state).' <br>Invoice Date: '.$dap.'<br> Invoice Number: '.$rand.'<br>State Code: 29589'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border-left:1px solid grey;border-right:1px solid white;text-align:center;width:170">'.'Product Description'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border:1px solid white;text-align:center">'.'SAC Code'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border:1px solid white;text-align:center;width:50">'.'Qty'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border:1px solid white;text-align:center;width:50">'.'Rate'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border:1px solid white;text-align:center;width:120">'.'Additional Amount'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border:1px solid white;text-align:center">'.'Amount'.'</th>';
$pdf .='<th style="background-color:#3e76a5;color:white;font-weight:bold;border:1px solid white;border-right:1px solid grey;text-align:center;width:90">'.'Taxable Value'.'</th>';
$pdf .='</tr>';
//selection of services
$m=0;
for($m=0; $m < $licnt; $m++){
                            $bck=$list_exp[$m];
                            $bck2=explode('#',$bck);
                            $bck3=$bck2[0];
                            $bck4=$bck2[1];
                            $bck5=$srv_priceexp[$m];
/*                           $bck4explo=explode('-',$bck4);
                            $bck4implo=implode('_',$bck4explo);*/
                            $bckf;
                            $bckf=$bck3.','.$bckf;
                            
                            $rate;
                            $rate=$bck4.','.$rate;
                            
                            $rate2;
                            $rate2=$bck.$rate2;
                            
                            $price;
                            $price=$bck5.','.$price;
                        }
                        //price matters st
                        $prit=substr($price, 0, -1);
                        $pritexp=explode(',',$prit);
                        $pricnt=count($pritexp);
                        $pr=0;
                        for($pr=0; $pr < $pricnt; $pr++){
                            $ph=$pritexp[$pr];
                            $pih;
                            $pih=$ph.','.$pih;
                        }
                        $pdg=substr($pih, 0, -1);
                        $pdg2=explode(',',$pdg);
                        $pdg3=array_unique($pdg2);
                        $pdgcnt=count($pdg3);
                        $pl=0;
                        for($pl=0; $pl < $pdgcnt; $pl++){
                            $phk=$pdg3[$pl];
                            $pj;
                            $pj=$phk.','.$pj;
                        }
                        $pjexp=explode(',',$pj);
                        $pjcnt=count($pjexp);
                        //price matters ed
                        
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
                        
                        $etexp=explode(',',$bckf);
                        $et=array_unique($etexp);
                        $etcnt=count($et)-1;
                        
                        $rateexplo=explode(',',$rate);
                        $ratecnt=count($rateexplo)-1;
                        
                        $rate2explo=explode(',',$rate2);
                        $rate2cnt=count($rate2explo)-1;
                        
                        $priceexp=explode(',',$price);
                        
$h=0;
                        for($h=0; $h < $njcnt; $h++){
                            $srv_id=$njexp[$h];
                            $bqry=mysqli_query($con,"select * from bck_verification where id='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $srcexp=explode(' ',$sece_nme);
                            $srcimplo=implode('_',$srcexp);
                            $pdf .='<tr style="border:1px solid grey;text-align:center">';
                            $pdf .='<td style="border:1px solid grey;text-align:left;width:170">'.' '.ucwords($sece_nme).'</td>';
                            //selection of source
/*                            $srco=mysqli_query($con,"select * from $srcimplo where appl_id='$appl_id'");
                            $srcores=mysqli_fetch_assoc($srco);*/
                            
                            $pdf .='<td style="border:1px solid grey;text-align:center">'.'998521'.'</td>';
                            //get count of applications
                            $subser=mysqli_query($con,"select * from serv_list where id='$srv_id'");
                            $subserres=mysqli_fetch_assoc($subser);
                            $sub_cate=$subserres['subservice_name'];
                            $sub_cateexp=explode(',',$sub_cate);
                            $sub_catecnt=count($sub_cateexp)-1;
                            
                            $z=0;
                            for($z=0; $z < $sub_catecnt; $z++){
                            $cte=$sub_cateexp[$z];
                            $cteexp=explode('-',$cte);
                            $cteimplo=implode('_',$cteexp);
                            
                            $cteqry=mysqli_query($con,"select * from applications where date like '%$mandyr%' && $cteimplo !='nil' && $cteimplo !='' && client_uid='$client_uid'");
                            $cteqrycnt=mysqli_num_rows($cteqry);
                            $totcnt[$h];
                            $totcnt[$h]=$totcnt[$h]+$cteqrycnt;
                            }
                            //sum of variables st
                            $qrtt;
                            $qrtt=$qrtt+$totcnt[$h];
                            
                            //sum of variables ed
                            
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:50">'.$totcnt[$h].'</td>';
                            //selection of price per  unit st
                            $un=0;
                            for($un=0; $un < $licnt; $un++){
                                $u_ser=$list_exp[$un];
                                $u_pric=$srv_priceexp[$un];
                                $u_has=explode('#',$u_ser);
                                $u_fin=$u_has[0];
                                if($srv_id == $u_fin){
                                    $final_unt=$u_pric;
                                }
                                
                            }
                            
                            //selection of addl amnt st
                            $adfqry=mysqli_query($con,"select * from $srcimplo where date like '%$mandyr%' && client_uid='$client_uid'");
                            $adfqrycnt=mysqli_num_rows($adfqry);
                            
                            $km=0;
                            while($adfqryres=mysqli_fetch_assoc($adfqry)){
                                $add_feamn=$adfqryres['add_fe'];
                                $adfnt[$h];
                                $adfnt[$h]=$add_feamn+$adfnt[$h];
                                
                            /*$feexp=explode(',',$adfnt);
                            $fecount=count($feexp)-1;
                            $fe=0;
                            for($fe=0; $fe < $fecount; $fe++){
                                $hjk=$feexp[$fe];
                                $hml[$km];
                                $hml[$km]=$hjk.','.$hml[$km];
                            }*/    
                            }
                            $adl_tot;
                            $adl_tot=$adfnt[$h]+$adl_tot;
                            //selection of addl amnt ed
                            $totamnt;
                            $totamnt=$totamnt+(($totcnt[$h])*($final_unt)+($adfnt[$h]));
                            
                            //selection of price per  unit ed
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:50">'.$final_unt.'</td>';
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:120">'.$adfnt[$h].'</td>';
                            $pdf .='<td style="border:1px solid grey;text-align:center">'.(($totcnt[$h])*($final_unt)+($adfnt[$h])).'</td>';
                            $pdf .='<td style="border:1px solid grey;text-align:center;width:90">'.(($totcnt[$h])*($final_unt)+($adfnt[$h])).'</td>';
                            $pdf .='</tr>';
                        }
                        $pdf .='<tr>';
                        $pdf .='<td style="border:1px solid grey;text-align:left;">'.' Total'.'</td>';
                        $pdf .='<td style="border:1px solid grey;text-align:center">'.''.'</td>';
                        $pdf .='<td style="border:1px solid grey;text-align:center">'.$qrtt.'</td>';
                        $pdf .='<td style="border:1px solid grey;text-align:center">'.''.'</td>';
                        $pdf .='<td style="border:1px solid grey;text-align:center">'.$adl_tot.'</td>';
                        $pdf .='<td style="border:1px solid grey;text-align:center">'.$totamnt.'</td>';
                        $pdf .='<td style="border:1px solid grey;text-align:center">'.$totamnt.'</td>';
                        $pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
if($state == 'karnataka'){
 $pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th colspan="2" style="border-left:1px solid grey;border-right:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'CGST'.'</th>';
$pdf .='<th colspan="2" style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'SGST'.'</th>';
$pdf .='<th colspan="2" style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'IGST'.'</th>';
$pdf .='<th style="border-right:1px solid grey;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'Total'.'</th>';
$pdf .='</tr>';

$pdf.='<tr>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf.='</tr>';
$taxamnta=($totamnt/100*9);
$pdf.='<tr>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'9%'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.$taxamnta.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'9%'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.$taxamnta.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.($taxamnta*2).'</td>';
$pdf.='</tr>';
$amtinwrds=(($taxamnta*2)+$totamnt);
include 'numwrds.php';
$numc=convert_number_to_words($amtinwrds);
/*$pdf.='<tr>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black;">'.'Total (After Tax R.off)'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'<strong>'.(($taxamnta*2)+$totamnt).'</strong>'.'</td>';
$pdf.='</tr>';*/
$pdf .='</table>';   
}
else{
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td style="border-left:1px solid grey;border-right:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.''.'</td>';
$pdf .='<td style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'CGST'.'</td>';
$pdf .='<td style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.''.'</td>';
$pdf .='<td style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'SGST'.'</td>';
$pdf .='<td style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.''.'</td>';
$pdf .='<td style="border:1px solid white;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'IGST'.'</td>';
$pdf .='<td style="border-right:1px solid grey;text-align:center;background-color:#3e76a5;color:white;font-weight:bold">'.'Total'.'</td>';
$pdf .='</tr>';

$pdf.='<tr>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf.='</tr>';
$taxamnt=($totamnt/100*18);
$pdf.='<tr>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'18%'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.$taxamnt.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.$taxamnt.'</td>';
$pdf.='</tr>';
$amtinwrds=($taxamnt+$totamnt);
include 'numwrds.php';
$numc=convert_number_to_words($amtinwrds);
/*$pdf.='<tr>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'Total (After Tax R.off)'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;color:black">'.'<strong>'.($taxamnt+$totamnt).'</strong>'.'</td>';
$pdf.='</tr>';*/
$pdf .='</table>';
}
$pdf .='<br>';
$pdf .='<div style="background-color:white;color:black;border:1px solid grey;font-weight:bold">'.'Total Invoice Amount in words : '.ucwords($numc).' Rupees Only'.'</div>';
$pdf .='<br>';

if($state != 'karnataka'){
$igst=$taxamnt;
$spltot=$taxamnt;
$splfinl=$amtinwrds;
}
if($state == 'karnataka'){
    $spltax=$taxamnta;
    $spltot=($taxamnta*2);
    $splfinl=(($taxamnta*2)+$totamnt);
}

$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th colspan="2" style="border:1px solid grey;font-weight:bold">'.' GoldQuest Bank Details - NEFT / RTGS'.'</th>';
$pdf .='<th style="text-align:right">'.'Total Amount Before Tax'.'</th>';
$pdf .='<th style="border:1px solid grey;text-align:center">'.$totamnt.'</th>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey">'.' Bank Name'.'</td>';
$pdf .='<td style="border:1px solid grey">'.' ICICI BANK LTD'.'</td>';
$pdf .='<td style="text-align:right">'.'Add: CGST'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center">'.$taxamnta.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey">'.' Bank A/C No'.'</td>';
$pdf .='<td style="border:1px solid grey">'.' 058305004248'.'</td>';
$pdf .='<td style="text-align:right">'.'Add: SGST'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center">'.$spltax.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey">'.' Bank Branch'.'</td>';
$pdf .='<td style="border:1px solid grey">'.' Marathahalli'.'</td>';
$pdf .='<td style="text-align:right">'.'Add: IGST'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center">'.$igst.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey">'.' Bank IFSC'.'</td>';
$pdf .='<td style="border:1px solid grey">'.' ICIC0001417'.'</td>';
$pdf .='<td style="text-align:right">'.'Total Tax Amount'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center">'.$spltot.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey">'.' MICR'.'</td>';
$pdf .='<td style="border:1px solid grey">'.' 560229040'.'</td>';
$pdf .='<td style="text-align:right">'.'Total Amount after Tax(R.off )'.'</td>';
$pdf .='<td style="border:1px solid grey;text-align:center;font-weight:bold">'.$splfinl.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="">'.''.'</td>';
$pdf .='<td style="">'.''.'</td>';
$pdf .='<td style="text-align:right">'.'GST On Reverse Charge'.'</td>';
$pdf .='<td style="border:1px solid grey;font-weight:bold;text-align:center">'.'N'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey;font-weight:bold">'.' SPECIAL NOTES AND INSTRUCTIONS'.'</td>';
$pdf .='</tr>';
$pdf .='<tr>';
$pdf .='<td style="border:1px solid grey">'.' Make all your payment Cheques, RTGS/NEFT Payable to :"GOLDQUEST GLOBAL HR SERVICES PRIVATE LIMITED"
 Payments received after due date shall be liable of interest @ 3% per month, part of month taken as full month.
In case of  any enquiry concerning this Invoice, Please email us at <strong>accounts@goldquestglobal.com</strong>'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
//signature
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th></th>';
$pdf .='<th></th>';
$pdf .='<th style="text-align:right">'.'<img style="width:100px" src="https://admin.goldquestglobal.in/images/New%20Project.jpg" >'.'</th>';
$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th></th>';
$pdf .='<th></th>';
$pdf .='<th style="text-align:right">'.'Authorised Signatory'.'</th>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='</section>';
//page 2
$pdf .='<section>';
$pdf .='<div style="border-bottom:1px solid grey;font-weight:bold;text-align:center">'.'Detailed Report'.'</div>';
$pdf .='<br>';
$pdf .='<div style="border:1px solid grey;font-weight:bold;text-align:center">'.'Invoice Period for the month of <strong>'.$lktm.'</strong>'.'</div>';
$pdf .='<br>';
$servqr=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$servqrres=mysqli_fetch_assoc($servqr);
$serv_nme=$servqrres['service_name'];
$serv_price=$servqrres['service_price'];
$prc_exp=explode(',',$serv_price);
$serv_exp=explode(',',$serv_nme);
$serv_count=count($serv_exp)-1;

$pdf .='<table style="border:1px solid grey;width:100%">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<th style="border:1px solid grey;font-size:12px;text-align:center">'.'Ref Id'.'</th>';
$pdf .='<th style="border:1px solid grey;font-size:12px;text-align:center">'.'Emp Name'.'</th>';
//serives th st
$k=0;
for($k=0; $k < $serv_count; $k++){
    $servicename=$serv_exp[$k];
      $snmeexp=explode('#',$servicename);
     
       $serfinl=$snmeexp[1];
       $adto_serv=$snmeexp[0];
       $addto_list;
       $addto_list=$adto_serv.','.$addto_list;
    $pdf .='<th style="border:1px solid grey;padding:5px;font-size:10px;font-weight:bold;text-align:center">'.ucwords($serfinl).'</th>';
}
//serives th ed

$pdf .='<th style="border:1px solid grey;font-size:12px;text-align:center">'.'Additional Fee'.'</th>';
$pdf .='<th style="border:1px solid grey;font-size:12px;text-align:center">'.'Total'.'</th>';

$pdf .='<th style="border:1px solid grey;font-size:12px;text-align:center">'.'Report Sent Date'.'</th>';
$pdf .='</tr>';
$qry5=mysqli_query($con,"select * from applications where date like '%$mandyr%' && client_uid='$client_uid'");
$n=0;
$v=0;
while($qryres5=mysqli_fetch_assoc($qry5)){
$empnames=$qryres5['emp_name'];
$id=$qryres5['id'];
$refid=$qryres5['ref_id'];

//selection of addl fee
$fee=mysqli_query($con,"select * from applic_entry where appl_id='$refid'");
$feeres=mysqli_fetch_assoc($fee);
$ad_fee=$feeres['addl_fee'];
$fnl_rdt=$feeres['finl_rpt_dt'];


$empname=$qryres5['emp_name'];
$pdf .= '<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$refid.'</td>';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$empname.'</td>';
$k=0;
for($k=0; $k < $serv_count; $k++){
    //selection status in applications tb
    $prg=mysqli_query($con,"select * from applications where date like '%$mandyr%' && ref_id='$refid'");
    $prgres=mysqli_fetch_assoc($prg);
    $servicename=$serv_exp[$k];
    $snmeexp=explode('#',$servicename);
    $serfinl=$snmeexp[1];
    $seriexplo=explode('-',$serfinl);
    $serimplo=implode('_',$seriexplo);
    $st_prc=$prgres[$serimplo];
    if($st_prc != 'nil'){
     $ser_prc=$prc_exp[$k];
     $pri_mg[$n];
     $pri_mg[$n]=$ser_prc+$pri_mg[$n];
    }
    else{
     $ser_prc='0';   
    }
    $pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$ser_prc.'</td>';
 
 
}
/*$totalresult=$pri_mg[$n];*/
/*$tot=$serv_price;*/
/*$res = explode(',',$tot);*/
/*$result = array_sum($res);*/

//selection of additional fee st
                        /*$trc_ad=substr($addto_list, 0, -1);
                        $trcexp_ad=explode(',',$trc_ad);
                        foreach (array_unique($trcexp_ad) as $dt) {
                            $njt;
                            $njt=$dt.','.$njt;
                            
                        }
                        $njexp_ad=explode(',',$njt);
                        $njcnt_ad=count($njexp_ad)-1;
                        $jh=0;
                        for($jh=0; $jh < $njcnt_ad; $jh++){
                            $add_sid=$njexp_ad[$jh];
                            $adf_qry=mysqli_query($con,"select * from bck_verification where id='$add_sid'");
                            $adf_qryres=mysqli_fetch_assoc($adf_qry);
                            $ad_fser=$adf_qryres['service_name'];
                            $ad_fserexp=explode(' ',$ad_fser);
                            $ad_fserimplo=implode('_',$ad_fserexp);
                            $fi_serqry=mysqli_query($con,"select * from $ad_fserimplo where date like '%$mandyr%' && appl_id='$refid' && add_fe !=''");
                            $fi_serqryres=mysqli_fetch_assoc($fi_serqry);
                            $fi_fee=$fi_serqryres['add_fe'];
                            if($fi_fee != NULL){
                            $fi_tot[$n];
                            $fi_tot[$n]=$add_sid.','.$fi_tot[$n];
                            }
                        }*/
                        
//selection of additional fee ed

$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$ad_fee.'</td>';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.(($pri_mg[$n])+($ad_fee)).'</td>';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$fnl_rdt.'</td>';
$pdf .= '</tr>';
$n++;
$v++;
}
$pdf .='</table>';	 
$pdf .='</section>';
//page3
/*$pdf .='<section>';

$pdf .='</section>';*/

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

$delimiter = '<section>';
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
$tcpdf->Output($pdf_nme, 'I');
?>