<?php 
include 'config.php';
?>
<?php
extract($_POST);
$updatepro=mysqli_query($con,"update clent_details set company_name='$company_name',address='$address',mobile='$mobile',email='$email',
contact_person='$contact_person',role='$role',gst='$gst' where client_id='$client_id'
");
if($updatepro){
  header("location:https://admin.goldquestglobal.in/customer-index.php");
}
else{
    ?>
    <div>Something Went Wrong!</div>
    <?php
}
?>