<?php
//report upload st
                foreach($_FILES["file12_panel"]["tmp_name"] as $key13=>$tmp_name13) {
                              $imagename13 = $_FILES['file12_panel']['name'][$key13];
                              $source13 = $_FILES['file12_panel']['tmp_name'][$key13];
                              $ext13 = pathinfo($imagename13, PATHINFO_EXTENSION);
                              $imgRANDMR13=rand(99999,10000);
                              $imgRANDM13='twlp'.$apid.$imgRANDMR13;
                              $coverImgdir13 = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir13)){
                mkdir($coverImgdir13,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS13=$imgRANDM13.'.'.$ext13;
              $target13 = "$coverImgdir13".$imgRANDFS13;
              move_uploaded_file($source13, $target13);
              $imagepath13 = $imgRANDFS13;
              $edurp13='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath13;
              $postgr13;
              $postgr13=$postgr13.','.$edurp13;
              }
              $postgr13=ltrim($postgr13,',').',';
                //report upload ed
                $twlpl=mysqli_query($con,"insert into 12_panel(appl_id,nmcditw,totsttw,dktpetw,rsnftsttw,tstrestw,spcidtw,cocainetw,opiatestw,propoxyphenetw,marijuanatw,amphetaminestw,benzodiazepinestw,nmcditw2,totsttw2,dktpetw2,rsnftsttw2,tstrestw2,spcidtw2,methadonetw,phencyclidinetw,methamphetaminetw,oxycodonetw,barbituratestw,cannabinoidstw,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nmcditw','$totsttw','$dktpetw','$rsnftsttw','$tstrestw','$spcidtw','$cocainetw','$opiatestw','$propoxyphenetw','$marijuanatw','$amphetaminestw','$benzodiazepinestw','$nmcditw2','$totsttw2','$dktpetw2','$rsnftsttw2','$tstrestw2','$spcidtw2','$methadonetw','$phencyclidinetw','$methamphetaminetw','$oxycodonetw','$barbituratestw','$cannabinoidstw','$rmk12_panel','$postgr13','$dap','$sroc12_panel','$lcntin12_panel','$cmpdte12_panel','$clrcde12_panel','$client_uid','$add_fee12_panel')");
                if($twlpl){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>