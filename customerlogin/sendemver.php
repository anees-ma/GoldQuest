<?php 
include '../config.php';
$otp_ct=$_POST['otp_ct'];
$new_pin=$_POST['new_pin'];
$usr_email=$_POST['usr_email'];
if($otp_ct == NULL && $new_pin == NULL){
//selection of mail id
$qry=mysqli_query($con,"select * from client_login where email='$usr_email'");
$qrycnt=mysqli_num_rows($qry);
if($qrycnt == 1){
    $rand=rand(9999,1000);
    //update randam number
    $up=mysqli_query($con,"update client_login set reset_pass='$rand' where email='$usr_email'");
    if($up){
        include 'paswmail.php';
        ?>
        <div class="wrap-input100">
        <input class="input100" type="number" name="otp" id="otp" placeholder="OTP" >
		<span class="focus-input100"></span>
		<span class="symbol-input100">
		<i class="fa fa-key" aria-hidden="true"></i>
		</span>
		</div>
        <?php
    }
    else{
       ?>
       <div style="color:red">OOPS!!</div>
       <?php 
    }
}
else{
    ?>
    <div style="color:red">Your given email is not available please contact admin</div>
    <?php
}
}
elseif($otp_ct != NULL && $new_pin == NULL){
    //validating otp
    $qry=mysqli_query($con,"select * from client_login where email='$usr_email'");
    $qryres=mysqli_fetch_assoc($qry);
    $chk_otp=$qryres['reset_pass'];
    if($chk_otp == $otp_ct){
        ?>
        <div class="wrap-input100">
        <input class="input100" type="number" name="newpin" id="newpin" placeholder="New PIN" >
		<span class="focus-input100"></span>
		<span class="symbol-input100">
		<i class="fa fa-key" aria-hidden="true"></i>
		</span>
		</div>
        <?php
    }
    else{
    ?>
    <div style="background-color:#cc3232;color:white;border-radius:10px;padding:5px;text-align:center">Invalid OTP</div>
    <?php
    }
}
elseif($new_pin != NULL){
    $up=mysqli_query($con,"update client_login set pas_wrd='$new_pin' where email='$usr_email'");
    if($up){
    ?>
    <div style="background-color:#57a845;color:white;border-radius:10px;padding: 10px;">Pin Has Changed Successfully</div>
    <div id="gotol" style="text-align:center;margin-top:10px;"><button onclick="location.href='http://www.goldquestglobal.in/customerlogin'" class="btn btn-success">Go To Login</button></div>
    <?php
    }
    else{
        ?>
        <div style="background-color:red;color:white;border-radius:10px">Something Went Wrong!</div>
        <?php
    }
}
?>
