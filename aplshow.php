<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        table,td,tr{
            border: 1px solid grey;
        }
        table{
            width: 100%;
        }
    </style>
</head>
<?php 
include 'header.php';
include 'config.php';
?>
<!--back button-->
<div style="text-align:left"><span id="backshpli" onclick="bckshl(this)" data-bck="apmng">Back</span></div>

<?php 
$cliuid=$_POST['cliuid'];
$cgwtt_sta2=$_POST['cgwtt_sta'];
$cgwtt_sta=strtolower($cgwtt_sta2);
if($cgwtt_sta == 'completed'){
    $cstvari="status = 'completed'";
}
else{
    $cstvari="status != 'completed'";
}
?>
<div class="task_tabl">
                <table class="tbl_data">
                    <th>Application ID</th>
                    <th>GQG Reference ID</th>
                    <th>Master Tracker</th>
                    <th>Employee Name</th>
                    <th style="padding-right:50px">Date and Time</th>
                    <?php 
                    $seserv=mysqli_query($con,"select * from clent_details where client_uid='$cliuid' order by id DESC");
                    $seservres=mysqli_fetch_assoc($seserv);
                    $serffnme=$seservres['service_name'];
                    $mobil=$seservres['mobile'];
                    $seservexp=explode(',',$serffnme);
                    $servtcnt=count($seservexp)-1;
                    $d=0;
                    for($d=0; $d < $servtcnt; $d++){
                        $servhas=explode('#',$seservexp[$d]);
                        $serfnnme=$servhas[1];
                        ?>
                        <th class="servclr"><?php echo strtoupper($serfnnme);?></th>
                        <?php
                    }
                    ?>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Prepare Report</th>
                    <th>Action</th>
<?php
$qry=mysqli_query($con,"select * from applications where client_uid='$cliuid' && $cstvari order by id DESC");
while($qryres=mysqli_fetch_assoc($qry)){
                        $appic_id=$qryres['ref_id'];
                        $appicqry=mysqli_query($con,"select * from applic_entry where appl_id='$appic_id'");
                        $appicqryres=mysqli_fetch_assoc($appicqry);
                        $over_all_sta=$appicqryres['over_status'];
                        $cand_ref_id=$appicqryres['cand_ref_id'];
    ?>
    <tr>
        <td><?php echo $qryres['ref_id'];?></td>
        <td><?php echo $cand_ref_id;?></td>
        <td><a href="https://admin.goldquestglobal.in/masterchecker.php?ref_id=<?php echo $qryres['ref_id'];?>" target="_blank" class="startmstr">START</a></td>
        <td><?php echo strtoupper($qryres['emp_name']);?></td>
        <td><span><?php echo $qryres['date'].' '.date("g:i a",strtotime($qryres['time']))?></span></td>
        <?php 
                            $d=0;
                            for($d=0; $d < $servtcnt; $d++){
                            $servhas=explode('#',$seservexp[$d]);
                            $serfnnme=$servhas[1];
                            $serund=explode('-',$serfnnme);
                            $serfnnme=implode('_',$serund);
                            ?>
                            <td><span class="crrsty" id="<?php echo $qryres['ref_id'].$serfnnme;?>"><?php echo strtoupper($qryres[$serfnnme]);?></span><br>
                            <!--<select data-uidd="<?php echo $qryres['ref_id'];?>" data-sernm="<?php echo $serfnnme;?>" class="progss propup">
                                <option value="-Select-">-Select-</option>
                                <option value="wip">WIP</option>
                                <option value="insuff">INSUFF</option>
                                <option value="completed">Completed</option>
                                </select>-->
                                </td>
                            <?php
                            }
                            ?>
                            <td class="doctd">
                                <a href="docsdown.php?rfidd=<?php echo $qryres['ref_id'];?>" target="_blank"><button class="btn btn-sm btn-warning">DOCS VIEW</button></a>
                            </td>
                            <td><span class="hy<?php echo $qryres['ref_id'];?> crrsty"><?php echo strtoupper($over_all_sta);?></span><br>
                            <!--<select class="reprt" data-cuidd="<?php echo $qryres['ref_id'];?>">
                                <option value="-select-">-select-</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>-->
                            </td>
                            <td>
                                <?php 
                                if($over_all_sta == 'completed'){
                                    ?>
                                    <a href="pdf/rpt.php?reff_id=<?php echo $appic_id;?>" target="_blank" class="docstyl">Final Report</a>
                                    <?php
                                }
                                else{
                                    echo 'NOT READY';
                                }
                                ?>
                                <!--<span id="bhv"></span>-->
                                <!--<span class="dlrpt" data-rptapid="<?php echo $qryres['ref_id'];?>">Download Report</span>-->
                                <!--<form action="reportbtadmn.php" method="post" enctype="multipart/form-data">
                                <input type="file" class="form-control" name="reportd" capture style="display:none" id="<?php echo $qryres['ref_id'];?>"><img onclick="getfi(this)" data-getref="<?php echo $qryres['ref_id'];?>" class="adclupicn" src="images/upload.png">
                                <input type="hidden" name="mobil" id="mobil" value="<?php echo $mobil;?>">
                                <input type="hidden" name="rtrefid" id="rtrefid" value="<?php echo $qryres['ref_id'];?>">
                                <input class="rptsub" type="submit" name="suB" id="sub<?php echo $qryres['ref_id'];?>" value="Submit">
                                </form>-->    
                            </td>
                               <td><a href="delrefid.php?ia=<?php echo $appic_id;?>" target="_blank"><button class="btn btn-danger">Delete</button></a></td>
                            </tr>
                            <?
    
}
?>
</table>
</div>

