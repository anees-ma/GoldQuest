<?php
//report upload st
                foreach($_FILES["filepro_reference_3"]["tmp_name"] as $keyN7=>$tmp_nameN7) {
                              $imagenameN7 = $_FILES['filepro_reference_3']['name'][$keyN7];
                              $sourceN7 = $_FILES['filepro_reference_3']['tmp_name'][$keyN7];
                              $extN7 = pathinfo($imagenameN7, PATHINFO_EXTENSION);
                              $imgRANDMRN7=rand(99999,10000);
                              $imgRANDMN7='pro3'.$apid.$imgRANDMRN7;
                              $coverImgdirN7 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdirN7)){
                mkdir($coverImgdirN7,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFSN7=$imgRANDMN7.'.'.$extN7;
              $targetN7 = "$coverImgdirN7".$imgRANDFSN7;
              move_uploaded_file($sourceN7, $targetN7);
              $imagepathN7 = $imgRANDFSN7;
              $edurpN7='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepathN7;
              $postgrN7;
              $postgrN7=$postgrN7.','.$edurpN7;
              }
              $postgrN7=ltrim($postgrN7,',').',';
                //report upload ed
                $pro3=mysqli_query($con,"insert into pro_reference_3(appl_id,rrfnmet,rcndtlst,rvbyt,raswsubt,rapsptt,rarimpt,rapkacht,rrfnmet2,rcndtlst2,rvbyt2,raswsubt2,rapsptt2,rarimpt2,rapkacht2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$rrfnmet','$rcndtlst','$rvbyt','$raswsubt','$rapsptt','$rarimpt','$rapkacht','$rrfnmet2','$rcndtlst2','$rvbyt2','$raswsubt2','$rapsptt2','$rarimpt2','$rapkacht2','$rmkpro_reference_3','$postgrN7','$dap','$srocpro_reference_3','$lcntinpro_reference_3','$cmpdtepro_reference_3','$clrcdepro_reference_3','$client_uid','$add_feepro_reference_3')");
                if($pro3){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>