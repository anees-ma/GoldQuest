<?php 
include 'config.php';
?>
<?php 
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
//time ed//

//selection of client with ids
$sel=mysqli_query($con,"select * from clent_details where client_id='$clientids'");
$selres=mysqli_fetch_assoc($sel);
$client_uid=$selres['client_uid'];
$client_id=$selres['client_id'];
$mobile=$selres['mobile'];
$com_nme=$selres['company_name'];
$email=$selres['email'];

//selection of docs in applications
$sel2=mysqli_query($con,"select * from applications where ref_id='$dropapldi'");
$selres2=mysqli_fetch_assoc($sel2);
$docs=$selres2['docs'];
/*$docsexp=explode(',',$docs);
$docscnt=count($docsexp)-1;
$filecount=$filelent;*/
//deletetin previous applications st
//deletetin previous applications ed
$filecount=$filelent;
if($filecount > 0){
//multiple docs upload st
foreach($_FILES["mudcs"]["tmp_name"] as $key=>$tmp_name) {
                              $imagename = $_FILES['mudcs']['name'][$key];
                              $source = $_FILES['mudcs']['tmp_name'][$key];
                              /*$ext=pathinfo($imagename,PATHINFO_EXTENSION);*/
                              
                              $ext = pathinfo($imagename, PATHINFO_EXTENSION);
               $imgRANDMR=rand(99999,10000);
               $imgRANDM=$client_uid.$imgRANDMR;
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
              
              $imgmul;
              $imgmul=$imgN.','.$imgmul;
              
              }
$finldoc=$docs.$imgmul;
}
else{
    $finldoc=$docs;
}
//multiple docs upload ed
$rm_mr=str_replace("'","''",$rmrkad);
$qry=mysqli_query($con,"update applications set docs='$finldoc',emp_name='$empnme',apl_rmrk='$rm_mr' where ref_id='$dropapldi'");
if($qry){
    ?>
       <script>
      /*alert('success');*/
        window.location.assign("https://admin.goldquestglobal.in/customer-index.php?suBD=cretapl");
  </script>
  <?php
}
?>