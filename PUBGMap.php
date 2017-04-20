<?php
session_start();
if(!isset($_SESSION['loggedOn']) || $_SESSION['loggedOn']==false){
	echo "login failed";
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

	<div class="loginContainer hidden">
		<div class="loginSide">
			<div class="loginForm">
				<form method="post" action="login.php">
					<p>Log In </p><br>
					<p>Username:</p><input type="text" name="unLogin"></input>
					<p>Password:</p><input type="password" name="pwLogin"></input>
					<input type="submit" action="login.php"></input>
				</form>
			</div>
		</div>
		<div class="registerSide">
			<a href="register.php">Register</a>
			<button class="close">close</button>
		</div>
		
	</div>

	<div class="mapContainer">
	<div class="markers"></div>
		<div class="map">
			<img src="img/map.jpg" class="map"></img>
		</div>	
	
	<input type="image" src="img/newMarkerButton.png" class="newMarker"></button>
	<?php
	if(!isset($_SESSION['loggedOn']) || $_SESSION['loggedOn']==false){
		echo "<input type='image' class='login' src='img/loginButton.png'></image>"
		."<br><input type='image' class='register' src='img/register.png'></input>";
	}else{
		echo "<form type='post' action='logout.php'>";
		echo "<input type='submit' class='logout' src='img/logout.png' value=''></input>";
		echo "</form>";

	}
	?>
	</div>

</body>

</html>
	