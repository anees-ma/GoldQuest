<?php
//report upload st
                foreach($_FILES["file10th_std"]["tmp_name"] as $key4=>$tmp_name4) {
                              $imagename4 = $_FILES['file10th_std']['name'][$key4];
                              $source4 = $_FILES['file10th_std']['tmp_name'][$key4];
                              $ext4 = pathinfo($imagename4, PATHINFO_EXTENSION);
                              $imgRANDMR4=rand(99999,10000);
                              $imgRANDM4='10'.$apid.$imgRANDMR4;
                              $coverImgdir4 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir4)){
                mkdir($coverImgdir4,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS4=$imgRANDM4.'.'.$ext4;
              $target4 = "$coverImgdir4".$imgRANDFS4;
              move_uploaded_file($source4, $target4);
              $imagepath4 = $imgRANDFS4;
              $edurp4='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath4;
              $postgr4;
              $postgr4=$postgr4.','.$edurp4;
              }
              $postgr4=ltrim($postgr4,',').',';
                //report upload ed
                $ten=mysqli_query($con,"insert into 10th_std(appl_id,nistgsc,ncndigsc,enrolngsc,dgregsc,mjrgsc,mypsgsc,cidtgsc,slnumgsc,nistgsc2,ncndigsc2,enrolngsc2,dgregsc2,mjrgsc2,mypsgsc2,cidtgsc2,slnumgsc2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nistgsc','$ncndigsc','$enrolngsc','$dgregsc','$mjrgsc','$mypsgsc','$cidtgsc','$slnumgsc','$nistgsc2','$ncndigsc2','$enrolngsc2','$dgregsc2','$mjrgsc2','$mypsgsc2','$cidtgsc2','$slnumgsc2','$rmk10th_std','$postgr4','$dap','$sroc10th_std','$lcntin10th_std','$cmpdte10th_std','$clrcde10th_std','$client_uid','$add_fee10th_std')");
                if($ten){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>