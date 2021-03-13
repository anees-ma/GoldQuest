<?php 
include 'config.php';
session_start();
$suotput=$_REQUEST['suBD'];
$seid=$_SESSION['empid'];
$gtrefid=$_REQUEST['ref_id'];
if($seid != NULL){
    

//selection of login details
$lusr=mysqli_query($con,"select * from employee_table where emp_id='$seid'");
$lusrres=mysqli_fetch_assoc($lusr);

?>
<?php 
include 'header.php';
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>GQG HR SERVICES</title>
    </head>
    <body>
        <header class="head">
            <a href="http://www.goldquestglobal.in">GQG HR SERVICES</a><span class="log">Hi,&nbsp;<a href="http://www.goldquestglobal.in">Admin</a></span>
            </header>
            <section class="sec1">
                <!--data entry confirmation popup box st-->
                <div class="modal fade" id="enfbx">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="timesclen" class="close" data-dismiss="modal" style="cursor:pointer">&times;</div>
                            </div>
                            <div class="modal-body">
                                <div class="bx_title" style="text-align:center">Are you Sure Want to Submit?</div>
                                <div class="bx_butn" style="text-align:center"><button id="enyes_sub" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="enno_sub" class="btn btn-danger">No</button></div>
                            </div>
                            <div class="modal-footer">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!--data entry confirmation popup box ed-->
                <div class="form-style">
                    <div class="form-title" style="color: #3e76a5;margin-top: 40px;font-size: 23px;">Candidate Application</div>
                    <form action="mastersub.php" method="post" enctype="multipart/form-data" id="finrentry">
                        <div class="form-group">
                            <label for="apid">Application ID</label>
                            <input type="text" class="form-control" name="apidoo" id="apidoo" value="<?php echo $gtrefid;?>" readonly>
                            <input type="hidden" class="form-control" name="apid" id="apid" value="<?php echo $gtrefid;?>">
                        </div>
                        <div class="form-group asseri">
                            <button type="button" id="asserv" name="asserv" class="btn btn-primary">Proceed</button>
                        </div>
                        <!--assign st-->
                        <div class="servassin">
                        
                        </div>
                        <!--assign ed-->
                        <button type="submit" name="submi" id="submi" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- <button type="submit" name="submi" id="submi" class="btn btn-primary">Submit</button> -->
                </div>
            </section>
            <a id="enchkclk" data-toggle="modal" href="#enfbx"></a>
            </body>
            
<script>
    $(document).ready(function(){
        $('#asserv').click(function(){
            var appid = $('#apid').val();
            
            $.ajax({
                url: 'onlyserv.php',
                type: 'post',
                data:{appid:appid},
                beforeSend: function(){
                    $('.form-style .servassin').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                },
                success: function(resp){
                    $('.form-style .servassin').html(resp);
                }
            })
        })
    })
</script>

<!--submit popup validation st-->
<script>
    $(document).ready(function(){
        $('#submi').hide();
        /*$('#submi').click(function(){*/
            $('#finrentry').submit(function(e){
            e.preventDefault();
            let flag = 1;
            $('.rqd').each(function() {
                if ($.trim($(this).val()) == '') {

                    flag=0;
                    return false;

                }
               
            });
            if(flag==1){
                $('#enchkclk').trigger('click');
            }

            
        })
        $('#enyes_sub').click(function(){
            $('#finrentry').submit();
        })
        $('#enno_sub').click(function(){
            $('#timesclen').trigger('click');
        })
        $('#asserv').click(function(){
            $('#submi').show('slow');
        });
        
    })
</script>
<!--submit popup validation ed-->
</html>
<?php
}
else{
    header('location:http://www.goldquestglobal.in/login');
}
