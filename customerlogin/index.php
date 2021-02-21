<?php 
$error=$_REQUEST['er'];
$eml=$_REQUEST['m'];
$ps=$_REQUEST['s'];
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
					<img src="/images/logoquestglobal200new.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="/customer-login.php" method="post">
					<span class="login100-form-title">
						Client Login
					</span>
					<div class="lgnmsg"></div>
					<div id="lgnmsg"><?php 
					if($error != NULL && $error == 'err'){
					    ?>
					    <div style="background-color:#f57b7b;color:white;padding:5px;border-radius:20px;text-align:center;margin-bottom:20px;">Login Failed</div>
					    <?php
					}
					elseif($error != NULL && $error == 'srep'){
					    ?>
					    <div style="background-color:#f57b7b;color:white;padding:5px;border-radius:20px;text-align:center;margin-bottom:20px;">Service has expired please Contact Admin</div>
					    <?php
					}
					?></div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="email" placeholder="Email" value="<?php echo $eml;?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password" value="<?php echo $ps;?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="sub_log" id="sub_log">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
						</span>
						<a class="txt2" href="https://admin.goldquestglobal.in/customerlogin/forgetpas.php">
							Forgot / Change Password?
						</a>
					</div>

					<!--<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>-->
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
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
	    $(document).ready(function(){
	        $('#email').focus(function(){
	            $('#lgnmsg').hide();
	        })
	    })
	</script>

</body>
</html>