<?php 
include '../header.php';

session_start();
$seid=$_SESSION['empid'];
$mal=$_REQUEST['mail'];
if($seid != NULL){
  header('location:http://www.goldquestglobal.in');  
}
else{
    include 'paswmail.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>GoldQuest Verification Tracking System-VTS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
				<img style="border-radius:10px" src="/images/logoquestglobal200new.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="/admin-login.php" enctype="multipart/form-data" id="admin-login">
					<span class="login100-form-title">
						Admin Login
					</span>
					<div class="lgnmsg"></div>
					<div class="wrap-input100">
						<input class="input100" type="number" name="otp" id="otp" placeholder="OTP" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
<!--sending the login user data st-->
<script>
    $(document).ready(function(){
        
        
        $('#lgn_sub').click(function(){
              var usr_email=$('#email').val();
              var usr_psd=$('#pass').val();
        
        if(usr_email != '' && usr_psd != ''){
            $('#admin-login').submit();
        }
        else{
            alert('Please enter the details');
        }
        })
        
    })
</script>
<!--sending the login user data st-->
</body>
</html>
<?php 
}