<!--report upload script st-->
<script>
    function getfi(rfids){
        var rf_ids=$(rfids).data('getref');
        $('#'+rf_ids).trigger('click');
        $('#sub'+rf_ids).css({'background-color':'green','color':'white'});
    }
</script>
<!--report upload script ed-->
<script>
/*    $(document).ready(function(){
        $('.adclupicn').click(function(){
            $('#reportd').trigger('click');
            var fil=$('#reportd').val();*/
          /*  $.ajax({
            url: 'reportbtadmn.php',
            type: 'post',
            data:{fil:fil},
            beforeSend: function(){
                $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
            },
            success: function(resp){
                $('.tbl_data #bhv').html(resp);
            }
        })*/
    /*    })
    })*/
</script>

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

<!--update status st-->
<script>
    $(document).ready(function(){
        $('.propup').change(function(){
            var stata=$(this).val();
            var uidss=$(this).data('uidd');
            var servnme=$(this).data('sernm');
            var assvari=uidss+servnme;
            /*alert(assvari);*/
           $.ajax({
            url: 'progressupd.php',
            type: 'post',
            data:{stata:stata,uidss:uidss,servnme:servnme},
            beforeSend: function(){
                /*$('.tbl_data #'+assvari).html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');*/
            },
            success: function(resp){
                $('.tbl_data #'+assvari).html(resp);
                
            }
        })
            
        })
    })
</script>
<!--update status ed-->

<!--update completed status st-->
<script>
        $(document).ready(function(){
        $('.reprt').change(function(){
            var cstata=$(this).val();
            var cuidss=$(this).data('cuidd');
            /*var assvari=uidss+servnme;*/
            /*alert(assvari);*/
           $.ajax({
            url: 'comstatus.php',
            type: 'post',
            data:{cstata:cstata,cuidss:cuidss},
            beforeSend: function(){
                /*$('.tbl_data #'+assvari).html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');*/
            },
            success: function(resp){
                $('.tbl_data .hy'+ cuidss).html(resp);
                
            }
        })
            
        })
    })
</script>
<!--update completed status ed-->
<script>
    $(document).ready(function(){
        $('.fdon').click(function(){
            $(this).css('background-color','red');
        })
    })
</script>
