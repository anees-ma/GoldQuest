<?php 
include 'header.php';
include 'config.php';
include 'functions.php';
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
$over_all_status = $prevres['over_status'];
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
$case_rcvd_month = $prevres['case_rcvd_month'];
$pa_full_address=$prevres['pa_full_address'];
$pa_pos_from=$prevres['pa_pos_from'];
$pa_pos_to=$prevres['pa_pos_to'];
$pa_landmark=$prevres['pa_landmark'];
$pa_residence_mobile_no=$prevres['pa_residence_mobile_no'];
$pa_state=$prevres['pa_state'];
$pa_court_address=$prevres['pa_court_address'];
$ca_full_address=$prevres['ca_full_address'];
$ca_landmark=$prevres['ca_landmark'];
$ca_residence_mobile_no=$prevres['ca_residence_mobile_no'];
$ca_state=$prevres['ca_state'];
$ca_court_address=$prevres['ca_court_address'];

$is_verified = $prevres['is_quality_verified'];
//selection of applic_entry table ed

//selection of Client Code
$qry=mysqli_query($con,"select * from applications where ref_id='$appid'");
$qryres=mysqli_fetch_assoc($qry);
$client_uid=$qryres['client_uid'];
$client_nme=$qryres['company_name'];
$empp_nme=$qryres['emp_name'];
$selectedServiceListArray = json_decode($qryres['services']);
//print_r(json_decode($qryres['services'])); exit;
//selection  of selected services
$qry2=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$qryres2=mysqli_fetch_assoc($qry2);
$services=substr($qryres2['service_name'], 0, -1);

//$ktp=substr($services, 0, -1);//#CH on Mar 21, 2021 by Anees with below code since the rightmost charecter is trimmed.
$ktp = $services;
$exp=explode(',',$ktp);

$clientServiceList=array_map("getClientServicelistSelected",$exp);
$exp1cnt=count($exp);
?>
<style type="text/css">
    .red-t{
        color: red;
    }
