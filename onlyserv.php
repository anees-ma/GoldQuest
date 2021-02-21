<?php 
include 'header.php';
include 'config.php';
?>
<?php 
$appid=$_POST['appid'];
//selection of applic_entry table st
$prev=mysqli_query($con,"select * from applic_entry where appl_id='$appid'");
$prevres=mysqli_fetch_assoc($prev);
$pmay=$prevres['month_year'];
$pcsrdt=$prevres['case_rv_dt'];
$pclfnme=$prevres['clnt_ful_nme'];
$pclempid=$prevres['clnt_emp_id'];
$pgrefid=$prevres['gqg_ref_id'];
$pcanfnme=$prevres['cand_ful_name'];
$pcntnum=$prevres['cont_num'];
$pcntnum2=$prevres['cont_num2'];
$pfnme=$prevres['fat_ful_nme'];
$pdob=$prevres['dob_fath'];
$pgender=$prevres['gen'];
$pmartsta=$prevres['marital_stats'];
$pnatilty=$prevres['nationlty'];
$pcmpaddr=$prevres['cper_addr'];
$ppinco=$prevres['pincde'];
$pperofsty=$prevres['pos_perm'];
$pprmldmrk=$prevres['prm_landmrk'];
$presml=$prevres['res_ml'];
$pstate=$prevres['stae_st'];
$pcmplcadd=$prevres['ccur_addr'];
$pcmplcpin=$prevres['pin_cde'];
$pperstycrrd=$prevres['pos_curadr'];
$pcurpromiland=$prevres['prm_cldmrk'];
$pcursreslm=$prevres['res_lm'];
$pcurstate=$prevres['state_st2'];
$pcindate=$prevres['cse_intidt'];
$pinrdt=$prevres['insf_ra_dt'];
$pinrmrk=$prevres['insuf_rmrks'];
$pincldt=$prevres['insuf_clr_dt'];
$pfiresnt=$prevres['finl_rpt_dt'];
$pclrcde=$prevres['clr_cde'];
$pdystk=$prevres['no_dys_tkn'];
$padfee=$prevres['addl_fee'];
$pfinrmrk=$prevres['rmrks'];
$rpto_sta=$prevres['rptii_status'];
$rpto_type=$prevres['rptii_type'];
$finl_veristi=$prevres['finlverifi_sta'];
$clicmp_lociei=$prevres['clicomlocii'];
$canddrefid=$prevres['cand_ref_id'];
//selection of applic_entry table ed

