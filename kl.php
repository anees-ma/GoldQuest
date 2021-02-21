<?php 
include 'header.php';
include 'config.php';
?>
<?php 

/*$service_name=$_GET['service_name'];*/
extract($_POST);

$log=mysqli_query($con,"insert into serv_list (service_name,service_price) values('$service_name','$serprice')");
if($log){
   
        echo "<script>alert('message ha been successfully sent'); </script>";
        
       ?>
       <script>
        window.location.assign("https://admin.goldquestglobal.in");
  </script>
  <?php
    
}

else{ echo "not inserted" ; }
?>