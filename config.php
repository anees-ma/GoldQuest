<?php 
	$whitelist = array(
	    '127.0.0.1',
	    '::1'
		);

	if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	    define('APP_FILE_PATH', '/home/goldquest/public_html/');
	    define('APP_PATH', 'http://www.goldquestglobal.in/');
	    define('DB_NAME','goldquest');
	}else{
		define('APP_FILE_PATH', '/xampp/htdocs/GoldQuest/');
		define('APP_PATH', 'http://localhost/GoldQuest/');
		define('DB_NAME','goldquest');
	}

	define('DB_NAME','goldquest');
	
	$con=mysqli_connect('localhost','root','','goldquest');
?>