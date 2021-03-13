<div style="text-align:center;font-weight:700;color:green">Manual Invoice Prepare</div>
<?php 
include 'config.php';
include 'header.php';
$client_id=$_POST['client_id'];
$inv_num=$_POST['inv_num'];
$sac_cde=$_POST['sac_cde'];
$mnth_num=$_POST['mnth_num'];
$yr_num=$_POST['yr_num'];

//request vaariables
$client_uid=$client_id;
$sac_code=$sac_cde;
$month_num=$mnth_num;
$year_num=$yr_num;
$mandyr=$month_num.'-'.$year_num;
$com_lted='completed';
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
$pdf_nme=$client_uid.'-'.$lktm.'-'.'Invoice.pdf';
$pdf .='<form action="manualpdfr/manualpdf.php" method="post" enctype="multipart/form-data">';
$pdf .='<section>';
$pdf .='<div style="background-color:#337fbf;color:white;text-align:center;font-weight:bold">'.'BILL TO'.'</div>';
$pdf .='<br>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<td>'.'<strong>'.'<input type="text" id="compnme" name="compnme" value="'.$comp_name.'">'.'</strong>'.'<br>'.'<input type="text" id="comaddr" name="comaddr" value="'.$address.'">'.'</td>';
$pdf .='<td style="text-align:right">'.'GSTIN: '.'<input type="text" id="mangst" name="mangst" value="'.$gst.'">'.' <br>State: '.'<input type="text" id="manstate" name="manstate" value="'.$state.'">'.' <br>Invoice Date: '.'<input type="text" id="mandate" name="mandate" value="'.$dap.'">'.'<br> Invoice Number: '.'<input type="text" id="maninvn" name="maninvn" value="'.$invnum.'">'.'<br>State Code: 29589'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-left:1px solid black;border-right:1px solid white;border-top:1px solid black;border-bottom:1px solid balck;text-align:center;width:170">'.'Product Description'.'</th>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-top:1px solid black;border-bottom:1px solid balck;border-right:1px solid white;text-align:center">'.'SAC Code'.'</th>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-top:1px solid black;border-bottom:1px solid balck;border-right:1px solid white;text-align:center;width:50">'.'Qty'.'</th>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-top:1px solid black;border-bottom:1px solid balck;border-right:1px solid white;text-align:center;width:50">'.'Rate'.'</th>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-top:1px solid black;border-bottom:1px solid balck;border-right:1px solid white;text-align:center;width:120">'.'Additional Amount'.'</th>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-top:1px solid black;border-bottom:1px solid balck;border-right:1px solid white;text-align:center">'.'Amount'.'</th>';
$pdf .='<th style="background-color:#337fbf;color:black;font-weight:bold;border-top:1px solid black;border-bottom:1px solid balck;border-right:1px solid black;text-align:center;width:90">'.'Taxable Value'.'</th>';
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
                            $bqry=mysqli_query($con,"select * from bck_vertwo where org_id='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $srcexp=explode(' ',$sece_nme);
                            $srcimplo=implode('_',$srcexp);
                            
                            //selection of display name
                            $disqry=mysqli_query($con,"select * from display_names where id='$srv_id'");
                            $disqryres=mysqli_fetch_assoc($disqry);
                            $dis_sub=$disqryres['service_name'];
                    
                            $pdf .='<tr style="text-align:center">';
                            $pdf .='<td style="border:1px solid black;text-align:left;width:170">'.' '.strtoupper($sece_nme).'</td>';
                            //selection of source
/*                            $srco=mysqli_query($con,"select * from $srcimplo where appl_id='$appl_id'");
                            $srcores=mysqli_fetch_assoc($srco);*/
                            
                            $pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="mansaccde" name="mansaccde" value="'.$sac_code.'">'.'</td>';
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
                            
                            $cteqry=mysqli_query($con,"select * from applications where date like '%$mandyr%' && $cteimplo !='nil' && $cteimplo !='' && client_uid='$client_uid' && status='$com_lted'");
                            $cteqrycnt=mysqli_num_rows($cteqry);
                            $totcnt[$h];
                            $totcnt[$h]=$totcnt[$h]+$cteqrycnt;
                            }
                            //sum of variables st
                            $qrtt;
                            $qrtt=$qrtt+$totcnt[$h];
                            
                            //sum of variables ed
                            
                            $pdf .='<td style="border:1px solid black;text-align:center;width:50">'.'<input type="text" id="qtyman'.$h.'" name="qtyman'.$h.'" value="'.$totcnt[$h].'">'.'</td>';
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
                            //start add
                            $vb=0;
                            for($vb=0; $vb < $sub_catecnt; $vb++){
                                $vbs=$sub_cateexp[$vb];
                                $vbsexp=explode('-',$vbs);
                                $vbsimplo=implode('_',$vbsexp);
                            
                            //selection of addl amnt st
                            $adfqry=mysqli_query($con,"select * from $vbsimplo where date like '%$mandyr%' && client_uid='$client_uid'");
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
                            }
                            //close add
                            $adl_tot;
                            $adl_tot=$adfnt[$h]+$adl_tot;
                            //selection of addl amnt ed
                            $totamnt;
                            $totamnt=$totamnt+(($totcnt[$h])*($final_unt)+($adfnt[$h]));
                            
                            //selection of price per  unit ed
                            $pdf .='<td style="border:1px solid black;text-align:center;width:50">'.'<input type="text" id="manrate'.$h.'" name="manrate'.$h.'" value="'.$final_unt.'">'.'</td>';
                            $pdf .='<td style="border:1px solid black;text-align:center;width:120">'.'<input type="text" id="manadamt'.$h.'" name="manadamt'.$h.'" value="'.$adfnt[$h].'">'.'</td>';
                            $pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="mantot'.$h.'" name="mantot'.$h.'" value="'.(($totcnt[$h])*($final_unt)+($adfnt[$h])).'">'.'</td>';
                            $pdf .='<td style="border:1px solid black;text-align:center;width:90">'.'<input type="text" id="mantxvl'.$h.'" name="mantxvl'.$h.'" value="'.(($totcnt[$h])*($final_unt)+($adfnt[$h])).'">'.'</td>';
                            $pdf .='</tr>';
                        }
                        $pdf .='<tr>';
                        $pdf .='<td style="border:1px solid black;text-align:left;">'.' Total'.'</td>';
                        $pdf .='<td style="border:1px solid black;text-align:center">'.''.'</td>';
                        $pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="mantotqty" name="mantotqty" value="'.$qrtt.'">'.'</td>';
                        $pdf .='<td style="border:1px solid black;text-align:center">'.''.'</td>';
                        $pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="manadltot" name="manadltot" value="'.$adl_tot.'">'.'</td>';
                        $pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="mantonnt" name="mantonnt" value="'.$totamnt.'">'.'</td>';
                        $pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="manctotnt" name="manctotnt" value="'.$totamnt.'">'.'</td>';
                        $pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
