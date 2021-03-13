<?php 
include 'config.php';

extract($_POST);
$empty='';
$emprole=strtolower($emprolee);
$qry=mysqli_query($con,"insert into employee_login(emp_id,emp_mobile,email,pass_wrd,emp_name,emp_role,reset_pass) values('$empidd','$empmobb','$eemaill','$passd','$empnmee','$emprole','$empty')");
if($qry){
header('location:http://www.goldquestglobal.in?redi=addemp');
}
else{
    echo 'something went wrong';
}
?>