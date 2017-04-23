<?php
	session_start();	
	setcookie("loggedOn","false",time()-3600000, "/", "", 0);
	setcookie('user',"",time()-3600000, "/", "", 0);
		header( 'Location: PUBGMap.php' );
?>