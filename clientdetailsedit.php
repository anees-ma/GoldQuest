 <?php 
include 'header.php';
include 'config.php';
?>
<!--back button-->
<div style="text-align:left"><span id="backshpli" onclick="bckshl(this)" data-bck="cmsmgs">Back</span></div>
<?php

$editid=$_POST['editid'];
$adclsuc=$_POST['adclsuc'];
 $clientsql=mysqli_query($con,"select * from clent_details where client_id='$editid'");
    $clientres=mysqli_fetch_assoc($clientsql);
    $company_name=$clientres['company_name'];
    $client_uid=$clientres['client_uid'];
    $state=$clientres['state'];
    $seragstd=$clientres['dsagre'];
    $address=$clientres['address'];
    $mobile=$clientres['mobile'];
    $email=$clientres['email'];
    $email2=$clientres['email2'];
    $email3=$clientres['email3'];
    $email4=$clientres['email4'];
    $contact_person=$clientres['contact_person'];
     $role=$clientres['role'];
    $gst=$clientres['gst'];
    $client_id=$clientres['client_id'];
    $agrperi=$clientres['dsagreepero'];
    $tatdp=$clientres['tatd'];
    
    //selection of services st
    
    //service names st
     $servi_name=$clientres['service_name'];
     $servi_nameexp=explode(',',$servi_name);
     $servcnt=count($servi_nameexp)-1;
     
     $servi_price=$clientres['service_price'];
     $servi_priceexp=explode(',',$servi_price);
     //service names ed
     //selection of services ed
?>
  <div class="form-style">
      <?php 
     if($adclsuc != NULL){
         ?>
        <div class="alert alert-success alert-dismissible">
        <button id="pusurll" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Client Details Updated Successfully.
        </div>
        <?php
     }
     ?>
     <div class="form-title">Edit Application</div>
 <form action="editclientdetails.php" method="post" enctype="multipart/form-data" style="text-align:left" id="adcl_submi">
  <div class="form-group">
    <label for="cpmne">Company Name: <span style="color:red">*</span></label>
    <input type="text" name="cpmne" value="<?php echo $company_name;?>" class="form-control" id="cpmne">
  </div>
  <div class="form-group">
    <label for="cmpuid">GQG Reference ID: <span style="color:red">*</span></label>
    <input type="text" class="form-control" name="cmpuid" id="cmpuid" value="<?php echo $client_uid;?>">
  </div>
  <div class="form-group">
    <label for="address">Company Address: <span style="color:red">*</span></label>
    <input type="text" name="address" value="<?php echo $address;?>" class="form-control" id="address">
  </div>
  <div class="form-group">
    <label for="state">State: <span style="color:red">*</span></label>
    <input onkeypress="return /[a-z]/i.test(event.key)" type="text" class="form-control" name="state" id="state" value="<?php echo $state;?>">
  </div>
  <div class="form-group">
    <label for="mobile">Mobile: <span style="color:red">*</span></label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" name="mobile" value="<?php echo $mobile;?>" class="form-control" id="mobile">
  </div>
  <div class="form-group">
    <label for="email">Email: <span style="color:red">*</span></label>
    <input type="email" name="email" value="<?php echo $email;?>" class="form-control" id="email">
  </div>
    <div class="form-group">
    <label for="email2">Email 2: <span style="color:red">*</span></label>
    <input type="email" name="email2" value="<?php echo $email2;?>" class="form-control" id="email2">
  </div>
    <div class="form-group">
    <label for="email3">Email 3: <span style="color:red">*</span></label>
    <input type="email" name="email3" value="<?php echo $email3;?>" class="form-control" id="email3">
  </div>
    <div class="form-group">
    <label for="email4">Email 4: <span style="color:red">*</span></label>
    <input type="email" name="email4" value="<?php echo $email4;?>" class="form-control" id="email4">
  </div>
  <div class="form-group">
    <label for="contact_person">Contact Person:</label>
    <input onkeypress="return /[a-z]/i.test(event.key)" type="text" name="contact_person"  value="<?php echo $contact_person ;?>" class="form-control" id="contact_person">
  </div>
  <div class="form-group">
    <label for="role">Role:</label>
    <input type="text" name="role"  value="<?php echo $role ;?>" class="form-control" id="role">
  </div>
  <div class="form-group">
    <label for="gst">GST NO:</label>
    <input type="text" name="gst" value="<?php echo $gst ;?>" class="form-control" id="gst">
  </div>
  <div class="form-group">
    <label for="tatd">TAT:</label>
    <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="tatd" id="tatd" value="<?php echo $tatdp;?>">
  </div>
  <div class="form-group">
    <label for="dsagr">Date of Service Agreement: <span style="color:red">*</span></label>
    <input type="date" class="form-control" name="dsagr" id="dsagr" max="9999-12-31" value="<?php echo $seragstd;?>">
  </div>
  <div class="form-group">
    <label for="agrper">Agreement Period: <span style="color:red">*</span></label><br>
    <select id="agrper" name="agrper">
        <option>-Select-</option>
        <option>Unless Terminated</option>
        <option>1 Year</option>
        <option>2 Years</option>
        <option>3 Years</option>
    </select>
    <!--<input type="text" class="form-control" name="agrper" id="agrper">-->
  </div>
  <div class="form-group">
    <label>Upload Agreement:</label><br>
    <input type="file" class="form-control" name="agrbrw" id="agrbrw">
    <input type="hidden" name="agfilcnt" id="agfilcnt" value="">
  </div>
  <div class="form-group">
    <lable>Selected Services:</lable><br>
    <?php 
    $i=0;
    for($i=0; $i<$servcnt; $i++){
        $divexc=explode('#',$servi_nameexp[$i]);
        ?>
        <input type="text" name="servck" id="servck" value="<?php echo strtoupper($servi_nameexp[$i]);?>" style="width:45%" disabled>&nbsp;&nbsp;
        <input type="text" class="servvalk" name="servval" id="servval" onkeyup="pricup(this)" data-digrt="<?php echo $divexc[1];?>" data-clinuu="<?php echo $client_uid;?>" data-prupp="<?php echo $servi_nameexp[$i];?>" value="<?php echo $servi_priceexp[$i];?>" style="text-align:center">&nbsp;&nbsp;<span class="prsl<?php echo $divexc[1];?>"></span><br>
        <?php
    }
    ?>
  </div>
  <!--add extra services st-->
  
    <div class="form-group">
        <lable>Add Extra Services:</lable>
      <table>
          <th>Service Name</th>
          <th>Price</th>
      <?php 
      $chk=mysqli_query($con,"select * from serv_list");
      $i=0;
      while($chkres=mysqli_fetch_assoc($chk)){
          $subserv=$chkres['subservice_name'];
          $subservid=$chkres['id'];
          $subservexp=explode(',',$subserv);
          $subservcnt=count($subservexp)-1;
          
          //selection of display name
          $disqry=mysqli_query($con,"select * from display_names where id='$subservid'");
          $disqryres=mysqli_fetch_assoc($disqry);
          $dis_sub=$disqryres['subservice_name'];
          $dis_subexp=explode(',',$dis_sub);
          ?>
          <tr>
              <td><span onclick="toh(this)" data-togmn="<?php echo $i;?>" class="serv_but">+&nbsp;<?php echo strtoupper($chkres['service_name']);?></span><br>
              <?php 
              $k=0;
              for($k=0; $k < $subservcnt; $k++){
                  //selection service is existed or not
                  $excomb=$subservid.'#'.strtolower($subservexp[$k]);
                  $existu=mysqli_query($con,"select * from clent_details where service_name like '%$excomb%' && client_uid='$client_uid'");
                  $existcnt=mysqli_num_rows($existu);
                  if($existcnt == 0){
                  ?>
                  <tr>
                      <td><input type="checkbox" name="services[]" value="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" id="<?php echo strtolower($subservexp[$k]);?>">&nbsp;<?php echo strtoupper($subservexp[$k]);?></td>
                      <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td>
                  </tr>
                  <?php
                  }
              }
              ?>
              </td>
          </tr>
          <?php
                 $i++;
      }
      ?>
      
      
      </table>
  </div>
  <!--add extra services ed-->
  <input type="hidden" name="aclid" value="<?php echo $client_id ;?>">
