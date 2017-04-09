<?php
	require_once 'mapLogin.php';	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);

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
	<div class="mapContainer">

	<div class="markers"></div>
		<div class="map">
			<img src="img/map.jpg" class="map"></img>
		</div>	
	
	<button class="newMarker">NewMarker</button>
	</div>

</body>

</html>
	