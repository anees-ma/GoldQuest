<?php 
  include 'config.php';
  extract($_POST);
  //$empty='';
  //$emprole=strtolower($emprolee);
  //echo $deleteempid; exit;
  $qry=mysqli_query($con,"delete from employee_login where id='$deleteempid'");
  if($qry){
    echo 'success';
  }
  else{
      echo 'failed';
  }
?>