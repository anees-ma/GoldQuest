<?php 
include '../header.php';

session_start();
$seid=$_SESSION['empid'];
if($seid != NULL){
  header('location:http://www.goldquestglobal.in');  
}
else{
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
<!--action="forgotverify.php"-->
<section class="login100-form validate-form">
				<!--<form class="login100-form validate-form" method="post" enctype="multipart/form-data" id="admin-login">-->
					<span class="login100-form-title">
						Forget Password
					</span>
					<div class="lgnmsg"></div>
					<div class="wrap-input100">
						<input class="input100" type="email" name="email" id="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span  id="hieml" class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="adotp"></div>
					<div id="lgn_sub" class="container-login100-form-btn">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>
					</section>
				<!--</form>-->
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
            var otp_ct=$('#otp').val();
            var usr_email=$('#email').val();
            var new_pin=$('#newpin').val();
              
              if(/(.+)@(.+){2,}\.(.+){2,}/.test(usr_email)){
              
              $.ajax({
                  url: 'sendemver.php',
                  type: 'post',
                  data:{usr_email:usr_email,otp_ct:otp_ct,new_pin:new_pin},
                  beforeSend: function(){
                      $('.login100-form .adotp').html('Please Wait')
                  },
                  success: function(resp){
                      $('.login100-form .adotp').html(resp);
                      var pop=$('#gotol').text();
                      if(pop =='Go To Login'){
                          $('#email,#lgn_sub').css('display','none');
                          $('.wrap-input100 #hieml').css('display','none');
                      }
                  }
              });
                  
              }
              else{
                  alert('Please enter valid email address');
                  
              }
        })
        
    })
</script>
<!--sending the login user data st-->
</body>
</html>
<?php 
}