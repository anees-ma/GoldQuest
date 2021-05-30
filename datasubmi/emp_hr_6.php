<?php
//report upload st
                foreach($_FILES["fileemp_hr_6"]["tmp_name"] as $key19=>$tmp_name19) {
                              $imagename19 = $_FILES['fileemp_hr_6']['name'][$key19];
                              $source19 = $_FILES['fileemp_hr_6']['tmp_name'][$key19];
                              $ext19 = pathinfo($imagename19, PATHINFO_EXTENSION);
                              $imgRANDMR19=rand(99999,10000);
                              $imgRANDM19='emp6'.$apid.$imgRANDMR19;
                              $coverImgdir19 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir19)){
                mkdir($coverImgdir19,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS19=$imgRANDM19.'.'.$ext19;
              $target19 = "$coverImgdir19".$imgRANDFS19;
              move_uploaded_file($source19, $target19);
              $imagepath19 = $imgRANDFS19;
              $edurp19='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath19;
              $postgr19;
              $postgr19=$postgr19.','.$edurp19;
              }
              $postgr19=ltrim($postgr19,',').',';
                //report upload ed
                $emp6=mysqli_query($con,"insert into emp_hr_6(appl_id,emncdnmesx,emcdesx,emcodesx,emfrmsx,emtosx,emdesgnsx,emlstdrsx,emrolvsx,emrhresx,emncdnmesx2,emcdesx2,emcodesx2,emfrmsx2,emtosx2,emdesgnsx2,emlstdrsx2,emrolvsx2,emrhresx2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmesx','$emcdesx','$emcodesx','$emfrmsx','$emtosx','$emdesgnsx','$emlstdrsx','$emrolvsx','$emrhresx','$emncdnmesx2','$emcdesx2','$emcodesx2','$emfrmsx2','$emtosx2','$emdesgnsx2','$emlstdrsx2','$emrolvsx2','$emrhresx2','$rmkemp_hr_6','$postgr19','$dap','$srocemp_hr_6','$lcntinemp_hr_6','$cmpdteemp_hr_6','$clrcdeemp_hr_6','$client_uid','$add_feeemp_hr_6')");
                if($emp6){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>