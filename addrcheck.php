<?php 
include 'header.php';
?>

<?php 
$nextsi=$_POST['nextsi'];
if($nextsi == 'adrchk'){
    ?>
    <div class="form-style">
     <div class="form-title">Address Check</div>
 <form action="kl.php">
  <div class="form-group">
    <label for="profst">Period of Stay:</label>
    <input type="text" class="form-control" id="profst">
  </div>
  <button type="submit" onclick="cretapsix(this)"  data-crdv="crdvrif" class="btn btn-primary">Next</button>
</form>
</div>
    <?php
}
?>

<!--Criminal Check details under create application st-->
<script>
      function cretapsix(six){
                var nexteght=$(six).data('crdv');
                $.ajax({
                    url: 'crditcheck.php',
                    type: 'post',
                    data: {nexteght:nexteght},
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