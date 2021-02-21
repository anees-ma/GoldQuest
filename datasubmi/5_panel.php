<?php
//report upload st
                foreach($_FILES["file5_panel"]["tmp_name"] as $key10=>$tmp_name10) {
                              $imagename10 = $_FILES['file5_panel']['name'][$key10];
                              $source10 = $_FILES['file5_panel']['tmp_name'][$key10];
                              $ext10 = pathinfo($imagename10, PATHINFO_EXTENSION);
                              $imgRANDMR10=rand(99999,10000);
                              $imgRANDM10='fip'.$apid.$imgRANDMR10;
                              $coverImgdir10 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir10)){
                mkdir($coverImgdir10,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS10=$imgRANDM10.'.'.$ext10;
              $target10 = "$coverImgdir10".$imgRANDFS10;
              move_uploaded_file($source10, $target10);
              $imagepath10 = $imgRANDFS10;
              $edurp10='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath10;
              $postgr10;
              $postgr10=$postgr10.','.$edurp10;
              }
              $postgr10=ltrim($postgr10,',').',';
                //report upload ed
                $fpl=mysqli_query($con,"insert into 5_panel(appl_id,nmcdi,totst,dktpe,rsnftst,tstres,spcid,cocaine,opiates,propoxyphene,marijuana,amphetamines,benzodiazepines,nmcdi2,totst2,dktpe2,rsnftst2,tstres2,spcid2,methadone,phencyclidine,methamphetamine,oxycodone,barbiturates,cannabinoids,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nmcdi','$totst','$dktpe','$rsnftst','$tstres','$spcid','$cocaine','$opiates','$propoxyphene','$marijuana','$amphetamines','$benzodiazepines','$nmcdi2','$totst2','$dktpe2','$rsnftst2','$tstres2','$spcid2','$methadone','$phencyclidine','$methamphetamine','$oxycodone','$barbiturates','$cannabinoids','$rmk5_panel','$postgr10','$dap','$sroc5_panel','$lcntin5_panel','$cmpdte5_panel','$clrcde5_panel','$client_uid','$add_fee5_panel')");
                if($fpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>