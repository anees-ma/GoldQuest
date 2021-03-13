<?php 
include 'config.php';
?>
<?php
extract($_POST);
$servid=$_POST['servid'];
$ste='In Active';
$statuspro=mysqli_query($con,"Delete from serv_list where id='$servid'");
if($statuspro){
    echo "<script>alert('deleted successfully'); </script>";
    header('location:http://www.goldquestglobal.in');
   ?>
   
      <!--<button id="delete" onclick="serdel(this)" data-serdeli="<php echo $servid;?>" class="btn btn-danger">Deleted</button></td>-->
   <?php
}
else{
    ?>
    <div>Something Went Wrong!</div>
    <?php
}
?>