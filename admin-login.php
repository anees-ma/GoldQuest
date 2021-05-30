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

$usel=mysqli_query($con,"select * from employee_login where email='$usr_email' AND pass_wrd='$usr_psd'");
$uselres=mysqli_fetch_assoc($usel);
$uselcnt=mysqli_num_rows($usel);
if($uselcnt == 1){
	$_SESSION['empid']=$uselres['emp_id'];
	include 'storeusr.php';
	
	//echo $_SESSION['empid']; exit;

	@header('location:'.APP_PATH);
}
else{
    header('location:'.APP_PATH.'/login?er=err');#CH
    //header('location:http://localhost/GoldQuest/');
    ?>
    <span>Login Failed&nbsp;<a href="<?php echo APP_PATH;?>/login">Go Back</a></span>
    <?php
}
?>