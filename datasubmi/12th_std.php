<?php
//report upload st
                foreach($_FILES["file12th_std"]["tmp_name"] as $key3=>$tmp_name3) {
                              $imagename3 = $_FILES['file12th_std']['name'][$key3];
                              $source3 = $_FILES['file12th_std']['tmp_name'][$key3];
                              $ext3 = pathinfo($imagename3, PATHINFO_EXTENSION);
                              $imgRANDMR3=rand(99999,10000);
                              $imgRANDM3='12'.$apid.$imgRANDMR3;
                              $coverImgdir3 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir3)){
                mkdir($coverImgdir3,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS3=$imgRANDM3.'.'.$ext3;
              $target3 = "$coverImgdir3".$imgRANDFS3;
              move_uploaded_file($source3, $target3);
              $imagepath3 = $imgRANDFS3;
              $edurp3='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath3;
              $postgr3;
              $postgr3=$postgr3.','.$edurp3;
              }
              $postgr3=ltrim($postgr3,',').',';
                //report upload ed
                $twel=mysqli_query($con,"insert into 12th_std(appl_id,nistgot,ncndigot,enrolngot,dgregot,mjrgot,mypsgot,cidtgot,slnumgot,nistgot2,ncndigot2,enrolngot2,dgregot2,mjrgot2,mypsgot2,cidtgot2,slnumgot2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nistgot','$ncndigot','$enrolngot','$dgregot','$mjrgot','$mypsgot','$cidtgot','$slnumgot','$nistgot2','$ncndigot2','$enrolngot2','$dgregot2','$mjrgot2','$mypsgot2','$cidtgot2','$slnumgot2','$rmk12th_std','$postgr3','$dap','$sroc12th_std','$lcntin12th_std','$cmpdte12th_std','$clrcde12th_std','$client_uid','$add_fee12th_std')");
                if($twel){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>