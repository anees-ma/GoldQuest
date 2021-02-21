<?php 
include 'config.php';

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];

//selection of client
$qry=mysqli_query($con,"select * from clent_details where client_uid='$c'");
$qryres=mysqli_fetch_assoc($qry);
$serv_li=$qryres['service_name'];
$serv_prics=$qryres['service_price'];
$serv_liexp=explode(',',$serv_li);
$serv_licnt=count($serv_liexp)-1;

for($i=0; $i < $serv_licnt; $i++){
    $servli=$serv_liexp[$i];
    if($servli == $a){
        $hj=$i;
    }
}
$serpirexp=explode(',',$serv_prics);
$serpirexp[$hj]=$b;
$finalpric=implode(',',$serpirexp);

//updation of price
$qryup=mysqli_query($con,"update clent_details set service_price='$finalpric' where client_uid='$c'");
if($qryup){
  ?>
  <span class="clstic"><img src="images/accept.png" style="height:40px;width:40px">&nbsp;</span>
  <?php
}

?>