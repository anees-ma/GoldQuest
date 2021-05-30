<?php
//report upload st
                foreach($_FILES["fileinsta_drug_test"]["tmp_name"] as $key10=>$tmp_name10) {
                              $imagename10 = $_FILES['fileinsta_drug_test']['name'][$key10];
                              $source10 = $_FILES['fileinsta_drug_test']['tmp_name'][$key10];
                              $ext10 = pathinfo($imagename10, PATHINFO_EXTENSION);
                              $imgRANDMR10=rand(99999,10000);
                              $imgRANDM10='fip'.$apid.$imgRANDMR10;
                              $coverImgdir10 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir10)){
                mkdir($coverImgdir10,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS10=$imgRANDM10.'.'.$ext10;
              $target10 = "$coverImgdir10".$imgRANDFS10;
              move_uploaded_file($source10, $target10);
              $imagepath10 = $imgRANDFS10;
              $edurp10='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath10;
              $postgr10;
              $postgr10=$postgr10.','.$edurp10;
              }
              $postgr10=ltrim($postgr10,',').',';
                //report upload ed
                $fpl=mysqli_query($con,"insert into insta_drug_test(appl_id,nmcdidg,totstdg,dktpedg,rsnftstdg,tstresdg,spciddg,cocainedg,opiatesdg,propoxyphenedg,marijuanadg,amphetaminesdg,benzodiazepinesdg,nmcdidg2,totstdg2,dktpedg2,rsnftstdg2,tstresdg2,spciddg2,methadonedg,phencyclidinedg,methamphetaminedg,oxycodonedg,barbituratesdg,cannabinoidsdg,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nmcdidg','$totstdg','$dktpedg','$rsnftstdg','$tstresdg','$spciddg','$cocainedg','$opiatesdg','$propoxyphenedg','$marijuanadg','$amphetaminesdg','$benzodiazepinesdg','$nmcdidg2','$totstdg2','$dktpedg2','$rsnftstdg2','$tstresdg2','$spciddg2','$methadonedg','$phencyclidinedg','$methamphetaminedg','$oxycodonedg','$barbituratesdg','$cannabinoidsdg','$rmkinsta_drug_test','$postgr10','$dap','$srocinsta_drug_test','$lcntininsta_drug_test','$cmpdteinsta_drug_test','$clrcdeinsta_drug_test','$client_uid','$add_feeinsta_drug_test')");
                if($fpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>