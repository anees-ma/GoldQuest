<?php
//report upload st
                foreach($_FILES["fileemp_hr_4"]["tmp_name"] as $key17=>$tmp_name17) {
                              $imagename17 = $_FILES['fileemp_hr_4']['name'][$key17];
                              $source17 = $_FILES['fileemp_hr_4']['tmp_name'][$key17];
                              $ext17 = pathinfo($imagename17, PATHINFO_EXTENSION);
                              $imgRANDMR17=rand(99999,10000);
                              $imgRANDM17='emp4'.$apid.$imgRANDMR17;
                              $coverImgdir17 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir17)){
                mkdir($coverImgdir17,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS17=$imgRANDM17.'.'.$ext17;
              $target17 = "$coverImgdir17".$imgRANDFS17;
              move_uploaded_file($source17, $target17);
              $imagepath17 = $imgRANDFS17;
              $edurp17='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath17;
              $postgr17;
              $postgr17=$postgr17.','.$edurp17;
              }
              $postgr17=ltrim($postgr17,',').',';
                //report upload ed
                $emp4=mysqli_query($con,"insert into emp_hr_4(appl_id,emncdnmefr,emcdefr,emcodefr,emfrmfr,emtofr,emdesgnfr,emlstdrfr,emrolvfr,emrhrefr,emncdnmefr2,emcdefr2,emcodefr2,emfrmfr2,emtofr2,emdesgnfr2,emlstdrfr2,emrolvfr2,emrhrefr2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmefr','$emcdefr','$emcodefr','$emfrmfr','$emtofr','$emdesgnfr','$emlstdrfr','$emrolvfr','$emrhrefr','$emncdnmefr2','$emcdefr2','$emcodefr2','$emfrmfr2','$emtofr2','$emdesgnfr2','$emlstdrfr2','$emrolvfr2','$emrhrefr2','$rmkemp_hr_4','$postgr17','$dap','$srocemp_hr_4','$lcntinemp_hr_4','$cmpdteemp_hr_4','$clrcdeemp_hr_4','$client_uid','$add_feeemp_hr_4')");
                if($emp4){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>