<?php 
include 'config.php';
?>
<?php
extract($_POST);
//selection of previous services
$prev=mysqli_query($con,"select * from clent_details where client_uid='$cmpuid'");
$prevres=mysqli_fetch_assoc($prev);
$prevserv=$prevres['service_name'];
$prevpric=$prevres['service_price'];
$client_id=$prevres['client_id'];
$doc_agr=$prevres['agrefile'];
//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('d').'-'.$month_name.'-'.date('Y').' '.date('H:i');
//time ed//
//agrement file upload st
$filecount=$agfilcnt;
if($filecount > 0){
unlink($doc_agr);
$img_name = $_FILES['agrbrw']['name'];
$source=$_FILES["agrbrw"]["tmp_name"];
$imagename = $_FILES['agrbrw']['name'];
$ext = pathinfo($imagename, PATHINFO_EXTENSION);
     $imgRANDMR=rand(99999,10000);
               $imgRANDM='BRB'.$curDateoff.$imgRANDMR;
              /*generating random image name ed*/
             $coverImgdir = '/home/goldquest/public_html/assets/'.$mobile.'/'.'agrem/';
             if(!is_dir($coverImgdir)){
                mkdir($coverImgdir,0777,true);
            }
              $imgRANDFS=$imgRANDM.'.'.$ext;
              $target = "$coverImgdir".$imgRANDFS;
              move_uploaded_file($source, $target);
              $imagepath = $imgRANDFS;
              $imgmul='assets/'.$mobile.'/agrem/'.$imagepath;
}
else{
    $imgmul=$doc_agr;
}
//agrement file upload ed
//check boxes st
$checkboxes = isset($_POST['services']) ? $_POST['services'] : array();
$m=0;
foreach($checkboxes as $value) {
    //explode
/*    $lo=explode('-',$value);
    $lk=$lo[0];*/
    /*$index1=$value;*/
	$first=$_POST[$value];
    //price store
    $pr;
    $pr=$first.','.$pr;
    //service store
    $bn;
    $bn=$value.','.$bn;
}
//check boxes ed
$prvfserv=$prevserv.$bn;
$prvfpric=$prevpric.$pr;
$updatepro=mysqli_query($con,"update clent_details set company_name='$cpmne',client_uid='$cmpuid',address='$address',state='$state',mobile='$mobile',email='$email',email2='$email2',email3='$email3',email4='$email4',
contact_person='$contact_person',role='$role',gst='$gst',dsagre='$dsagr',dsagreepero='$agrper',service_name='$prvfserv',service_price='$prvfpric',agrefile='$imgmul',tatd='$tatd' where client_id='$aclid'
");
if($updatepro){
  header("location:http://www.goldquestglobal.in?redi=editap&uidd=".$client_id);
}
else{
    ?>
    <div>Something Went Wrong!</div>
    <?php
}
?>