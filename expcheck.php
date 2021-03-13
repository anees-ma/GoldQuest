<?php 
include 'header.php';
?>

<?php 
$nextfi=$_POST['nextfi'];
if($nextfi == 'exper'){
    ?>
    <div class="form-style">
     <div class="form-title">Experience Details</div>
 <form action="kl.php">
  <div class="form-group">
    <label for="cmpnme">Company Name:</label>
    <input type="text" class="form-control" id="cmpnme">
  </div>
  <div class="form-group">
    <label for="desg">Designatiom:</label>
    <input type="text" class="form-control" id="desg">
  </div>
  <div class="form-group">
    <label for="doj">Date of Joining:</label>
    <input type="date" class="form-control" id="doj">
  </div>
  <div class="form-group">
    <label for="dol">Date of Leaving:</label>
    <input type="date" class="form-control" id="dol">
  </div>
  <div class="form-group">
    <label for="salry">Salary:</label>
    <input type="text" class="form-control" id="salry">
  </div>
  <div class="form-group">
    <label for="achve">Achievement:</label>
    <input type="text" class="form-control" id="achve">
  </div>
  <button type="submit" onclick="cretapfor(this)"  data-crim="crimi" class="btn btn-primary">Next</button>
</form>
</div>
    <?php
}
?>

<!--Criminal Check details under create application st-->
<script>
      function cretapfor(forr){
                var nextcrm=$(forr).data('crim');
                $.ajax({
                    url: 'crimcheck.php',
                    type: 'post',
                    data: {nextcrm:nextcrm},
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