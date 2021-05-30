<?php
    include_once 'config.php';
        $mob_no = 9567892653;
        $email_id = 'devo.anees622@gmail.com';
        $res = array('mob' => 0, 'email' => 0, 'status'=>0);
        
        //$qry = "select id from candidate_application where mobile_number=".$_POST['mob_no'];
        $mobNoQry=mysqli_query($con,"select id from candidate_application where mobile_number=".$mob_no);
        $mob=mysqli_fetch_assoc($mobNoQry)['id'];
        if($mob == ''){
            $res['mob'] = 1;
        }

        //$qry = "select id from candidate_application where email_id='".$email_id."'";
        $emailQry=mysqli_query($con,"select id from candidate_application where email_id='".$email_id."'");
        $email=mysqli_fetch_assoc($emailQry)['id'];
        if($email == ''){
            $res['email'] = 1;
        }

        if($res['mob']==1 && $res['email']==1){
            $res['status'] = 1;
        }

        echo json_encode($res);//exit;
?>