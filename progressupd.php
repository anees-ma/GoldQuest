<?php 
include 'header.php';
include 'config.php';

$stata=$_POST['stata'];
$uidss=$_POST['uidss'];
$servnme=$_POST['servnme'];

if($stata != '-select-'){
$qry=mysqli_query($con,"update applications set $servnme='$stata' where ref_id='$uidss'");
if($qry){
    ?>
    <span><?php echo strtoupper($stata);?></span>
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

