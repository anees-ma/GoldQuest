<?php 
include 'header.php';
include 'config.php';

$cstata=$_POST['cstata'];
$cuidss=$_POST['cuidss'];

if($cstata != '-select-'){
$qry=mysqli_query($con,"update applications set status='$cstata' where ref_id='$cuidss'");
if($qry){
    ?>
    <span><?php echo strtoupper($cstata);?></span>
    <?php
}
else{
?>
<span>oops!</span>
<?php
}
}
else{
    ?>
    <span>oops!</span>
    <?php
}
?>

