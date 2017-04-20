<?php
	session_start();
	unset($_SESSION['un']);
	unset($_SESSION['pw']);
	unset($_SESSION['loggedOn']);
	
		header( 'Location: PUBGMap.php' );
?>