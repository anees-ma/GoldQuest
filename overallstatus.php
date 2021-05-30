<!--back button-->
<!-- <div style="float:left"><span id="backshpli" onclick="bckshl(this)" data-bck="apmng">Back</span></div> -->

<?php 
include_once 'config.php';
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
<!-- <div style="float:right;margin-right:20px;">
    Overall Status:
    <select onchange="overallstatus(this)" id="overallstatus">
        <option>Pending</option>
        <option>Completed</option>
    </select>
</div><br> -->
<div class="task_tabl" >
                <table class="dataTable-rpt tbl_data tbl_data2" style="overflow-x: scroll;clear:both;">
        <thead>
            <tr class="dataTable-rpt-tr">
                <th>Sl No.</th>
                <th>Application ID</th>
                <!-- <th>GQG Reference ID</th>#CH - disabled by Anees on April 7 2021 -->
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
                <th>Overall Status</th>
                <th>Reported Date</th>
                <th>Prepare Report</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php
$qry=mysqli_query($con,"select * from applications where client_uid='$cliuid' && $cstvari order by id DESC");

$sl_no = 1;
while($qryres=mysqli_fetch_assoc($qry)){
                        $appic_id=$qryres['ref_id'];
                        $appicqry=mysqli_query($con,"select * from applic_entry where appl_id='$appic_id'");
                        $appicqryres=mysqli_fetch_assoc($appicqry);
                        $over_all_sta=$appicqryres['over_status'];
                        $over_all_status_ = ($appicqryres['over_status']=='completed')?'completed':'pending';
                        $cand_ref_id=$appicqryres['cand_ref_id'];
    ?>
    
        <tr>
            <td><input type="checkbox" value="<?php echo $appic_id;?>" data-refid="<?php echo $qryres['ref_id'];?>" class="check-delete-download-rptl"><span style="margin-left:3px"><?php echo $sl_no; ?></span></td>
            <td><?php echo $qryres['ref_id'];?></td>
            <!-- <td><?php echo $cand_ref_id;?></td> #CH disabled by Anees MA on April 7 2021-->
            <td><a href="<?php echo APP_PATH;?>/masterchecker.php?ref_id=<?php echo $qryres['ref_id'];?>" target="_blank" class="startmstr">START</a></td>
            <td><?php echo strtoupper($qryres['emp_name']);?></td>
            <td><span><?php echo $qryres['date'].' '.date("g:i a",strtotime($qryres['time']))?></span></td>
            <?php 
                $d=0;
                for($d=0; $d < $servtcnt; $d++){
                $servhas=explode('#',$seservexp[$d]);
                $serfnnme=$servhas[1];
                $serund=explode('-',$serfnnme);
                $serfnnme=implode('_',$serund);
                $serfnnme = ($serfnnme=='insta_drug_test')?'insta_drug_panel':$serfnnme;
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
                    <a href="docsdown.php?rfidd=<?php echo $qryres['ref_id'];?>" target="_blank"><button class="btn btn-sm btn-primary">DOCS VIEW</button></a>
                </td>
                <td><span class="hy<?php echo $qryres['ref_id'];?> crrsty"><?php echo strtoupper($over_all_sta);?></span><br>
                <!--<select class="reprt" data-cuidd="<?php echo $qryres['ref_id'];?>">
                    <option value="-select-">-select-</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>-->
                </td>
                <td><?php echo $appicqryres['finl_rpt_dt']; ?></td>
                <td>
                    <?php 
                    if($over_all_sta == 'completed'){
                        ?>
                        <a href="pdf/rpt.php?reff_id=<?php echo $appic_id;?>" target="_blank" class="" style="color: white"><button class="btn btn-primary">Report</button></a>
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
                   <td><a class="deleteReportSingle" value="<?php echo $qryres['id'];?>" data-clientuid="<?php echo $seservres['client_uid']?>" data-status="<?php echo $over_all_status_?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php
                $sl_no++;
        
            }
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    
    $('.dataTable-rpt').DataTable( {
          "dom": 'lfrtp',
          "bSort" : false,
          //scrollY:      true,
        /*scrollX:        true,
          "fixedColumns":   {
                "leftColumns": 2,
                "rightColumns": 2
            }*/
        } );
</script>