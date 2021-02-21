<?php 
include 'config.php';
$reff=$_REQUEST['iup'];


//selection of client
$q=mysqli_query($con,"select * from applications where ref_id='$reff'");
$qres=mysqli_fetch_assoc($q);
$client_uid=$qres['client_uid'];
//selection of services
$q2=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$qres2=mysqli_fetch_assoc($q2);
$ser_list=$qres2['service_name'];
$serexp=explode(',',$ser_list);
$count=count($serexp)-1;
$m=0;
                        for($m=0; $m < $count; $m++){
                            $bck=$serexp[$m];
                            $bck2=explode('#',$bck);
                            $bck3=$bck2[1];
                            $bckf;
                            $bckf=$bck3.','.$bckf;
                        }
                        $trc=substr($bckf, 0, -1);
                        $trcexp=explode(',',$trc);
                        foreach (array_unique($trcexp) as $d) {
                            $nj;
                            $nj=$d.','.$nj;
                        }
                        $njexp=explode(',',$nj);
                        $njcnt=count($njexp)-1;
                        $i=0;
                        for($i=0; $i < $njcnt; $i++){
                            $srv_id=$njexp[$i];
                            $bqry=mysqli_query($con,"select * from bck_verification where service_name='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $fguiexp=explode('-',$sece_nme);
                            $fguiimplo=implode('_',$fguiexp);
                            //deleting the application
                            $del1=mysqli_query($con,"select * from $fguiimplo where appl_id='$reff'");
                            $del1res=mysqli_fetch_assoc($del1);
                            $report=$del1res['report'];
                            $reportexp=explode(',',$report);
                            $reportcnt=count($reportexp)-1;
                            $ret=0;
                            for($ret=0; $ret < $reportcnt; $ret++){
                                $rp_data=$reportexp[$ret];
                                unlink($rp_data);
                            }
                            $del2=mysqli_query($con,"delete from $fguiimplo where appl_id='$reff'");
                        }
                        if($del2){
                            $aplcatdel=mysqli_query($con,"delete from applications where ref_id='$reff'");
                            if($aplcatdel){
                                $aplcatdel2=mysqli_query($con,"delete from applic_entry where appl_id='$reff'");
                                if($aplcatdel2){
                                    header('location:https://admin.goldquestglobal.in');
                                }
                            }
                        }
?>