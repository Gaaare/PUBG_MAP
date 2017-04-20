<?php
	session_start();
	
	$username= $_POST['un'];
	$password= $_POST['pw'];
	$_SESSION['un']= $username;
	$_SESSION['pw']= $password;
	
	
	if(empty($_SESSION['un'])){
		echo "no";
	}else{
		echo $_SESSION['un'];
	}
	
	
	
	
	
	
	

?>