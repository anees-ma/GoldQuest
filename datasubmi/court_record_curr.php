<?php
//report upload st
                foreach($_FILES["filecourt_record_curr"]["tmp_name"] as $keyN23=>$tmp_nameN23){
                              $imagenameN23 = $_FILES['filecourt_record_curr']['name'][$keyN23];
                              $sourceN23 = $_FILES['filecourt_record_curr']['tmp_name'][$keyN23];
                              $extN23 = pathinfo($imagenameN23, PATHINFO_EXTENSION);
                              $imgRANDMRN23=rand(99999,10000);
                              $imgRANDMN23='crcrtcurrup'.$apid.$imgRANDMRN23;
                              $coverImgdirN23 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdirN23)){
                mkdir($coverImgdirN23,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFSN23=$imgRANDMN23.'.'.$extN23;
              $targetN23 = "$coverImgdirN23".$imgRANDFSN23;
              move_uploaded_file($sourceN23, $targetN23);
              $imagepathN23 = $imgRANDFSN23;
              $edurpN23='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepathN23;
              $postgrN23;
              $postgrN23=$postgrN23.','.$edurpN23;
              }
              $postgrN23=ltrim($postgrN23,',').',';
                //report upload ed
                $crcrtCurr=mysqli_query($con,"insert into court_record_curr(appl_id,crtrefidcr,crtcdnmecr,crtdobcr,crtftnmecr,crtaddrcr,crtrefidcr2,crtcdnmecr2,crtdobcr2,crtftnmecr2,crtaddrcr2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$crtrefidcr','$crtcdnmecr','$crtdobcr','$crtftnmecr','$crtaddrcr','$crtrefidcr2','$crtcdnmecr2','$crtdobcr2','$crtftnmecr2','$crtaddrcr2','$rmkcourt_record_curr','$postgrN23','$dap','$sroccourt_record_curr','$lcntincourt_record_curr','$cmpdtecourt_record_curr','$clrcdecourt_record_curr','$client_uid','$add_feecourt_record_curr')");
                if($crcrtCurr){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>