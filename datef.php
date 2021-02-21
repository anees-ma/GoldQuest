<?php
	$date1="01-06-2020";
	$date2="03-06-2020";

	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  $cvh=round($diff / 86400);

	echo "Difference between in two dates : " .$cvh. " Days ";
?>