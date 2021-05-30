<?php
//report upload st
                foreach($_FILES["filecurrent_address"]["tmp_name"] as $key9=>$tmp_name9) {
                              $imagename9 = $_FILES['filecurrent_address']['name'][$key9];
                              $source9 = $_FILES['filecurrent_address']['tmp_name'][$key9];
                              $ext9 = pathinfo($imagename9, PATHINFO_EXTENSION);
                              $imgRANDMR9=rand(99999,10000);
                              $imgRANDM9='cura'.$apid.$imgRANDMR9;
                              $coverImgdir9 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir9)){
                mkdir($coverImgdir9,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS9=$imgRANDM9.'.'.$ext9;
              $target9 = "$coverImgdir9".$imgRANDFS9;
              move_uploaded_file($source9, $target9);
              $imagepath9 = $imgRANDFS9;
              $edurp9='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath9;
              $postgr9;
              $postgr9=$postgr9.','.$edurp9;
              }
              $postgr9=ltrim($postgr9,',').',';
                //report upload ed
                $cura=mysqli_query($con,"insert into current_address(appl_id,avcndnmea,avposta,avadda,avlndka,avcndnmea2,avposta2,avadda2,avlndka2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$avcndnmea','$avposta','$avadda','$avlndka','$avcndnmea2','$avposta2','$avadda2','$avlndka2','$rmkcurrent_address','$postgr9','$dap','$sroccurrent_address','$lcntincurrent_address','$cmpdtecurrent_address','$clrcdecurrent_address','$client_uid','$add_feecurrent_address')");
                if($cura){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>