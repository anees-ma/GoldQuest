<?php
//report upload st
                foreach($_FILES["filegraduation"]["tmp_name"] as $key2=>$tmp_name2) {
                              $imagename2 = $_FILES['filegraduation']['name'][$key2];
                              $source2 = $_FILES['filegraduation']['tmp_name'][$key2];
                              $ext2 = pathinfo($imagename2, PATHINFO_EXTENSION);
                              $imgRANDMR2=rand(99999,10000);
                              $imgRANDM2='grd'.$apid.$imgRANDMR2;
                              $coverImgdir2 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir2)){
                mkdir($coverImgdir2,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS2=$imgRANDM2.'.'.$ext2;
              $target2 = "$coverImgdir2".$imgRANDFS2;
              move_uploaded_file($source2, $target2);
              $imagepath2 = $imgRANDFS2;
              $edurp2='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath2;
              $postgr2;
              $postgr2=$postgr2.','.$edurp2;
              }
              $postgr2=ltrim($postgr2,',').',';
                //report upload ed
                $edv=mysqli_query($con,"insert into graduation(appl_id,nistg,ncndig,enrolng,dgreg,mjrg,mypsg,cidtg,slnumg,nistg2,ncndig2,enrolng2,dgreg2,mjrg2,mypsg2,cidtg2,slnumg2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nistg','$ncndig','$enrolng','$dgreg','$mjrg','$mypsg','$cidtg','$slnumg','$nistg2','$ncndig2','$enrolng2','$dgreg2','$mjrg2','$mypsg2','$cidtg2','$slnumg2','$rmkgraduation','$postgr2','$dap','$srocgraduation','$lcntingraduation','$cmpdtegraduation','$clrcdegraduation','$client_uid','$add_feegraduation')");
                if($edv){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>