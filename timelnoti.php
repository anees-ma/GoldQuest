<?php 
include 'config.php';
//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('d').'-'.date('m').'-'.date('Y');
//time ed//
$comple='completed';
                    $niem=NULL;
                    $clensel=mysqli_query($con,"select * from applic_entry where over_status !='$comple' && no_dys_tkn !='$niem' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $case_recv_date=$clenselres['case_rv_dt'];
                        $tinstamp_date=$clenselres['no_dys_tkn'];
                        $appid=$clenselres['appl_id'];
                        $cand_nmee=$clenselres['cand_ful_name'];
                        $client_uid=$clenselres['gqg_ref_id'];
                        $gqgref=$clenselres['cand_ref_id'];
                        $contimest=date('d-m-Y', strtotime($tinstamp_date));
                        $date1_ts = strtotime($dap);
                        $date2_ts = strtotime($contimest);
                        $diff = $date2_ts - $date1_ts;
                        $cvh=round($diff / 86400);
                        if($cvh <= 2){
                        if($cvh > 0){
                            $bvh=$cvh;
                        }
                        else{
                         $bvh='TAT Exceeded';   
                        }
                        $remin .="<tr style='border:1px solid grey'>
                        <td style='border:1px solid grey'>$l</td>
                        <td style='border:1px solid grey'>$appid</td>
                        <td style='border:1px solid grey'>$client_uid</td>
                        <td style='border:1px solid grey'>$gqgref</td>
                        <td style='border:1px solid grey'>$cand_nmee</td>
                        <td style='border:1px solid grey'>$bvh</td>
                    </tr>";
                    $l++;
                        }
                    }
                    //find of timestamp mail
                    $tsel=mysqli_query($con,"select * from timstamp_mail where date='$dap'");
                    $tselcnt=mysqli_num_rows($tsel);
                    if($tselcnt > 0){
                        
                    }
                    else{
                        $tins=mysqli_query($con,"insert into timstamp_mail(date) values('$dap')");
                        if($tins){
                            include 'timstampmail.php';
                        }
                        
                    }
?>