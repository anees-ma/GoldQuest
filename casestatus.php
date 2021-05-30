<?php 
include_once 'config.php';
$case_stau2=$_POST['case_stau'];
$case_stau=strtolower($case_stau2);
if($case_stau == 'completed'){
    $cstvar="status = 'completed'";
}
else{
    $cstvar="status != 'completed'";
}
?>
<div class="task_tabl">
    <table class="dataTable-gn tbl_data tbl_data2">
        <thead>
            <tr>
                <th>SL</th>
                <th>Company Name</th>
                <th>Client Code</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $adaps=mysqli_query($con,"select * from clent_details order by id desc");
            $v=1;
            while($adapsres=mysqli_fetch_assoc($adaps)){
                $cladid=$adapsres['client_id'];
                $clserv=$adapsres['service_name'];
                
                //selection of applications
                $adaps2=mysqli_query($con,"select * from applications where client_id='$cladid' && $cstvar");
                $adaps2res=$adapsres=mysqli_fetch_assoc($adaps2);
                $clrefid=$adaps2res['client_uid'];
                $clcomnme=$adaps2res['company_name'];
                $adaps2cnt=mysqli_num_rows($adaps2);
                
            
            if($adaps2cnt > 0){
                    ?>
                    <tr>
                        <td><input type="checkbox" value="<?php echo $adapsres['client_uid']; ?>" class="check-delete"><?php echo $v;?></td>
                        <td><span title="Click Here to Access All Applications" style="cursor:pointer" onclick="appi(this)" data-refid="<?php echo $clrefid;?>"><?php echo strtoupper($clcomnme);?></span></td>
                        <td><?php echo $clrefid;?>&nbsp;<span class="aprcn"><?php echo $adaps2cnt;?></span>:&nbsp;Received</td>
                    </tr>
                    <?php
                    $v++;
                }
                
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $('.dataTable-gn').DataTable({
        "dom": 'lfrtp',
        "bSort" : false,
      });
</script>