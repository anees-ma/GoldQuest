<?php
//report upload st
                foreach($_FILES["fileemp_hr_5"]["tmp_name"] as $key18=>$tmp_name18) {
                              $imagename18 = $_FILES['fileemp_hr_5']['name'][$key18];
                              $source18 = $_FILES['fileemp_hr_5']['tmp_name'][$key18];
                              $ext18 = pathinfo($imagename18, PATHINFO_EXTENSION);
                              $imgRANDMR18=rand(99999,10000);
                              $imgRANDM18='emp5'.$apid.$imgRANDMR18;
                              $coverImgdir18 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir18)){
                mkdir($coverImgdir18,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS18=$imgRANDM18.'.'.$ext18;
              $target18 = "$coverImgdir18".$imgRANDFS18;
              move_uploaded_file($source18, $target18);
              $imagepath18 = $imgRANDFS18;
              $edurp18='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath18;
              $postgr18;
              $postgr18=$postgr18.','.$edurp18;
              }
              $postgr18=ltrim($postgr18,',').',';
                //report upload ed
                $emp5=mysqli_query($con,"insert into emp_hr_5(appl_id,emncdnmefv,emcdefv,emcodefv,emfrmfv,emtofv,emdesgnfv,emlstdrfv,emrolvfv,emrhrefv,emncdnmefv2,emcdefv2,emcodefv2,emfrmfv2,emtofv2,emdesgnfv2,emlstdrfv2,emrolvfv2,emrhrefv2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmefv','$emcdefv','$emcodefv','$emfrmfv','$emtofv','$emdesgnfv','$emlstdrfv','$emrolvfv','$emrhrefv','$emncdnmefv2','$emcdefv2','$emcodefv2','$emfrmfv2','$emtofv2','$emdesgnfv2','$emlstdrfv2','$emrolvfv2','$emrhrefv2','$rmkemp_hr_5','$postgr18','$dap','$srocemp_hr_5','$lcntinemp_hr_5','$cmpdteemp_hr_5','$clrcdeemp_hr_5','$client_uid','$add_feeemp_hr_5')");
                if($emp5){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>