//selection of client reference id
$qry=mysqli_query($con,"select * from applications where ref_id='$appid'");
$qryres=mysqli_fetch_assoc($qry);
$client_uid=$qryres['client_uid'];
$client_nme=$qryres['company_name'];
$empp_nme=$qryres['emp_name'];
//selection  of selected services
$qry2=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$qryres2=mysqli_fetch_assoc($qry2);
$services=$qryres2['service_name'];
$ktp=substr($services, 0, -1);
$exp=explode(',',$ktp);
$exp1cnt=count($exp);
?>
<div class="form-group">
                            <label for="may">Month -Year</label>
                            <input type="text" class="form-control" name="may" id="may" value="<?php echo $pmay;?>">
                        </div>
                        <div class="form-group">
                            <label for="csrdt">Case Received Date</label>
                            <input type="date" class="form-control" name="csrdt" id="csrdt" value="<?php echo $pcsrdt;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="clfnme">Client Full Name</label>
                            <input type="text" class="form-control" name="clfnmeoo" id="clfnmeoo" value="<?php echo ucwords($client_nme);?>" readonly>
                            <input type="hidden" class="form-control" name="clfnme" id="clfnme" value="<?php echo ucwords($client_nme);?>">
                        </div>
                        <div class="form-group">
                            <label for="clcmloci">Client Company Location</label>
                            <input type="text" class="form-control" name="clcmloci" id="clcmloci" value="<?php echo ucwords($clicmp_lociei);?>">
                        </div>
                        <div class="form-group">
                            <label for="clempid">Client Employee ID</label>
                            <input type="text" class="form-control" name="clempid" id="clempid" value="<?php echo $pclempid;?>">
                        </div>
                        <div class="form-group">
                            <label for="grefid">Client Reference ID</label>
                            <input type="text" class="form-control" name="grefidoo" id="grefidoo" value="<?php echo $client_uid;?>" readonly>
                            <input type="hidden" class="form-control" name="grefid" id="grefid" value="<?php echo $client_uid;?>">
                        </div>
                        <div class="form-group">
                            <label for="candrefid">GQG Reference ID</label>
                            <input type="text" class="form-control" name="candrefid" id="candrefid" value="<?php echo $canddrefid;?>">
                        </div>
                        <div class="form-group">
                            <label for="canfnmeoo">Candidate Full Name</label>
                            <input type="text" class="form-control" name="canfnmeoo" id="canfnmeoo" value="<?php echo ucwords($empp_nme);?>">
                        </div>
                        <div class="form-group">
                            <label for="cntnum">Contact Number</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="cntnum" id="cntnum" value="<?php echo $pcntnum;?>">
                        </div>
                        <div class="form-group">
                            <label for="cntnum2">Contact Number 2:</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="cntnum2" id="cntnum2" value="<?php echo $pcntnum2;?>">
                        </div>
                        <div class="form-group">
                            <label for="fnme">Father Full Name:</label>
                            <input type="text" class="form-control" name="fnme" id="fnme" value="<?php echo $pfnme;?>">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $pdob;?>" max="9999-12-31">
                        </div>
                            <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="gender" id="gender" value="<?php echo $pgender;?>">
                        </div>
                        <div class="form-group">
                            <label for="martsta">Marital Status:</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="martsta" id="martsta" value="<?php echo $pmartsta;?>">
                        </div>
                        <div class="form-group">
                            <label for="natilty">Nationality:</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="natilty" id="natilty" value="<?php echo $pnatilty;?>">
                        </div>
                        <div class="form-group">
                            <label for="cmpaddr">Complete Permanent Address:</label>
                            <input type="text" class="form-control" name="cmpaddr" id="cmpaddr" value="<?php echo $pcmpaddr;?>">
                        </div>
                        <div class="form-group">
                            <label for="pinco">Pincode:</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="pinco" id="pinco" value="<?php echo $ppinco;?>">
                        </div>
                        <div class="form-group">
                            <label for="perofsty">Period of Stay in Permanent Address:</label>
                            <input type="text" class="form-control" name="perofsty" id="perofsty" value="<?php echo $pperofsty;?>">
                        </div>
                        <div class="form-group">
                            <label for="prmldmrk">Prominent Landmark:</label>
                            <input type="text" class="form-control" name="prmldmrk" id="prmldmrk" value="<?php echo $pprmldmrk;?>">
                        </div>
                        <div class="form-group">
                            <label for="resml">Residence Mobile/Landline No:</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="resml" id="resml" value="<?php echo $presml;?>">
                        </div>
                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" name="state" id="state" value="<?php echo $pstate?>">
                        </div>
                        <div class="form-group">
                            <label for="cmplcadd">Complete Current Address:</label>
                            <input type="text" class="form-control" name="cmplcadd" id="cmplcadd" value="<?php echo $pcmplcadd?>">
                        </div>
                        <div class="form-group">
                            <label for="cmplcpin">Pincode:</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="cmplcpin" id="cmplcpin" value="<?php echo $pcmplcpin;?>">
                        </div>
                        <div class="form-group">
                            <label for="perstycrrd">Period of Stay in Current Address:</label>
                            <input type="text" class="form-control" name="perstycrrd" id="perstycrrd" value="<?php echo $pperstycrrd;?>">
                        </div>
                        <div class="form-group">
                            <label for="curpromiland">Prominent Landmark:</label>
                            <input type="text" class="form-control" name="curpromiland" id="curpromiland" value="<?php echo $pcurpromiland;?>">
                        </div>
                        <div class="form-group">
                            <label for="cursreslm">Residence Mobile/Landline no:</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="cursreslm" id="cursreslm" value="<?php echo $pcursreslm;?>">
                        </div>
                        <div class="form-group">
                            <label for="curstate">State:</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="curstate" id="curstate" value="<?php echo $pcurstate;?>">
                        </div>
                        <div class="form-group">
                            <label for="cindate">Case Initiated Date:</label>
                            <input type="date" class="form-control" name="cindate" id="cindate" value="<?php echo $pcindate;?>" max="9999-12-31">
                        </div>
                        
                        <!--services st-->
                        <div class="srv_title">SELECTED SERVICES</div>
                        <?php
