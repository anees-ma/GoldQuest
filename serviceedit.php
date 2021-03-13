 <?php 
include 'header.php';
include 'config.php';
?>
<?php

$serviceid=$_POST['serviceid'];
 $clientsql=mysqli_query($con,"select * from serv_list where id='$serviceid'");
    $clientres=mysqli_fetch_assoc($clientsql);
    $service_name=$clientres['service_name'];
    $service_price=$clientres['service_price'];
    $id=$clientres['id'];
   
?>
  <div class="form-style">
     <div class="form-title">Edit services</div>
 <form action="servicedetailsedit.php" method="post">
  <div class="form-group">
    <label for="cpmne">Service Name:</label>
    <input type="text" name="service_name" value="<?php echo $service_name;?>" class="form-control" id="sernme">
  </div>
  <div class="form-group">
    <label for="cmpaddr">Service Price:</label>
    <input type="text" name="service_price" value="<?php echo $service_price;?>" class="form-control" id="serprice">
  </div>
  
  
  <input type="hidden" name="aclid" value="<?php echo $serviceid ;?>" class="form-control" >
  
  <input type="submit" name="sub" id="sub" value="Submit" class="btn btn-primary">
  
</form>
</div>