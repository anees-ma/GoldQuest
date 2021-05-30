<?php 
include 'config.php';
include 'functions.php';
session_start();
$suotput=$_REQUEST['suBD'];
// $seid=$_SESSION['empid'];
$mv=$_SESSION['client_id'];
if($mv != NULL){
    

//selection of login details
$lusr=mysqli_query($con,"select * from client_login where clent_id='$mv'");
$lusrres=mysqli_fetch_assoc($lusr);
?>
<?php
$clientlogin=mysqli_query($con,"select * from clent_details where client_id='$mv'");
$clientres=mysqli_fetch_assoc($clientlogin);
$company_name=$clientres['company_name'];
$serv_name=$clientres['service_name'];
$servli_price=$clientres['service_price'];
$servli_priceexp=explode(',',$servli_price);
$serv_name2=explode(',',$serv_name);
$serv_name2cnt=count($serv_name2)-1;
?>
<?php 
include 'header.php';
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>GoldQuest Verification Tracking System-VTS</title>
    </head>
    <body>
        <header class="head">
            <a href="http://www.goldquestglobal.in/customer-index.php">GoldQuest Verification Tracking System-VTS</a><span class="log">Hi,&nbsp;<a href="customer-index.php"><?php echo ucwords($company_name);?></a></span>
           <!--<div class="log">Hi,&nbsp;<?php echo $company_name;?></div>-->
            </header>
            <section class="sec1">
            <!--add client confirmation popup box st-->
                <div class="modal fade" id="fbx">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="timescl" class="close" data-dismiss="modal" style="cursor:pointer">&times;</div>
                            </div>
                            <div class="modal-body">
                                <div class="bx_title" style="text-align:center">Are you Sure Want to Submit?</div>
                                <div class="bx_butn" style="text-align:center"><button id="yes_sub" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="no_sub" class="btn btn-danger">No</button></div>
                            </div>
                            <div class="modal-footer">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!--add client confirmation popup box ed-->
            <!--left side screen st-->
            <div class="split left">
        
            <div id="emsi" onclick="ems(this)" data-ems="emsy" class="list"><img src="images/woman.png">&nbsp;&nbsp;EMPLOYEE MANAGEMENT</div>
            <div class="ems-sub">
                <div class="bnpl" onclick="crap(this)"  data-crp="cretapl"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;CLIENT DROPBOX</div>
                <div class="bnpl" onclick="candidateDropBox(this)"  data-cdb="cdb"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;CANDIDATE DROPBOX</div>
                <div class="bnpl" onclick="apm(this)"  data-apg="apmng"><i class="fa fa-thumb-tack" aria-hidden="true"></i>&nbsp;&nbsp;TRACK VERIFICATION STATUS</div>
                <div class="bnpl" onclick="sprt(this)"  data-supt="support"><img src="images/support.png">&nbsp;&nbsp;Support</div>
                <div onclick="location.href='logoutc.php'" class="list"><img src="images/logout.png">&nbsp;&nbsp;Logout</div>
            </div>
                <!--<div class="bnpl" onclick="prof(this)" data-profile="profiledata"><img src="images/woman.png">&nbsp;&nbsp;Profile</div>-->
            
            
            </div>
            
            </div>
            <!--left side screen ed-->
            
            <!--right side screen st-->
            <div class="split right">
            <div class="right_con">
                <div class="form-title page-title">Company Info</div>
                <div class="prf_bx">
                <div class="prf_blk">
                    <table id="company-info-tb">
                        <tr>
                            <td>Company Name</td>
                            <td><?php echo ucwords($clientres['company_name']);?></td>
                        </tr>
                        <tr>
                            <td>Company Email</td>
                            <td><?php echo $clientres['email'];?></td>
                        </tr>
                        <tr>
                            <td>Company Mobile</td>
                            <td><?php echo $clientres['mobile'];?></td>
                        </tr>
                        <tr>
                            <td>Company Address</td>
                            <td><?php echo ucwords($clientres['address']);?></td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td><?php echo ucfirst($clientres['role']);?></td>
                        </tr>
                        <tr>
                            <td>GST</td>
                            <td><?php echo $clientres['gst'];?></td>
                        </tr>
                        <tr>
                            <td>Contact Person</td>
                            <td><?php echo ucwords($clientres['contact_person']);?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php echo ucfirst($clientres['status']);?></td>
                        </tr>
                        <tr>
                            <td>TAT</td>
                            <td><?php 
                            if($clientres['tatd'] != NULL){
                             echo $clientres['tatd'].' '.'Days';   
                            }
                            else{
                                echo 'Not Specified';
                            }
                            ?></td>
                        </tr>
                    </table>
                    <!-- <lable>Company Name:</lable>
                    <input type="text" id="cmpnme" value="<?php echo ucwords($clientres['company_name']);?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>Company Email:</lable>
                    <input type="text" id="cmpeml" value="<?php echo $clientres['email'];?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>Company Mobile:</lable>
                    <input type="text" id="cmpmonb" value="<?php echo $clientres['mobile'];?>" class="inp_wi"disabled>
                </div>
                <div class="prf_blk">
                    <lable>Company Address:</lable>
                    <input type="text" id="cmpadr" value="<?php echo ucwords($clientres['address']);?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>Role:</lable>
                    <input type="text" id="cmprole" value="<?php echo ucfirst($clientres['role']);?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>GST:</lable>
                    <input type="text" id="cmpgst" value="<?php echo $clientres['gst'];?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>Contact Person:</lable>
                    <input type="text" id="cmpcntpr" value="<?php echo ucwords($clientres['contact_person']);?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>Status:</lable>
                    <input type="text" id="cmpstat" value="<?php echo ucfirst($clientres['status']);?>" class="inp_wi" disabled>
                </div>
                <div class="prf_blk">
                    <lable>TAT:</lable>
                    <input type="text" id="tatdd" value="<?php 
                    if($clientres['tatd'] != NULL){
                     echo $clientres['tatd'].' '.'Days';   
                    }
                    else{
                        echo 'Not Specified';
                    }
                    ?>" class="inp_wi" disabled>
                </div> -->
                <div class="prf_blk">
                    <div class="form-title page-title">Selected Services</div>
                    <div class="">
                        <table class="company-info-t">
                    <?php 
                    $t=0;
                    $f=1;
                    for($t=0; $t < $serv_name2cnt; $t++){
                        //get major service name st
                            $majrservsexp=explode('#',$serv_name2[$t]);
                            $majservnme=$majrservsexp[0];
                            $majservnme2=$majrservsexp[1];
                            
                            $mjqr=mysqli_query($con,"select * from serv_list where id='$majservnme'");
                            $mjres=mysqli_fetch_assoc($mjqr);
                            $mjjserv=$mjres['service_name'];
                            //get major service name ed
                        
                        ?>
                        <!-- <div class="serv_list"><span><?php echo $f.'.';?></span>&nbsp;<span><?php echo strtoupper($mjjserv);?></span>&nbsp;<span class="submaj"><?php echo ucwords($majservnme2);?></span>&nbsp;&nbsp;<?php echo $servli_priceexp[$t].' '.'RS'?></div> -->

                        
                                <tr>
                                    <td><?php echo $f.'.';?></td>
                                    <td style="text-align: left"><?php echo strtoupper($mjjserv);?></td>
                                    <!-- <td style="text-align: left"><?php echo ucwords(strtolower(str_replace('-',' ',$majservnme2)));?></td> -->
                                    <td style="text-align: left"><?php echo strtoupper(getServiceDisplayName($majservnme2,$con));?></td>
                                    <td style="text-align: right"><?php echo $servli_priceexp[$t].' '.'RS'?></td>
                                </tr>
                            
                        <?php
                        $f++;
                    }
                    ?>
                    </table>
                        </div>
                </div>
                <div class="prf_blk">
                    <lable>Download General MRL & BGV Forms:</lable>
                    <a class="frmsty" href="bgvforms/General MRL.pdf" download>General MRL</a>&nbsp;
                    <a class="frmsty" href="bgvforms/GoldQuest 4 Page Updated BGV Form.pdf" download>BGV Form</a>&nbsp;
                    <a class="frmsty" href="bgvforms/GoldQuest 4 Page Updated BGV Form.xls" download>BGV Form</a>&nbsp;
                    <a class="frmsty" href="bgvforms/GoldQuest Updated 1 Page BGV Form.pdf" download>BGV Form</a>&nbsp;
                </div>
                </div>
            </div>
            </div>
            <!--right side screen ed-->
            </section>
            <a id="chkclk" data-toggle="modal" href="#fbx"></a>
            </body>
            
<!--menu bar script st-->
<script>
    $(document).ready(function(){
        /*$('.cms-sub').hide();
        $('.ems-sub').hide();
        $('.sms-sub').hide();*/
        
        //cms st
        /*$('#cmsi').click(function(){
            $('.cms-sub').toggle(1000);
        })*/
        //ems st
        /*$('#emsi').click(function(){
            $('.ems-sub').toggle(1000);
        })*/
        //sms st
        /*$('#smsi').click(function(){
            $('.sms-sub').toggle(1000);
        })*/
    })
</script>
<!--menu bar system script ed-->

<!--triggers st-->
<script>
    $(document).ready(function(){
        var curedi='<?php echo $suotput;?>';
        if(curedi != ''){
            if(curedi == 'cretapl' || curedi=='cdb'){
                var log_id='<?php echo $mv;?>';
                var funv1=curedi;
                var adclsucc='yes';
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1,adclsucc:adclsucc,log_id:log_id},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
                
            }
        }
    })
