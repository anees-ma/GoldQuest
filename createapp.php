<?php 
include 'config.php';

//Added by Anees M A on Mar 3, 2021
foreach ($_POST['services'] as $key => $value) {
  $value_altered = str_replace('-', '_', substr($value, strpos($value, "#") + 1));
  $_POST['services_altered'][$key]= $value_altered;
}

$services_email = array();
if(isset($_POST['services_altered'])){
  foreach ($_POST['services_altered'] as $key => $value) {
    $_POST['services_altered'][$value] = $_POST[$value];
    unset($_POST['services_altered'][$key]);
  }

  $services_email = $_POST['services_altered'];
}
//Added by Anees M A on Mar 3, 2021

//Added by Anees M A on Feb 26, 2021
/*foreach ($_POST as $key => $post) {
  if($key=='5_panel' || $key=='6_panel' || $key=='10_panel' || $key=='12_panel' || $key=='12th_std' || $key=='10th_std'){
    $_POST['_'.$key] = $post;
    unset($_POST[$key]);
  }
}*/

extract($_POST);
//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('d').'-'.date('m').'-'.date('Y');
$daptim=date('H:i:s');

$services = json_encode($services);//Added - Anees M A on Feb 26, 2021
//time ed//

//selection of client with ids
$sel=mysqli_query($con,"select * from clent_details where client_id='$clientids'");
$selres=mysqli_fetch_assoc($sel);
$client_uid=$selres['client_uid'];
$client_id=$selres['client_id'];
$mobile=$selres['mobile'];
$com_nme=$selres['company_name'];
$email=$selres['email'];

//selection of clientd uid in applications
$sel2=mysqli_query($con,"select * from applications where client_uid='$client_uid' order by id DESC limit 1");
$selres2=mysqli_fetch_assoc($sel2);
$exref=$selres2['ref_id'];
$selcnt=mysqli_num_rows($sel2);

//creation of app ref id
if($selcnt > 0){
    $ref_idcr=$exref;
    $ref_idexp=explode('-',$ref_idcr);
    //$refplus=$ref_idexp[3]+1;Replaced by Anees M A with below code on Feb 26, 2021
    $refplus=$ref_idexp[2]+1;//Added by Anees M A instead of above code on Feb 26, 2021
    $ref_id=$ref_idexp[0].'-'.$ref_idexp[1].'-'.$ref_idexp[2].'-'.$refplus;
}
else{
    $ref_idcr=$client_uid;
    /*$ref_idexp=explode('-',$ref_idcr);*/
    $ref_id=$ref_idcr.'-'.'1';
}

//multiple docs upload st
$imgN_uoida = '';
foreach($_FILES["mudcs"]["tmp_name"] as $key=>$tmp_name) {
                              $imagename = $_FILES['mudcs']['name'][$key];
                              $source = $_FILES['mudcs']['tmp_name'][$key];
                              /*$ext=pathinfo($imagename,PATHINFO_EXTENSION);*/
                              
                              $ext = pathinfo($imagename, PATHINFO_EXTENSION);
              
               $imgRANDMR=rand(99999,10000);
               $imgRANDM=$ref_id.$imgRANDMR;
              /*generating random image name ed*/
              
             $coverImgdir = '/home/goldquest/public_html/assets/'.$mobile.'/'.'applications/';
            if(!is_dir($coverImgdir)){
                mkdir($coverImgdir,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS=$imgRANDM.'.'.$ext;
              $target = "$coverImgdir".$imgRANDFS;
              move_uploaded_file($source, $target);
              

              $imagepath = $imgRANDFS;
              $imgN='assets/'.$mobile.'/applications/'.$imagepath;
              
              $imgmul='';
              $imgmul=$imgN.','.$imgmul;
              
              }

              if($_FILES["uoida"]["tmp_name"]){
                $imagename_uoida = $_FILES['uoida']['name'];
                              $source_uoida = $_FILES['uoida']['tmp_name'];
                              /*$ext=pathinfo($imagename,PATHINFO_EXTENSION);*/
                              
                              $ext_uoida = pathinfo($imagename_uoida, PATHINFO_EXTENSION);
              
               $imgRANDMR_uoida=rand(99999,10000);
               $imgRANDM_uoida=$ref_id.$imgRANDMR_uoida;
              /*generating random image name ed*/
              
               $coverImgdir_uoida = '/home/goldquest/public_html/assets/'.$mobile.'/'.'applications/Insufficiency-document-attachment/';
              if(!is_dir($coverImgdir_uoida)){
                  mkdir($coverImgdir_uoida,0777,true);
              }
              /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
                $imgRANDFS_uoida=$imgRANDM_uoida.'.'.$ext_uoida;
                $target_uoida = "$coverImgdir".$imgRANDFS_uoida;
                move_uploaded_file($source_uoida, $target_uoida);
                

                $imagepath_uoida = $imgRANDFS_uoida;
                $imgN_uoida='assets/'.$mobile.'/applications/Insufficiency-document-attachment/'.$imagepath;
                
               // $imgmul_uoida;
               // $imgmul_uoida=$imgN_uoida.','.$imgmul_uoida;
              }

              //echo($imgN_uoida);exit;
//aplication mail snd prcs
$maiap=substr($imgmul, 0,-1);
$maiapexp=explode(',',$maiap);
$maiapcnt=count($maiapexp);
$r=1;
$msty = '';
for($j=0; $j < $maiapcnt; $j++){
    $likk=$maiapexp[$j];
    $msty .="
    <a style='background-color:#337fbf;padding:5px;color:white' href='http://www.goldquestglobal.in/$likk'>DOC $r</a>
    ";
    $r++;
} 
//multiple docs upload ed
$stat='wip';
$empty='';
$rm_mr=str_replace("'","''",$rmrkad);
//echo $imgN_uoida; exit;
$qry=mysqli_query($con,"insert into applications(ref_id,client_uid,client_id,company_name,emp_name,docs,insufficiency_doc_att,date,time,status,report,current_address,permanent_address, 
emp_hr_1,emp_hr_2,emp_hr_3,emp_hr_4,emp_hr_5,emp_hr_6,post_graduation,graduation,12th_std,10th_std,diploma,pro_reference_1,pro_reference_2,insta_drug_test,criminal_police_record,criminal_court_record,criminal_database,national_id_check,company_site_visit,credit_verification,ug_stream,pg_stream,services,apl_rmrk) 
values('$ref_id','$client_uid','$client_id','$com_nme','$empnme','$imgmul','$imgN_uoida','$dap','$daptim','$stat','$empty','$empty','$empty','$emp_hr_1','$emp_hr_2','$emp_hr_3','$emp_hr_4','$emp_hr_5','$emp_hr_6','$post_graduation','$graduation','$_12th_std','$_10th_std','$diploma','$pro_reference_1','$pro_reference_2','$insta_drug_test','$criminal_police_record','$criminal_court_record','$criminal_database',
'$national_id_check','$company_site_visit','$credit_verification','$ug_stream','$pg_stream','$services','$rm_mr')");
//echo mysqli_error($con);exit;
if($qry){
    include 'adminmail.php'
    ?>
       <script>
      /*alert('success');*/
        window.location.assign("http://www.goldquestglobal.in/customer-index.php?suBD=cretapl");
  </script>
  <?php
}else{
  echo mysqli_error($con);
}
?>