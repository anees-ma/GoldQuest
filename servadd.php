<?php 
//connection
include 'config.php';
$empty='';
extract($_POST);
$cnt=$elemcnt+1;

if(isset($submit)){
    if($sub1 != NULL){
        if($cnt > 1){
            $i=1;
            for($i=1; $i <= $cnt; $i++){
                $index="sub".$i;
                $valk[$i]=$_POST[$index];
                $valkst;
                $valkst=$valk[$i].','.$valkst;
            }
            $qry3=mysqli_query($con,"insert into serv_list(service_name,subservice_name) values('$service_name','$valkst')");
            if($qry3){
                header('location:https://admin.goldquestglobal.in');
            }
        }
        else{
            $qry2=mysqli_query($con,"insert into serv_list(service_name,subservice_name) values('$service_name','$sub1')");
            if($qry2){
                header('location:https://admin.goldquestglobal.in');
            }
        }
        
    }
    else{
        $qry=mysqli_query($con,"insert into serv_list(service_name,subservice_name) values('$service_name','$empty')");
        if($qry){
            header('location:https://admin.goldquestglobal.in');
        }
    }
    
}
?>