<?php 
include 'header.php';
?>

<?php 
$nextcrm=$_POST['nextcrm'];
if($nextcrm == 'crimi'){
    ?>
    <div class="form-style">
     <div class="form-title">Criminal Check</div>
 <form action="kl.php">
  <div class="form-group">
    <label for="candnme">Candidate Name:</label>
    <input type="text" class="form-control" id="candnme">
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth:</label>
    <input type="date" class="form-control" id="dob">
  </div>
  <div class="form-group">
    <label for="ftnme">Father Name:</label>
    <input type="text" class="form-control" id="ftnme">
  </div>
  <div class="form-group">
    <label for="mtnme">Mother Name:</label>
    <input type="text" class="form-control" id="mtnme">
  </div>
  <div class="form-group">
    <label for="addr">Address:</label>
    <input type="text" class="form-control" id="addr">
  </div>
  <div class="form-group">
    <label for="areaa">Area:</label>
    <input type="text" class="form-control" id="areaa">
  </div>
    <div class="form-group">
    <label for="pinc">Pincode:</label>
    <input type="text" class="form-control" id="pinc">
  </div>
    <div class="form-group">
    <label for="ctyt">City/Town:</label>
    <input type="text" class="form-control" id="ctyt">
  </div>
  <button type="submit" onclick="cretapfiv(this)"  data-adrc="adrchk" class="btn btn-primary">Next</button>
</form>
</div>
    <?php
}
?>

<!--Criminal Check details under create application st-->
<script>
      function cretapfiv(fiv){
                var nextsi=$(fiv).data('adrc');
                $.ajax({
                    url: 'addrcheck.php',
                    type: 'post',
                    data: {nextsi:nextsi},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--Criminal Check details under create application ed-->