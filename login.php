<?php
	session_start();	
	
	//get login user input
	$username= $_POST['unLogin'];
	$password= $_POST['pwLogin'];	
	
	require 'mapLogin.php';
	
	$query = "SELECT password FROM users WHERE username='$username'";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	$rows = $result->num_rows;
	
	if($rows == 1){
		//set $hash to the hashed password saved in DB
		$hash = $result->fetch_assoc()['password'];
		$id = $result->fetch_assoc()['UserID'];
	}else{
		echo "not workin";
	}
	
	//check user password with password saved in db
	if(password_verify($password, $hash)){
		$_SESSION['un']= $username;
		setcookie('loggedOn',"true",time()+604800, "/", "", 0);
		setcookie('user',$username,time()+604800, "/", "", 0);
		header( 'Location: PUBGMap.php' );
		
	}else{
		header( 'Location: PUBGMap.php' );
		
	}
	
	$conn->close();

	
	
	
	
	

?>