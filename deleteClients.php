<?php 
	include_once 'config.php';
	if(isset($_POST)){
		if(isset($_POST['type'])){
			mysqli_autocommit($con, false);
		foreach ($_POST['deleteIds'] as $key => $value) {
			$sql = "DELETE FROM `clent_details` WHERE id=".intval($value);
			mysqli_query($con,$sql);
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
	}elseif($_POST['deleteIds']){
		mysqli_autocommit($con, false);
		foreach ($_POST['deleteIds'] as $key => $value) {
			$sql = "DELETE FROM `applications` WHERE id=".intval($value);
			mysqli_query($con,$sql);
		}
		if(mysqli_commit($con)){
			include 'casestatus.php';

		}else{
			mysqli_rollback($con);
			echo 'false';
		}
		mysqli_close($con);
		exit;
	}
}
?>