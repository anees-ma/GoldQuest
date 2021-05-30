<?php
//report upload st
                foreach($_FILES["filepro_reference_2"]["tmp_name"] as $key7=>$tmp_name7) {
                              $imagename7 = $_FILES['filepro_reference_2']['name'][$key7];
                              $source7 = $_FILES['filepro_reference_2']['tmp_name'][$key7];
                              $ext7 = pathinfo($imagename7, PATHINFO_EXTENSION);
                              $imgRANDMR7=rand(99999,10000);
                              $imgRANDM7='pro2'.$apid.$imgRANDMR7;
                              $coverImgdir7 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir7)){
                mkdir($coverImgdir7,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS7=$imgRANDM7.'.'.$ext7;
              $target7 = "$coverImgdir7".$imgRANDFS7;
              move_uploaded_file($source7, $target7);
              $imagepath7 = $imgRANDFS7;
              $edurp7='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath7;
              $postgr7;
              $postgr7=$postgr7.','.$edurp7;
              }
              $postgr7=ltrim($postgr7,',').',';
                //report upload ed
                $pro2=mysqli_query($con,"insert into pro_reference_2(appl_id,rrfnmep,rcndtlsp,rvbyp,raswsubp,rapsptp,rarimpp,rapkachp,rrfnmep2,rcndtlsp2,rvbyp2,raswsubp2,rapsptp2,rarimpp2,rapkachp2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$rrfnmep','$rcndtlsp','$rvbyp','$raswsubp','$rapsptp','$rarimpp','$rapkachp','$rrfnmep2','$rcndtlsp2','$rvbyp2','$raswsubp2','$rapsptp2','$rarimpp2','$rapkachp2','$rmkpro_reference_2','$postgr7','$dap','$srocpro_reference_2','$lcntinpro_reference_2','$cmpdtepro_reference_2','$clrcdepro_reference_2','$client_uid','$add_feepro_reference_2')");
                if($pro2){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>