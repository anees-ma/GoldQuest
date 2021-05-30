<?php
//report upload st
                foreach($_FILES["filecriminal_court_record"]["tmp_name"] as $key23=>$tmp_name23){
                              $imagename23 = $_FILES['filecriminal_court_record']['name'][$key23];
                              $source23 = $_FILES['filecriminal_court_record']['tmp_name'][$key23];
                              $ext23 = pathinfo($imagename23, PATHINFO_EXTENSION);
                              $imgRANDMR23=rand(99999,10000);
                              $imgRANDM23='crcrt'.$apid.$imgRANDMR23;
                              $coverImgdir23 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir23)){
                mkdir($coverImgdir23,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS23=$imgRANDM23.'.'.$ext23;
              $target23 = "$coverImgdir23".$imgRANDFS23;
              move_uploaded_file($source23, $target23);
              $imagepath23 = $imgRANDFS23;
              $edurp23='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath23;
              $postgr23;
              $postgr23=$postgr23.','.$edurp23;
              }
              $postgr23=ltrim($postgr23,',').',';
                //report upload ed
                $crcrt=mysqli_query($con,"insert into criminal_court_record(appl_id,crtrefid,crtcdnme,crtdob,crtftnme,crtaddr,crtrefid2,crtcdnme2,crtdob2,crtftnme2,crtaddr2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$crtrefid','$crtcdnme','$crtdob','$crtftnme','$crtaddr','$crtrefid2','$crtcdnme2','$crtdob2','$crtftnme2','$crtaddr2','$rmkcriminal_court_record','$postgr23','$dap','$sroccriminal_court_record','$lcntincriminal_court_record','$cmpdtecriminal_court_record','$clrcdecriminal_court_record','$client_uid','$add_feecriminal_court_record')");
                if($crcrt){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>