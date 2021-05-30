<?php 
    $error=$_REQUEST['er'];
    $eml=$_REQUEST['m'];
    $ps=$_REQUEST['s'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GoldQuest Verification Tracking System-VTS</title>

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style type="text/css">
        .log-det .small-logo{
            padding-top: 25px !important;
            padding-bottom: 25px !important;
        }
        /*.box-de{
            background-repeat: no-repeat;
            background-size: 179%;
        }*/
    </style>
</head>

<body style="background-color:#dc3545 !important">
    <div class="container-fluid ">
        <div class="container ">
            <div class="row cdvfdfd">
                <div class="col-lg-10 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 log-det">
                            <div class="small-logo" style="">
                                <img src="http://www.goldquestglobal.in/images/logoquestglobal200new.png" style="width: 80%;margin: 22px;">
                            </div>
                            <!-- <p class="dfmn">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra ut dui in dictum. </p> -->
                            


                            <div class="text-box-cont">
                                <form class="login100-form validate-form" action="../customer-login.php" method="post" id="login-form">
                                    <div class="lgnmsg"></div>
                    <div id="lgnmsg"><?php 
                    if($error != NULL && $error == 'err'){
                        ?>
                        <div style="background-color:#f57b7b;color:white;padding:5px;border-radius:20px;text-align:center;margin-bottom:20px;">Login Failed</div>
                        <?php
                    }elseif($error != NULL && $error == 'srep'){
                        ?>
                    <div style="background-color:#f57b7b;color:white;padding:5px;border-radius:20px;text-align:center;margin-bottom:20px;">Service has expired please Contact Admin</div>
                        <?php
                    }
                    ?></div>
                                    <div class="input-group mb-3">
                                        <p id="invalid-email" style="display: none; color: red;">Invalid email id</p>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                        </div>

                                        <input type="text" class="input100 form-control" placeholder="Email" aria-label="Username" id="email" name="email" aria-describedby="basic-addon1" value="<?php echo $eml;?>">

                                    </div>
                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="input100 form-control" name="pass" id="pass" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" value="<?php echo $ps;?>">
                                    </div>
                                    
                                    <div class="input-group center">
                                        <button class="btn btn-danger btn-round" style="background-color:#3e76a5 !important; border-color: #3e76a5 !important;">SIGN IN</button>
                                    </div> 
                                    <div class="row" style="text-align: center">
                                        <a href="http://www.goldquestglobal.in/customerlogin/forgetpas.php" style="text-align: center; width: 90%; margin-left: auto; margin-right: auto;"><p class="forget-p">Forgot/ Change Password? <!-- <span>Sign Up Now</span> --></p></a>
                                    </div>
                                     <!-- <div class="row">
                                        <p class="small-info">Connect With Social Media</p>
                                    </div> -->   
                                </form>
                            </div>
                            
                            
                            
                            <!-- <div class="row">
                                <ul>
                                    <li><i class="fab fa-facebook-f"></i></li>
                                    <li><i class="fab fa-twitter"></i></li>
                                    <li><i class="fab fa-linkedin-in"></i></li>
                                </ul>
                            </div> -->
                           


                        </div>
                        <div class="col-lg-6 col-md-6 box-de">
                               <img src="assets/images/bg.jpg" height="460" width="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
<!--===============================================================================================-->
    <!-- <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
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

        $( "#login-form" ).submit(function( event ) {
            let email = $("#email").val();
            if(isEmail(email)==false){
                $('#invalid-email').show();
                event.preventDefault();

            }
          
        });
        function isEmail(email) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
        }
    </script>


</html>
