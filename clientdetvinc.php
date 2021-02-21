<?php 
include 'header.php';
include 'config.php';
?>
<!--back button-->
<div style="text-align:left"><span id="backshpli" onclick="bckshl(this)" data-bck="blkusrs">Back</span></div>

<?php
$client_id=$_POST['client_id'];
$shpvqr=mysqli_query($con,"select * from clent_details where client_id='$client_id'");
$shpvres=mysqli_fetch_assoc($shpvqr);
$agr_per=$shpvres['dsagreepero'];
if($agr_per != 'Unless Terminated'){
$yrs=explode(' ',$agr_per);
$yrs2=$yrs[0];
$agr_st=$shpvres['dsagre'];
$agr_stexp=explode('-',$agr_st);
$agr_stexp2=$agr_stexp[0]+$yrs2;
$finlk2=$agr_stexp2.'-'.$agr_stexp[1].'-'.$agr_stexp[2];
$finlk=date("d-m-Y", strtotime($finlk2));
}
else{
$finlk='Unless Terminated';    
}

?>
<!--shop complete view-->
<div class="shop_bx">
    <div class="shp_tile"><?php echo strtoupper($shpvres['company_name']);?></div>

    <div class="shp_tblbx">
    <table class="shp_tbl">
        <tr class="shp_tr">
            <td class="shp_tdt">Client Reference ID</td>
            <td class="shp_tda"><?php echo $shpvres['client_uid'];?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Address</td>
            <td class="shp_tda"><?php echo $shpvres['address'];?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Email</td>
            <td class="shp_tda"><?php echo $shpvres['email'];?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Mobile</td>
            <td class="shp_tda"><?php echo $shpvres['mobile'];?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Contact Person</td>
            <td class="shp_tda"><?php echo ucfirst($shpvres['contact_person']);?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Role</td>
            <td class="shp_tda"><?php echo $shpvres['role'];?></td>
        </tr>
         <tr class="shp_tr">
            <td class="shp_tdt">GST No</td>
            <td class="shp_tda"><?php echo $shpvres['gst'];?></td>
        </tr>
         <tr class="shp_tr">
            <td class="shp_tdt">Date of Service Agreement</td>
            <td class="shp_tda"><?php echo date("d-m-Y", strtotime($shpvres['dsagre']));?></td>
        </tr>
         <tr class="shp_tr">
            <td class="shp_tdt">Date of Service Agreement Expiry</td>
            <td class="shp_tda"><?php echo $finlk;?></td>
        </tr>
         <tr class="shp_tr">
            <td class="shp_tdt">Agreement Period</td>
            <td class="shp_tda"><?php echo $shpvres['dsagreepero'];?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Status</td>
            <td class="shp_tda"><?php echo $shpvres['status'];?></td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Service Agreement</td>
            <td class="shp_tda"><a href="https://admin.goldquestglobal.in/<?php echo $shpvres['agrefile'];?>" class="docstyl" target="_blank">Document</a>
            </td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Selected Services</td>
            <td class="shp_tda">
                <?php
                 $ser_cn=$shpvres['service_name'];
                        $ser_exp=explode(',',$ser_cn);
                        $ser_cncnt=count($ser_exp)-1;
                        
                        $ser_prc=$shpvres['service_price'];
                        $ser_prexp=explode(',',$ser_prc);
                        
                        
                        $j=0;
                        for($j=0; $j < $ser_cncnt; $j++){
                            //get major service name st
                            $majrservsexp=explode('#',$ser_exp[$j]);
                            $majservnme=$majrservsexp[0];
                            $majservnme2=$majrservsexp[1];
                            
                            $mjqr=mysqli_query($con,"select * from serv_list where id='$majservnme'");
                            $mjres=mysqli_fetch_assoc($mjqr);
                            $mjjserv=$mjres['service_name'];
                            //get major service name ed
                            ?>
                            <div class="majserv"><?php echo strtoupper($mjjserv);?></div><span class="pricmk">&nbsp;-></span>&nbsp;<span><?php echo strtoupper($majservnme2);?></span><span class="pricmk">&nbsp;-></span>&nbsp;<span><?php echo $ser_prexp[$j];?></span><br>
                            <?php
                        }
                        ?>
                
            </td>
        </tr>
        <tr class="shp_tr">
            <td class="shp_tdt">Total Price</td>
            <td class="shp_tda">
                <?php 
                $totp=substr($shpvres['service_price'], 0,-1);
                $totpexp=explode(',',$totp);
                echo $totbpric=array_sum($totpexp);
                ?>
            </td>
        </tr>
    </table>
    </div>
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

