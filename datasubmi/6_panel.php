<?php
//report upload st
                foreach($_FILES["file6_panel"]["tmp_name"] as $key11=>$tmp_name11) {
                              $imagename11 = $_FILES['file6_panel']['name'][$key11];
                              $source11 = $_FILES['file6_panel']['tmp_name'][$key11];
                              $ext11 = pathinfo($imagename11, PATHINFO_EXTENSION);
                              $imgRANDMR11=rand(99999,10000);
                              $imgRANDM11='sip'.$apid.$imgRANDMR11;
                              $coverImgdir11 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir11)){
                mkdir($coverImgdir11,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS11=$imgRANDM11.'.'.$ext11;
              $target11 = "$coverImgdir11".$imgRANDFS11;
              move_uploaded_file($source11, $target11);
              $imagepath11 = $imgRANDFS11;
              $edurp11='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath11;
              $postgr11;
              $postgr11=$postgr11.','.$edurp11;
              }
              $postgr11=ltrim($postgr11,',').',';
                //report upload ed
                $sipl=mysqli_query($con,"insert into 6_panel(appl_id,nmcdisi,totstsi,dktpesi,rsnftstsi,tstressi,spcidsi,cocainesi,opiatessi,propoxyphenesi,marijuanasi,amphetaminessi,benzodiazepinessi,nmcdisi2,totstsi2,dktpesi2,rsnftstsi2,tstressi2,spcidsi2,methadonesi,phencyclidinesi,methamphetaminesi,oxycodonesi,barbituratessi,cannabinoidssi,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nmcdisi','$totstsi','$dktpesi','$rsnftstsi','$tstressi','$spcidsi','$cocainesi','$opiatessi','$propoxyphenesi','$marijuanasi','$amphetaminessi','$benzodiazepinessi','$nmcdisi2','$totstsi2','$dktpesi2','$rsnftstsi2','$tstressi2','$spcidsi2','$methadonesi','$phencyclidinesi','$methamphetaminesi','$oxycodonesi','$barbituratessi','$cannabinoidssi','$rmk6_panel','$postgr11','$dap','$sroc6_panel','$lcntin6_panel','$cmpdte6_panel','$clrcde6_panel','$client_uid','$add_fee6_panel')");
                if($sipl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>