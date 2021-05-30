<?php 
include 'config.php';
extract($_POST);
$empty='';
$emprole=strtolower($emprolee);
$qry=mysqli_query($con,"update employee_login set emp_id='$empidd',emp_mobile='$empmobb',email='$eemaill',pass_wrd='$passd',emp_name='$empnmee',emp_role='$emprole',reset_pass='$empty' where id='$emedidd'");
if($qry){
header(APP_PATH.'?redi=addemp');
}
else{
    echo 'something went wrong';
}
?>