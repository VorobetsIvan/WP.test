<?php
	session_start();

	require_once "../lib/class_appDB.php";		
	
	$config = new Config();
		$address = $config->address;
	unset($config);

	session_destroy();
	
	header("Location: ".$address);
	exit;
?>