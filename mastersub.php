<?php 
include 'config.php';
?>
<?php 
//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('d').'-'.date('m').'-'.date('Y').' '.date('H:i');
//time ed//
extract($_POST);
// storing the master entry data
//previous dates selection st
$dats=mysqli_query($con,"select * from applic_entry where appl_id='$apid'");
$datscnt=mysqli_num_rows($dats);
$datsres=mysqli_fetch_assoc($dats);
$kcsrdt=$datsres['case_rv_dt'];
$kdob=$datsres['dob_fath'];
$kcindate=$datsres['cse_intidt'];
$kinrdt=$datsres['insf_ra_dt'];
$kincldt=$datsres['insuf_clr_dt'];
$kfiresnt=$datsres['finl_rpt_dt'];
//1
if($csrdt != NULL){
    $csrdt=$csrdt;
}
else{
    $csrdt=$kcsrdt;
}
//2
if($dob != NULL){
    $dob=$dob;
}
else{
    $dob=$kdob;
}
//3
if($cindate != NULL){
    $cindate=$cindate;
}
else{
    $cindate=$kcindate;
}
//4
if($inrdt != NULL){
    $inrdt=$inrdt;
}
else{
    $inrdt=$kinrdt;
}
//5
if($incldt != NULL){
    $incldt=$incldt;
}
else{
    $incldt=$kincldt;
}
//6
if($firesnt != NULL){
    $firesnt=$firesnt;
}
else{
    $firesnt=$kfiresnt;
}
//previous dates selection ed

//selection of mobile
$mobiq=mysqli_query($con,"select * from applications where ref_id='$apid'");
$mobiqres=mysqli_fetch_assoc($mobiq);
$client_uid=$mobiqres['client_uid'];

//selection of client mobile
$mobfi=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$mobfires=mysqli_fetch_assoc($mobfi);
$mobile=$mobfires['mobile'];
$client_email=$mobfires['email'];
$client_email2=$mobfires['email2'];
$client_email3=$mobfires['email3'];
$client_email4=$mobfires['email4'];
$genfd=strtolower($gender);
if($gender == 'male'){
    $mgendi='MR.';
}
elseif($gender == 'female'){
    $mgendi='MS.';
}
elseif($gender == NULL){
    $mgendi='MR/MS.';
}

//mail st
if($ovrlst == 'completed'){
         /*$to =$client_email;*/
         $subject = "Final Report";
         /*$message = "<b>From GQG HR SERVICES</b>";*/
         $message .= "<div>Dear $clfnme,</div><br>
         <div>Greetings!!!!</div><br>
         <div><strong>$mgendi $canfnmeoo, Application ID:$apid, </strong> Final Background Verification Report is ready in GoldQuest VTS Portal, Kindly download.</div><br>
         <div>We assure our best services at all the time.</div><br>
      <div>Our customer service team will be available for any support  24 x 7.</div><br>
         <div><a href='https://admin.goldquestglobal.in/pdf/rpt.php?reff_id=$apid'><button style='background-color:#337fbf;color:white;border:none'>Download Final Report</button></a></div><br>
        
       
         <div>Best Regards</div>
         <div>GoldQuest BGV Team</div>
         ";
         $header = "From:bgvcst@goldquestglobal.in \r\n";
      //   $header .= "Cc:geethanjali089@gmail.com,$client_email2,$client_email3,$client_email4 \r\n";
         $header .= "Cc:manjunath@goldquestglobal.in,$client_email2,$client_email3,$client_email4 \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($to,$subject,$message,$header);
}
//mail ed
$adfee=($add_feeemp_hr_1+$add_feeemp_hr_2+$add_feeemp_hr_3+$add_feeemp_hr_4+$add_feeemp_hr_5+$add_feeemp_hr_6+$add_feeemp_hr_7+$add_feeemp_hr_8+
$add_feepermanent_address+$add_feecurrent_address+$add_feepost_graduation+$add_feegraduation+$add_fee12th_std+$add_fee10th_std+$add_feediploma+
$add_feepro_reference_1+$add_feepro_reference_2+$add_fee5_panel+$add_fee6_panel+$add_fee10_panel+$add_fee12_panel+$add_feecriminal_police_record+
$add_feecriminal_court_record+$add_feecriminal_database+$add_feecredit_verification+$add_feenational_id_check+$add_feecompany_site_visit);
/*$adfee=$add_feeeducation_check+$add_feeinsta_drug_test+$add_feeemployment_hr+$add_feeaddress_check+$add_feereference_check+$add_feecriminal_police_record+$add_feecriminal_court_record+$add_feecriminal_database+$add_feecredit_verification+$add_feenational_id_check;*/

