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
<div style="float:left"><span id="backshpli" onclick="bckshl(this)" data-bck="apmng">Back</span></div>
<div style="float:left;margin-left: 15px;">
      <input type="checkbox" id="rptl-check-all">
      <span id="rptl-check-all-t">Check All</span>
        
    </div>

<?php 
$cliuid=$_POST['cliuid'];
$cgwtt_sta2=$_POST['cgwtt_sta'];
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

<div style="float: left;"><button style="margin-left: 53px; display: none;" id="download-btn" onclick="downloadReport()" class="action-btn btn btn-primary">Download</button>
<button style="margin-left: 53px; display: none;" id="delete-rptl-btn" onclick="deleteReport()" class="action-btn btn btn-danger">Delete</button></div>
<div style="float:right;margin-right:20px;clear:right">
    Overall Status:
    <select onchange="overallstatus(this)" id="overallstatus">
        <option <?php echo $completed_opt; ?>>Completed</option>
        <option <?php echo $pending_opt; ?>>Pending</option>
    </select>
</div><br>
<div class="task_tabl" style="clear:both">
    <table class="dataTable-rpt tbl_data">
        <thead>
            <tr class="dataTable-rpt-tr">
                <th>Serial Number.</th>
                <th>Application ID</th>
                <th>Candidate Reference ID</th>
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
                        $cand_ref_id=$appicqryres['cand_ref_id'];
    ?>
    
        <tr>
            <td><input type="checkbox" value="<?php echo $appic_id;?>" data-refid="<?php echo $qryres['ref_id'];?>" class="check-delete-download-rptl"><span style="margin-left:3px"><?php echo $sl_no; ?></span></td>
            <td><?php echo $qryres['ref_id'];?></td>
            <td><?php echo $cand_ref_id;?></td>
            <td><a href="http://www.goldquestglobal.in/masterchecker.php?ref_id=<?php echo $qryres['ref_id'];?>" target="_blank" class="startmstr">START</a></td>
            <!-- <td><a href="http://localhost/GoldQuest/masterchecker.php?ref_id=<?php echo $qryres['ref_id'];?>" target="_blank" class="startmstr">START</a></td> -->
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
                   <td><a href="delrefid.php?ia=<?php echo $appic_id;?>" target="_blank"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php
                $sl_no++;
        
            }
            ?>
        </tbody>
    </table>
</div>