</script>
<!--triggers ed-->

<!--add client st-->
<script>
    function cmsac(dl){
                var funv1=$(dl).data('adc');
                $.ajax({
                    url: 'dataforms.php',
                    type: 'post',
                    data: {funv1:funv1},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--add client ed-->

<!--client management st-->
<script>
    function cmscm(dll){
                var funv1=$(dll).data('cmg');
                $.ajax({
                    url: 'dataforms.php',
                    type: 'post',
                    data: {funv1:funv1},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--client management ed-->

<!--outstanding payout st-->
<script>
    function cmsoup(dlll){
                var funv1=$(dlll).data('oupp');
                $.ajax({
                    url: 'dataforms.php',
                    type: 'post',
                    data: {funv1:funv1},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--outstanding payout ed-->

<!--create application st-->
<script>
        function crap(dt){
                var funv1=$(dt).data('crp');
                var log_id='<?php echo $mv;?>';
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1,log_id:log_id},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }

            function candidateDropBox(cdb){
                var funv1=$(cdb).data('cdb');
                var log_id='<?php echo $mv;?>';
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1,log_id:log_id},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--create application ed-->

<!--application management st-->
<script>
   function apm(dtt){
                var funv1=$(dtt).data('apg');
                var log_id='<?php echo $mv;?>';
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1,log_id:log_id},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            } 
</script>
<!--application management ed-->

<!--add service st-->
<script>
    function prof(ptse){
                var funv1=$(ptse).data('profile');
                var log_id='<?php echo $mv;?>';
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1,log_id:log_id},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--add service ed-->

<!--service management st-->
<script>
  function semg(ptse2){
                var funv1=$(ptse2).data('sermgt');
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }  
</script>
<!--service management ed-->

<!--support st-->
<script>
  function sprt(spt){
                var funv1=$(spt).data('supt');
                $.ajax({
                    url: 'dataformscustomer.php',
                    type: 'post',
                    data: {funv1:funv1},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }  
</script>
<!--support ed-->
</html>
<?php
}
else{
    header('location:http://www.goldquestglobal.in/customerlogin');
}
