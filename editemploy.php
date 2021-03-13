<?php 
include 'config.php';
include 'header.php';
$ediemido=$_POST['ediemido'];
//selection of employee
$qry=mysqli_query($con,"select * from employee_login where id='$ediemido'");
$qryres=mysqli_fetch_assoc($qry);
?>
<div class="form-title">Update employee</div>
    <div class="form-style">
 <form action="editemployup.php" method="post" enctype="multipart/form-data" style="text-align:left" id="add_empact">
  <div class="form-group">
    <label for="empidd">Employee ID: <span style="color:red">*</span></label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" id="empidd" name="empidd" value="<?php echo $qryres['emp_id'];?>">
  </div>
  <div class="form-group">
    <label for="empnmee">Employe Name: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="empnmee" name="empnmee" value="<?php echo $qryres['emp_name'];?>">
  </div>
  <div class="form-group">
    <label for="empmobb">Employee Mobile: <span style="color:red">*</span></label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" id="empmobb" name="empmobb" value="<?php echo $qryres['emp_mobile'];?>">
  </div>
  <div class="form-group">
    <label for="eemaill">Email: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="eemaill" name="eemaill" value="<?php echo $qryres['email'];?>">
  </div>
  <div class="form-group">
    <label for="passd">Password: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="passd" name="passd" value="<?php echo $qryres['pass_wrd'];?>">
  </div>
  <div class="form-group">
    <label for="emprolee">Role: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="emprolee" name="emprolee" value="<?php echo $qryres['emp_role'];?>">
  </div>
  <input type="hidden" name="emedidd" id="emedidd" value="<?php echo $ediemido;?>">
</form>
<button class="btn btn-primary" id="add_empsub">Submit</button>
</div>


<!--validating add employee st-->
<script>
    $(document).ready(function(){
        $('.bx_1').hide();
    $('#add_empsub').click(function(){
        var vemp_nme=$('#empnmee').val();
        var vemp_id=$('#empidd').val();
        var vmob_emp=$('#empmobb').val();
        var vemail_emp=$('#eemaill').val();
        var vemp_pas=$('#passd').val();
        var vemp_role=$('#emprolee').val();
        
    
        if(/(.+)@(.+){2,}\.(.+){2,}/.test(vemail_emp)){
        
        if(vemp_nme != '' && vemp_id != '' && vmob_emp != '' && vemail_emp != '' && vemp_pas != '' && vemp_role != ''){
            $('#empchkclk').trigger('click');
        }
        else{
            alert('Please fill all the details');
        }
        }
        else{
            alert('Please enter valid email id');
        }
        })
        $('#empyes_sub').click(function(){
            $('#add_empact').submit();
            
        })
        
        $('#empno_sub').click(function(){
            $('#timesclemp').trigger('click');
        })
        
    })
</script>
<!--validating add employee ed-->