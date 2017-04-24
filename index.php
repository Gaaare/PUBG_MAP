<?php
	session_start();
	if(!isset($_COOKIE['loggedOn']) || $_COOKIE['loggedOn']=="false"){
		echo "login failed";
	}else{
		$loggedOn = true;
	}
?>
<!DOCTYPE HTML>
<head>
	<title>PUBG Map</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
		<?php
			if($loggedOn == true){
			$username = $_COOKIE['user'];
			echo "<div id='loggedInUser'><p>Logged in as <span>"+$username+"</span></p></div>";}
		?>
		<img src="img/listButton.png" class="listButton"></img>
		<div class="markerList">
			<li class="hidden">
			</li>
		</div>
	
	<div class="markers"></div>
		<div class="map">
			<img src="img/map.jpg" class="map"></img>
		</div>	
	<input type="image" src="img/newMarkerButton.png" class="newMarker"></input>
	
	<?php
		if(!isset($_COOKIE['loggedOn']) || $_COOKIE['loggedOn']==false){
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
	