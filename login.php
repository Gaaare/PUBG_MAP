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
	}else{
		echo "not workin";
	}
	
	//check user password with password saved in db
	if(password_verify($password, $hash)){
		$_SESSION['un']= $username;
		$_SESSION['loggedOn'] = true;
		header( 'Location: PUBGMap.php' );
		
	}else{
		header( 'Location: PUBGMap.php' );
	echo $hash;
		
	}
	
	$conn->close();

	
	
	
	
	

?>