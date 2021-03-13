<?php
//report upload st
                foreach($_FILES["file10_panel"]["tmp_name"] as $key12=>$tmp_name12) {
                              $imagename12 = $_FILES['file10_panel']['name'][$key12];
                              $source12 = $_FILES['file10_panel']['tmp_name'][$key12];
                              $ext12 = pathinfo($imagename12, PATHINFO_EXTENSION);
                              $imgRANDMR12=rand(99999,10000);
                              $imgRANDM12='tenp'.$apid.$imgRANDMR12;
                              $coverImgdir12 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir12)){
                mkdir($coverImgdir12,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS12=$imgRANDM12.'.'.$ext12;
              $target12 = "$coverImgdir12".$imgRANDFS12;
              move_uploaded_file($source12, $target12);
              $imagepath12 = $imgRANDFS12;
              $edurp12='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath12;
              $postgr12;
              $postgr12=$postgr12.','.$edurp12;
              }
              $postgr12=ltrim($postgr12,',').',';
                //report upload ed
                $tenpl=mysqli_query($con,"insert into 10_panel(appl_id,nmcdite,totstte,dktpete,rsnftstte,tstreste,spcidte,cocainete,opiateste,propoxyphenete,marijuanate,amphetamineste,benzodiazepineste,nmcdite2,totstte2,dktpete2,rsnftstte2,tstreste2,spcidte2,methadonete,phencyclidinete,methamphetaminete,oxycodonete,barbiturateste,cannabinoidste,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nmcdite','$totstte','$dktpete','$rsnftstte','$tstreste','$spcidte','$cocainete','$opiateste','$propoxyphenete','$marijuanate','$amphetamineste','$benzodiazepineste','$nmcdite2','$totstte2','$dktpete2','$rsnftstte2','$tstreste2','$spcidte2','$methadonete','$phencyclidinete','$methamphetaminete','$oxycodonete','$barbiturateste','$cannabinoidste','$rmk10_panel','$postgr12','$dap','$sroc10_panel','$lcntin10_panel','$cmpdte10_panel','$clrcde10_panel','$client_uid','$add_fee10_panel')");
                if($tenpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>