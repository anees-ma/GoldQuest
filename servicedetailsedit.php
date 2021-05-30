<?php 
include 'config.php';
?>
<?php
extract($_POST);
$updatepro=mysqli_query($con,"update serv_list set service_name='$service_name',service_price='$service_price' where id='$aclid'
");
if($updatepro){
  header("location:".APP_PATH);
}
else{
    ?>
    <div>Something Went Wrong!</div>
    <?php
}
?>