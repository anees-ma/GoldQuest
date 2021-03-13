<?php
//report upload st
                foreach($_FILES["fileemp_hr_7"]["tmp_name"] as $key20=>$tmp_name20) {
                              $imagename20 = $_FILES['fileemp_hr_7']['name'][$key20];
                              $source20 = $_FILES['fileemp_hr_7']['tmp_name'][$key20];
                              $ext20 = pathinfo($imagename20, PATHINFO_EXTENSION);
                              $imgRANDMR20=rand(99999,10000);
                              $imgRANDM20='emp7'.$apid.$imgRANDMR20;
                              $coverImgdir20 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir20)){
                mkdir($coverImgdir20,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS20=$imgRANDM20.'.'.$ext20;
              $target20 = "$coverImgdir20".$imgRANDFS20;
              move_uploaded_file($source20, $target20);
              $imagepath20 = $imgRANDFS20;
              $edurp20='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath20;
              $postgr20;
              $postgr20=$postgr20.','.$edurp20;
              }
              $postgr20=ltrim($postgr20,',').',';
                //report upload ed
                $emp7=mysqli_query($con,"insert into emp_hr_7(appl_id,emncdnmesn,emcdesn,emcodesn,emfrmsn,emtosn,emdesgnsn,emlstdrsn,emrolvsn,emrhresn,emncdnmesn2,emcdesn2,emcodesn2,emfrmsn2,emtosn2,emdesgnsn2,emlstdrsn2,emrolvsn2,emrhresn2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$emncdnmesn','$emcdesn','$emcodesn','$emfrmsn','$emtosn','$emdesgnsn','$emlstdrsn','$emrolvsn','$emrhresn','$emncdnmesn2','$emcdesn2','$emcodesn2','$emfrmsn2','$emtosn2','$emdesgnsn2','$emlstdrsn2','$emrolvsn2','$emrhresn2','$rmkemp_hr_7','$postgr20','$dap','$srocemp_hr_7','$lcntinemp_hr_7','$cmpdteemp_hr_7','$clrcdeemp_hr_7','$client_uid','$add_feeemp_hr_7')");
                if($emp7){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>