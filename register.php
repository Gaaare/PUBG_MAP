<?php
	session_start();
	
	require 'mapLogin.php';	
	
		
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		if(strlen($_POST['username'])>6 || strlen($_POST['password'])>6){
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$email = $_POST['email'];
		
		$query = "INSERT INTO users VALUES(NULL,'$username','$password','$email');";
		$result= $conn->query($query);
		if(!$result) die($conn->error);	
			setcookie("loggedOn","true",time()+604800,"/","",0);
			setcookie('user',$username,time()+604800, "/", "", 0);
			header('Location: PUBGMap.php');
		}else{
			echo "Username or password too short: Minimum 6 characters for each";
		}
	}else{
		echo "Invalid name or password";
	}
	
?>
<!DOCTYPE HTML>
<head>
	<title>PUBG Map</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.json.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
	<form method = 'POST' action='register.php'>
	<p>Username: </p>
	<input type='text' name='username'></input>
	<p>Password: </p>
	<input type='password' name='password'></input>
	<p>Email: </p>
	<input type='email' name='email'></input><br>
	<button type = 'submit'>register</button>
	</form>
</body>
</html>