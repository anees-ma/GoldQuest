<?php
    include_once 'config.php';
    if(isset($_POST)){
        if($_POST['type'] == 'client dropbox'){
            $mob_no = $_POST['mob_no'];
            $email_id = $_POST['email'];
            $res = array('mob' => 0, 'email' => 0, 'status'=>0);
            $mobNoQry=mysqli_query($con,"select id from candidate_application where mobile_number=".$mob_no);
            $mob=mysqli_fetch_assoc($mobNoQry)['id'];
            if($mob == ''){
                $res['mob'] = 1;
            }
            $emailQry=mysqli_query($con,"select id from candidate_application where email_id='".$email_id."'");
            $email=mysqli_fetch_assoc($emailQry)['id'];
            if($email == ''){
                $res['email'] = 1;
            }

            if($res['mob']==1 && $res['email']==1){
                $res['status'] = 1;
            }
        }elseif($_POST['type'] =='candidate portal'){
            $res = array('mob' => 0, 'status'=>0);
            $candidate_id = $_POST['cid'];
            $mob_no = $_POST['mob_no'];
            $mobNoQry=mysqli_query($con,"select id from candidate_application where mobile_number=".$mob_no." AND id!=".$candidate_id);
            $mob=mysqli_fetch_assoc($mobNoQry)['id'];
            if($mob == ''){
                $res['mob'] = 1;
                $res['status'] = 1;
            }
        }elseif($_POST['type'] =='add client'){
            $res = array('client_id' => 0, 'status'=>0);
            $client_id = $_POST['clientid'];
            $client_id_qry=mysqli_query($con,"select id from clent_details where client_uid='".$client_id."'");
            $client_uid=mysqli_fetch_assoc($client_id_qry)['id'];
            if($client_uid == ''){
                $res['client_id'] = 1;
                $res['status'] = 1;
            }
        }

        echo json_encode($res);
        Exit;
    }
?>