<?php
//report upload st
                foreach($_FILES["filecriminal_police_record"]["tmp_name"] as $key24=>$tmp_name24){
                              $imagename24 = $_FILES['filecriminal_police_record']['name'][$key24];
                              $source24 = $_FILES['filecriminal_police_record']['tmp_name'][$key24];
                              $ext24 = pathinfo($imagename24, PATHINFO_EXTENSION);
                              $imgRANDMR24=rand(99999,10000);
                              $imgRANDM24='crpol'.$apid.$imgRANDMR24;
                              $coverImgdir24 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir24)){
                mkdir($coverImgdir24,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS24=$imgRANDM24.'.'.$ext24;
              $target24 = "$coverImgdir24".$imgRANDFS24;
              move_uploaded_file($source24, $target24);
              $imagepath24 = $imgRANDFS24;
              $edurp24='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath24;
              $postgr24;
              $postgr24=$postgr24.','.$edurp24;
              }
              $postgr24=ltrim($postgr24,',').',';
                //report upload ed
                $crpol=mysqli_query($con,"insert into criminal_police_record(appl_id,plrefno,plcandnme,pldob,plfnme,paddr1,plrefno2,plcandnme2,pldob2,plfnme2,paddr12,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$plrefno','$plcandnme','$pldob','$plfnme','$paddr1','$plrefno2','$plcandnme2','$pldob2','$plfnme2','$paddr12','$rmkcriminal_police_record','$postgr24','$dap','$sroccriminal_police_record','$lcntincriminal_police_record','$cmpdtecriminal_police_record','$clrcdecriminal_police_record','$client_uid','$add_feecriminal_police_record')");
                if($crpol){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>