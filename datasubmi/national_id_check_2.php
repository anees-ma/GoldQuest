<?php
//report upload st
                foreach($_FILES["filenational_id_check_2"]["tmp_name"] as $key262=>$tmp_name262){
                              $imagename262 = $_FILES['filenational_id_check_2']['name'][$key262];
                              $source262 = $_FILES['filenational_id_check_2']['tmp_name'][$key262];
                              $ext262 = pathinfo($imagename262, PATHINFO_EXTENSION);
                              $imgRANDMR262=rand(99999,10000);
                              $imgRANDM262='naid2'.$apid.$imgRANDMR262;
                              $coverImgdir262 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir262)){
                mkdir($coverImgdir262,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS262=$imgRANDM262.'.'.$ext262;
              $target262 = "$coverImgdir262".$imgRANDFS262;
              move_uploaded_file($source262, $target262);
              $imagepath262 = $imgRANDFS262;
              $edurp262='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath262;
              $postgr262;
              $postgr262=$postgr262.','.$edurp262;
              }
              $postgr262=ltrim($postgr262,',').',';
                //report upload ed
                $naid2=mysqli_query($con,"insert into national_id_check_2(appl_id,nttyid2,ntidcrd2,ntdovery2,ntvrresul2,ntverby2,nttyid2_2,ntidcrd2_2,ntdovery2_2,ntvrresul2_2,ntverby2_2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nttyid2','$ntidcrd2','$ntdovery2','$ntvrresul2','$ntverby2','$nttyid2_2','$ntidcrd2_2','$ntdovery2_2','$ntvrresul2_2','$ntverby2_2','$rmknational_id_check_2','$postgr262','$dap','$srocnational_id_check_2','$lcntinnational_id_check_2','$cmpdtenational_id_check_2','$clrcdenational_id_check_2','$client_uid','$add_feenational_id_check_2')");
                if($naid2){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>