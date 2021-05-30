<?php
//report upload st
                foreach($_FILES["filepermanent_address"]["tmp_name"] as $key8=>$tmp_name8) {
                              $imagename8 = $_FILES['filepermanent_address']['name'][$key8];
                              $source8 = $_FILES['filepermanent_address']['tmp_name'][$key8];
                              $ext8 = pathinfo($imagename8, PATHINFO_EXTENSION);
                              $imgRANDMR8=rand(99999,10000);
                              $imgRANDM8='pera'.$apid.$imgRANDMR8;
                              $coverImgdir8 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir8)){
                mkdir($coverImgdir8,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS8=$imgRANDM8.'.'.$ext8;
              $target8 = "$coverImgdir8".$imgRANDFS8;
              move_uploaded_file($source8, $target8);
              $imagepath8 = $imgRANDFS8;
              $edurp8='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath8;
              $postgr8;
              $postgr8=$postgr8.','.$edurp8;
              }
              $postgr8=ltrim($postgr8,',').',';
                //report upload ed
                $pera=mysqli_query($con,"insert into permanent_address(appl_id,avcndnme,avpost,avadd,avlndk,avcndnme2,avpost2,avadd2,avlndk2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$avcndnme','$avpost','$avadd','$avlndk','$avcndnme2','$avpost2','$avadd2','$avlndk2','$rmkpermanent_address','$postgr8','$dap','$srocpermanent_address','$lcntinpermanent_address','$cmpdtepermanent_address','$clrcdepermanent_address','$client_uid','$add_feepermanent_address')");
                if($pera){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>