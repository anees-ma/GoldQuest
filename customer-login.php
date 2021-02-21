<?php 
include 'config.php';
?>
<?php
session_start();
extract($_POST);
$usr_email=$email;
$usr_psd=$pass;
$statuss='Active';

$usel=mysqli_query($con,"select * from client_login where email='$usr_email' && pas_wrd='$usr_psd'");
$uselres=mysqli_fetch_assoc($usel);
$client_uid=$uselres['client_uid'];

//selection of client
$clsel=mysqli_query($con,"select * from clent_details where client_uid='$client_uid' && status='$statuss'");
$clselcnt=mysqli_num_rows($clsel);

$uselcnt=mysqli_num_rows($usel);
if($clselcnt == 1){
    $_SESSION['client_id']=$uselres['clent_id'];
    include 'storeusr.php';
    header('location:https://admin.goldquestglobal.in/customer-index.php');
}
elseif($clselcnt == 0 && $uselcnt == 1){
    header('location:https://admin.goldquestglobal.in/customerlogin?er=srep');
}
elseif($clselcnt ==0 && $uselcnt == 0){
     header('location:https://admin.goldquestglobal.in/customerlogin?er=err');
    ?>
    <!--<span>Login Failed&nbsp;<a href="https://admin.goldquestglobal.in/customerlogin">Go Back </a></span>-->
    <?php
}
?>