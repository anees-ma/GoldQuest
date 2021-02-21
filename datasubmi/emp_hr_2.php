<?php
//report upload st
                foreach($_FILES["fileemp_hr_2"]["tmp_name"] as $key15=>$tmp_name15) {
                              $imagename15 = $_FILES['fileemp_hr_2']['name'][$key15];
                              $source15 = $_FILES['fileemp_hr_2']['tmp_name'][$key15];
                              $ext15 = pathinfo($imagename15, PATHINFO_EXTENSION);
                              $imgRANDMR15=rand(99999,10000);
                              $imgRANDM15='emp2'.$apid.$imgRANDMR15;
                              $coverImgdir15 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir15)){
                mkdir($coverImgdir15,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS15=$imgRANDM15.'.'.$ext15;
              $target15 = "$coverImgdir15".$imgRANDFS15;
              move_uploaded_file($source15, $target15);
              $imagepath15 = $imgRANDFS15;
              $edurp15='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath15;
              $postgr15;
              $postgr15=$postgr15.','.$edurp15;
              }
              $postgr15=ltrim($postgr15,',').',';
                //report upload ed
                $emp2=mysqli_query($con,"insert into emp_hr_2(appl_id,emncdnmeto,emcdeto,emcodeto,emfrmto,emtoto,emdesgnto,emlstdrto,emrolvto,emrhreto,emncdnmeto2,emcdeto2,emcodeto2,emfrmto2,emtoto2,emdesgnto2,emlstdrto2,emrolvto2,emrhreto2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmeto','$emcdeto','$emcodeto','$emfrmto','$emtoto','$emdesgnto','$emlstdrto','$emrolvto','$emrhreto','$emncdnmeto2','$emcdeto2','$emcodeto2','$emfrmto2','$emtoto2','$emdesgnto2','$emlstdrto2','$emrolvto2','$emrhreto2','$rmkemp_hr_2','$postgr15','$dap','$srocemp_hr_2','$lcntinemp_hr_2','$cmpdteemp_hr_2','$clrcdeemp_hr_2','$client_uid','$add_feeemp_hr_2')");
                if($emp2){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>