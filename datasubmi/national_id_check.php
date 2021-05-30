<?php
//report upload st
                foreach($_FILES["filenational_id_check"]["tmp_name"] as $key26=>$tmp_name26){
                              $imagename26 = $_FILES['filenational_id_check']['name'][$key26];
                              $source26 = $_FILES['filenational_id_check']['tmp_name'][$key26];
                              $ext26 = pathinfo($imagename26, PATHINFO_EXTENSION);
                              $imgRANDMR26=rand(99999,10000);
                              $imgRANDM26='naid'.$apid.$imgRANDMR26;
                              $coverImgdir26 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir26)){
                mkdir($coverImgdir26,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS26=$imgRANDM26.'.'.$ext26;
              $target26 = "$coverImgdir26".$imgRANDFS26;
              move_uploaded_file($source26, $target26);
              $imagepath26 = $imgRANDFS26;
              $edurp26='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath26;
              $postgr26;
              $postgr26=$postgr26.','.$edurp26;
              }
              $postgr26=ltrim($postgr26,',').',';
                //report upload ed
                $naid=mysqli_query($con,"insert into national_id_check(appl_id,nttyid,ntidcrd,ntdovery,ntvrresul,ntverby,nttyid2,ntidcrd2,ntdovery2,ntvrresul2,ntverby2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nttyid','$ntidcrd','$ntdovery','$ntvrresul','$ntverby','$nttyid2','$ntidcrd2','$ntdovery2','$ntvrresul2','$ntverby2','$rmknational_id_check','$postgr26','$dap','$srocnational_id_check','$lcntinnational_id_check','$cmpdtenational_id_check','$clrcdenational_id_check','$client_uid','$add_feenational_id_check')");
                if($naid){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>