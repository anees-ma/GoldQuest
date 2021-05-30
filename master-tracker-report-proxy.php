<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        table,td,tr{
            border: 1px solid grey;
        }
        table{
            width: 100%;
        }
        .dataTable-rpt-tr th{
            border: 1px solid white;
        }
        .tbl_data th{
                background-color: #277c7d;
                color: white;
        }
        .servclr{
            background-color: #fdd05a;
            color: #424141;
        }
    </style>
</head>
<?php 
include_once 'header.php';
include_once 'config.php';
?>
<!--back button-->
<div id="loader_" style="position: absolute;top: 0px;height: 200%; width: 100%; right: 0px;background-color: white;display: none">
    <div id="loader_inner" style="position: fixed; top: 27%; left: 28%;">
        <h2 style="top: 25%;position: absolute;left: 37%;color: #277c7d;">Downloading...</h2>
        <img src="images/ezgif-2-6d0b072c3d3f.gif" >
    </div></div>
<!-- <div style="float:left"><span id="backshpli" onclick="bckshl(this)" data-bck="apmng">Back</span></div>
<div style="float:left;margin-left: 15px;">
      <input type="checkbox" id="rptl-check-all">
      <span id="rptl-check-all-t">Check All</span>
        
    </div> -->

<?php 
/*$cliuid=$_POST['cliuid'];
$cgwtt_sta2=$_POST['cgwtt_sta'];*/
//echo $cgwtt_sta2;exit;
$cgwtt_sta=strtolower($cgwtt_sta2);
if($cgwtt_sta == 'completed'){
    $cstvari="status = 'completed'";
    $completed_opt = 'selected';
    $pending_opt = '';
}
else{
    $cstvari="status != 'completed'";
    $completed_opt = '';
    $pending_opt = 'selected';
}
?>

<!-- <div style="float: left;"><button style="margin-left: 53px; display: none;" id="download-btn" onclick="downloadReport()" class="action-btn btn btn-primary">Download</button>
<button style="margin-left: 53px; display: none;" id="delete-rptl-btn" onclick="deleteReport()" class="action-btn btn btn-danger">Delete</button></div>
<div style="float:right;margin-right:20px;clear:right">
    Overall Status:
    <select onchange="overallstatus(this)" id="overallstatus">
        <option <?php echo $completed_opt; ?>>Completed</option>
        <option <?php echo $pending_opt; ?>>Pending</option>
    </select>
</div><br> -->
<div class="task_tabl" style="clear:both;overflow-x: scroll;">
    <table class="dataTable-rpt-proxy tbl_data tbl_data2">
        <thead>
            <tr class="dataTable-rpt-tr">
                <th>Serial Number.</th>
                <th>Application ID</th>
                <!-- <th>Candidate Reference ID</th> #CH - disabled by Anees M A on April 7 2021-->
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
                <th>Final Report Date</th>
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
                        $cand_ref_id=$appicqryres['cand_ref_id'];
    ?>
    
        <tr>
            <td><input type="checkbox" value="<?php echo $appic_id;?>" data-refid="<?php echo $qryres['ref_id'];?>" class="check-delete-download-rptl"><span style="margin-left:3px"><?php echo $sl_no; ?></span></td>
            <td><?php echo $qryres['ref_id'];?></td>
            <!-- <td><?php echo $cand_ref_id;?></td> #CH - disabled by Anees M A on April 7 2021-->
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
                   <td><a class="deleteReportSingle" value="<?php echo $appicqryres['id']?>" data-clientuid="<?php echo $seservres['client_uid']?>" data-status="<?php echo $appicqryres['status']?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php
                $sl_no++;
        
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $('.dataTable-rpt-proxy').DataTable( {
          "dom": 'lfrtp',
          "bSort" : false,
          /*scrollY:      true,
          scrollX:        true,
          "fixedColumns":   {
                "leftColumns": 2,
                "rightColumns": 2
            }*/
        } );
</script>