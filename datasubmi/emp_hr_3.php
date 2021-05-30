<?php
//report upload st
                foreach($_FILES["fileemp_hr_3"]["tmp_name"] as $key16=>$tmp_name16) {
                              $imagename16 = $_FILES['fileemp_hr_3']['name'][$key16];
                              $source16 = $_FILES['fileemp_hr_3']['tmp_name'][$key16];
                              $ext16 = pathinfo($imagename16, PATHINFO_EXTENSION);
                              $imgRANDMR16=rand(99999,10000);
                              $imgRANDM16='emp3'.$apid.$imgRANDMR16;
                              $coverImgdir16 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir16)){
                mkdir($coverImgdir16,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS16=$imgRANDM16.'.'.$ext16;
              $target16 = "$coverImgdir16".$imgRANDFS16;
              move_uploaded_file($source16, $target16);
              $imagepath16 = $imgRANDFS16;
              $edurp16='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath16;
              $postgr16;
              $postgr16=$postgr16.','.$edurp16;
              }
              $postgr16=ltrim($postgr16,',').',';
                //report upload ed
                $emp3=mysqli_query($con,"insert into emp_hr_3(appl_id,emncdnmeth,emcdeth,emcodeth,emfrmth,emtoth,emdesgnth,emlstdrth,emrolvth,emrhreth,emncdnmeth2,emcdeth2,emcodeth2,emfrmth2,emtoth2,emdesgnth2,emlstdrth2,emrolvth2,emrhreth2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmeth','$emcdeth','$emcodeth','$emfrmth','$emtoth','$emdesgnth','$emlstdrth','$emrolvth','$emrhreth','$emncdnmeth2','$emcdeth2','$emcodeth2','$emfrmth2','$emtoth2','$emdesgnth2','$emlstdrth2','$emrolvth2','$emrhreth2','$rmkemp_hr_3','$postgr16','$dap','$srocemp_hr_3','$lcntinemp_hr_3','$cmpdteemp_hr_3','$clrcdeemp_hr_3','$client_uid','$add_feeemp_hr_3')");
                if($emp3){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>