if($state == 'karnataka'){
 $pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th colspan="2" style="border-left:1px solid black;border-right:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'CGST'.'</th>';
$pdf .='<th colspan="2" style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'SGST'.'</th>';
$pdf .='<th colspan="2" style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'IGST'.'</th>';
$pdf .='<th style="border-right:1px solid black;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'Total'.'</th>';
$pdf .='</tr>';

$pdf.='<tr>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf.='</tr>';
$taxamnta=($totamnt/100*9);
$pdf.='<tr>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'9%'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'<input type="text" id="manktotax" name="manktotax" value="'.$taxamnta.'">'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'9%'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'<input type="text" id="mantaxt" name="mantaxt" value="'.$taxamnta.'">'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'<input type="text" id="manmult" name="manmult" value="'.($taxamnta*2).'">'.'</td>';
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
$pdf .='<td style="border-left:1px solid grey;border-top:1px solid black;border-right:1px solid white;text-align:center;background-color:#337fbf;color:white;font-weight:bold">'.''.'</td>';
$pdf .='<td style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'CGST'.'</td>';
$pdf .='<td style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.''.'</td>';
$pdf .='<td style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'SGST'.'</td>';
$pdf .='<td style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.''.'</td>';
$pdf .='<td style="border:1px solid white;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'IGST'.'</td>';
$pdf .='<td style="border-right:1px solid grey;border-top:1px solid black;text-align:center;background-color:#337fbf;color:black;font-weight:bold">'.'Total'.'</td>';
$pdf .='</tr>';

$pdf.='<tr>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Rate'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'Amount'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf.='</tr>';
$taxamnt=($totamnt/100*18);
$pdf.='<tr>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.''.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'18%'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'<input type="text" id="manotst" name="manotst" value="'.$taxamnt.'">'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;color:black">'.'<input type="text" id="mantostr" name="mantostr" value="'.$taxamnt.'">'.'</td>';
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
$pdf .='<br>';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th colspan="2" style="border:1px solid black;font-weight:bold">'.' GoldQuest Bank Details - NEFT / RTGS'.'</th>';
$pdf .='<th style="text-align:right">'.'Total Amount Before Tax'.' '.'</th>';
$pdf .='<th style="border:1px solid black;text-align:center">'.'<input type="text" id="manbftx" name="manbftx" value="'.$totamnt.'">'.'</th>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid black">'.' Bank Name'.'</td>';
$pdf .='<td style="border:1px solid black">'.' ICICI BANK LTD'.'</td>';
$pdf .='<td style="text-align:right">'.'Add: CGST '.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="mancgst" name="mancgst" value="'.$taxamnta.'">'.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid black">'.' Bank A/C No'.'</td>';
$pdf .='<td style="border:1px solid black">'.' 058305004248'.'</td>';
$pdf .='<td style="text-align:right">'.'Add: SGST'.' '.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="mansgst" name="mansgst" value="'.$spltax.'">'.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid black">'.' Bank Branch'.'</td>';
$pdf .='<td style="border:1px solid black">'.' Marathahalli'.'</td>';
$pdf .='<td style="text-align:right">'.'Add: IGST'.' '.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="manigst" name="manigst" value="'.$igst.'">'.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid black">'.' Bank IFSC'.'</td>';
$pdf .='<td style="border:1px solid black">'.' ICIC0001417'.'</td>';
$pdf .='<td style="text-align:right">'.'Total Tax Amount'.' '.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center">'.'<input type="text" id="manttxamtt" name="manttxamtt" value="'.$spltot.'">'.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="border:1px solid black">'.' MICR'.'</td>';
$pdf .='<td style="border:1px solid black">'.' 560229040'.'</td>';
$pdf .='<td style="text-align:right">'.'Total Amount after Tax(R.off )'.'</td>';
$pdf .='<td style="border:1px solid black;text-align:center;font-weight:bold">'.'<input type="text" id="mantaftx" name="mantaftx" value="'.$splfinl.'">'.'</td>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td style="">'.''.'</td>';
$pdf .='<td style="">'.''.'</td>';
$pdf .='<td style="text-align:right">'.'GST On Reverse Charge'.' '.'</td>';
$pdf .='<td style="border:1px solid black;font-weight:bold;text-align:center">'.'N'.'</td>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br>';
$pdf .='<div style="background-color:white;color:black;border:1px solid black;font-weight:bold">'.'Total Invoice Amount in words : '.'<input type="text" id="amntinalph" name="amntinalph" value="'.ucwords($numc).'">'.' Rupees Only'.'</div>';
$pdf .='<br>';
$pdf .='</section>';
$pdf .='<input type="hidden" name="cihidd" id="cihidd" value="'.$client_id.'">';
$pdf .='<input type="hidden" name="monhidd" id="monhidd" value="'.$mnth_num.'">';
$pdf .='<input type="hidden" name="yerhidd" id="yerhidd" value="'.$yr_num.'">';
$pdf .='<button class="btn btn-primary" type="submit">Submit</button>';
$pdf .='</form>';
echo $pdf;
?>
<!--<button class="btn btn-primary" type="submit" onclick="gtyi()">Submit</button>-->

<!--<script>
    function gtyi(){
        var kl= '<?php echo $pdf;?>';
    
        window.location.assign('manualpdfr/manualpdf.php?fgh='+kl);
    }
</script>-->