<?php 
include 'config.php';

if(isset($_POST['services'])){
  foreach ($_POST['services'] as $key => $value) {
    $services[$value] = $_POST[$value];
  }
  $servicesJson = json_encode($services);
}else{
  $servicesJson = NULL;
}

extract($_POST);
//exit;

//time st//
$qry=mysqli_query($con,"insert into candidate_application(client_id,candidate_name,email_id,mobile_number,candidate_location,company_name,ug_stream,pg_stream,services_prices) values('$clientid_cdb','$candidate_name','$email_id','$mobile_number','$location','$company_name','$ug_stream','$pg_stream','$servicesJson')");
//echo mysqli_error($con);exit;
if($qry){
  $last_id = mysqli_insert_id($con);
  include 'candidate_dropbox_mail.php'
?>
<script>
  window.location.assign("<?php echo APP_PATH;?>/customer-index.php?suBD=cdb");
</script>
  <?php
}else{
  echo mysqli_error($con);exit;
}
?>