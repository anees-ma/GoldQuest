<?php 
include 'header.php';
?>
<?php 
$nextva=$_POST['nextva'];
if($nextva == 'educ'){
    ?>
    <div class="form-style">
     <div class="form-title">Education Details</div>
 <form action="kl.php">
  <div class="form-group">
    <label for="iunme">Institute or University Name:</label>
    <input type="text" class="form-control" id="iunme">
  </div>
  <div class="form-group">
    <label for="yopas">Year of Passing:</label>
    <input type="text" class="form-control" id="yopas">
  </div>
  <div class="form-group">
    <label for="clgnme">College Name:</label>
    <input type="text" class="form-control" id="clgnme">
  </div>
  <div class="form-group">
    <label for="crsnme">Course Name:</label>
    <input type="text" class="form-control" id="crsnme">
  </div>
  <div class="form-group">
    <label for="prcmrs">Percentage of Marks:</label>
    <input type="text" class="form-control" id="prcmrs">
  </div>
  <button type="submit" onclick="cretapthr(this)"  data-exp="exper" class="btn btn-primary">Next</button>
</form>
</div>
    <?php
}
?>

<!--experience details under create application st-->
<script>
      function cretapthr(thre){
                var nextfi=$(thre).data('exp');
                $.ajax({
                    url: 'expcheck.php',
                    type: 'post',
                    data: {nextfi:nextfi},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--experience details under create application ed-->