<?php 
	include_once 'config.php';
	if(isset($_POST)){
		if(isset($_POST['type'])){
			mysqli_autocommit($con, false);
		foreach ($_POST['deleteIds'] as $key => $value) {
			$sql = "DELETE FROM `clent_details` WHERE id=".intval($value);
			mysqli_query($con,$sql);
			$sql2 = "DELETE FROM `applications` WHERE client_uid='".$_POST['clientUids'][$key]."'";
			mysqli_query($con,$sql2);
			$sql3 = "DELETE FROM `applic_entry` WHERE gqg_ref_id='".$_POST['clientUids'][$key]."'";
			mysqli_query($con,$sql3);
			$sql4 = "DELETE FROM `client_login` WHERE client_uid='".$_POST['clientUids'][$key]."'";
			mysqli_query($con,$sql4);
		}
		if(mysqli_commit($con)){
			$page = $_POST['type'];
			include 'client-list-proxy.php';

		}else{
			mysqli_rollback($con);
			echo 'false';
		}
		mysqli_close($con);
		exit;
	}elseif($_POST['client_master_tracker']){
		$status = $_POST['case_stau'];
		
		if($status=='Completed'){
			$where = "AND status='completed'";
		}else{
			$where = "AND status!='completed'";
		}
		
		mysqli_autocommit($con, false);
		foreach ($_POST['deleteIds'] as $key => $value) {
			$sql = "DELETE FROM `applications` WHERE client_uid='".$value."' ".$where;
			mysqli_query($con,$sql);
		}
		if(mysqli_commit($con)){
			include 'casestatus.php';

		}else{
			mysqli_rollback($con);
			echo 'false';
		}
		echo mysqli_info($con);
		mysqli_close($con);
		exit;
	}elseif($_POST['delete_client_login']=='true'){
		mysqli_autocommit($con, false);
		$sql = "DELETE FROM `client_login` WHERE id=".intval($_POST['clientId']);
			mysqli_query($con,$sql);

			$sql1 = "DELETE FROM `clent_details` WHERE client_uid='".$_POST['clientUid']."'";
			mysqli_query($con,$sql1);
			$sql2 = "DELETE FROM `applications` WHERE client_uid='".$_POST['clientUid']."'";
			mysqli_query($con,$sql2);
			$sql3 = "DELETE FROM `applic_entry` WHERE gqg_ref_id='".$_POST['clientUid'][$key]."'";
			mysqli_query($con,$sql3);

			if(mysqli_commit($con)){
				include 'client-login-credentials-proxy.php';

			}else{
				mysqli_rollback($con);
				echo 'false';
			}
			mysqli_close($con);
			exit;
	}elseif($_POST['delete_report_single']=='true'){
		$cliuid = $_POST['clientUid'];
		$cgwtt_sta2 = $_POST['status'];
		$sql = "DELETE FROM `applications` WHERE id=".intval($_POST['applicId']);
		mysqli_query($con,$sql);
		include 'master-tracker-report-proxy.php';
		exit;
	}
}
?>