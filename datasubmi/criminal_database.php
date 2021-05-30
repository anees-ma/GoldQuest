<?php
//report upload st
                foreach($_FILES["filecriminal_database"]["tmp_name"] as $key22=>$tmp_name22){
                              $imagename22 = $_FILES['filecriminal_database']['name'][$key22];
                              $source22 = $_FILES['filecriminal_database']['tmp_name'][$key22];
                              $ext22 = pathinfo($imagename22, PATHINFO_EXTENSION);
                              $imgRANDMR22=rand(99999,10000);
                              $imgRANDM22='crdat'.$apid.$imgRANDMR22;
                              $coverImgdir22 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir22)){
                mkdir($coverImgdir22,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS22=$imgRANDM22.'.'.$ext22;
              $target22 = "$coverImgdir22".$imgRANDFS22;
              move_uploaded_file($source22, $target22);
              $imagepath22 = $imgRANDFS22;
              $edurp22='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath22;
              $postgr22;
              $postgr22=$postgr22.','.$edurp22;
              }
              $postgr22=ltrim($postgr22,',').',';
                //report upload ed
                $crdat=mysqli_query($con,"insert into criminal_database(appl_id,crmlnmcd,crmlnmcd2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$crmlnmcd','$crmlnmcd2','$rmkcriminal_database','$postgr22','$dap','$sroccriminal_database','$lcntincriminal_database','$cmpdtecriminal_database','$clrcdecriminal_database','$client_uid','$add_feecriminal_database')");

                echo "insert into criminal_database(appl_id,crmlnmcd,crmlnmcd2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$crmlnmcd','$crmlnmcd2','$rmkcriminal_database','$postgr22','$dap','$sroccriminal_database','$lcntincriminal_database','$cmpdtecriminal_database','$clrcdecriminal_database','$client_uid','$add_feecriminal_database')";
                if($crdat){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>