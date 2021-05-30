<?php
//report upload st
                foreach($_FILES["filediploma"]["tmp_name"] as $key5=>$tmp_name5) {
                              $imagename5 = $_FILES['filediploma']['name'][$key5];
                              $source5 = $_FILES['filediploma']['tmp_name'][$key5];
                              $ext5 = pathinfo($imagename5, PATHINFO_EXTENSION);
                              $imgRANDMR5=rand(99999,10000);
                              $imgRANDM5='dip'.$apid.$imgRANDMR5;
                              $coverImgdir5 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir5)){
                mkdir($coverImgdir5,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS5=$imgRANDM5.'.'.$ext5;
              $target5 = "$coverImgdir5".$imgRANDFS5;
              move_uploaded_file($source5, $target5);
              $imagepath5 = $imgRANDFS5;
              $edurp5='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath5;
              $postgr5;
              $postgr5=$postgr5.','.$edurp5;
              }
              $postgr5=ltrim($postgr5,',').',';
                //report upload ed
                $dip=mysqli_query($con,"insert into diploma(appl_id,nistgdp,ncndigdp,enrolngdp,dgregdp,mjrgdp,mypsgdp,cidtgdp,slnumgdp,nistgdp2,ncndigdp2,enrolngdp2,dgregdp2,mjrgdp2,mypsgdp2,cidtgdp2,slnumgdp2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nistgdp','$ncndigdp','$enrolngdp','$dgregdp','$mjrgdp','$mypsgdp','$cidtgdp','$slnumgdp','$nistgdp2','$ncndigdp2','$enrolngdp2','$dgregdp2','$mjrgdp2','$mypsgdp2','$cidtgdp2','$slnumgdp2','$rmkdiploma','$postgr5','$dap','$srocdiploma','$lcntindiploma','$cmpdtediploma','$clrcdediploma','$client_uid','$add_feediploma')");
                if($dip){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>