<?php 
include 'config.php';

$dropid=$_POST['dropid'];
$droplogid=$_POST['droplogid'];

    $clientsql=mysqli_query($con,"select * from clent_details where client_id='$droplogid'");
    $clientres=mysqli_fetch_assoc($clientsql);
    $company_name=$clientres['company_name'];
    $client_id=$clientres['client_id'];
    
    //selection of services st
    
    //service names st
     $servi_name=$clientres['service_name'];
     $servi_nameexp=explode(',',$servi_name);
     $servcnt=count($servi_nameexp)-1;
     
     $servi_price=$clientres['service_price'];
     $servi_priceexp=explode(',',$servi_price);
     //service names ed
     //selection of services ed
     
     $aplsel2=mysqli_query($con,"select * from applications where ref_id='$dropid'");
     $aplsel2res=mysqli_fetch_assoc($aplsel2);
     $apemp_nme=$aplsel2res['emp_name'];
    ?>
    <!--back button-->
<div style="text-align:left"><span id="backshpli" onclick="bckshl(this)" data-bck="apmng">Back</span></div>

    <div class="form-style">
        <?php 
        if($adclsucc != NULL){
            ?>
        <div class="alert alert-success alert-dismissible">
        <button id="pusurl" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Application Done Successfully.
        </div>
            <?php
        }
        ?>
     <div class="form-title">Create Application (EDIT)</div>
 <form action="editcreateapp.php" method="post" enctype="multipart/form-data" id="creatappsubf">
  <div class="form-group">
    <label for="cpmne">Company Name:</label>
    <input type="text" value="<?php echo strtoupper($company_name);?>" class="form-control" id="cpmne" disabled>
  </div>
  <div class="form-group">
    <label for="empnme">Employee Name: (Full Name as per Govt ID Proof) <span style="color:red">*</span></label>
    <input onkeypress="return /[a-z]/i.test(event.key)" type="text" class="form-control" id="empnme" name="empnme" value="<?php echo $apemp_nme;?>">
  </div>
  <div class="form-group">
    <label>Attach Documents: (Note:Please attach only PDF and IMAGE files)</label><br>
    <input type="file" class="form-control" name="mudcs[]" id="mudcs" multiple><br>
    <!--<div id="pstPHfri" style="width:100%"></div>--> 
  </div>
    <div class="form-group">
    <label for="rmrkad">Remarks: (optional)</label>
    <input type="text" class="form-control" id="rmrkad" name="rmrkad" value="<?php echo $aplsel2res['apl_rmrk'];?>">
  </div>
 <!-- <div class="form-group">
    <label for="empid">Employee Id:</label>
    <input type="text" class="form-control" id="empid">
  </div>
  <div class="form-group">
    <label for="empmob">Employee Mobile</label>
    <input type="text" class="form-control" id="empmob">
  </div>
  <div class="form-group">
    <label for="eemail">Email:</label>
    <input type="text" class="form-control" id="eemail">
  </div>
  <div class="form-group">
    <label for="desg">Designation:</label>
    <input type="text" class="form-control" id="desg">
  </div>-->
  <input type="hidden" id="clientids" name="clientids" value="<?php echo $client_id?>">
  <input type="hidden" id="dropapldi" name="dropapldi" value="<?php echo $dropid?>">
  <input type="hidden" id="filelent" name="filelent" value="">
</form>
<button class="btn btn-primary" name="submit" id="creapbid">Submit</button>
</div>

<!--validation st-->
<script>
    $(document).ready(function(){
        $('#creapbid').click(function(){
            var empl_name=$('#empnme').val();
            var file_len=$('#mudcs').val();
            if(empl_name != ''){
                $('#chkclk').trigger('click');
            }
            else{
                alert('Please fill all required fields');
            }
        })
        $('#yes_sub').click(function(){
            $('#creatappsubf').submit();
        })
        
        $('#no_sub').click(function(){
            /*$('.bx_1').hide(1000);*/
            $('#timescl').trigger('click');
        })
    })
</script>
<!--validation ed-->

<!--go back page st-->
<script>
    function bckshl(fg){
        var funv1='cretapl';
        var log_id='<?php echo $droplogid;?>';
        $.ajax({
            url: 'dataformscustomer.php',
            type: 'post',
            data:{funv1:funv1,log_id:log_id},
            beforeSend: function(){
                $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
            },
            success: function(resp){
                $('.right .right_con').html(resp);
            }
        })
    }
</script>
<!--go back page ed-->

<!--get the count of uploaded files-->
<script>
  $(document).ready(function(){
      $('#mudcs').change(function(){
          var filesl = $(this)[0].files;
          $('#filelent').val(filesl.length);
      })
  })  
</script>
<!--get the count of uploaded files ed-->
