<?php 
include 'header.php';
?>

<?php 
$nexteght=$_POST['nexteght'];
if($nexteght == 'crdvrif'){
    ?>
    <div class="form-style">
     <div class="form-title">Credit Check</div>
 <form action="kl.php">
  <div class="form-group">
    <label for="pan">PAN:</label>
    <input type="text" class="form-control" id="pan">
  </div>
  <div class="form-group">
    <label for="ctsr">CIBIL Transaction Score:</label>
    <input type="text" class="form-control" id="ctsr">
  </div>
  <div class="form-group">
    <label for="perlon">Personal Loan:</label>
    <input type="text" class="form-control" id="perlon">
  </div>
  <button type="submit" onclick="cretapfin(this)"  data-fin="final" class="btn btn-primary">Submit</button>
</form>
</div>
    <?php
}
?>