$i=0;
for($i=0; $i < $exp1cnt; $i++){
    $serv_nme=$exp[$i];
    $exp2=explode('#',$serv_nme);
    $serv_nmef=$exp2[1];
    $selserv=explode('-',$serv_nmef);
    $selservf=implode('_',$selserv);
   ?>
   <div class="servdesc">
       <?php echo strtoupper($serv_nmef);?>&nbsp;
   <select class="sesty" id="sta<?php echo $selservf;?>" name="sta<?php echo $selservf;?>">
       <option value="select">--select--</option>
       <option value="wip">WIP</option>
       <option value="insuff">INSUFF</option>
       <option value="completed">COMPLETED</option>
       <option value="nil">NIL</option>
   </select>
   </div>
   <?php
}
?>
                        <!--services ed-->
                        
                        <!--background verification report st-->
                        <div class="srv_title">BACKGROUND VERIFICATION</div>
                        <div class="bck_verify">
                        <?php 
                        $m=0;
                        for($m=0; $m < $exp1cnt; $m++){
                            $bck=$exp[$m];
                            $bck2=explode('#',$bck);
                            $bck3=$bck2[1];
                            $bckf;
                            $bckf=$bck3.','.$bckf;
                        }
                        $trcexp=explode(',',$bckf);
                        $njcnt=count($trcexp)-1;

                        $h=0;
                        for($h=0; $h < $njcnt; $h++){
                            $srv_id=$trcexp[$h];
                            $bqry=mysqli_query($con,"select * from bck_verification where service_name='$srv_id'");
                            $bqryrs=mysqli_fetch_assoc($bqry);
                            $sece_nme=$bqryrs['service_name'];
                            $appl_details=$bqryrs['appl_details'];
                            $repotr_details=$bqryrs['report_details'];
                            $repot_detai=substr($repotr_details, 0, -1);
                            $repot_detaiexp=explode(',',$repot_detai);
                            $mpt=substr($appl_details, 0, -1);
                            $appl_detailsexp=explode(',',$mpt);
                            $appl_cnt=count($appl_detailsexp);
                            
                            //shrt
                            $apl_shrt=$bqryrs['appl_shrt'];
                            $npt=substr($apl_shrt, 0, -1);
                            $apl_shrtexp=explode(',',$npt);
                            $rept_shrt=$bqryrs['report_shrt'];
                            $jpt=substr($rept_shrt, 0, -1);
                            $rept_shrtexp=explode(',',$jpt);
                            ?>
                            <div class="bck_titl"><?php echo strtoupper($sece_nme);?></div>
                            <div class="apredt"><span id="apone">Application Details</span><span id="aptwo">Report Details</span></div>
                            <?php
                            $r=0;
                            for($r=0; $r < $appl_cnt; $r++){
                                $fgui=$sece_nme;
                                $fguiexp=explode('-',$fgui);
                                $fguiimplo=implode('_',$fguiexp);
                                $pre_bsel=mysqli_query($con,"select * from $fguiimplo where appl_id='$appid'");
                                $pre_bselres=mysqli_fetch_assoc($pre_bsel);
                            ?>
                            <div class="form-group inststy">
                            <label for="curpromiland"><?php echo ucwords($appl_detailsexp[$r]);?>:</label>
                            <input type="text" class="form-control" name="<?php echo $apl_shrtexp[$r];?>" id="<?php echo $apl_shrtexp[$r];?>" value="<?php echo $pre_bselres[$apl_shrtexp[$r]];?>">
                            </div>
                            <div class="form-group inststy flotr">
                            <label for="curpromiland"><?php echo ucwords($repot_detaiexp[$r]);?>:</label>
                            <input type="text" class="form-control" name="<?php echo $rept_shrtexp[$r]?>" id="<?php echo $rept_shrtexp[$r]?>" value="<?php echo $pre_bselres[$rept_shrtexp[$r]];?>">
                            </div>
                            
                        <?php
                        $rmrs=explode('-',$sece_nme);
                        $rmrsim=implode('_',$rmrs);
                            }
                            ?>
                            <div class="form-group">
                            <label for="curpromiland">Additional Fee:</label>
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="add_fee<?php echo $rmrsim;?>" id="add_fee<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['add_fe'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">Remarks:</label>
                            <input type="text" class="form-control" name="rmk<?php echo $rmrsim;?>" id="rmk<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['remarks'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">Information Source:</label>
                            <input type="text" class="form-control" name="sroc<?php echo $rmrsim;?>" id="sroc<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['source'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">Location:</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="lcntin<?php echo $rmrsim;?>" id="lcntin<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['location'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">Completion Date:</label>
                            <input type="text" class="form-control" name="cmpdte<?php echo $rmrsim;?>" id="cmpdte<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['cmpl_date'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">Verification Status: (Color Code)</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="clrcde<?php echo $rmrsim;?>" id="clrcde<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['color_code'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">ANNEXURE:</label>
                            <input type="file" class="form-control anexmul" name="file<?php echo $rmrsim;?>[]" onchange="anficnt(this)" data-annul="<?php echo $rmrsim;?>" id="file<?php echo $rmrsim;?>" multiple>
                            </div>
                            <input type="hidden" name="filcntt<?php echo $rmrsim;?>" id="filcntt<?php echo $rmrsim;?>" value="">
                            <div><?php 
                            $imgm=$pre_bselres['report'];
                            $imgmexp=explode(',',$imgm);
                            $imgmcnt=count($imgmexp)-1;
                            for($im=0; $im < $imgmcnt; $im++){
                                ?>
                                <img src="<?php echo $imgmexp[$im];?>" style="width:20%;border:1px solid grey">
                                <?php
                            }
                            ?></div>
                            <?php

                        }
                        ?>
                        </div>
                        <!--background verification report ed-->
                        <div><?php echo $fg;?></div>
                        <!--<div class="form-group">
                            <label for="adserv">Additional Service:</label>
                            <input type="text" class="form-control" name="adserv" id="adserv" value="<?php echo $padserv;?>">
                        </div>-->
                        <div class="form-group">
                            <label for="inrdt">Insuff Raised Date:</label>
                            <input type="date" class="form-control" name="inrdt" id="inrdt" value="<?php echo $pinrdt;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="inrmrk">Insuff Remarks:</label>
                            <input type="text" class="form-control" name="inrmrk" id="inrmrk" value="<?php echo $pinrmrk?>">
                        </div>
                        <div class="form-group">
                            <label for="incldt">Insuff Cleared Date:</label>
                            <input type="date" class="form-control" name="incldt" id="incldt" value="<?php echo $pincldt;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="ovrlst">Overall Status:</label>
                            <select class="sesty" name="ovrlst" id="ovrlst">
                                <option>--Select--</option>
                                <option value="wip">WIP</option>
                                <option value="insuff">INSUFF</option>
                                <option value="completed">COMPLETED</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="firesnt">Final Report Sent Date:</label>
                            <input type="date" class="form-control" name="firesnt" id="firesnt" value="<?php echo $pfiresnt;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="rptsta">Report Status:</label>
                            <select class="sesty" name="rptsta" id="rptsta">
                                <option>--Select--</option>
                                <option value="open">OPEN</option>
                                <option value="closed">CLOSED</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rpttypei">Report Type:</label>
                            <select class="sesty" name="rpttypei" id="rpttypei">
                                <option>--Select--</option>
                                <option>Interium Report</option>
                                <option>Final Report</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="finlversta">Final Verification Status:</label>
                            <select class="sesty" name="finlversta" id="finlversta">
                                <option>--Select--</option>
                                <option>GREEN</option>
                                <option>RED</option>
                                <option>YELLOW</option>
                                <option>ORANGE</option>
                                <option>PINK</option>
                            </select>
                        </div>
                        <!--<div class="form-group">
                            <label for="clrcde">Colour Code:</label>
                            <input type="text" class="form-control" name="clrcde" id="clrcde" value="<?php echo $pclrcde?>">
                        </div>-->
                        <div class="form-group">
                            <label for="dystk">Case Closure Date – TAT</label>
                            <input type="date" class="form-control" name="dystk" id="dystk" value="<?php echo $pdystk;?>" max="9999-12-31">
                        </div>
                        <!--<div class="form-group">
                            <label for="adfee">Additional Fee if Any:</label>
                            <input type="text" class="form-control" name="adfee" id="adfee" value="<?php echo $padfee?>">
                        </div>-->
                        <!--<div class="form-group">
                            <label for="finlrepot">Prepare Report:</label>
                            <input type="file" class="form-control" name="finlrepot" id="finlrepot">
                        </div>-->
                        <div class="form-group">
                            <label for="finrmrk">Remarks:</label>
                            <input type="text" class="form-control" name="finrmrk" id="finrmrk" value="<?php echo $pfinrmrk;?>">
                        </div>
                        <!--<div class="form-group">
                            <label for="endend">End to end confirmation</label>
                            <input type="text" class="form-control" name="endend" id="endend" value="" required>
                        </div>-->
                        
<script>
    function anficnt(adsfg){
        var anxnme=$(adsfg).data('annul');
        var anfilcn=$(adsfg)[0].files;
        $('#filcntt'+anxnme).val(anfilcn.length);
    }
</script>
<script>
    $(document).ready(function(){
        var rptsta='<?php echo strtoupper($rpto_sta);?>';
        $('#rptsta option:selected').text(rptsta);
        
        var rpttypeii='<?php echo $rpto_type;?>';
        $('#rpttypei option:selected').text(rpttypeii);
        
        var finlvrii='<?php echo $finl_veristi;?>';
        $('#finlversta option:selected').text(finlvrii);
    })
</script>