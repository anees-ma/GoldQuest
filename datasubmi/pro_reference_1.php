<?php
//report upload st
                foreach($_FILES["filepro_reference_1"]["tmp_name"] as $key6=>$tmp_name6) {
                              $imagename6 = $_FILES['filepro_reference_1']['name'][$key6];
                              $source6 = $_FILES['filepro_reference_1']['tmp_name'][$key6];
                              $ext6 = pathinfo($imagename6, PATHINFO_EXTENSION);
                              $imgRANDMR6=rand(99999,10000);
                              $imgRANDM6='pro1'.$apid.$imgRANDMR6;
                              $coverImgdir6 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir6)){
                mkdir($coverImgdir6,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS6=$imgRANDM6.'.'.$ext6;
              $target6 = "$coverImgdir6".$imgRANDFS6;
              move_uploaded_file($source6, $target6);
              $imagepath6 = $imgRANDFS6;
              $edurp6='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath6;
              $postgr6;
              $postgr6=$postgr6.','.$edurp6;
              }
              $postgr6=ltrim($postgr6,',').',';
                //report upload ed
                $pro1=mysqli_query($con,"insert into pro_reference_1(appl_id,rrfnme,rcndtls,rvby,raswsub,rapspt,rarimp,rapkach,rrfnme2,rcndtls2,rvby2,raswsub2,rapspt2,rarimp2,rapkach2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$rrfnme','$rcndtls','$rvby','$raswsub','$rapspt','$rarimp','$rapkach','$rrfnme2','$rcndtls2','$rvby2','$raswsub2','$rapspt2','$rarimp2','$rapkach2','$rmkpro_reference_1','$postgr6','$dap','$srocpro_reference_1','$lcntinpro_reference_1','$cmpdtepro_reference_1','$clrcdepro_reference_1','$client_uid','$add_feepro_reference_1')");
                if($pro1){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>