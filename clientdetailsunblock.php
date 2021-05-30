<?php 
include 'config.php';
?>
<?php
extract($_POST);
$clientid=$_POST['clientid'];
$ste='Active';
$statuspro=mysqli_query($con,"update clent_details set status='$ste'  where client_id='$clientid'");
if($statuspro){
   ?>
    <button id="delete" onclick="blcktwo(this)" data-blcidtwo="<?php echo $clientid;?>" class="btn btn-danger">Blocked</button></td>
   <?php
}
else{
    ?>
    <div>Something Went Wrong!</div>
    <?php
}
?>