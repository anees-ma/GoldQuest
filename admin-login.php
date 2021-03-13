<?php 
include 'config.php';
?>
<?php
@ini_set('session.gc_maxlifetime',12*60*60);
@ini_set('session.cookie_lifetime',12*60*60);
@session_start();
extract($_POST);
$usr_email=$email;
$usr_psd=$pass;
$usel=mysqli_query($con,"select * from employee_login where email='$usr_email' && pass_wrd='$usr_psd'");
$uselres=mysqli_fetch_assoc($usel);
$uselcnt=mysqli_num_rows($usel);
if($uselcnt == 1){
	$_SESSION['empid']=$uselres['emp_id'];
	include 'storeusr.php';

	@header('location:http://www.goldquestglobal.in');#CH
	//@header('location:http://localhost/GoldQuest/');
	//@header('location:http://localhost/GoldQuest/');
}
else{
    header('location:http://www.goldquestglobal.in/login?er=err');#CH
    //header('location:http://localhost/GoldQuest/');
    ?>
    <span>Login Failed&nbsp;<a href="http://www.goldquestglobal.in/login">Go Back</a></span>
    <?php
}
?>