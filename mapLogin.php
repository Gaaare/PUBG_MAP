<?php
	$hn = 'localhost';
	$un = 'gare';
	$pw = 'titty';
	$db = "pubg_map";
	
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die ($conn->connect_error);
?>