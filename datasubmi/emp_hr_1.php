<?php
//report upload st
                foreach($_FILES["fileemp_hr_1"]["tmp_name"] as $key14=>$tmp_name14) {
                              $imagename14 = $_FILES['fileemp_hr_1']['name'][$key14];
                              $source14 = $_FILES['fileemp_hr_1']['tmp_name'][$key14];
                              $ext14 = pathinfo($imagename14, PATHINFO_EXTENSION);
                              $imgRANDMR14=rand(99999,10000);
                              $imgRANDM14='emp1'.$apid.$imgRANDMR14;
                              $coverImgdir14 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir14)){
                mkdir($coverImgdir14,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS14=$imgRANDM14.'.'.$ext14;
              $target14 = "$coverImgdir14".$imgRANDFS14;
              move_uploaded_file($source14, $target14);
              $imagepath14 = $imgRANDFS14;
              $edurp14='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath14;
              $postgr14;
              $postgr14=$postgr14.','.$edurp14;
              }
              $postgr14=ltrim($postgr14,',').',';
                //report upload ed
                $emp1=mysqli_query($con,"insert into emp_hr_1(appl_id,emncdnme,emcde,emcode,emfrm,emto,emdesgn,emlstdr,emrolv,emrhre,emncdnme2,emcde2,emcode2,emfrm2,emto2,emdesgn2,emlstdr2,emrolv2,emrhre2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnme','$emcde','$emcode','$emfrm','$emto','$emdesgn','$emlstdr','$emrolv','$emrhre','$emncdnme2','$emcde2','$emcode2','$emfrm2','$emto2','$emdesgn2','$emlstdr2','$emrolv2','$emrhre2','$rmkemp_hr_1','$postgr14','$dap','$srocemp_hr_1','$lcntinemp_hr_1','$cmpdteemp_hr_1','$clrcdeemp_hr_1','$client_uid','$add_feeemp_hr_1')");
                if($emp1){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>