<?php 
  include 'header.php';
  include 'config.php';
?>
<?php 
//echo '<pre>'; print_r($_POST);exit;
extract($_POST);
$empty='';
//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('d').'-'.$month_name.'-'.date('Y').' '.date('H:i');
//time ed//
// agreement file upload st
$img_name = $_FILES['agrbrw']['name'];
$source=$_FILES["agrbrw"]["tmp_name"];
$imagename = $_FILES['agrbrw']['name'];
$ext = pathinfo($imagename, PATHINFO_EXTENSION);
 $imgRANDMR=rand(99999,10000);
     $imgRANDM='BRB'.$curDateoff.$imgRANDMR;
    /*generating random image name ed*/
   $coverImgdir = APP_FILE_PATH.'assets/'.$mobile.'/'.'agrem/';
   if(!is_dir($coverImgdir)){
      mkdir($coverImgdir,0777,true);
  }
    $imgRANDFS=$imgRANDM.'.'.$ext;
    $target = "$coverImgdir".$imgRANDFS;
    move_uploaded_file($source, $target);
    $imagepath = $imgRANDFS;
    $imgN='assets/'.$mobile.'/agrem/'.$imagepath;
if($is_custom_logo=='yes'){
  //$img_name = $_FILES['agrbrw']['name'];
  $custom_logo_name = $_FILES['custom_logo']['name'];
  $source=$_FILES["custom_logo"]["tmp_name"];
  
  $ext = pathinfo($custom_logo_name, PATHINFO_EXTENSION);
   $imgRANDMR=rand(99999,10000);
       $imgRANDM='BRB'.$curDateoff.$imgRANDMR;
      /*generating random image name ed*/
     $coverImgdir = APP_FILE_PATH.'assets/'.$mobile.'/'.'custom_logo/';
     if(!is_dir($coverImgdir)){
        mkdir($coverImgdir,0777,true);
    }
    $imgRANDFS=$imgRANDM.'.'.$ext;
    $target = "$coverImgdir".$imgRANDFS;
    move_uploaded_file($source, $target);
    $imagepath = $imgRANDFS;
    $custom_logo_path='assets/'.$mobile.'/custom_logo/'.$imagepath;
}else{
  $custom_logo_path = null;
  $custom_address = null;
}

 // agreement file upload ed
//creation of client id st
$sel=mysqli_query($con,"select * from clent_details order by id DESC limit 1");
$selres=mysqli_fetch_assoc($sel);
$uid=$selres['client_id'];
$selcnt=mysqli_num_rows($sel);
if($selcnt > 0){
    $crid=explode('BRB',$uid);
    $crid2=$crid[1]+1;
    $client_id='BRB'.$crid2;
}
else{
    $num='1000';
    $client_id='BRB'.$num;
}
//creation of client id ed
//check boxes st
$checkboxes = isset($_POST['services']) ? $_POST['services'] : array();

//print_r($checkboxes);exit;
$m=0;
foreach($checkboxes as $value) {
    //explode
/*    $lo=explode('-',$value);
    $lk=$lo[0];*/
    /*$index1=$value;*/
	$first=$_POST[$value];
    //price store
    $pr;
    $pr=$pr.','.$first;
    //service store
    $bn;
    $bn=$bn.','.$value;
}
$serpric2=ltrim($pr,',');
//$serpric=$serpric2.',';#CH
$serpric = ($serpric2=='')?'':$serpric2.',';
$servnm2=ltrim($bn,',');
//$servnm=$servnm2.',';#CH
$servnm = ($servnm2=='')?'':$servnm2.',';

/*$sepric=ltrim();*/
//check boxes ed
//service prices st
/*$i=0;
for($i=0; $i<=3; $i++){
    $index1="price".$i;
	$first[$i]=$_POST[$index1];
	$sp_amnt=0;
	$sp_amnt;
	$sp_amnt=$first[$i]+$sp_amnt;
}
	*/
	/*$i=0;
	for($i=0; $i<=2; $i++){
	    $index1="price".$i;
	    $first[$i]=$_POST[$index1];
	    if($first[$i] != NULL){
	    $jk;
	    $jk=$first[$i].','.$jk;
	    }
	}*/
//service prices ed
//password creationfunction rand_string( $length ) {


$p_1 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,4);
$p_2 = substr(str_shuffle('!@#$%^&*()_-'),0,1);
$p_3 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,2);
$p_4 = substr(str_shuffle('0123456789'),0,1);
$p_5 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,1);
$p_6 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,3);

$psd = $p_1.$p_2.$p_3.$p_4.$p_5.$p_6;
//$psd=rand(9999,1000);
$sta_t='Active';
$cmpuid=strtoupper($cmpuid);
$qry=mysqli_query($con,"insert into clent_details(client_uid,client_id,company_name,address,mobile,email,email2,email3,contact_person,role,gst,service_name,service_price,status,dsagre,dsagreexp,dsagreepero,agrefile,is_custom_temp,custom_logo_path,custom_address,state,date,tatd) 
values('$cmpuid','$client_id','$cmpnme','$addrs','$mobile','$email','$email2','$email3','$contper','$role','$gst','$servnm','$serpric','$sta_t','$dsagr','$dsagrexp','$agrper','$imgN','$is_custom_temp','$custom_logo_path','$custom_address','$state','$dap','$tatd')");
if($qry){
    $log=mysqli_query($con,"insert into client_login(client_uid,clent_id,email,pas_wrd,reset_pass) values('$cmpuid','$client_id','$email','$psd','$empty')");
    if($log){
        /*include 'confotp.php';*/
        include 'adclientmail.php';
        header('location:'.APP_PATH.'?redi=cmsad');
        ?>
       <script>
      /*alert('success');*/
        //window.location.assign("http:"+<?php echo APP_PATH; ?>+"?redi=cmsad");
  </script>
  <?php
    }
}else{
    //header('location:'.APP_PATH.'?redi=cregf');
}
?>