if($apid != NULL){
    if($datscnt == 0){
        //insert data
$qry=mysqli_query($con,"insert into applic_entry(appl_id,cand_ref_id,month_year,case_rv_dt,clnt_ful_nme,clnt_emp_id,gqg_ref_id,cand_ful_name,cont_num,
cont_num2,fat_ful_nme,dob_fath,gen,marital_stats,nationlty,cper_addr,pincde,pos_perm,prm_landmrk,res_ml,stae_st,ccur_addr,pin_cde,
pos_curadr,prm_cldmrk,res_lm,state_st2,cse_intidt,insf_ra_dt,insuf_rmrks,insuf_clr_dt,over_status,finl_rpt_dt,clr_cde,no_dys_tkn,addl_fee,rmrks,rptii_status,rptii_type,finlverifi_sta,clicomlocii,date) 
values('$apid','$candrefid','$may','$csrdt','$clfnme','$clempid','$grefid','$canfnmeoo','$cntnum','$cntnum2','$fnme','$dob','$gender','$martsta',
'$natilty','$cmpaddr','$pinco','$perofsty','$prmldmrk','$resml','$state','$cmplcadd','$cmplcpin','$perstycrrd','$curpromiland','$cursreslm',
'$curstate','$cindate','$inrdt','$inrmrk','$incldt','$ovrlst','$firesnt','$clrcde','$dystk','$adfee','$finrmrk','$rptsta','$rpttypei','$finlversta','$clcmloci','$dap')");

if($qry){
    $std_12=$_POST['sta12th_std'];
    $std_10=$_POST['sta10th_std'];
    $panel_5=$_POST['sta5_panel'];
    $panel_6=$_POST['sta6_panel'];
    $panel_10=$_POST['sta10_panel'];
    $panel_12=$_POST['sta12_panel'];
    //update of service profile
    $qry2=mysqli_query($con,"update applications set emp_name='$canfnmeoo',current_address='$stacurrent_address',permanent_address='$stapermanent_address', 
    emp_hr_1='$staemp_hr_1',emp_hr_2='$staemp_hr_2',emp_hr_3='$staemp_hr_3',emp_hr_4='$staemp_hr_4',emp_hr_5='$staemp_hr_5',emp_hr_6='$staemp_hr_6',emp_hr_7='$staemp_hr_7',
    emp_hr_8='$staemp_hr_8',post_graduation='$stapost_graduation',graduation='$stagraduation',12th_std='$std_12',10th_std='$std_10',
    diploma='$stadiploma',pro_reference_1='$stapro_reference_1',pro_reference_2='$stapro_reference_2',5_panel='$panel_5',6_panel='$panel_6',
    10_panel='$panel_10',12_panel='$panel_12',criminal_court_record='$stacriminal_court_record',
    criminal_database='$stacriminal_database',credit_verification='$stacredit_verification',criminal_police_record='$stacriminal_police_record',
    national_id_check='$stanational_id_check',company_site_visit='$stacompany_site_visit',status='$ovrlst' where ref_id='$apid'");
    if($qry2){
        //selection of application id
        $selap=mysqli_query($con,"select * from applications where ref_id='$apid'");
        $selres=mysqli_fetch_assoc($selap);
        $selci=$selres['client_uid'];
        //selection of services
        $selap2=mysqli_query($con,"select * from clent_details where client_uid='$selci'");
        $selres2=mysqli_fetch_assoc($selap2);
        $ser_nme=$selres2['service_name'];
        $serexp=explode(',',$ser_nme);
        $expcnt=count($serexp)-1;
        $g=0;
        for($g=0; $g < $expcnt; $g++){
            $bck=$serexp[$g];
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
/*            $appl_details=$bqryrs['appl_shrt'];
            $rept_shrt=$bqryrs['report_shrt'];
            $jointt=$appl_details.$rept_shrt;
            $rmvcma=substr($jointt, 0, -1);
            $rmvcmaexp=explode(',',$rmvcma);
            $rmvcmacnt=count($rmvcmaexp);
            $apandrp=explode(',',$jointt);
            $apandrpcnt=count($apandrp)-1;*/
            
            //insert data into background verification
            if($sece_nme == 'post-graduation'){
                include 'datasubmi/post_graduation.php';
            }
            elseif($sece_nme == 'graduation'){
                include 'datasubmi/graduation.php';
            }
            elseif($sece_nme == '12th-std'){
                include 'datasubmi/12th_std.php';
            }
            elseif($sece_nme == '10th-std'){
                include 'datasubmi/10th_std.php';
            }
            elseif($sece_nme == 'diploma'){
                include 'datasubmi/diploma.php';
            }
            elseif($sece_nme == 'pro-reference-1'){
                include 'datasubmi/pro_reference_1.php';
            }
            elseif($sece_nme == 'pro-reference-2'){
                include 'datasubmi/pro_reference_2.php';
            }
            elseif($sece_nme == 'permanent-address'){
                include 'datasubmi/permanent_address.php';
            }
            elseif($sece_nme == 'current-address'){
                include 'datasubmi/current_address.php';
            }
            elseif($sece_nme == '5-panel'){
                include 'datasubmi/5_panel.php';
            }
            elseif($sece_nme == '6-panel'){
                include 'datasubmi/6_panel.php';
            }
            elseif($sece_nme == '10-panel'){
                include 'datasubmi/10_panel.php';
            }
            elseif($sece_nme == '12-panel'){
                include 'datasubmi/12_panel.php';
            }
            elseif($sece_nme == 'emp-hr-1'){
                include 'datasubmi/emp_hr_1.php';
            }
            elseif($sece_nme == 'emp-hr-2'){
                include 'datasubmi/emp_hr_2.php';
            }
            elseif($sece_nme == 'emp-hr-3'){
                include 'datasubmi/emp_hr_3.php';
            }
            elseif($sece_nme == 'emp-hr-4'){
                include 'datasubmi/emp_hr_4.php';
            }
            elseif($sece_nme == 'emp-hr-5'){
                include 'datasubmi/emp_hr_5.php';
            }
            elseif($sece_nme == 'emp-hr-6'){
                include 'datasubmi/emp_hr_6.php';
            }
            elseif($sece_nme == 'emp-hr-7'){
                include 'datasubmi/emp_hr_7.php';
            }
            elseif($sece_nme == 'emp-hr-8'){
                include 'datasubmi/emp_hr_8.php';
            }
            elseif($sece_nme == 'criminal-database'){
                include 'datasubmi/criminal_database.php';
            }
            elseif($sece_nme == 'criminal-court-record'){
                include 'datasubmi/criminal_court_record.php';
            }
            elseif($sece_nme == 'criminal-police-record'){
                include 'datasubmi/criminal_police_record.php';
            }
            elseif($sece_nme == 'credit-verification'){
                include 'datasubmi/credit_verification.php';
            }
            elseif($sece_nme == 'national-id-check'){
                include 'datasubmi/national_id_check.php';
            }
            elseif($sece_nme == 'company-site-visit'){
                include 'datasubmi/company_site_visit.php';
            }
        }
        header('location:https://admin.goldquestglobal.in/masterchecker.php?ref_id='.$apid);
    }
}
else{
    echo 'oOPS!';
}
}
else{
    //update data
$qryup=mysqli_query($con,"update applic_entry set month_year='$may',cand_ref_id='$candrefid',case_rv_dt='$csrdt',clnt_ful_nme='$clfnme',clnt_emp_id='$clempid',gqg_ref_id='$grefid',cand_ful_name='$canfnmeoo',cont_num='$cntnum',cont_num2='$cntnum2',
fat_ful_nme='$fnme',dob_fath='$dob',gen='$gender',marital_stats='$martsta',nationlty='$natilty',cper_addr='$cmpaddr',pincde='$pinco',pos_perm='$perofsty',prm_landmrk='$prmldmrk',
res_ml='$resml',stae_st='$state',ccur_addr='$cmplcadd',pin_cde='$cmplcpin',pos_curadr='$perstycrrd',prm_cldmrk='$curpromiland',res_lm='$cursreslm',state_st2='$curstate',
cse_intidt='$cindate',insf_ra_dt='$inrdt',insuf_rmrks='$inrmrk',insuf_clr_dt='$incldt',over_status='$ovrlst',finl_rpt_dt='$firesnt',clr_cde='$clrcde',no_dys_tkn='$dystk',
addl_fee='$adfee',rmrks='$finrmrk',rptii_status='$rptsta',date='$dap',rptii_type='$rpttypei',finlverifi_sta='$finlversta',clicomlocii='$clcmloci' where appl_id='$apid'");

if($qryup){
        $std_12=$_POST['sta12th_std'];
    $std_10=$_POST['sta10th_std'];
    $panel_5=$_POST['sta5_panel'];
    $panel_6=$_POST['sta6_panel'];
    $panel_10=$_POST['sta10_panel'];
    $panel_12=$_POST['sta12_panel'];
    //update of service profile
    $qryup2=mysqli_query($con,"update applications set emp_name='$canfnmeoo',current_address='$stacurrent_address',permanent_address='$stapermanent_address', 
    emp_hr_1='$staemp_hr_1',emp_hr_2='$staemp_hr_2',emp_hr_3='$staemp_hr_3',emp_hr_4='$staemp_hr_4',emp_hr_5='$staemp_hr_5',emp_hr_6='$staemp_hr_6',emp_hr_7='$staemp_hr_7',
    emp_hr_8='$staemp_hr_8',post_graduation='$stapost_graduation',graduation='$stagraduation',12th_std='$std_12',10th_std='$std_10',
    diploma='$stadiploma',pro_reference_1='$stapro_reference_1',pro_reference_2='$stapro_reference_2',5_panel='$panel_5',6_panel='$panel_6',
    10_panel='$panel_10',12_panel='$panel_12',criminal_court_record='$stacriminal_court_record',
    criminal_database='$stacriminal_database',credit_verification='$stacredit_verification',criminal_police_record='$stacriminal_police_record',
    national_id_check='$stanational_id_check',company_site_visit='$stacompany_site_visit',status='$ovrlst' where ref_id='$apid'");
    
    if($qryup2){
            //selection of application id
        $selap=mysqli_query($con,"select * from applications where ref_id='$apid'");
        $selres=mysqli_fetch_assoc($selap);
        $selci=$selres['client_uid'];
        //selection of services
        $selap2=mysqli_query($con,"select * from clent_details where client_uid='$selci'");
        $selres2=mysqli_fetch_assoc($selap2);
        $ser_nme=$selres2['service_name'];
        $serexp=explode(',',$ser_nme);
        $expcnt=count($serexp)-1;
        $g=0;
        for($g=0; $g < $expcnt; $g++){
            $bck=$serexp[$g];
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
/*            $appl_details=$bqryrs['appl_shrt'];
            $rept_shrt=$bqryrs['report_shrt'];
            $jointt=$appl_details.$rept_shrt;
            $rmvcma=substr($jointt, 0, -1);
            $rmvcmaexp=explode(',',$rmvcma);
            $rmvcmacnt=count($rmvcmaexp);
            $apandrp=explode(',',$jointt);
            $apandrpcnt=count($apandrp)-1;*/
            
            //update data into background verification
            if($sece_nme == 'post-graduation'){
                //report upload st
                //selection of docs in applications
                   $sel2anx=mysqli_query($con,"select * from post_graduation where appl_id='$apid'");
                   $selresanx2=mysqli_fetch_assoc($sel2anx);
                   $docs=$selresanx2['report'];
                 if($filcnttpost_graduation > 0){
                   $docsexp=explode(',',$docs);
                   $docscnt=count($docsexp)-1;
                   $dc=0;
                   for($dc=0; $dc < $docscnt; $dc++){
                   $docone=$docsexp[$dc];
                   unlink($docone);
                   }
                foreach($_FILES["filepost_graduation"]["tmp_name"] as $key=>$tmp_name) {
                              $imagename = $_FILES['filepost_graduation']['name'][$key];
                              $source = $_FILES['filepost_graduation']['tmp_name'][$key];
                              $ext = pathinfo($imagename, PATHINFO_EXTENSION);
                              $imgRANDMR=rand(99999,10000);
                              $imgRANDM='postup'.$apid.$imgRANDMR;
                              $coverImgdir = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir)){
                mkdir($coverImgdir,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS=$imgRANDM.'.'.$ext;
              $target = "$coverImgdir".$imgRANDFS;
              move_uploaded_file($source, $target);
              $imagepath = $imgRANDFS;
              $edurp='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath;
              $postgr;
              $postgr=$postgr.','.$edurp;
              }
              $postgr=ltrim($postgr,',').',';
                }
                else{
                    $postgr=$docs;
                }
                //report upload ed
                $edvup=mysqli_query($con,"update post_graduation set nist='$nist',ncndi='$ncndi',enroln='$enroln',dgre='$dgre',mjr='$mjr',myps='$myps',cidt='$cidt',slnum='$slnum',nist2='$nist2',ncndi2='$ncndi2',enroln2='$enroln2',dgre2='$dgre2',
                mjr2='$mjr2',myps2='$myps2',cidt2='$cidt2',slnum2='$slnum2',remarks='$rmkpost_graduation',date='$dap',source='$srocpost_graduation',location='$lcntinpost_graduation',cmpl_date='$cmpdtepost_graduation',color_code='$clrcdepost_graduation',add_fe='$add_feepost_graduation',report='$postgr' where appl_id='$apid'");
                if($edvup){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'graduation'){
                //report upload st
                //selection of docs in applications
                   $sel2anx2=mysqli_query($con,"select * from graduation where appl_id='$apid'");
                   $selresanx22=mysqli_fetch_assoc($sel2anx2);
                   $docs2=$selresanx22['report'];
                 if($filcnttgraduation > 0){
                   $docsexp2=explode(',',$docs2);
                   $docscnt2=count($docsexp2)-1;
                   $dc2=0;
                   for($dc2=0; $dc2 < $docscnt2; $dc2++){
                   $docone2=$docsexp2[$dc2];
                   unlink($docone2);
                   }
                foreach($_FILES["filegraduation"]["tmp_name"] as $key2=>$tmp_name2) {
                              $imagename2 = $_FILES['filegraduation']['name'][$key2];
                              $source2 = $_FILES['filegraduation']['tmp_name'][$key2];
                              $ext2 = pathinfo($imagename2, PATHINFO_EXTENSION);
                              $imgRANDMR2=rand(99999,10000);
                              $imgRANDM2='grdup'.$apid.$imgRANDMR2;
                              $coverImgdir2 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir2)){
                mkdir($coverImgdir2,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS2=$imgRANDM2.'.'.$ext2;
              $target2 = "$coverImgdir2".$imgRANDFS2;
              move_uploaded_file($source2, $target2);
              $imagepath2 = $imgRANDFS2;
              $edurp2='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath2;
              $postgr2;
              $postgr2=$postgr2.','.$edurp2;
              
              }
              $postgr2=ltrim($postgr2,',').',';
                }
                else{
                    $postgr2=$docs2;
                }
                //report upload ed
                $grdup=mysqli_query($con,"update graduation set nistg='$nistg',ncndig='$ncndig',enrolng='$enrolng',dgreg='$dgreg',mjrg='$mjrg',mypsg='$mypsg',cidtg='$cidtg',slnumg='$slnumg',nistg2='$nistg2',ncndig2='$ncndig2',enrolng2='$enrolng2',dgreg2='$dgreg2',
                mjrg2='$mjrg2',mypsg2='$mypsg2',cidtg2='$cidtg2',slnumg2='$slnumg2',remarks='$rmkgraduation',date='$dap',source='$srocgraduation',location='$lcntingraduation',cmpl_date='$cmpdtegraduation',color_code='$clrcdegraduation',add_fe='$add_feegraduation',report='$postgr2' where appl_id='$apid'");
                if($grdup){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == '12th-std'){
                //report upload st
                //selection of docs in applications
                   $sel2anx3=mysqli_query($con,"select * from 12th_std where appl_id='$apid'");
                   $selresanx23=mysqli_fetch_assoc($sel2anx3);
                   $docs3=$selresanx23['report'];
                 if($filcntt12th_std > 0){
                   $docsexp3=explode(',',$docs3);
                   $docscnt3=count($docsexp3)-1;
                   $dc3=0;
                   for($dc3=0; $dc3 < $docscnt3; $dc3++){
                   $docone3=$docsexp3[$dc3];
                   unlink($docone3);
                   }
                foreach($_FILES["file12th_std"]["tmp_name"] as $key3=>$tmp_name3) {
                              $imagename3 = $_FILES['file12th_std']['name'][$key3];
                              $source3 = $_FILES['file12th_std']['tmp_name'][$key3];
                              $ext3 = pathinfo($imagename3, PATHINFO_EXTENSION);
                              $imgRANDMR3=rand(99999,10000);
                              $imgRANDM3='12up'.$apid.$imgRANDMR3;
                              $coverImgdir3 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir3)){
                mkdir($coverImgdir3,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS3=$imgRANDM3.'.'.$ext3;
              $target3 = "$coverImgdir3".$imgRANDFS3;
              move_uploaded_file($source3, $target3);
              $imagepath3 = $imgRANDFS3;
              $edurp3='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath3;
              $postgr3;
              $postgr3=$postgr3.','.$edurp3;
              }
              $postgr3=ltrim($postgr3,',').',';
                }
                else{
                    $postgr3=$docs3;
                }
                //report upload ed
                $twelup=mysqli_query($con,"update 12th_std set nistgot='$nistgot',ncndigot='$ncndigot',enrolngot='$enrolngot',dgregot='$dgregot',mjrgot='$mjrgot',mypsgot='$mypsgot',cidtgot='$cidtgot',slnumgot='$slnumgot',nistgot2='$nistgot2',ncndigot2='$ncndigot2',enrolngot2='$enrolngot2',dgregot2='$dgregot2',
                mjrgot2='$mjrgot2',mypsgot2='$mypsgot2',cidtgot2='$cidtgot2',slnumgot2='$slnumgot2',remarks='$rmk12th_std',date='$dap',source='$sroc12th_std',location='$lcntin12th_std',cmpl_date='$cmpdte12th_std',color_code='$clrcde12th_std',add_fe='$add_fee12th_std',report='$postgr3' where appl_id='$apid'");
                if($twelup){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == '10th-std'){
                //report upload st
                //selection of docs in applications
                   $sel2anx4=mysqli_query($con,"select * from 10th_std where appl_id='$apid'");
                   $selresanx24=mysqli_fetch_assoc($sel2anx4);
                   $docs4=$selresanx24['report'];
                 if($filcntt10th_std > 0){
                   $docsexp4=explode(',',$docs4);
                   $docscnt4=count($docsexp4)-1;
                   $dc4=0;
                   for($dc4=0; $dc4 < $docscnt4; $dc4++){
                   $docone4=$docsexp4[$dc4];
                   unlink($docone4);
                   }
                foreach($_FILES["file10th_std"]["tmp_name"] as $key4=>$tmp_name4) {
                              $imagename4 = $_FILES['file10th_std']['name'][$key4];
                              $source4 = $_FILES['file10th_std']['tmp_name'][$key4];
                              $ext4 = pathinfo($imagename4, PATHINFO_EXTENSION);
                              $imgRANDMR4=rand(99999,10000);
                              $imgRANDM4='10up'.$apid.$imgRANDMR4;
                              $coverImgdir4 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir4)){
                mkdir($coverImgdir4,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS4=$imgRANDM4.'.'.$ext4;
              $target4 = "$coverImgdir4".$imgRANDFS4;
              move_uploaded_file($source4, $target4);
              $imagepath4 = $imgRANDFS4;
              $edurp4='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath4;
              $postgr4;
              $postgr4=$postgr4.','.$edurp4;
              }
              $postgr4=ltrim($postgr4,',').',';
                }
                else{
                    $postgr4=$docs4;
                }
                //report upload ed
                $tenup=mysqli_query($con,"update 10th_std set nistgsc='$nistgsc',ncndigsc='$ncndigsc',enrolngsc='$enrolngsc',dgregsc='$dgregsc',mjrgsc='$mjrgsc',mypsgsc='$mypsgsc',cidtgsc='$cidtgsc',slnumgsc='$slnumgsc',nistgsc2='$nistgsc2',ncndigsc2='$ncndigsc2',enrolngsc2='$enrolngsc2',dgregsc2='$dgregsc2',
                mjrgsc2='$mjrgsc2',mypsgsc2='$mypsgsc2',cidtgsc2='$cidtgsc2',slnumgsc2='$slnumgsc2',remarks='$rmk10th_std',date='$dap',source='$sroc10th_std',location='$lcntin10th_std',cmpl_date='$cmpdte10th_std',color_code='$clrcde10th_std',add_fe='$add_fee10th_std',report='$postgr4' where appl_id='$apid'");
                if($tenup){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'diploma'){
                //report upload st
                //selection of docs in applications
                   $sel2anx5=mysqli_query($con,"select * from diploma where appl_id='$apid'");
                   $selresanx25=mysqli_fetch_assoc($sel2anx5);
                   $docs5=$selresanx25['report'];
                 if($filcnttdiploma > 0){
                   $docsexp5=explode(',',$docs5);
                   $docscnt5=count($docsexp5)-1;
                   $dc5=0;
                   for($dc5=0; $dc5 < $docscnt5; $dc5++){
                   $docone5=$docsexp5[$dc5];
                   unlink($docone5);
                   }
                foreach($_FILES["filediploma"]["tmp_name"] as $key5=>$tmp_name5) {
                              $imagename5 = $_FILES['filediploma']['name'][$key5];
                              $source5 = $_FILES['filediploma']['tmp_name'][$key5];
                              $ext5 = pathinfo($imagename5, PATHINFO_EXTENSION);
                              $imgRANDMR5=rand(99999,10000);
                              $imgRANDM5='dipup'.$apid.$imgRANDMR5;
                              $coverImgdir5 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir5)){
                mkdir($coverImgdir5,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS5=$imgRANDM5.'.'.$ext5;
              $target5 = "$coverImgdir5".$imgRANDFS5;
              move_uploaded_file($source5, $target5);
              $imagepath5 = $imgRANDFS5;
              $edurp5='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath5;
              $postgr5;
              $postgr5=$postgr5.','.$edurp5;
              }
              $postgr5=ltrim($postgr5,',').',';
                }
                else{
                    $postgr5=$docs5;
                }
                //report upload ed
                $dipup=mysqli_query($con,"update diploma set nistgdp='$nistgdp',ncndigdp='$ncndigdp',enrolngdp='$enrolngdp',dgregdp='$dgregdp',mjrgdp='$mjrgdp',mypsgdp='$mypsgdp',cidtgdp='$cidtgdp',slnumgdp='$slnumgdp',nistgdp2='$nistgdp2',ncndigdp2='$ncndigdp2',enrolngdp2='$enrolngdp2',dgregdp2='$dgregdp2',
                mjrgdp2='$mjrgdp2',mypsgdp2='$mypsgdp2',cidtgdp2='$cidtgdp2',slnumgdp2='$slnumgdp2',remarks='$rmkdiploma',date='$dap',source='$srocdiploma',location='$lcntindiploma',cmpl_date='$cmpdtediploma',color_code='$clrcdediploma',add_fe='$add_feediploma',report='$postgr5' where appl_id='$apid'");
                if($dipup){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'pro-reference-1'){
                //report upload st
                //selection of docs in applications
                   $sel2anx6=mysqli_query($con,"select * from pro_reference_1 where appl_id='$apid'");
                   $selresanx26=mysqli_fetch_assoc($sel2anx6);
                   $docs6=$selresanx26['report'];
                 if($filcnttpro_reference_1 > 0){
                   $docsexp6=explode(',',$docs6);
                   $docscnt6=count($docsexp6)-1;
                   $dc6=0;
                   for($dc6=0; $dc6 < $docscnt6; $dc6++){
                   $docone6=$docsexp6[$dc6];
                   unlink($docone6);
                   }
                foreach($_FILES["filepro_reference_1"]["tmp_name"] as $key6=>$tmp_name6) {
                              $imagename6 = $_FILES['filepro_reference_1']['name'][$key6];
                              $source6 = $_FILES['filepro_reference_1']['tmp_name'][$key6];
                              $ext6 = pathinfo($imagename6, PATHINFO_EXTENSION);
                              $imgRANDMR6=rand(99999,10000);
                              $imgRANDM6='pro1up'.$apid.$imgRANDMR6;
                              $coverImgdir6 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir6)){
                mkdir($coverImgdir6,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS6=$imgRANDM6.'.'.$ext6;
              $target6 = "$coverImgdir6".$imgRANDFS6;
              move_uploaded_file($source6, $target6);
              $imagepath6 = $imgRANDFS6;
              $edurp6='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath6;
              $postgr6;
              $postgr6=$postgr6.','.$edurp6;
              }
              $postgr6=ltrim($postgr6,',').',';
                }
                else{
                    $postgr6=$docs6;
                }
                //report upload ed
                $pro1=mysqli_query($con,"update pro_reference_1 set rrfnme='$rrfnme',rcndtls='$rcndtls',rvby='$rvby',raswsub='$raswsub',rapspt='$rapspt',rarimp='$rarimp',rapkach='$rapkach',rrfnme2='$rrfnme2',rcndtls2='$rcndtls2',rvby2='$rvby2',raswsub2='$raswsub2',rapspt2='$rapspt2',
                rarimp2='$rarimp2',rapkach2='$rapkach2',remarks='$rmkpro_reference_1',date='$dap',source='$srocpro_reference_1',location='$lcntinpro_reference_1',cmpl_date='$cmpdtepro_reference_1',color_code='$clrcdepro_reference_1',add_fe='$add_feepro_reference_1',report='$postgr6' where appl_id='$apid'");
                if($pro1){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'pro-reference-2'){
                //report upload st
                //selection of docs in applications
                   $sel2anx7=mysqli_query($con,"select * from pro_reference_2 where appl_id='$apid'");
                   $selresanx27=mysqli_fetch_assoc($sel2anx7);
                   $docs7=$selresanx27['report'];
                 if($filcnttpro_reference_2 > 0){
                   $docsexp7=explode(',',$docs7);
                   $docscnt7=count($docsexp7)-1;
                   $dc7=0;
                   for($dc7=0; $dc7 < $docscnt7; $dc7++){
                   $docone7=$docsexp7[$dc7];
                   unlink($docone7);
                   }
                foreach($_FILES["filepro_reference_2"]["tmp_name"] as $key7=>$tmp_name7) {
                              $imagename7 = $_FILES['filepro_reference_2']['name'][$key7];
                              $source7 = $_FILES['filepro_reference_2']['tmp_name'][$key7];
                              $ext7 = pathinfo($imagename7, PATHINFO_EXTENSION);
                              $imgRANDMR7=rand(99999,10000);
                              $imgRANDM7='pro2up'.$apid.$imgRANDMR7;
                              $coverImgdir7 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir7)){
                mkdir($coverImgdir7,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS7=$imgRANDM7.'.'.$ext7;
              $target7 = "$coverImgdir7".$imgRANDFS7;
              move_uploaded_file($source7, $target7);
              $imagepath7 = $imgRANDFS7;
              $edurp7='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath7;
              $postgr7;
              $postgr7=$postgr7.','.$edurp7;
              }
              $postgr7=ltrim($postgr7,',').',';
                }
                else{
                    $postgr7=$docs7;
                }
                //report upload ed
                $pro2=mysqli_query($con,"update pro_reference_2 set rrfnmep='$rrfnmep',rcndtlsp='$rcndtlsp',rvbyp='$rvbyp',raswsubp='$raswsubp',rapsptp='$rapsptp',rarimpp='$rarimpp',rapkachp='$rapkachp',rrfnmep2='$rrfnmep2',rcndtlsp2='$rcndtlsp2',rvbyp2='$rvbyp2',raswsubp2='$raswsubp2',rapsptp2='$rapsptp2',
                rarimpp2='$rarimpp2',rapkachp2='$rapkachp2',remarks='$rmkpro_reference_2',date='$dap',source='$srocpro_reference_2',location='$lcntinpro_reference_2',cmpl_date='$cmpdtepro_reference_2',color_code='$clrcdepro_reference_2',add_fe='$add_feepro_reference_2',report='$postgr7' where appl_id='$apid'");
                if($pro2){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'permanent-address'){
                //report upload st
                //selection of docs in applications
                   $sel2anx8=mysqli_query($con,"select * from permanent_address where appl_id='$apid'");
                   $selresanx28=mysqli_fetch_assoc($sel2anx8);
                   $docs8=$selresanx28['report'];
                 if($filcnttpermanent_address > 0){
                   $docsexp8=explode(',',$docs8);
                   $docscnt8=count($docsexp8)-1;
                   $dc8=0;
                   for($dc8=0; $dc8 < $docscnt8; $dc8++){
                   $docone8=$docsexp8[$dc8];
                   unlink($docone8);
                   }
                foreach($_FILES["filepermanent_address"]["tmp_name"] as $key8=>$tmp_name8) {
                              $imagename8 = $_FILES['filepermanent_address']['name'][$key8];
                              $source8 = $_FILES['filepermanent_address']['tmp_name'][$key8];
                              $ext8 = pathinfo($imagename8, PATHINFO_EXTENSION);
                              $imgRANDMR8=rand(99999,10000);
                              $imgRANDM8='peraup'.$apid.$imgRANDMR8;
                              $coverImgdir8 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir8)){
                mkdir($coverImgdir8,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS8=$imgRANDM8.'.'.$ext8;
              $target8 = "$coverImgdir8".$imgRANDFS8;
              move_uploaded_file($source8, $target8);
              $imagepath8 = $imgRANDFS8;
              $edurp8='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath8;
              $postgr8;
              $postgr8=$postgr8.','.$edurp8;
              }
              $postgr8=ltrim($postgr8,',').',';
                }
                else{
                    $postgr8=$docs8;
                }
                //report upload ed
                $pera=mysqli_query($con,"update permanent_address set avcndnme='$avcndnme',avpost='$avpost',avadd='$avadd',avlndk='$avlndk',avcndnme2='$avcndnme2',avpost2='$avpost2',avadd2='$avadd2',avlndk2='$avlndk2',
                remarks='$rmkpermanent_address',date='$dap',source='$srocpermanent_address',location='$lcntinpermanent_address',cmpl_date='$cmpdtepermanent_address',color_code='$clrcdepermanent_address',add_fe='$add_feepermanent_address',report='$postgr8' where appl_id='$apid'");
                if($pera){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'current-address'){
                //report upload st
                //selection of docs in applications
                   $sel2anx9=mysqli_query($con,"select * from current_address where appl_id='$apid'");
                   $selresanx29=mysqli_fetch_assoc($sel2anx9);
                   $docs9=$selresanx29['report'];
                 if($filcnttcurrent_address > 0){
                   $docsexp9=explode(',',$docs9);
                   $docscnt9=count($docsexp9)-1;
                   $dc9=0;
                   for($dc9=0; $dc9 < $docscnt9; $dc9++){
                   $docone9=$docsexp9[$dc9];
                   unlink($docone9);
                   }
                foreach($_FILES["filecurrent_address"]["tmp_name"] as $key9=>$tmp_name9) {
                              $imagename9 = $_FILES['filecurrent_address']['name'][$key9];
                              $source9 = $_FILES['filecurrent_address']['tmp_name'][$key9];
                              $ext9 = pathinfo($imagename9, PATHINFO_EXTENSION);
                              $imgRANDMR9=rand(99999,10000);
                              $imgRANDM9='curaup'.$apid.$imgRANDMR9;
                              $coverImgdir9 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir9)){
                mkdir($coverImgdir9,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS9=$imgRANDM9.'.'.$ext9;
              $target9 = "$coverImgdir9".$imgRANDFS9;
              move_uploaded_file($source9, $target9);
              $imagepath9 = $imgRANDFS9;
              $edurp9='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath9;
              $postgr9;
              $postgr9=$postgr9.','.$edurp9;
              }
              $postgr9=ltrim($postgr9,',').',';
                }
                else{
                    $postgr9=$docs9;
                }
                //report upload ed
                $cura=mysqli_query($con,"update current_address set avcndnmea='$avcndnmea',avposta='$avposta',avadda='$avadda',avlndka='$avlndka',avcndnmea2='$avcndnmea2',avposta2='$avposta2',avadda2='$avadda2',avlndka2='$avlndka2',
                remarks='$rmkcurrent_address',date='$dap',source='$sroccurrent_address',location='$lcntincurrent_address',cmpl_date='$cmpdtecurrent_address',color_code='$clrcdecurrent_address',add_fe='$add_feecurrent_address',report='$postgr9' where appl_id='$apid'");
                if($cura){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == '5-panel'){
                //report upload st
                //selection of docs in applications
                   $sel2anx10=mysqli_query($con,"select * from 5_panel where appl_id='$apid'");
                   $selresanx210=mysqli_fetch_assoc($sel2anx10);
                   $docs10=$selresanx210['report'];
                 if($filcntt5_panel > 0){
                   $docsexp10=explode(',',$docs10);
                   $docscnt10=count($docsexp10)-1;
                   $dc10=0;
                   for($dc10=0; $dc10 < $docscnt10; $dc10++){
                   $docone10=$docsexp10[$dc10];
                   unlink($docone10);
                   }
                foreach($_FILES["file5_panel"]["tmp_name"] as $key10=>$tmp_name10) {
                              $imagename10 = $_FILES['file5_panel']['name'][$key10];
                              $source10 = $_FILES['file5_panel']['tmp_name'][$key10];
                              $ext10 = pathinfo($imagename10, PATHINFO_EXTENSION);
                              $imgRANDMR10=rand(99999,10000);
                              $imgRANDM10='fipup'.$apid.$imgRANDMR10;
                              $coverImgdir10 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir10)){
                mkdir($coverImgdir10,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS10=$imgRANDM10.'.'.$ext10;
              $target10 = "$coverImgdir10".$imgRANDFS10;
              move_uploaded_file($source10, $target10);
              $imagepath10 = $imgRANDFS10;
              $edurp10='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath10;
              $postgr10;
              $postgr10=$postgr10.','.$edurp10;
              }
              $postgr10=ltrim($postgr10,',').',';
                }
                else{
                    $postgr10=$docs10;
                }
                //report upload ed
                $fpl=mysqli_query($con,"update 5_panel set nmcdi='$nmcdi',totst='$totst',dktpe='$dktpe',rsnftst='$rsnftst',tstres='$tstres',spcid='$spcid',cocaine='$cocaine',opiates='$opiates',
                propoxyphene='$propoxyphene',marijuana='$marijuana',amphetamines='$amphetamines',benzodiazepines='$benzodiazepines',nmcdi2='$nmcdi2',totst2='$totst2',dktpe2='$dktpe2',rsnftst2='$rsnftst2',
                tstres2='$tstres2',spcid2='$spcid2',methadone='$methadone',phencyclidine='$phencyclidine',methamphetamine='$methamphetamine',oxycodone='$oxycodone',barbiturates='$barbiturates',cannabinoids='$cannabinoids',remarks='$rmk5_panel',date='$dap',source='$sroc5_panel',location='$lcntin5_panel',cmpl_date='$cmpdte5_panel',color_code='$clrcde5_panel',add_fe='$add_fee5_panel',report='$postgr10' where appl_id='$apid'");
                if($fpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == '6-panel'){
                //report upload st
                //selection of docs in applications
                   $sel2anx11=mysqli_query($con,"select * from 6_panel where appl_id='$apid'");
                   $selresanx211=mysqli_fetch_assoc($sel2anx11);
                   $docs11=$selresanx211['report'];
                 if($filcntt6_panel > 0){
                   $docsexp11=explode(',',$docs11);
                   $docscnt11=count($docsexp11)-1;
                   $dc11=0;
                   for($dc11=0; $dc11 < $docscnt11; $dc11++){
                   $docone11=$docsexp11[$dc11];
                   unlink($docone11);
                   }
                foreach($_FILES["file6_panel"]["tmp_name"] as $key11=>$tmp_name11) {
                              $imagename11 = $_FILES['file6_panel']['name'][$key11];
                              $source11 = $_FILES['file6_panel']['tmp_name'][$key11];
                              $ext11 = pathinfo($imagename11, PATHINFO_EXTENSION);
                              $imgRANDMR11=rand(99999,10000);
                              $imgRANDM11='sipup'.$apid.$imgRANDMR11;
                              $coverImgdir11 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir11)){
                mkdir($coverImgdir11,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS11=$imgRANDM11.'.'.$ext11;
              $target11 = "$coverImgdir11".$imgRANDFS11;
              move_uploaded_file($source11, $target11);
              $imagepath11 = $imgRANDFS11;
              $edurp11='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath11;
              $postgr11;
              $postgr11=$postgr11.','.$edurp11;
              }
              $postgr11=ltrim($postgr11,',').',';
                }
                else{
                    $postgr11=$docs11;
                }
                //report upload ed
                $sipl=mysqli_query($con,"update 6_panel set nmcdisi='$nmcdisi',totstsi='$totstsi',dktpesi='$dktpesi',rsnftstsi='$rsnftstsi',tstressi='$tstressi',spcidsi='$spcidsi',cocainesi='$cocainesi',opiatessi='$opiatessi',
                propoxyphenesi='$propoxyphenesi',marijuanasi='$marijuanasi',amphetaminessi='$amphetaminessi',benzodiazepinessi='$benzodiazepinessi',nmcdisi2='$nmcdisi2',totstsi2='$totstsi2',dktpesi2='$dktpesi2',rsnftstsi2='$rsnftstsi2',
                tstressi2='$tstressi2',spcidsi2='$spcidsi2',methadonesi='$methadonesi',phencyclidinesi='$phencyclidinesi',methamphetaminesi='$methamphetaminesi',oxycodonesi='$oxycodonesi',barbituratessi='$barbituratessi',cannabinoidssi='$cannabinoidssi',remarks='$rmk6_panel',date='$dap',source='$sroc6_panel',location='$lcntin6_panel',cmpl_date='$cmpdte6_panel',color_code='$clrcde6_panel',add_fe='$add_fee6_panel',report='$postgr11' where appl_id='$apid'");
                if($sipl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == '10-panel'){
                //report upload st
                //selection of docs in applications
                   $sel2anx12=mysqli_query($con,"select * from 10_panel where appl_id='$apid'");
                   $selresanx212=mysqli_fetch_assoc($sel2anx12);
                   $docs12=$selresanx212['report'];
                 if($filcntt10_panel > 0){
                   $docsexp12=explode(',',$docs12);
                   $docscnt12=count($docsexp12)-1;
                   $dc12=0;
                   for($dc12=0; $dc12 < $docscnt12; $dc12++){
                   $docone12=$docsexp12[$dc12];
                   unlink($docone12);
                   }
                foreach($_FILES["file10_panel"]["tmp_name"] as $key12=>$tmp_name12) {
                              $imagename12 = $_FILES['file10_panel']['name'][$key12];
                              $source12 = $_FILES['file10_panel']['tmp_name'][$key12];
                              $ext12 = pathinfo($imagename12, PATHINFO_EXTENSION);
                              $imgRANDMR12=rand(99999,10000);
                              $imgRANDM12='tenpup'.$apid.$imgRANDMR12;
                              $coverImgdir12 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir12)){
                mkdir($coverImgdir12,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS12=$imgRANDM12.'.'.$ext12;
              $target12 = "$coverImgdir12".$imgRANDFS12;
              move_uploaded_file($source12, $target12);
              $imagepath12 = $imgRANDFS12;
              $edurp12='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath12;
              $postgr12;
              $postgr12=$postgr12.','.$edurp12;
              }
              $postgr12=ltrim($postgr12,',').',';
                }
                else{
                    $postgr12=$docs12;
                }
                //report upload ed
                $tenpl=mysqli_query($con,"update 10_panel set nmcdite='$nmcdite',totstte='$totstte',dktpete='$dktpete',rsnftstte='$rsnftstte',tstreste='$tstreste',spcidte='$spcidte',cocainete='$cocainete',opiateste='$opiateste',
                propoxyphenete='$propoxyphenete',marijuanate='$marijuanate',amphetamineste='$amphetamineste',benzodiazepineste='$benzodiazepineste',nmcdite2='$nmcdite2',totstte2='$totstte2',dktpete2='$dktpete2',rsnftstte2='$rsnftstte2',
                tstreste2='$tstreste2',spcidte2='$spcidte2',methadonete='$methadonete',phencyclidinete='$phencyclidinete',methamphetaminete='$methamphetaminete',oxycodonete='$oxycodonete',barbiturateste='$barbiturateste',cannabinoidste='$cannabinoidste',remarks='$rmk10_panel',date='$dap',source='$sroc10_panel',location='$lcntin10_panel',cmpl_date='$cmpdte10_panel',color_code='$clrcde10_panel',add_fe='$add_fee10_panel',report='$postgr12' where appl_id='$apid'");
                if($tenpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == '12-panel'){
                //report upload st
                //selection of docs in applications
                   $sel2anx13=mysqli_query($con,"select * from 12_panel where appl_id='$apid'");
                   $selresanx213=mysqli_fetch_assoc($sel2anx13);
                   $docs13=$selresanx213['report'];
                 if($filcntt12_panel > 0){
                   $docsexp13=explode(',',$docs13);
                   $docscnt13=count($docsexp13)-1;
                   $dc13=0;
                   for($dc13=0; $dc13 < $docscnt13; $dc13++){
                   $docone13=$docsexp13[$dc13];
                   unlink($docone13);
                   }
                foreach($_FILES["file12_panel"]["tmp_name"] as $key13=>$tmp_name13) {
                              $imagename13 = $_FILES['file12_panel']['name'][$key13];
                              $source13 = $_FILES['file12_panel']['tmp_name'][$key13];
                              $ext13 = pathinfo($imagename13, PATHINFO_EXTENSION);
                              $imgRANDMR13=rand(99999,10000);
                              $imgRANDM13='twlpup'.$apid.$imgRANDMR13;
                              $coverImgdir13 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir13)){
                mkdir($coverImgdir13,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS13=$imgRANDM13.'.'.$ext13;
              $target13 = "$coverImgdir13".$imgRANDFS13;
              move_uploaded_file($source13, $target13);
              $imagepath13 = $imgRANDFS13;
              $edurp13='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath13;
              $postgr13;
              $postgr13=$postgr13.','.$edurp13;
              }
              $postgr13=ltrim($postgr13,',').',';
                }
                else{
                    $postgr13=$docs13;
                }
                //report upload ed
                $twlpl=mysqli_query($con,"update 12_panel set nmcditw='$nmcditw',totsttw='$totsttw',dktpetw='$dktpetw',rsnftsttw='$rsnftsttw',tstrestw='$tstrestw',spcidtw='$spcidtw',cocainetw='$cocainetw',opiatestw='$opiatestw',
                propoxyphenetw='$propoxyphenetw',marijuanatw='$marijuanatw',amphetaminestw='$amphetaminestw',benzodiazepinestw='$benzodiazepinestw',nmcditw2='$nmcditw2',totsttw2='$totsttw2',dktpetw2='$dktpetw2',rsnftsttw2='$rsnftsttw2',
                tstrestw2='$tstrestw2',spcidtw2='$spcidtw2',methadonetw='$methadonetw',phencyclidinetw='$phencyclidinetw',methamphetaminetw='$methamphetaminetw',oxycodonetw='$oxycodonetw',barbituratestw='$barbituratestw',cannabinoidstw='$cannabinoidstw',remarks='$rmk12_panel',date='$dap',source='$sroc12_panel',location='$lcntin12_panel',cmpl_date='$cmpdte12_panel',color_code='$clrcde12_panel',add_fe='$add_fee12_panel',report='$postgr13' where appl_id='$apid'");
                if($twlpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-1'){
                //report upload st
                //selection of docs in applications
                   $sel2anx14=mysqli_query($con,"select * from emp_hr_1 where appl_id='$apid'");
                   $selresanx214=mysqli_fetch_assoc($sel2anx14);
                   $docs14=$selresanx214['report'];
                 if($filcnttemp_hr_1 > 0){
                   $docsexp14=explode(',',$docs14);
                   $docscnt14=count($docsexp14)-1;
                   $dc14=0;
                   for($dc14=0; $dc14 < $docscnt14; $dc14++){
                   $docone14=$docsexp14[$dc14];
                   unlink($docone14);
                   }
                foreach($_FILES["fileemp_hr_1"]["tmp_name"] as $key14=>$tmp_name14) {
                              $imagename14 = $_FILES['fileemp_hr_1']['name'][$key14];
                              $source14 = $_FILES['fileemp_hr_1']['tmp_name'][$key14];
                              $ext14 = pathinfo($imagename14, PATHINFO_EXTENSION);
                              $imgRANDMR14=rand(99999,10000);
                              $imgRANDM14='emp1up'.$apid.$imgRANDMR14;
                              $coverImgdir14 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir14)){
                mkdir($coverImgdir14,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS14=$imgRANDM14.'.'.$ext14;
              $target14 = "$coverImgdir14".$imgRANDFS14;
              move_uploaded_file($source14, $target14);
              $imagepath14 = $imgRANDFS14;
              $edurp14='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath14;
              $postgr14;
              $postgr14=$postgr14.','.$edurp14;
              }
              $postgr14=ltrim($postgr14,',').',';
                }
                else{
                    $postgr14=$docs14;
                }
                //report upload ed
                $emp1=mysqli_query($con,"update emp_hr_1 set emncdnme='$emncdnme',emcde='$emcde',emcode='$emcode',emfrm='$emfrm',emto='$emto',emdesgn='$emdesgn',emlstdr='$emlstdr',emrolv='$emrolv',
                emrhre='$emrhre',emncdnme2='$emncdnme2',emcde2='$emcde2',emcode2='$emcode2',emfrm2='$emfrm2',emto2='$emto2',emdesgn2='$emdesgn2',emlstdr2='$emlstdr2',emrolv2='$emrolv2',emrhre2='$emrhre2',remarks='$rmkemp_hr_1',date='$dap',source='$srocemp_hr_1',location='$lcntinemp_hr_1',cmpl_date='$cmpdteemp_hr_1',color_code='$clrcdeemp_hr_1',add_fe='$add_feeemp_hr_1',report='$postgr14' where appl_id='$apid'");
                if($emp1){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-2'){
                //report upload st
                //selection of docs in applications
                   $sel2anx15=mysqli_query($con,"select * from emp_hr_2 where appl_id='$apid'");
                   $selresanx215=mysqli_fetch_assoc($sel2anx15);
                   $docs15=$selresanx215['report'];
                 if($filcnttemp_hr_2 > 0){
                   $docsexp15=explode(',',$docs15);
                   $docscnt15=count($docsexp15)-1;
                   $dc15=0;
                   for($dc15=0; $dc15 < $docscnt15; $dc15++){
                   $docone15=$docsexp15[$dc15];
                   unlink($docone15);
                   }
                foreach($_FILES["fileemp_hr_2"]["tmp_name"] as $key15=>$tmp_name15) {
                              $imagename15 = $_FILES['fileemp_hr_2']['name'][$key15];
                              $source15 = $_FILES['fileemp_hr_2']['tmp_name'][$key15];
                              $ext15 = pathinfo($imagename15, PATHINFO_EXTENSION);
                              $imgRANDMR15=rand(99999,10000);
                              $imgRANDM15='emp2up'.$apid.$imgRANDMR15;
                              $coverImgdir15 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir15)){
                mkdir($coverImgdir15,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS15=$imgRANDM15.'.'.$ext15;
              $target15 = "$coverImgdir15".$imgRANDFS15;
              move_uploaded_file($source15, $target15);
              $imagepath15 = $imgRANDFS15;
              $edurp15='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath15;
              $postgr15;
              $postgr15=$postgr15.','.$edurp15;
              }
              $postgr15=ltrim($postgr15,',').',';
                }
                else{
                    $postgr15=$docs15;
                }
                //report upload ed
                $emp2=mysqli_query($con,"update emp_hr_2 set emncdnmeto='$emncdnmeto',emcdeto='$emcdeto',emcodeto='$emcodeto',emfrmto='$emfrmto',emtoto='$emtoto',emdesgnto='$emdesgnto',emlstdrto='$emlstdrto',emrolvto='$emrolvto',
                emrhreto='$emrhreto',emncdnmeto2='$emncdnmeto2',emcdeto2='$emcdeto2',emcodeto2='$emcodeto2',emfrmto2='$emfrmto2',emtoto2='$emtoto2',emdesgnto2='$emdesgnto2',emlstdrto2='$emlstdrto2',emrolvto2='$emrolvto2',emrhreto2='$emrhreto2',remarks='$rmkemp_hr_2',date='$dap',source='$srocemp_hr_2',location='$lcntinemp_hr_2',cmpl_date='$cmpdteemp_hr_2',color_code='$clrcdeemp_hr_2',add_fe='$add_feeemp_hr_2',report='$postgr15' where appl_id='$apid'");
                if($emp2){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-3'){
                //report upload st
                //selection of docs in applications
                   $sel2anx16=mysqli_query($con,"select * from emp_hr_3 where appl_id='$apid'");
                   $selresanx216=mysqli_fetch_assoc($sel2anx16);
                   $docs16=$selresanx216['report'];
                 if($filcnttemp_hr_3 > 0){
                   $docsexp16=explode(',',$docs16);
                   $docscnt16=count($docsexp16)-1;
                   $dc16=0;
                   for($dc16=0; $dc16 < $docscnt16; $dc16++){
                   $docone16=$docsexp16[$dc16];
                   unlink($docone16);
                   }
                foreach($_FILES["fileemp_hr_3"]["tmp_name"] as $key16=>$tmp_name16) {
                              $imagename16 = $_FILES['fileemp_hr_3']['name'][$key16];
                              $source16 = $_FILES['fileemp_hr_3']['tmp_name'][$key16];
                              $ext16 = pathinfo($imagename16, PATHINFO_EXTENSION);
                              $imgRANDMR16=rand(99999,10000);
                              $imgRANDM16='emp3up'.$apid.$imgRANDMR16;
                              $coverImgdir16 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir16)){
                mkdir($coverImgdir16,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS16=$imgRANDM16.'.'.$ext16;
              $target16 = "$coverImgdir16".$imgRANDFS16;
              move_uploaded_file($source16, $target16);
              $imagepath16 = $imgRANDFS16;
              $edurp16='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath16;
              $postgr16;
              $postgr16=$postgr16.','.$edurp16;
              }
              $postgr16=ltrim($postgr16,',').',';
                }
                else{
                    $postgr16=$docs16;
                }
                //report upload ed
                $emp3=mysqli_query($con,"update emp_hr_3 set emncdnmeth='$emncdnmeth',emcdeth='$emcdeth',emcodeth='$emcodeth',emfrmth='$emfrmth',emtoth='$emtoth',emdesgnth='$emdesgnth',emlstdrth='$emlstdrth',emrolvth='$emrolvth',
                emrhreth='$emrhreth',emncdnmeth2='$emncdnmeth2',emcdeth2='$emcdeth2',emcodeth2='$emcodeth2',emfrmth2='$emfrmth2',emtoth2='$emtoth2',emdesgnth2='$emdesgnth2',emlstdrth2='$emlstdrth2',emrolvth2='$emrolvth2',emrhreth2='$emrhreth2',remarks='$rmkemp_hr_3',date='$dap',source='$srocemp_hr_3',location='$lcntinemp_hr_3',cmpl_date='$cmpdteemp_hr_3',color_code='$clrcdeemp_hr_3',add_fe='$add_feeemp_hr_3',report='$postgr16' where appl_id='$apid'");
                if($emp3){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-4'){
                //report upload st
                //selection of docs in applications
                   $sel2anx17=mysqli_query($con,"select * from emp_hr_4 where appl_id='$apid'");
                   $selresanx217=mysqli_fetch_assoc($sel2anx17);
                   $docs17=$selresanx217['report'];
                 if($filcnttemp_hr_4 > 0){
                   $docsexp17=explode(',',$docs17);
                   $docscnt17=count($docsexp17)-1;
                   $dc17=0;
                   for($dc17=0; $dc17 < $docscnt17; $dc17++){
                   $docone17=$docsexp17[$dc17];
                   unlink($docone17);
                   }
                foreach($_FILES["fileemp_hr_4"]["tmp_name"] as $key17=>$tmp_name17) {
                              $imagename17 = $_FILES['fileemp_hr_4']['name'][$key17];
                              $source17 = $_FILES['fileemp_hr_4']['tmp_name'][$key17];
                              $ext17 = pathinfo($imagename17, PATHINFO_EXTENSION);
                              $imgRANDMR17=rand(99999,10000);
                              $imgRANDM17='emp4up'.$apid.$imgRANDMR17;
                              $coverImgdir17 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir17)){
                mkdir($coverImgdir17,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS17=$imgRANDM17.'.'.$ext17;
              $target17 = "$coverImgdir17".$imgRANDFS17;
              move_uploaded_file($source17, $target17);
              $imagepath17 = $imgRANDFS17;
              $edurp17='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath17;
              $postgr17;
              $postgr17=$postgr17.','.$edurp17;
              }
              $postgr17=ltrim($postgr17,',').',';
                }
                else{
                    $postgr17=$docs17;
                }
                //report upload ed
                $emp4=mysqli_query($con,"update emp_hr_4 set emncdnmefr='$emncdnmefr',emcdefr='$emcdefr',emcodefr='$emcodefr',emfrmfr='$emfrmfr',emtofr='$emtofr',emdesgnfr='$emdesgnfr',emlstdrfr='$emlstdrfr',emrolvfr='$emrolvfr',
                emrhrefr='$emrhrefr',emncdnmefr2='$emncdnmefr2',emcdefr2='$emcdefr2',emcodefr2='$emcodefr2',emfrmfr2='$emfrmfr2',emtofr2='$emtofr2',emdesgnfr2='$emdesgnfr2',emlstdrfr2='$emlstdrfr2',emrolvfr2='$emrolvfr2',emrhrefr2='$emrhrefr2',remarks='$rmkemp_hr_4',date='$dap',source='$srocemp_hr_4',location='$lcntinemp_hr_4',cmpl_date='$cmpdteemp_hr_4',color_code='$clrcdeemp_hr_4',add_fe='$add_feeemp_hr_4',report='$postgr17' where appl_id='$apid'");
                if($emp4){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-5'){
                //report upload st
                //selection of docs in applications
                   $sel2anx18=mysqli_query($con,"select * from emp_hr_5 where appl_id='$apid'");
                   $selresanx218=mysqli_fetch_assoc($sel2anx18);
                   $docs18=$selresanx218['report'];
                 if($filcnttemp_hr_5 > 0){
                   $docsexp18=explode(',',$docs18);
                   $docscnt18=count($docsexp18)-1;
                   $dc18=0;
                   for($dc18=0; $dc18 < $docscnt18; $dc18++){
                   $docone18=$docsexp18[$dc18];
                   unlink($docone18);
                   }
                foreach($_FILES["fileemp_hr_5"]["tmp_name"] as $key18=>$tmp_name18) {
                              $imagename18 = $_FILES['fileemp_hr_5']['name'][$key18];
                              $source18 = $_FILES['fileemp_hr_5']['tmp_name'][$key18];
                              $ext18 = pathinfo($imagename18, PATHINFO_EXTENSION);
                              $imgRANDMR18=rand(99999,10000);
                              $imgRANDM18='emp5up'.$apid.$imgRANDMR18;
                              $coverImgdir18 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir18)){
                mkdir($coverImgdir18,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS18=$imgRANDM18.'.'.$ext18;
              $target18 = "$coverImgdir18".$imgRANDFS18;
              move_uploaded_file($source18, $target18);
              $imagepath18 = $imgRANDFS18;
              $edurp18='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath18;
              $postgr18;
              $postgr18=$postgr18.','.$edurp18;
              }
              $postgr18=ltrim($postgr18,',').',';
                }
                else{
                    $postgr18=$docs18;
                }
                //report upload ed
                $emp5=mysqli_query($con,"update emp_hr_5 set emncdnmefv='$emncdnmefv',emcdefv='$emcdefv',emcodefv='$emcodefv',emfrmfv='$emfrmfv',emtofv='$emtofv',emdesgnfv='$emdesgnfv',emlstdrfv='$emlstdrfv',emrolvfv='$emrolvfv',
                emrhrefv='$emrhrefv',emncdnmefv2='$emncdnmefv2',emcdefv2='$emcdefv2',emcodefv2='$emcodefv2',emfrmfv2='$emfrmfv2',emtofv2='$emtofv2',emdesgnfv2='$emdesgnfv2',emlstdrfv2='$emlstdrfv2',emrolvfv2='$emrolvfv2',emrhrefv2='$emrhrefv2',remarks='$rmkemp_hr_5',date='$dap',source='$srocemp_hr_5',location='$lcntinemp_hr_5',cmpl_date='$cmpdteemp_hr_5',color_code='$clrcdeemp_hr_5',add_fe='$add_feeemp_hr_5',report='$postgr18' where appl_id='$apid'");
                if($emp5){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-6'){
                //report upload st
                //selection of docs in applications
                   $sel2anx19=mysqli_query($con,"select * from emp_hr_6 where appl_id='$apid'");
                   $selresanx219=mysqli_fetch_assoc($sel2anx19);
                   $docs19=$selresanx219['report'];
                 if($filcnttemp_hr_6 > 0){
                   $docsexp19=explode(',',$docs19);
                   $docscnt19=count($docsexp19)-1;
                   $dc19=0;
                   for($dc19=0; $dc19 < $docscnt19; $dc19++){
                   $docone19=$docsexp19[$dc19];
                   unlink($docone19);
                   }
                foreach($_FILES["fileemp_hr_6"]["tmp_name"] as $key19=>$tmp_name19) {
                              $imagename19 = $_FILES['fileemp_hr_6']['name'][$key19];
                              $source19 = $_FILES['fileemp_hr_6']['tmp_name'][$key19];
                              $ext19 = pathinfo($imagename19, PATHINFO_EXTENSION);
                              $imgRANDMR19=rand(99999,10000);
                              $imgRANDM19='emp6up'.$apid.$imgRANDMR19;
                              $coverImgdir19 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir19)){
                mkdir($coverImgdir19,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS19=$imgRANDM19.'.'.$ext19;
              $target19 = "$coverImgdir19".$imgRANDFS19;
              move_uploaded_file($source19, $target19);
              $imagepath19 = $imgRANDFS19;
              $edurp19='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath19;
              $postgr19;
              $postgr19=$postgr19.','.$edurp19;
              }
              $postgr19=ltrim($postgr19,',').',';
                }
                else{
                    $postgr19=$docs19;
                }
                //report upload ed
                $emp6=mysqli_query($con,"update emp_hr_6 set emncdnmesx='$emncdnmesx',emcdesx='$emcdesx',emcodesx='$emcodesx',emfrmsx='$emfrmsx',emtosx='$emtosx',emdesgnsx='$emdesgnsx',emlstdrsx='$emlstdrsx',emrolvsx='$emrolvsx',
                emrhresx='$emrhresx',emncdnmesx2='$emncdnmesx2',emcdesx2='$emcdesx2',emcodesx2='$emcodesx2',emfrmsx2='$emfrmsx2',emtosx2='$emtosx2',emdesgnsx2='$emdesgnsx2',emlstdrsx2='$emlstdrsx2',emrolvsx2='$emrolvsx2',emrhresx2='$emrhresx2',remarks='$rmkemp_hr_6',date='$dap',source='$srocemp_hr_6',location='$lcntinemp_hr_6',cmpl_date='$cmpdteemp_hr_6',color_code='$clrcdeemp_hr_6',add_fe='$add_feeemp_hr_6',report='$postgr19' where appl_id='$apid'");
                if($emp6){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-7'){
                //report upload st
                //selection of docs in applications
                   $sel2anx20=mysqli_query($con,"select * from emp_hr_7 where appl_id='$apid'");
                   $selresanx220=mysqli_fetch_assoc($sel2anx20);
                   $docs20=$selresanx220['report'];
                 if($filcnttemp_hr_7 > 0){
                   $docsexp20=explode(',',$docs20);
                   $docscnt20=count($docsexp20)-1;
                   $dc20=0;
                   for($dc20=0; $dc20 < $docscnt20; $dc20++){
                   $docone20=$docsexp20[$dc20];
                   unlink($docone20);
                   }
                foreach($_FILES["fileemp_hr_7"]["tmp_name"] as $key20=>$tmp_name20) {
                              $imagename20 = $_FILES['fileemp_hr_7']['name'][$key20];
                              $source20 = $_FILES['fileemp_hr_7']['tmp_name'][$key20];
                              $ext20 = pathinfo($imagename20, PATHINFO_EXTENSION);
                              $imgRANDMR20=rand(99999,10000);
                              $imgRANDM20='emp7up'.$apid.$imgRANDMR20;
                              $coverImgdir20 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir20)){
                mkdir($coverImgdir20,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS20=$imgRANDM20.'.'.$ext20;
              $target20 = "$coverImgdir20".$imgRANDFS20;
              move_uploaded_file($source20, $target20);
              $imagepath20 = $imgRANDFS20;
              $edurp20='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath20;
              $postgr20;
              $postgr20=$postgr20.','.$edurp20;
              }
              $postgr20=ltrim($postgr20,',').',';
                }
                else{
                    $postgr20=$docs20;
                }
                //report upload ed
                $emp7=mysqli_query($con,"update emp_hr_7 set emncdnmesn='$emncdnmesn',emcdesn='$emcdesn',emcodesn='$emcodesn',emfrmsn='$emfrmsn',emtosn='$emtosn',emdesgnsn='$emdesgnsn',emlstdrsn='$emlstdrsn',emrolvsn='$emrolvsn',
                emrhresn='$emrhresn',emncdnmesn2='$emncdnmesn2',emcdesn2='$emcdesn2',emcodesn2='$emcodesn2',emfrmsn2='$emfrmsn2',emtosn2='$emtosn2',emdesgnsn2='$emdesgnsn2',emlstdrsn2='$emlstdrsn2',emrolvsn2='$emrolvsn2',emrhresn2='$emrhresn2',remarks='$rmkemp_hr_7',date='$dap',source='$srocemp_hr_7',location='$lcntinemp_hr_7',cmpl_date='$cmpdteemp_hr_7',color_code='$clrcdeemp_hr_7',add_fe='$add_feeemp_hr_7',report='$postgr20' where appl_id='$apid'");
                if($emp7){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'emp-hr-8'){
                //report upload st
                //selection of docs in applications
                   $sel2anx21=mysqli_query($con,"select * from emp_hr_8 where appl_id='$apid'");
                   $selresanx221=mysqli_fetch_assoc($sel2anx21);
                   $docs21=$selresanx221['report'];
                 if($filcnttemp_hr_8 > 0){
                   $docsexp21=explode(',',$docs21);
                   $docscnt21=count($docsexp21)-1;
                   $dc21=0;
                   for($dc21=0; $dc21 < $docscnt21; $dc21++){
                   $docone21=$docsexp21[$dc21];
                   unlink($docone21);
                   }
                foreach($_FILES["fileemp_hr_8"]["tmp_name"] as $key21=>$tmp_name21) {
                              $imagename21 = $_FILES['fileemp_hr_8']['name'][$key21];
                              $source21 = $_FILES['fileemp_hr_8']['tmp_name'][$key21];
                              $ext21 = pathinfo($imagename21, PATHINFO_EXTENSION);
                              $imgRANDMR21=rand(99999,10000);
                              $imgRANDM21='emp8up'.$apid.$imgRANDMR21;
                              $coverImgdir21 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir21)){
                mkdir($coverImgdir21,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS21=$imgRANDM21.'.'.$ext21;
              $target21 = "$coverImgdir21".$imgRANDFS21;
              move_uploaded_file($source21, $target21);
              $imagepath21 = $imgRANDFS21;
              $edurp21='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath21;
              $postgr21;
              $postgr21=$postgr21.','.$edurp21;
              }
              $postgr21=ltrim($postgr21,',').',';
                }
                else{
                    $postgr21=$docs21;
                }
                //report upload ed
                $emp8=mysqli_query($con,"update emp_hr_8 set emncdnmeet='$emncdnmeet',emcdeet='$emcdeet',emcodeet='$emcodeet',emfrmet='$emfrmet',emtoet='$emtoet',emdesgnet='$emdesgnet',emlstdret='$emlstdret',emrolvet='$emrolvet',
                emrhreet='$emrhreet',emncdnmeet2='$emncdnmeet2',emcdeet2='$emcdeet2',emcodeet2='$emcodeet2',emfrmet2='$emfrmet2',emtoet2='$emtoet2',emdesgnet2='$emdesgnet2',emlstdret2='$emlstdret2',emrolvet2='$emrolvet2',emrhreet2='$emrhreet2',remarks='$rmkemp_hr_8',date='$dap',source='$srocemp_hr_8',location='$lcntinemp_hr_8',cmpl_date='$cmpdteemp_hr_8',color_code='$clrcdeemp_hr_8',add_fe='$add_feeemp_hr_8',report='$postgr21' where appl_id='$apid'");
                if($emp8){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'criminal-database'){
                //report upload st
                //selection of docs in applications
                   $sel2anx22=mysqli_query($con,"select * from criminal_database where appl_id='$apid'");
                   $selresanx222=mysqli_fetch_assoc($sel2anx22);
                   $docs21=$selresanx222['report'];
                 if($filcnttcriminal_database > 0){
                   $docsexp22=explode(',',$docs22);
                   $docscnt22=count($docsexp22)-1;
                   $dc22=0;
                   for($dc22=0; $dc22 < $docscnt22; $dc22++){
                   $docone22=$docsexp22[$dc22];
                   unlink($docone22);
                   }
                foreach($_FILES["filecriminal_database"]["tmp_name"] as $key22=>$tmp_name22) {
                              $imagename22 = $_FILES['filecriminal_database']['name'][$key22];
                              $source22 = $_FILES['filecriminal_database']['tmp_name'][$key22];
                              $ext22 = pathinfo($imagename22, PATHINFO_EXTENSION);
                              $imgRANDMR22=rand(99999,10000);
                              $imgRANDM22='crdatup'.$apid.$imgRANDMR22;
                              $coverImgdir22 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir22)){
                mkdir($coverImgdir22,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS22=$imgRANDM22.'.'.$ext22;
              $target22 = "$coverImgdir22".$imgRANDFS22;
              move_uploaded_file($source22, $target22);
              $imagepath22 = $imgRANDFS22;
              $edurp22='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath22;
              $postgr22;
              $postgr22=$postgr22.','.$edurp22;
              }
              $postgr22=ltrim($postgr22,',').',';
                }
                else{
                    $postgr22=$docs22;
                }
                //report upload ed
                $crdat=mysqli_query($con,"update criminal_database set crmlnmcd='$crmlnmcd',crmlnmcd2='$crmlnmcd2',remarks='$rmkcriminal_database',date='$dap',source='$sroccriminal_database',location='$lcntincriminal_database',cmpl_date='$cmpdtecriminal_database',color_code='$clrcdecriminal_database',add_fe='$add_feecriminal_database',report='$postgr22' where appl_id='$apid'");
                if($crdat){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'criminal-court-record'){
                //report upload st
                //selection of docs in applications
                   $sel2anx23=mysqli_query($con,"select * from criminal_court_record where appl_id='$apid'");
                   $selresanx223=mysqli_fetch_assoc($sel2anx23);
                   $docs23=$selresanx223['report'];
                 if($filcnttcriminal_court_record > 0){
                   $docsexp23=explode(',',$docs23);
                   $docscnt23=count($docsexp23)-1;
                   $dc23=0;
                   for($dc23=0; $dc23 < $docscnt23; $dc23++){
                   $docone23=$docsexp23[$dc23];
                   unlink($docone23);
                   }
                foreach($_FILES["filecriminal_court_record"]["tmp_name"] as $key23=>$tmp_name23) {
                              $imagename23 = $_FILES['filecriminal_court_record']['name'][$key23];
                              $source23 = $_FILES['filecriminal_court_record']['tmp_name'][$key23];
                              $ext23 = pathinfo($imagename23, PATHINFO_EXTENSION);
                              $imgRANDMR23=rand(99999,10000);
                              $imgRANDM23='crcrtup'.$apid.$imgRANDMR23;
                              $coverImgdir23 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir23)){
                mkdir($coverImgdir23,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS23=$imgRANDM23.'.'.$ext23;
              $target23 = "$coverImgdir23".$imgRANDFS23;
              move_uploaded_file($source23, $target23);
              $imagepath23 = $imgRANDFS23;
              $edurp23='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath23;
              $postgr23;
              $postgr23=$postgr23.','.$edurp23;
              }
              $postgr23=ltrim($postgr23,',').',';
                }
                else{
                    $postgr23=$docs23;
                }
                //report upload ed
                $crcrt=mysqli_query($con,"update criminal_court_record set crtrefid='$crtrefid',crtcdnme='$crtcdnme',crtdob='$crtdob',crtftnme='$crtftnme',crtaddr='$crtaddr',crtrefid2='$crtrefid2',crtcdnme2='$crtcdnme2',crtdob2='$crtdob2',crtftnme2='$crtftnme2',crtaddr2='$crtaddr2',remarks='$rmkcriminal_court_record',date='$dap',source='$sroccriminal_court_record',location='$lcntincriminal_court_record',cmpl_date='$cmpdtecriminal_court_record',color_code='$clrcdecriminal_court_record',add_fe='$add_feecriminal_court_record',report='$postgr23' where appl_id='$apid'");
                if($crcrt){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'criminal-police-record'){
                //report upload st
                //selection of docs in applications
                   $sel2anx24=mysqli_query($con,"select * from criminal_police_record where appl_id='$apid'");
                   $selresanx224=mysqli_fetch_assoc($sel2anx24);
                   $docs24=$selresanx224['report'];
                 if($filcnttcriminal_police_record > 0){
                   $docsexp24=explode(',',$docs24);
                   $docscnt24=count($docsexp24)-1;
                   $dc24=0;
                   for($dc24=0; $dc24 < $docscnt24; $dc24++){
                   $docone24=$docsexp24[$dc24];
                   unlink($docone24);
                   }
                foreach($_FILES["filecriminal_police_record"]["tmp_name"] as $key24=>$tmp_name24) {
                              $imagename24 = $_FILES['filecriminal_police_record']['name'][$key24];
                              $source24 = $_FILES['filecriminal_police_record']['tmp_name'][$key24];
                              $ext24 = pathinfo($imagename24, PATHINFO_EXTENSION);
                              $imgRANDMR24=rand(99999,10000);
                              $imgRANDM24='crpolup'.$apid.$imgRANDMR24;
                              $coverImgdir24 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir24)){
                mkdir($coverImgdir24,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS24=$imgRANDM24.'.'.$ext24;
              $target24 = "$coverImgdir24".$imgRANDFS24;
              move_uploaded_file($source24, $target24);
              $imagepath24 = $imgRANDFS24;
              $edurp24='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath24;
              $postgr24;
              $postgr24=$postgr24.','.$edurp24;
              }
              $postgr24=ltrim($postgr24,',').',';
                }
                else{
                    $postgr24=$docs24;
                }
                //report upload ed
                $crpol=mysqli_query($con,"update criminal_police_record set plrefno='$plrefno',plcandnme='$plcandnme',pldob='$pldob',plfnme='$plfnme',paddr1='$paddr1',plrefno2='$plrefno2',plcandnme2='$plcandnme2',pldob2='$pldob2',plfnme2='$plfnme2',paddr12='$paddr12',remarks='$rmkcriminal_police_record',date='$dap',source='$sroccriminal_police_record',location='$lcntincriminal_police_record',cmpl_date='$cmpdtecriminal_police_record',color_code='$clrcdecriminal_police_record',add_fe='$add_feecriminal_police_record',report='$postgr24' where appl_id='$apid'");
                if($crpol){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'credit-verification'){
                //report upload st
                //selection of docs in applications
                   $sel2anx25=mysqli_query($con,"select * from credit_verification where appl_id='$apid'");
                   $selresanx225=mysqli_fetch_assoc($sel2anx25);
                   $docs25=$selresanx225['report'];
                 if($filcnttcredit_verification > 0){
                   $docsexp25=explode(',',$docs25);
                   $docscnt25=count($docsexp25)-1;
                   $dc25=0;
                   for($dc25=0; $dc25 < $docscnt25; $dc25++){
                   $docone25=$docsexp25[$dc25];
                   unlink($docone25);
                   }
                foreach($_FILES["filecredit_verification"]["tmp_name"] as $key25=>$tmp_name25) {
                              $imagename25 = $_FILES['filecredit_verification']['name'][$key25];
                              $source25 = $_FILES['filecredit_verification']['tmp_name'][$key25];
                              $ext25 = pathinfo($imagename25, PATHINFO_EXTENSION);
                              $imgRANDMR25=rand(99999,10000);
                              $imgRANDM25='crdvup'.$apid.$imgRANDMR25;
                              $coverImgdir25 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir25)){
                mkdir($coverImgdir25,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS25=$imgRANDM25.'.'.$ext25;
              $target25 = "$coverImgdir25".$imgRANDFS25;
              move_uploaded_file($source25, $target25);
              $imagepath25 = $imgRANDFS25;
              $edurp25='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath25;
              $postgr25;
              $postgr25=$postgr25.','.$edurp25;
              }
              $postgr25=ltrim($postgr25,',').',';
                }
                else{
                    $postgr25=$docs25;
                }
                //report upload ed
                $crdvr=mysqli_query($con,"update credit_verification set cbnmcdnme='$cbnmcdnme',cbpan='$cbpan',cbtransn='$cbtransn',cbsfatrs='$cbsfatrs',cbpersln='$cbpersln',cbstas='$cbstas',cbvery='$cbvery',cbnmcdnme2='$cbnmcdnme2',cbpan2='$cbpan2',cbtransn2='$cbtransn2',cbsfatrs2='$cbsfatrs2',cbpersln2='$cbpersln2',cbstas2='$cbstas2',cbvery2='$cbvery2',remarks='$rmkcredit_verification',date='$dap',source='$sroccredit_verification',location='$lcntincredit_verification',cmpl_date='$cmpdtecredit_verification',color_code='$clrcdecredit_verification',add_fe='$add_feecredit_verification',report='$postgr25' where appl_id='$apid'");
                if($crdvr){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'national-id-check'){
                //report upload st
                //selection of docs in applications
                   $sel2anx26=mysqli_query($con,"select * from national_id_check where appl_id='$apid'");
                   $selresanx226=mysqli_fetch_assoc($sel2anx26);
                   $docs26=$selresanx226['report'];
                 if($filcnttnational_id_check > 0){
                   $docsexp26=explode(',',$docs26);
                   $docscnt26=count($docsexp26)-1;
                   $dc26=0;
                   for($dc26=0; $dc26 < $docscnt26; $dc26++){
                   $docone26=$docsexp26[$dc26];
                   unlink($docone26);
                   }
                foreach($_FILES["filenational_id_check"]["tmp_name"] as $key26=>$tmp_name26) {
                              $imagename26 = $_FILES['filenational_id_check']['name'][$key26];
                              $source26 = $_FILES['filenational_id_check']['tmp_name'][$key26];
                              $ext26 = pathinfo($imagename26, PATHINFO_EXTENSION);
                              $imgRANDMR26=rand(99999,10000);
                              $imgRANDM26='naidup'.$apid.$imgRANDMR26;
                              $coverImgdir26 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir26)){
                mkdir($coverImgdir26,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS26=$imgRANDM26.'.'.$ext26;
              $target26 = "$coverImgdir26".$imgRANDFS26;
              move_uploaded_file($source26, $target26);
              $imagepath26 = $imgRANDFS26;
              $edurp26='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath26;
              $postgr26;
              $postgr26=$postgr26.','.$edurp26;
              }
              $postgr26=ltrim($postgr26,',').',';
                }
                else{
                    $postgr26=$docs26;
                }
                //report upload ed
                $naid=mysqli_query($con,"update national_id_check set nttyid='$nttyid',ntidcrd='$ntidcrd',ntdovery='$ntdovery',ntvrresul='$ntvrresul',ntverby='$ntverby',nttyid2='$nttyid2',ntidcrd2='$ntidcrd2',ntdovery2='$ntdovery2',ntvrresul2='$ntvrresul2',ntverby2='$ntverby2',remarks='$rmknational_id_check',date='$dap',source='$srocnational_id_check',location='$lcntinnational_id_check',cmpl_date='$cmpdtenational_id_check',color_code='$clrcdenational_id_check',add_fe='$add_feenational_id_check',report='$postgr26' where appl_id='$apid'");
                if($naid){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            elseif($sece_nme == 'company-site-visit'){
                //report upload st
                //selection of docs in applications
                   $sel2anx27=mysqli_query($con,"select * from company_site_visit where appl_id='$apid'");
                   $selresanx227=mysqli_fetch_assoc($sel2anx27);
                   $docs27=$selresanx227['report'];
                 if($filcnttcompany_site_visit > 0){
                   $docsexp27=explode(',',$docs27);
                   $docscnt27=count($docsexp27)-1;
                   $dc27=0;
                   for($dc27=0; $dc27 < $docscnt27; $dc27++){
                   $docone27=$docsexp27[$dc27];
                   unlink($docone27);
                   }
                foreach($_FILES["filecompany_site_visit"]["tmp_name"] as $key27=>$tmp_name27) {
                              $imagename27 = $_FILES['filecompany_site_visit']['name'][$key27];
                              $source27 = $_FILES['filecompany_site_visit']['tmp_name'][$key27];
                              $ext27 = pathinfo($imagename27, PATHINFO_EXTENSION);
                              $imgRANDMR27=rand(99999,10000);
                              $imgRANDM27='csvrup'.$apid.$imgRANDMR27;
                              $coverImgdir27 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir27)){
                mkdir($coverImgdir27,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS27=$imgRANDM27.'.'.$ext27;
              $target27 = "$coverImgdir27".$imgRANDFS27;
              move_uploaded_file($source27, $target27);
              $imagepath27 = $imgRANDFS27;
              $edurp27='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath27;
              $postgr27;
              $postgr27=$postgr27.','.$edurp27;
              }
              $postgr27=ltrim($postgr27,',').',';
                }
                else{
                    $postgr27=$docs27;
                }
                //report upload ed
                $csvr=mysqli_query($con,"update company_site_visit set sinamcom='$sinamcom',sidinted='$sidinted',siclnt='$siclnt',siaplid='$siaplid',sipckty='$sipckty',sirefno='$sirefno',sidterpt='$sidterpt',sidtbirt='$sidtbirt',sicin='$sicin',sirccde='$sirccde',sidtincr='$sidtincr',siempidd='$siempidd',sifrmo='$sifrmo',sito='$sito',sidesz='$sidesz',siednpy='$siednpy',sirsnfrlev='$sirsnfrlev',sirehireeel='$sirehireeel',sinamcom2='$sinamcom2',sidinted2='$sidinted2',siclnt2='$siclnt2',siaplid2='$siaplid2',
                sipckty2='$sipckty2',sirefno2='$sirefno2',sidterpt2='$sidterpt2',sidtbirt2='$sidtbirt2',sicin2='$sicin2',sirccde2='$sirccde2',sidtincr2='$sidtincr2',siempidd2='$siempidd2',sifrmo2='$sifrmo2',sito2='$sito2',sidesz2='$sidesz2',siednpy2='$siednpy2',sirsnfrlev2='$sirsnfrlev2',sirehireeel2='$sirehireeel2',remarks='$rmkcompany_site_visit',date='$dap',source='$sroccompany_site_visit',location='$lcntincompany_site_visit',cmpl_date='$cmpdtecompany_site_visit',color_code='$clrcdecompany_site_visit',add_fe='$add_feecompany_site_visit',report='$postgr27' where appl_id='$apid'");
                if($csvr){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
            }
            
        }
        header('location:https://admin.goldquestglobal.in/masterchecker.php?ref_id='.$apid);
    }
    
}
}
}
?>