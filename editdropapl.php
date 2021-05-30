<?php 
include_once 'config.php';
include_once 'functions.php';

$dropid=$_POST['dropid'];
$droplogid=$_POST['droplogid'];

$clientsql=mysqli_query($con,"select * from clent_details where client_id='$droplogid'");
$clientres=mysqli_fetch_assoc($clientsql);
$company_name=$clientres['company_name'];
$client_id=$clientres['client_id'];

//service names st
$servi_name=substr($clientres['service_name'], 0, -1);
$servi_nameexp=explode(',',$servi_name);

$servi_nameexp=array_map("getClientServicelistSelected",$servi_nameexp);

$servcnt=count($servi_nameexp)-1;
$servi_price=$clientres['service_price'];
$servi_priceexp=explode(',',$servi_price);
//service names ed
//selection of services ed
 
$aplsel2=mysqli_query($con,"select * from applications where ref_id='$dropid'");
$aplsel2res=mysqli_fetch_assoc($aplsel2);
$apemp_nme=$aplsel2res['emp_name'];
 
$servi_nameexp_ecdb = json_decode($aplsel2res['services']);
$servi_nameexp_ecdb=array_map("getClientServicelistSelected",$servi_nameexp_ecdb);

?>
    <!--back button-->
<div style="text-align:left"><span id="backshpli" onclick="bckshl(this)" data-bck="apmng">Back</span></div>

    <!-- <div class="form-style"> -->
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
     <div class="form-title page-title">Edit Application</div>
 <form action="editcreateapp.php" method="post" enctype="multipart/form-data" id="creatappsubf">
  <div class="container" style="margin-top: 25px;">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-style" style="width: 90%">
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
        </div>
      </div>

      <div class="col-lg-6">

        <div class="form-group" style="padding:20px;">
                    <table style="border: 1px solid grey; width: 100%;" class="service-table">
                      <th style="padding: 10px; background-color: #3e76a5; color: white; ">Service Names</th>
                      <!-- <th>Price</th> -->
                  <?php 
                  $chk=mysqli_query($con,"select * from serv_list");
                  $i=0;
                  $serviceListAll = array();
                  while($chkres=mysqli_fetch_assoc($chk)){
                      $subserv=substr($chkres['subservice_name'], 0, -1);
                      $subservid=$chkres['id'];
                      $subservexp=explode(',',$subserv);
                      $serviceListAll = array_merge($serviceListAll,$subservexp);

                      $subservcnt = ($subservid==43)?1:count($subservexp);
                      
                      //selection of display name
                      $disqry=mysqli_query($con,"select * from display_names where id='$subservid'");
                      $disqryres=mysqli_fetch_assoc($disqry);
                      $dis_sub=$disqryres['subservice_name'];
                      $dis_subexp=explode(',',$dis_sub);
                      ?>
                      <!-- <tr> -->
                          <!-- <td><span onclick="toh(this)" data-togmn="<?php echo $i;?>" class="serv_but">+&nbsp;<?php echo strtoupper($chkres['service_name']);?></span><br> #CH Disabled by Anees On Feb 26, 2021-->
                          <?php 
                          $k=0;

                          for($k=0; $k < $subservcnt; $k++){
                            if(in_array($subservexp[$k],$servi_nameexp)){
                              ?>
                              <tr>
                                  <td style="text-align:left">
                                    <?php
                                      $checked = (in_array($subservexp[$k],$servi_nameexp_ecdb))?'checked':'';
                                    ?>
                                    <input type="checkbox" name="services[]" value="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" id="<?php echo strtolower($subservexp[$k]);?>" <?php echo $checked; ?>>&nbsp;<label for="<?php echo strtolower($subservexp[$k]);?>"><?php echo strtoupper(getServiceDisplayName($subservexp[$k],$con));?></label>
                                    <?php
                                  if($subservexp[$k]=='post-graduation'){ echo ': ';?>
                                    <select id="pg-dropdown" name="pg_stream" onchange="pgUgChange(this.id)"> 
                                        <option></option>
                                        <option value="MD">MD</option>
                                        <option value="Mtech">Mtech</option>
                                        <option value="Mcom">Mcom</option>
                                        <option value="MCA">MCA</option>
                                        <option value="MBA">MBA</option>
                                        <option value="MSC">MSC</option>
                                        <option value="MA">MA</option>
                                    </select>
                                <?php  }elseif($subservexp[$k]=='graduation'){ echo ': ';?>
                                    <select id="ug-dropdown" name="ug_stream" onchange="pgUgChange(this.id)"> 
                                        <option></option>
                                        <option value="MBBS">MBBS</option>
                                        <option value="Btech">Btech</option>
                                        <option value="Bcom">Bcom</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                        <option value="BSC">BSC</option>
                                        <option value="BA">BA</option>
                                    </select>
                             <?php     }

                                  ?></td>
                                  <!-- <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td> #CH --Replaced by below code by Anees M A on Feb 26, 2021-->

                                  <!--Added by Anees M A on Feb 26, 2021--->
                                  <!-- <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo str_replace("-","_",strtolower($subservexp[$k]));?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td> -->
                              </tr>
                              <?php
                          }
                        }
                          ?>
                          <!-- </td> #CH Disabled by Anees On Feb 26, 2021-->
                      <!-- </tr> -->
                      <?php
                             $i++;
                  }
                  
                  ?>
                  
                  
                  </table>
                </div>


        <input type="hidden" id="clientids" name="clientids" value="<?php echo $client_id?>">
        <input type="hidden" id="dropapldi" name="dropapldi" value="<?php echo $dropid?>">
        <input type="hidden" id="filelent" name="filelent" value="">

      </div>
      <div class="col-lg-12">
        <button class="btn btn-primary" name="submit" id="creapbid" style="width: 20%; margin-left: 30%; margin-right: 30%">Submit</button>
      </div>
    </div>
  </div>
</form>

<!-- </div> -->

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
