<?php
//report upload st
                foreach($_FILES["filecredit_verification"]["tmp_name"] as $key25=>$tmp_name25){
                              $imagename25 = $_FILES['filecredit_verification']['name'][$key25];
                              $source25 = $_FILES['filecredit_verification']['tmp_name'][$key25];
                              $ext25 = pathinfo($imagename25, PATHINFO_EXTENSION);
                              $imgRANDMR25=rand(99999,10000);
                              $imgRANDM25='crdv'.$apid.$imgRANDMR25;
                              $coverImgdir25 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir25)){
                mkdir($coverImgdir25,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS25=$imgRANDM25.'.'.$ext25;
              $target25 = "$coverImgdir25".$imgRANDFS25;
              move_uploaded_file($source25, $target25);
              $imagepath25 = $imgRANDFS25;
              $edurp25='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath25;
              $postgr25;
              $postgr25=$postgr25.','.$edurp25;
              }
              $postgr25=ltrim($postgr25,',').',';
                //report upload ed
                $crdvr=mysqli_query($con,"insert into credit_verification(appl_id,cbnmcdnme,cbpan,cbtransn,cbsfatrs,cbpersln,cbstas,cbvery,cbnmcdnme2,cbpan2,cbtransn2,cbsfatrs2,cbpersln2,cbstas2,cbvery2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$cbnmcdnme','$cbpan','$cbtransn','$cbsfatrs','$cbpersln','$cbstas','$cbvery','$cbnmcdnme2','$cbpan2','$cbtransn2','$cbsfatrs2','$cbpersln2','$cbstas2','$cbvery2','$rmkcredit_verification','$postgr25','$dap','$sroccredit_verification','$lcntincredit_verification','$cmpdtecredit_verification','$clrcdecredit_verification','$client_uid','$add_feecredit_verification')");
                if($crdvr){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>