</style>
<div class="form-group">
                            <label for="may">Month -Year<span class="red-t">*</span></label>
                            <input type="text" class="rqd form-control month_year" name="may" id="may" value="<?php echo $pmay;?>" required>
                        </div>
                        <?php 
                            $applRcvdDate = ($pcsrdt!='')?date('d-m-Y',strtotime($pcsrdt)):$pcsrdt;
                        ?>
                        <div class="form-group">
                            <label for="csrdt">Application Received Date</label>
                            <input type="text" class="form-control datepicker" name="csrdt" id="csrdt" value="<?php echo $applRcvdDate;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="case_rcvd_month">Application Received Month</label>
                            <input type="text" class="form-control case_rcvd_month month" name="case_rcvd_month" id="case_rcvd_month" value="<?php echo $case_rcvd_month;?>">
                        </div>
                        <div class="form-group">
                            <label for="clfnme">Client Company Name</label>
                            <input type="text" class="form-control" name="clfnmeoo" id="clfnmeoo" value="<?php echo ucwords($client_nme);?>" readonly>
                            <input type="hidden" class="form-control" name="clfnme" id="clfnme" value="<?php echo ucwords($client_nme);?>">
                        </div>
                        <div class="form-group">
                            <label for="clcmloci">Client Company Location<span class="red-t">*</span></label>
                            <input type="text" class="rqd form-control" name="clcmloci" id="clcmloci" value="<?php echo ucwords($clicmp_lociei);?>" required>
                        </div>
                        <div class="form-group">
                            <label for="clempid">Candidate Employee ID</label>
                            <input type="text" class="form-control" name="clempid" id="clempid" value="<?php echo $pclempid;?>">
                        </div>
                        <div class="form-group">
                            <label for="grefid">Client Code</label>
                            <input type="text" class="form-control" name="grefidoo" id="grefidoo" value="<?php echo $client_uid;?>" readonly>
                            <input type="hidden" class="form-control" name="grefid" id="grefid" value="<?php echo $client_uid;?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="candrefid">GQG Reference ID<span class="red-t">*</span></label>
                            <input type="text" class="rqd form-control" name="candrefid" id="candrefid" value="<?php echo $canddrefid;?>" required>
                        </div> Disable by anees on April 7 2021-->
                        <div class="form-group">
                            <label for="canfnmeoo">Candidate Full Name<span class="red-t">*</span></label>
                            <input type="text" class="rqd form-control" name="canfnmeoo" id="canfnmeoo" value="<?php echo ucwords($empp_nme);?>" required>
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
                        <?php 
                            //$dateOfBirth = ($pdob!='')?date('d-m-Y',strtotime($pdob)):$pdob;
                        ?>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="text" class="form-control" name="dob" id="dob" value="<?php echo $pdob;?>">
                        </div>
                            <div class="form-group">
                            <label for="gender">Gender<span class="red-t">*</span>:</label>
                            <!-- <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="rqd form-control" name="gender" id="gender" value="<?php echo $pgender;?>" required> -->
                            <select class="form-control" name="gender" id="gender_applic" value="<?php echo $pgender;?>" required>
                                <option></option>
                                <option value="Male" <?php if($pgender=='Male'){echo 'selected';} ?>>Male</option>
                                <option value="Female" <?php if($pgender=='Female'){echo 'selected';} ?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="martsta">Marital Status:</label>
                            <!-- <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="martsta" id="martsta" value="<?php echo $pmartsta;?>"> -->
                            <select class="form-control" name="martsta" id="martsta" value="<?php echo $pmartsta;?>">
                                <option></option>
                                <option value="Married" <?php if($pmartsta=='Married'){echo 'selected';} ?>>Married</option>
                                <option value="Single" <?php if($pmartsta=='Single'){echo 'selected';} ?>>Single</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="natilty">Nationality<span class="red-t">*</span>:</label>
                            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="natilty" id="natilty" value="<?php echo $pnatilty;?>" required>
                        </div>
                        <!-- <div class="srv_title">PERMANENT ADDRESS</span></div>
                        <div class="servdesc">
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
                        </div>
                        <div class="srv_title">CURRENT ADDRESS</span></div>
                        <div class="servdesc">
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
                        </div> #CH - disabled by Anees on April 7 2021-->
                        <?php 
                            $vidate = ($pdob!='')?date('d-m-Y',strtotime($pcindate)):$pcindate;
                        ?>
                        <div class="form-group">
                            <label for="cindate">Verification Initiated Date<span class="red-t">*</span>:</label>
                            <input type="text" class="rqd form-control datepicker" name="cindate" id="cindate" value="<?php echo $vidate;?>" max="9999-12-31" required>
                        </div>

                        <h4>Permanent Address</h4>
                        <div class="addresses" style="border: 1px solid #3e76a5;padding: 20px;margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="pa_full_address">Full Address:</label>
                                <input type="text" class="form-control" name="pa_full_address" id="pa_full_address" value="<?php echo $pa_full_address;?>">
                            </div>

                            <div class="form-group">
                                <h5>Period of Stay</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">From:</label>
                                        <input type="text" class="form-control two_dates_month pos_from" name="pa_pos_from" id="cindate" value="<?php echo $pa_pos_from;?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">To:</label>
                                        <input type="text" class="form-control two_dates_month pos_to" name="pa_pos_to" id="cindate" value="<?php echo $pa_pos_to;?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pa_landmark">Landmark:</label>
                                <input type="text" class="form-control" name="pa_landmark" id="pa_landmark" value="<?php echo $pa_landmark;?>">
                            </div>

                            <div class="form-group">
                                <label for="pa_residence_mobile_no">Residence Mobile No:</label>
                                <input type="number" class="form-control" name="pa_residence_mobile_no" id="pa_residence_mobile_no" value="<?php echo $pa_residence_mobile_no;?>">
                            </div>

                            <div class="form-group">
                                <label for="pa_state">State:</label>
                                <input type="text" class="form-control" name="pa_state" id="pa_state" value="<?php echo $pa_state;?>">
                            </div>

                            <div class="form-group">
                                <label for="pa_court_address">Court Address:</label>
                                <input type="text" class="form-control" name="pa_court_address" id="pa_court_address" value="<?php echo $pa_court_address;?>">
                            </div>
                        </div>

                        <h4>Current Address</h4>
                        <div class="addresses" style="border: 1px solid #3e76a5;padding: 20px;margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="ca_full_address">Full Address:</label>
                                <input type="text" class="form-control" name="ca_full_address" id="ca_full_address" value="<?php echo $ca_full_address;?>">
                            </div>

                            <div class="form-group">
                                <label for="ca_landmark">Landmark:</label>
                                <input type="text" class="form-control" name="ca_landmark" id="ca_landmark" value="<?php echo $ca_landmark;?>">
                            </div>

                            <div class="form-group">
                                <label for="ca_residence_mobile_no">Residence Mobile No:</label>
                                <input type="number" class="form-control" name="ca_residence_mobile_no" id="ca_residence_mobile_no" value="<?php echo $ca_residence_mobile_no;?>">
                            </div>

                            <div class="form-group">
                                <label for="ca_state">State:</label>
                                <input type="text" class="form-control" name="ca_state" id="ca_state" value="<?php echo $ca_state;?>">
                            </div>

                            <div class="form-group">
                                <label for="ca_court_address">Court Address:</label>
                                <input type="text" class="form-control" name="ca_court_address" id="ca_court_address" value="<?php echo $ca_court_address;?>">
                            </div>
                        </div>


                        
                        <!--services st-->
                        <?php if(!empty($selectedServiceListArray)){ ?>
                        <div class="srv_title">SELECTED SERVICES<span class="red-t">*</span></div>
                        <?php }
