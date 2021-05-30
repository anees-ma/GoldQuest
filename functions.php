<?php 

	function getServiceDisplayName($serviceName,$con){
		$qry=mysqli_query($con,"select display_name from service_names where service_name='$serviceName'");
	    $service=mysqli_fetch_row($qry);
	    return $service[0];
	}

	function getClientServicelistSelected($listItem)
    {
      return(substr($listItem, strrpos($listItem, '#' )+1));
    }
?>