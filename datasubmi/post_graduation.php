<?php 
//report upload st
                foreach($_FILES["filepost_graduation"]["tmp_name"] as $key=>$tmp_name) {
                              $imagename = $_FILES['filepost_graduation']['name'][$key];
                              $source = $_FILES['filepost_graduation']['tmp_name'][$key];
                              $ext = pathinfo($imagename, PATHINFO_EXTENSION);
                              $imgRANDMR=rand(99999,10000);
                              $imgRANDM='postgr'.$apid.$imgRANDMR;
                              $coverImgdir = '/home/goldquest/public_html/assets/'.$mobile.'/'.'bckver/'.$apid.'/';
            if(!is_dir($coverImgdir)){
                mkdir($coverImgdir,0777,true);
            }
            /*$coverImgdir = $coverImgdir.'/'.$imagename;*/
              $imgRANDFS=$imgRANDM.'.'.$ext;
              $target = "$coverImgdir".$imgRANDFS;
              move_uploaded_file($source, $target);
              $imagepath = $imgRANDFS;
              $edurp='assets/'.$mobile.'/bckver/'.$apid.'/'.$imagepath;
              $postgr;
              $postgr=$postgr.','.$edurp;
              }
              $postgr=ltrim($postgr,',').',';
                //report upload ed
                $edv=mysqli_query($con,"insert into post_graduation(appl_id,nist,ncndi,enroln,dgre,mjr,myps,cidt,slnum,nist2,ncndi2,enroln2,dgre2,mjr2,myps2,cidt2,slnum2,remarks,report,date,source,location,cmpl_date,color_code,client_uid,add_fe) 
                values('$apid','$nist','$ncndi','$enroln','$dgre','$mjr','$myps','$cidt','$slnum','$nist2','$ncndi2','$enroln2','$dgre2','$mjr2','$myps2','$cidt2','$slnum2','$rmkpost_graduation','$postgr','$dap','$srocpost_graduation','$lcntinpost_graduation','$cmpdtepost_graduation','$clrcdepost_graduation','$client_uid','$add_feepost_graduation')");
                if($edv){
                    /*?>
                    <div style="text-align:center"><span style="border:1px solid orange;padding:5px;border-radis:10px">Education Check</span></div>
                    <?php*/
                }
?>