</form>
<button class="btn btn-primary" id="add_client">Submit</button>
</div>

<!--go back page st-->
<script>
    function bckshl(fg){
        var funv1=$(fg).data('bck');
        $.ajax({
            url: 'dataforms.php',
            type: 'post',
            data:{funv1:funv1},
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

<!--price update st-->
<script>
$(document).ready(function(){
    $('.servvalk').click(function(){
        $('.clstic').css('visibility','hidden');
    })
})
function pricup(prdups){
    var a = $(prdups).data('prupp');
    var b = $(prdups).val();
    var c = $(prdups).data('clinuu');
    var d = $(prdups).data('digrt');
    $.ajax({
            url: 'priceupp.php',
            type: 'post',
            data:{a:a,b:b,c:c},
            beforeSend: function(){
                $('.prsl'+d).html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:60px">');
            },
            success: function(resp){
                $('.prsl'+d).html(resp);
            }
        })
}
</script>
<!--price update ed-->

<!--validating client data st-->
<script>
    $(document).ready(function(){
        $('.bx_1').hide();
    $('#add_client').click(function(){
        var vcomp_nme=$('#cpmne').val();
        var vcref_id=$('#cmpuid').val();
        var vaddr_v=$('#address').val();
        var vstate=$('#state').val();
        var vmobile=$('#mobile').val();
        var vemail=$('#email').val();
        var vdatagst=$('#dsagr').val();
        var vagperi=$('#agrper').val();
        
    
        if(/(.+)@(.+){2,}\.(.+){2,}/.test(vemail)){
        
        if(vcomp_nme != '' && vcref_id != '' && vaddr_v != '' && vstate != '' && vmobile != '' && vemail != '' && vagperi != '' && vdatagst != ''){
            /*$('.bx_1').show(1000);*/
            $('#editchkclk').trigger('click');
        }
        else{
            alert('Please fill all the details');
        }
        }
        else{
            alert('Please enter valid email id');
        }
        })
        $('#yes_sub2').click(function(){
            $('#adcl_submi').submit();
        })
        
        $('#no_sub2').click(function(){
            /*$('.bx_1').hide(1000);*/
            $('#timescl2').trigger('click');
        })
        
    })
</script>
<!--validating client data ed-->
<script>
    $(document).ready(function(){
        var agre_period='<?php echo $agrperi;?>';
        $('#pusurll').click(function(){
            window.history.pushState("object or string", "Title", "/#");
        })
        //selection of agrement period
        $('#agrper option:selected').text(agre_period);
        
        //agreement check
        $('#agrbrw').change(function(){
            var filcntt=$(this)[0].files;
            $('#agfilcnt').val(filcntt.length);
        })
    })
</script>