$i=0;
//for($i=0; $i < $exp1cnt; $i++){#CH replaced with the below code by Anees M A on March 21 - 2021 for getting only selected services while aon application from client dropbox
foreach ($selectedServiceListArray as $key => $servicesSelected) {
  
    //$serv_nme=$exp[$i];#CH on March 21 - 2021 by Anees M A
    $serv_nme = $servicesSelected;
    $exp2=explode('#',$serv_nme);
    $serv_nmef=$exp2[1];
    $selserv=explode('-',$serv_nmef);
    $selservf=implode('_',$selserv);
   ?>
   <div class="servdesc">
       <?php 
      // $serv_nmef = ($serv_nmef=='insta-drug-test')?'insta-drug-panel':$serv_nmef;
       $serv_nmefOptn = ($serv_nmef=='insta-drug-test')?'insta-drug-panel':$serv_nmef;
       $optionSelected = $qryres[str_replace('-','_',$serv_nmefOptn)];
      // echo str_replace('-',' ',strtoupper(getServiceDisplayName($serv_nmef,$con)));#CH
      echo str_replace('-',' ',strtoupper(getServiceDisplayName($serv_nmef,$con)));

       ?>&nbsp;
   <select class="rqd sesty" id="sta<?php echo $selservf;?>" name="sta<?php echo $selservf;?>" required>
       <option disabled selected>--Select status--</option>
       <option value="wip" <?php if($optionSelected == 'wip'){ echo 'selected'; }?>>WIP</option>
       <option value="insuff" <?php if($optionSelected == 'insuff'){ echo 'selected'; }?>>INSUFF</option>
       <option value="completed" <?php if($optionSelected == 'completed'){ echo 'selected'; }?>>COMPLETED</option>
       <!-- <option value="nil" <?php if($optionSelected == 'nil'){ echo 'selected'; }?>>NIL</option> -->
   </select>
   </div>
   <?php
}
?>
                        <!--services ed-->
                        
                        <!--background verification report st-->
                        <?php if(!empty($selectedServiceListArray)){ ?>
                        <div class="srv_title" style="font-size: 20px;">BACKGROUND VERIFICATION</div>
                        <div class="bck_verify">
                        <?php 
                        $m=0;
                        //for($m=0; $m < $exp1cnt; $m++){#CH replaced with the below code by Anees M A on March 21 - 2021 for getting only selected services while aon application from client dropbox
                        foreach ($selectedServiceListArray as $key => $servicesSelected) {
                            //$bck=$exp[$m];#CH on March 21 - 2021 by Anees M A
                            $bck = $servicesSelected;
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
                            <div class="sec_div">
                            <div class="bck_titl"><?php echo str_replace("-"," ",strtoupper(getServiceDisplayName($sece_nme,$con)));?></div>
                            <div class="apredt" style=""><span id="apone">Application Details</span><span id="aptwo">Report Details</span></div>
                            <?php
                            $r=0;
                            for($r=0; $r < $appl_cnt; $r++){
                                $fgui=$sece_nme;
                                $fguiexp=explode('-',$fgui);
                                $fguiimplo=implode('_',$fguiexp);
                                $pre_bsel=mysqli_query($con,"select * from $fguiimplo where appl_id='$appid'");
                                $pre_bselres=mysqli_fetch_assoc($pre_bsel);
                                //echo $appid.'<pre>';//print_r($pre_bselres);
                            ?>
                            <?php //if($sece_nme=='5-panel' || $sece_nme=='6-panel' || $sece_nme=='10-panel' || $sece_nme=='12-panel'){?>
                            <?php //}else{?>
                            <div class="form-group inststy">
                            <label for="curpromiland"><?php echo ucwords($appl_detailsexp[$r]);?>:</label>
                            <input type="text" class="form-control" name="<?php echo $apl_shrtexp[$r];?>" id="<?php echo $apl_shrtexp[$r];?>" value="<?php echo $pre_bselres[$apl_shrtexp[$r]];?>">
                            </div>
                            <div class="form-group inststy flotr">
                            <label for="curpromiland"><?php echo ucwords($repot_detaiexp[$r]);?>:</label>
                            <input type="text" class="form-control" name="<?php echo $rept_shrtexp[$r]?>" id="<?php echo $rept_shrtexp[$r]?>" value="<?php echo $pre_bselres[$rept_shrtexp[$r]];?>">
                            </div>


                        <?php //} ?>
                            
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
                            <label for="curpromiland">Information Source Name:</label>
                            <input type="text" class="form-control" name="sroc<?php echo $rmrsim;?>" id="sroc<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['source'];?>">
                            </div>
                            <div class="form-group">
                            <label for="curpromiland">Location:</label>
                            <!-- <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="lcntin<?php echo $rmrsim;?>" id="lcntin<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['location'];?>"> -->
                            <input type="text" onkeypress="" class="form-control" name="lcntin<?php echo $rmrsim;?>" id="lcntin<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['location'];?>">
                            </div>

                            <?php 
                                $reportVrfdDate = ($pre_bselres['cmpl_date']!='')?date('d-m-Y',strtotime($pre_bselres['cmpl_date'])):$pre_bselres['cmpl_date'];
                            ?>
                            <div class="form-group">
                            <label for="curpromiland">Report Verified Date:</label>
                            <input type="text" class="form-control datepicker" name="cmpdte<?php echo $rmrsim;?>" id="cmpdte<?php echo $rmrsim;?>" value="<?php echo $reportVrfdDate;?>">
                            </div>
                            <!-- <div class="form-group">
                                <label for="curpromiland">Verification Status: (Color Code)</label>
                                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="clrcde<?php echo $rmrsim;?>" id="clrcde<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['color_code'];?>">
                            </div> -->

                            <div class="form-group">
                            <label for="curpromiland">Verification Status(Color Code):</label>
                            <select class="" name="clrcde<?php echo $rmrsim;?>" id="clrcde<?php echo $rmrsim;?>" value="<?php echo $pre_bselres['color_code'];?>" style="width: 50%; float: right;">
                                <option></option>
                                <option value="green" <?php echo ($pre_bselres['color_code']=="green")?"selected":"";?>>GREEN</option>
                                <option value="red" <?php echo ($pre_bselres['color_code']=="red")?"selected":"";?>>RED</option>
                                <option value="yellow" <?php echo ($pre_bselres['color_code']=="yellow")?"selected":"";?>>YELLOW</option>
                                <option value="orange" <?php echo ($pre_bselres['color_code']=="orange")?"selected":"";?>>ORANGE</option>
                                <option value="pink" <?php echo ($pre_bselres['color_code']=="pink")?"selected":"";?>>PINK</option>
                            </select>
                        </div>
                            <div class="form-group">
                            <label for="curpromiland">Annexure:</label>
                            <input type="file" class="form-control anexmul" name="file<?php echo $rmrsim;?>[]" onchange="anficnt(this)" data-annul="<?php echo $rmrsim;?>" id="file<?php echo $rmrsim;?>" multiple>
                            </div>
                            <input type="hidden" name="filcntt<?php echo $rmrsim;?>" id="filcntt<?php echo $rmrsim;?>" value="">
                            <div><?php 
                            $imgm=$pre_bselres['report'];
                            $imgmexp=explode(',',$imgm);
                            $imgmcnt=count($imgmexp)-1;
                            for($im=0; $im < $imgmcnt; $im++){
                                $file_name_anx = basename($imgmexp[$im]);
                                $file_ext = pathinfo($imgmexp[$im])['extension'];
                                if($file_ext == 'JPG' || $file_ext == 'JPEG' || $file_ext == 'PNG' || $file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png'){
                                ?>
                                <img src="<?php echo $imgmexp[$im];?>" style="height:20%;border:1px solid grey" title="<?php echo $file_name_anx; ?>">
                                <?php
                            }elseif($file_ext == 'pdf' || $file_ext == 'PDF'){ ?>
                                <img src="images/pdf_img.png" style="height:20%;border:1px solid grey" title="<?php echo $file_name_anx; ?>">
                            <?php }elseif($file_ext == 'docx' || $file_ext == 'doc' || $file_ext == 'DOCX' || $file_ext == 'DOC'){ ?>
                                <img src="images/doc_img.png" style="height:20%;border:1px solid grey" title="<?php echo $file_name_anx; ?>">
                          <?php  }elseif($file_ext == 'xls' || $file_ext == 'csv' || $file_ext == 'XLS' || $file_ext == 'CSV'){ ?>
                                <img src="images/excel_img.png" style="height:20%;border:1px solid grey" title="<?php echo $file_name_anx; ?>">
                          <?php }
                            }
                            ?></div></div>
                            <?php

                        }
                        ?>
                        </div>
                    <?php } ?>
                        <!--background verification report ed-->
                        <div><?php echo $fg;?></div>
                        <!--<div class="form-group">
                            <label for="adserv">Additional Service:</label>
                            <input type="text" class="form-control" name="adserv" id="adserv" value="<?php echo $padserv;?>">
                        </div>-->
                        <?php 
                            $insuffRaisedDate = ($pinrdt!='')?date('d-m-Y',strtotime($pinrdt)):$pinrdt;
                        ?>
                        <div class="form-group">
                            <label for="inrdt">Insuff Raised Date:</label>
                            <input type="text" class="form-control datepicker" name="inrdt" id="inrdt" value="<?php echo $insuffRaisedDate;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="inrmrk">Insuff Remarks:</label>
                            <input type="text" class="form-control" name="inrmrk" id="inrmrk" value="<?php echo $pinrmrk?>">
                        </div>
                        <?php 
                            $insuffClearedDate = ($pincldt!='')?date('d-m-Y',strtotime($pincldt)):$pincldt;
                        ?>
                        <div class="form-group">
                            <label for="incldt">Insuff Cleared Date:</label>
                            <input type="text" class="form-control datepicker" name="incldt" id="incldt" value="<?php echo $insuffClearedDate;?>" max="9999-12-31">
                        </div>
                        <div class="form-group">
                            <label for="ovrlst">Overall Status<span class="red-t">*</span>:</label>
                            <select class="rqd sesty" name="ovrlst" id="ovrlst" required>
                                <option></option>
                                <option value="wip" <?php if($over_all_status == 'wip'){ echo 'selected'; }?>>WIP</option>
                                <option value="insuff" <?php if($over_all_status == 'insuff'){ echo 'selected'; }?>>INSUFF</option>
                                <option value="completed" <?php if($over_all_status == 'completed'){ echo 'selected'; }?>>COMPLETED</option>
                            </select>
                        </div>
                        <?php 
                            $reportDate = ($pfiresnt!='')?date('d-m-Y',strtotime($pfiresnt)):$pfiresnt;
                        ?>
                        <div class="form-group">
                            <label for="firesnt">Report Date:</label>
                            <input type="text" class="form-control datepicker" name="firesnt" id="firesnt" value="<?php echo $reportDate;?>" max="9999-12-31">
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

                        <div class="form-group" style="background-color: #ACE7F6; padding: 10px;">
                            <label for="isverified">Is verified by quality team?<span class="red-t">*</span>:</label>
                            <select class="rqd sesty" name="isverified" id="isverified" required>
                                <!-- <option>--Select--</option> -->
                                <option value="no" <?php echo ($is_verified=='no')?'selected':'';?>>No</option>
                                <option value="yes" <?php echo ($is_verified=='yes')?'selected':'';?>>Yes</option>
                                
                            </select>
                        </div>
                        <!--<div class="form-group">
                            <label for="clrcde">Colour Code:</label>
                            <input type="text" class="form-control" name="clrcde" id="clrcde" value="<?php echo $pclrcde?>">
                        </div>-->
                        <?php 
                            $tatClosureDate = ($pdystk!='')?date('d-m-Y',strtotime($pdystk)):$pdystk;
                        ?>
                        <div class="form-group">
                            <label for="dystk">TAT Closure Date<span class="red-t">*</span></label>
                            <input type="text" class="rqd form-control datepicker" name="dystk" id="dystk" value="<?php echo $tatClosureDate;?>" max="9999-12-31" required>
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