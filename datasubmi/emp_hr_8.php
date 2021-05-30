<?php
//report upload st
                foreach($_FILES["fileemp_hr_8"]["tmp_name"] as $key21=>$tmp_name21) {
                              $imagename21 = $_FILES['fileemp_hr_8']['name'][$key21];
                              $source21 = $_FILES['fileemp_hr_8']['tmp_name'][$key21];
                              $ext21 = pathinfo($imagename21, PATHINFO_EXTENSION);
                              $imgRANDMR21=rand(99999,10000);
                              $imgRANDM21='emp8'.$apid.$imgRANDMR21;
                              $coverImgdir21 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir21)){
                mkdir($coverImgdir21,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS21=$imgRANDM21.'.'.$ext21;
              $target21 = "$coverImgdir21".$imgRANDFS21;
              move_uploaded_file($source21, $target21);
              $imagepath21 = $imgRANDFS21;
              $edurp21='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath21;
              $postgr21;
              $postgr21=$postgr21.','.$edurp21;
              }
              $postgr21=ltrim($postgr21,',').',';
                //report upload ed
                $emp8=mysqli_query($con,"insert into emp_hr_8(appl_id,emncdnmeet,emcdeet,emcodeet,emfrmet,emtoet,emdesgnet,emlstdret,emrolvet,emrhreet,emncdnmeet2,emcdeet2,emcodeet2,emfrmet2,emtoet2,emdesgnet2,emlstdret2,emrolvet2,emrhreet2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmeet','$emcdeet','$emcodeet','$emfrmet','$emtoet','$emdesgnet','$emlstdret','$emrolvet','$emrhreet','$emncdnmeet2','$emcdeet2','$emcodeet2','$emfrmet2','$emtoet2','$emdesgnet2','$emlstdret2','$emrolvet2','$emrhreet2','$rmkemp_hr_8','$postgr21','$dap','$srocemp_hr_8','$lcntinemp_hr_8','$cmpdteemp_hr_8','$clrcdeemp_hr_8','$client_uid','$add_feeemp_hr_8')");
                if($emp8){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>