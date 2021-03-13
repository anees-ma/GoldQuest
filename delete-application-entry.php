<?php 
  include_once 'config.php';
  if(isset($_POST) && $_POST['ref_id']){
    mysqli_autocommit($con, false);
    //foreach ($_POST['deleteIds'] as $key => $value) {
      $sql1 = "DELETE FROM `applications` WHERE `ref_id`='".$_POST['ref_id']."'";
      mysqli_query($con,$sql1);

      $sql2 = "DELETE FROM `applic_entry` WHERE `appl_id`='".$_POST['ref_id']."'";
      mysqli_query($con,$sql2);
    //}
    if(mysqli_commit($con)){
      include 'dataformscustomer.php';

    }else{
      mysqli_rollback($con);
      echo 'false';
    }
    mysqli_close($con);
    exit;
  }

?>