<!--report upload script st-->
<script>
    var cliuid = '<?php echo $cliuid; ?>';
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
        $('.dataTable-rpt').DataTable( {
          "dom": 'lfrtp',
          "bSort" : false,
          scrollY:      true,
          scrollX:        true,
          "fixedColumns":   {
                "leftColumns": 2,
                "rightColumns": 2
            }
        } );
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

    function overallstatus(selector){ 
        var status=$(selector).val();
        /*alert(case_stau);*/
      
        $.ajax({
            url: 'overallstatus.php',
            type: 'post',
            data: {cgwtt_sta:status,cliuid:cliuid},
             beforeSend: function(){
                        $('.task_tabl').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.task_tabl').html(resp);
                    }
        })
       // $('#acl-check-all').prop('checked',false);
    }

    $('#rptl-check-all').change(function() {
        let over_all_status=$('#overallstatus').val();
        if(this.checked) {
          $('.check-delete-download-rptl').prop('checked',true);
          $("#delete-rptl-btn").fadeIn(300);
          if(over_all_status=='Completed'){
              $("#download-btn").fadeIn(300);
          }
          
        }else{
          $('.check-delete-download-rptl').prop('checked',false);
          hideActionBtn();
        }       
    });

    $(document).on('change','.check-delete-download-rptl',function() {
      let over_all_status=$('#overallstatus').val();
      if($(".check-delete-download-rptl").is(':checked')) {
        $("#delete-rptl-btn").fadeIn(300);
        if(over_all_status=='Completed'){
              $("#download-btn").fadeIn(300);
          }
          
      }else{
        hideActionBtn();
      }
    });

    function showActionBtn(){
      $(".action-btn").fadeIn(300);
    }

    function hideActionBtn(){
      $(".action-btn").fadeOut(300);
    }

    var appPath = '<?php echo APP_PATH; ?>';
    var appFilePath = '<?php echo APP_FILE_PATH; ?>';
    function downloadReport(){
        
          if(confirm("Are you sure, you want to download?")){
            $('#loader_').show();
            setTimeout(function(){  
            let over_all_status=$('#overallstatus').val();
            let filesArray = [];
            $('.check-delete-download-rptl:checked').each(function() {
             let ref_id = $(this).attr('data-refid');
             $.ajax({
                  url: 'pdf/rpt_bulk.php',
                  type: 'post',
                  async: false,
                  data: {refId:ref_id,over_all_status:over_all_status},
                  beforeSend: function(){
                  },
                  success: function(resp){
                    filesArray.push(appFilePath+'assets/PDFReports/'+resp);
                    download_file(appPath+'assets/PDFReports/'+resp, resp);

                    
                  },
                  error: function(xhr,textStatus,errorThrown){
                   console.log("ERROR : ", errorThrown);
                   console.log("ERROR : ", xhr);
                   console.log("ERROR : ", textStatus);
                  }
                })
            });
            deletePdf(filesArray);
            $('#loader_').hide();
            hideActionBtn();
            $('.check-delete-download-rptl').prop('checked',false);
            $('#rptl-check-all').prop('checked',false);
            }); 
        }
    }

    function deletePdf(files){
        $.ajax({
          url: 'deletepdf.php',
          type: 'post',
          async: false,
          data: {files:files},
          beforeSend: function(){
          },
          success: function(res){
            console.log(res);
            return;
            
          },
          error: function(xhr,textStatus,errorThrown){
           console.log("ERROR : ", errorThrown);
           console.log("ERROR : ", xhr);
           console.log("ERROR : ", textStatus);
          }
        })
    }



    function deleteReport(){
      if(confirm("Are you sure, you want to delete?")){
        let over_all_status=$('#overallstatus').val();
        let deletIds = [];
        $('.check-delete-download-rptl:checked').each(function() {
         deletIds.push($(this).val());
        });

        $.ajax({
          url: 'firefdel_bulk.php',
          type: 'post',
          data: {deleteIds:deletIds,over_all_status:over_all_status,type:'bulk_delete',cgwtt_sta:over_all_status,cliuid:cliuid},
          beforeSend: function(){
          },
          success: function(resp){
            console.log(resp);
            if(resp){
                $('.task_tabl').html(resp);
               alert('Selected items deleted successfully');
               $('#rptl-check-all').prop('checked', false);
               hideActionBtn();
            }else{
              $('.task_tabl').html(resp);
              alert('Deleting selected items failed, please try again later');
            }
          }
        })
      }else{
        $('#acl-check-all').prop('checked', false);
        $('.check-delete').prop('checked',false);
      }
    }

    function download_file(fileURL, fileName) {
        // for non-IE
        if (!window.ActiveXObject) {
            var save = document.createElement('a');
            save.href = fileURL;
            save.target = '_blank';
            var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
            save.download = fileName || filename;
               if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
                    document.location = save.href; 
        // window event not working here
                }else{
                    var evt = new MouseEvent('click', {
                        'view': window,
                        'bubbles': true,
                        'cancelable': false
                    });
                    save.dispatchEvent(evt);
                    (window.URL || window.webkitURL).revokeObjectURL(save.href);
                }   
        }

        // for IE < 11
        else if ( !! window.ActiveXObject && document.execCommand)     {
            var _window = window.open(fileURL, '_blank');
            _window.document.close();
            _window.document.execCommand('SaveAs', true, fileName || fileURL)
            _window.close();
        }
        return;
    }


</script>
