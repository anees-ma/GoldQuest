<?php 
	$whitelist = array(
	    '127.0.0.1',
	    '::1'
		);

	if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	    define('APP_PATH', 'http://www.goldquestglobal.in');
	    define('DB_NAME','gold_quest_global');
	    $con=mysqli_connect('localhost','goldquest_tech','#QGG_GQT_eng1@','gold_quest_global');
	}else{
		define('APP_PATH', 'http://localhost/GoldQuestNew');
		define('DB_NAME','goldquest');
		$con=mysqli_connect('localhost','root','','goldquest');
	}
	define('APP_FILE_PATH', __DIR__.'/');
?>