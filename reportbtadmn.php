<?php 
include 'header.php';
include 'config.php';
?>
<?php
extract($_POST);
$mobile=$mobil;
$ref_id=$rtrefid;
// report file upload st
$img_name = $_FILES['reportd']['name'];
$source=$_FILES["reportd"]["tmp_name"];
$imagename = $_FILES['reportd']['name'];
$ext = pathinfo($imagename, PATHINFO_EXTENSION);
     $imgRANDMR=rand(99999,10000);
               $imgRANDM=$ref_id;
              /*generating random image name ed*/
             $coverImgdir = '/home/goldquest/public_html/assets/'.$mobile.'/'.'reports/';
             if(!is_dir($coverImgdir)){
                mkdir($coverImgdir,0777,true);
            }
              $imgRANDFS=$imgRANDM.'.'.$ext;
              $target = "$coverImgdir".$imgRANDFS;
              move_uploaded_file($source, $target);
              $imagepath = $imgRANDFS;
              $imgN='assets/'.$mobile.'/reports/'.$imagepath;
 // report file upload ed
//insert data
$qry=mysqli_query($con,"update applications set report='$imgN' where ref_id='$ref_id'");
if($qry){
    ?>
    <script>
        history.back();
    </script>
    <?php
}
else{
    echo 'oops!';
}
?>
