<body style="margin:0px;text-align:center;font-size:20px;font-weight:700">
<header style="background-color:#3e76a5;color:white;width:100%">DOCS FRAME</header>
<?php
include 'config.php';
$refidd=$_REQUEST['rfidd'];
$qry=mysqli_query($con,"select * from applications where ref_id='$refidd'");
$qryres=mysqli_fetch_assoc($qry);
$docs=$qryres['docs'];
$docsexp=explode(',',$docs);
$docnt=count($docsexp)-1;
$h=1;
$y=0;
for($y=0; $y < $docnt; $y++){
?>
<div style="text-align:center;font-size:20px;font-weight:700;width:50%;background-color:orange;margin:auto">DOCUMENT <?php echo $h;?></div>
<iframe src="<?php echo $docsexp[$y];?>" width="50%" height="100%" title="goldquestdocsview"></iframe>
<?php
$h++;
}
?>
</body>