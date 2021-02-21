<?php 
include 'config.php';
include 'autoblock.php';
include 'timelnoti.php';
session_start();
$suotput=$_REQUEST['redi'];
$cleditu=$_REQUEST['uidd'];
$seid=$_SESSION['empid'];
/*$seid=$_REQUEST['kqwsd'];
$_SESSION['kqs']=$seid;*/
if($seid != NULL){
//selection of login details
$lusr=mysqli_query($con,"select * from employee_login where emp_id='$seid'");
$lusrres=mysqli_fetch_assoc($lusr);
$emp_name=$lusrres['emp_name'];
$emp_role=$lusrres['emp_role'];
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
            <a href="https://admin.goldquestglobal.in">GoldQuest Verification Tracking System-VTS</a><span class="log">&nbsp;<a href="https://admin.goldquestglobal.in"><?php echo $emp_name;?></a></span>
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
                
                <!--edit add client confirmation popup box st-->
                <div class="modal fade" id="editfbx">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="timescl2" class="close" data-dismiss="modal" style="cursor:pointer">&times;</div>
                            </div>
                            <div class="modal-body">
                                <div class="bx_title" style="text-align:center">Are you Sure Want to Submit?</div>
                                <div class="bx_butn" style="text-align:center"><button id="yes_sub2" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="no_sub2" class="btn btn-danger">No</button></div>
                            </div>
                            <div class="modal-footer">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!--edit add client confirmation popup box ed-->
                
                <!--add employee confirmation popup box st-->
                <div class="modal fade" id="empfbx">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="timesclemp" class="close" data-dismiss="modal" style="cursor:pointer">&times;</div>
                            </div>
                            <div class="modal-body">
                                <div class="bx_title" style="text-align:center">Are you Sure Want to Submit?</div>
                                <div class="bx_butn" style="text-align:center"><button id="empyes_sub" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="empno_sub" class="btn btn-danger">No</button></div>
                            </div>
                            <div class="modal-footer">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!--add employee confirmation popup box ed-->
                
            <!--left side screen st-->
            <div class="split left">
            <?php 
            if($emp_role == 'admin'){
                ?>
            <div id="cmsi" onclick="cms(this)"  data-cms="cmsy" class="list"><img src="images/client.png">&nbsp;&nbsp;Client Management</div>
            <div class="cms-sub">
                <div id="adcltri" class="bnpl" onclick="cmsac(this)"  data-adc="cmsad"><img src="images/next.png">&nbsp;&nbsp;New Client Registration</div>
                <div class="bnpl" onclick="cmscm(this)"  data-cmg="cmsmgs"><img src="images/next.png">&nbsp;&nbsp;Active Client List</div>
                <div class="bnpl" onclick="blkusr(this)"  data-blkus="blkusrs"><img src="images/people.png">&nbsp;&nbsp;Inactive Client List</div>
                <!--<div class="bnpl" onclick="cmsoup(this)" data-oupp="outsp"><img src="images/next.png">&nbsp;&nbsp;Outstanding Payments</div>-->
                </div>
                <?php
            }
            ?>
            <?php 
            if($emp_role == 'admin'){
                ?>
                <div id="emsi" onclick="ems(this)" data-ems="emsy" class="list"><img src="images/woman.png">&nbsp;&nbsp;Create GoldQuest Login</div>
                <div class="ems-sub">
                <!--<div class="bnpl" onclick="crap(this)"  data-crp="cretapl"><img src="images/next.png">&nbsp;&nbsp;Create Application</div>-->
                <div id="emp" onclick="addemp(this)"  data-adempp="ademploye" class="list"><img src="images/avatar.png">&nbsp;&nbsp;Add employee</div>
                <!--<div class="bnpl" onclick="stupd(this)"  data-stu="staupdt"><img src="images/next.png">&nbsp;&nbsp;Status Update</div>-->
            </div>
                <?php
            }
            ?>
            
            <!--<div id="amtr" class="list"><a href="masterchecker.php" target="_blank"><img src="images/dataentry.png">&nbsp;&nbsp;Admin Master Tracker</a></div>-->
            <div id="invc" onclick="invc(this)"  data-invo="invoice" class="list"><img src="images/business-and-finance.png">&nbsp;&nbsp;Accounts & Finance</div>
            <div id="pasw" onclick="paswrd(this)"  data-pws="passwrds" class="list"><img src="images/seo-and-web.png">&nbsp;&nbsp;Client Login Credentials</div>
            <div class="bnpl" onclick="apm(this)"  data-apg="apmng"><img src="images/application.png">&nbsp;&nbsp;Client Master Tracker</div>
            <div class="bnpl" onclick="excel(this)"  data-excl="exclrpt"><img src="images/mac-os.png">&nbsp;&nbsp;Excel Tracker</div>
            <div onclick="remid(this)" data-remid="reminder" class="list"><img src="images/reminder.png">&nbsp;&nbsp;TAT Notifications</div>
            <div onclick="timln(this)" data-timln="timelines" class="list"><img src="images/timeline.png">&nbsp;&nbsp;Acknowledgement Email</div>
            <div onclick="location.href='histry.php'" class="list"><img src="images/folder.png">&nbsp;&nbsp;Track User History </div>
            <div onclick="location.href='logout.php'" class="list"><img src="images/logout.png">&nbsp;&nbsp;Logout</div>
            <!--<div id="chkl" class="list"><img src="images/logout.png">&nbsp;&nbsp;Logout</div>-->
            <!--<div id="smsi" onclick="sms(this)" data-sms="smsy" class="list"><img src="images/support.png">&nbsp;&nbsp;Service Management</div>-->
            <!--<div class="sms-sub">
                <div class="bnpl" onclick="adser(this)" data-serd="adsrvi"><img src="images/next.png">&nbsp;&nbsp;Scope of Services</div>
                <div class="bnpl" onclick="semg(this)" data-sermgt="sermngmt"><img src="images/next.png">&nbsp;&nbsp;Services</div>
            </div>-->
            </div>
            <!--left side screen ed-->
            
            <!--right side screen st-->
            <div class="split right">
            <div class="right_con hmpimg"><img style="width:70%;border-radius:10px;" src="images/home.jpg"></div>
            </div>
            <!--right side screen ed-->
            </section>
            <a id="chkclk" data-toggle="modal" href="#fbx"></a>
            <a id="editchkclk" data-toggle="modal" href="#editfbx"></a>
            <a id="empchkclk" data-toggle="modal" href="#empfbx"></a>
            </body>
<!--menu bar script st-->

<!--redirections st-->
<script>
    $(document).ready(function(){
        var reedid='<?php echo $suotput;?>';
        if(reedid != ''){
            if(reedid == 'addemp'){
                /*$('#emp').trigger('click');*/
                var funv1='ademploye';
                var adclsuc='yes';
                $.ajax({
                    url: 'dataforms.php',
                    type: 'post',
                    data: {funv1:funv1,adclsuc:adclsuc},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
                
            }
            if(reedid == 'cmsad'){
                /*$('#adcltri').trigger('click');*/
                var funv1='cmsad';
                var adclsuc='yes';
                $.ajax({
                    url: 'dataforms.php',
                    type: 'post',
                    data: {funv1:funv1,adclsuc:adclsuc},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
            if(reedid == 'editap'){
                /*$('#adcltri').trigger('click');*/
                var editid='<?php echo $cleditu;?>';
                var adclsuc='yes';
                $.ajax({
                    url: 'clientdetailsedit.php',
                    type: 'post',
                    data: {editid:editid,adclsuc:adclsuc},
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
<!--redirections ed-->
<script>
    $(document).ready(function(){
        $('.cms-sub').hide();
        $('.ems-sub').hide();
        $('.sms-sub').hide();
        
        //cms st
        $('#cmsi').click(function(){
            $('.cms-sub').toggle(1000);
        })
        //ems st
        $('#emsi').click(function(){
            $('.ems-sub').toggle(1000);
        })
        //sms st
        $('#smsi').click(function(){
            $('.sms-sub').toggle(1000);
        })
    })
</script>
<!--menu bar system script ed-->

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
<!--create application ed-->

<!--application management st-->
<script>
   function apm(dtt){
                var funv1=$(dtt).data('apg');
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
<!--application management ed-->

<!--add service st-->
<script>
    function adser(ptse){
                var funv1=$(ptse).data('serd');
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
<!--add service ed-->

<!--service management st-->
<script>
  function semg(ptse2){
                var funv1=$(ptse2).data('sermgt');
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
<!--service management ed-->
<!--Invoice management st-->
<script>
  function invc(invcc){
                var funv1=$(invcc).data('invo');
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
<!--Invoice management ed-->

<!--Client Credentials st-->
<script>
  function paswrd(pwdd){
                var funv1=$(pwdd).data('pws');
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
<!--Client Credentials ed-->

<!--add employee st-->
<script>
  function addemp(ademppd){
                var funv1=$(ademppd).data('adempp');
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
<!--add employee ed-->

<!--blocked users st-->
<script>
  function blkusr(blkd){
                var funv1=$(blkd).data('blkus');
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
<!--blocked users ed-->
<!--excel report st-->
<script>
  function excel(exdl){
                var funv1=$(exdl).data('excl');
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
<!--excel report ed-->

<!--reminder st-->
<script>
  function remid(rmdn){
                var funv1=$(rmdn).data('remid');
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
<!--reminder ed-->

<!--timeline st-->
<script>
  function timln(tmnl){
                var funv1=$(tmnl).data('timln');
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
<!--timeline ed-->
<script>
    /*$(document).ready(function(){
        $('#chkl').click(function(){
            $('#chkclk').trigger('click');
        })
    })*/
</script>
</html>
<?php
}
else{
    header('location:https://admin.goldquestglobal.in/login');
}
