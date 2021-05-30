<?php
//report upload st
                foreach($_FILES["filecompany_site_visit"]["tmp_name"] as $key27=>$tmp_name27){
                              $imagename27 = $_FILES['filecompany_site_visit']['name'][$key27];
                              $source27 = $_FILES['filecompany_site_visit']['tmp_name'][$key27];
                              $ext27 = pathinfo($imagename27, PATHINFO_EXTENSION);
                              $imgRANDMR27=rand(99999,10000);
                              $imgRANDM27='csvr'.$apid.$imgRANDMR27;
                              $coverImgdir27 = APP_FILE_PATH.'assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir27)){
                mkdir($coverImgdir27,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS27=$imgRANDM27.'.'.$ext27;
              $target27 = "$coverImgdir27".$imgRANDFS27;
              move_uploaded_file($source27, $target27);
              $imagepath27 = $imgRANDFS27;
              $edurp27='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath27;
              $postgr27;
              $postgr27=$postgr27.','.$edurp27;
              }
              $postgr27=ltrim($postgr27,',').',';
                //report upload ed
                $csvr=mysqli_query($con,"insert into company_site_visit(appl_id,sinamcom,sidinted,siclnt,siaplid,sipckty,sirefno,sidterpt,sidtbirt,sicin,sirccde,sidtincr,siempidd,sifrmo,sito,sidesz,siednpy,sirsnfrlev,sirehireeel,sinamcom2,sidinted2,siclnt2,siaplid2,sipckty2,sirefno2,sidterpt2,sidtbirt2,sicin2,sirccde2,sidtincr2,siempidd2,sifrmo2,sito2,sidesz2,siednpy2,sirsnfrlev2,sirehireeel2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$sinamcom','$sidinted','$siclnt','$siaplid','$sipckty','$sirefno','$sidterpt','$sidtbirt','$sicin','$sirccde','$sidtincr','$siempidd','$sifrmo','$sito','$sidesz','$siednpy','$sirsnfrlev','$sirehireeel','$sinamcom2','$sidinted2','$siclnt2','$siaplid2','$sipckty2','$sirefno2','$sidterpt2','$sidtbirt2','$sicin2','$sirccde2','$sidtincr2','$siempidd2','$sifrmo2','$sito2','$sidesz2','$siednpy2','$sirsnfrlev2','$sirehireeel2','$rmkcompany_site_visit','$postgr27','$dap','$sroccompany_site_visit','$lcntincompany_site_visit','$cmpdtecompany_site_visit','$clrcdecompany_site_visit','$client_uid','$add_feecompany_site_visit')");
                if($csvr){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>