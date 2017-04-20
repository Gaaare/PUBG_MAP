<?php
	session_start();
	if (!isset($_SESSION['loggedOn']) || $_SESSION['loggedOn']==false){
		$success = false;
		echo json_encode($success);
	}else{
	
	
	
	require 'mapLogin.php';/* 
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error); */
	
	if(!isset($_POST['x']) && !isset($_POST['y']))	{
		die("Coordinates not set");
	}/* else if(!isset($_POST['name']) || ($_POST['name'])=== ""){
		die("Name not set");
	} */else{
		$xcoord = $_POST['x'];
		$ycoord = $_POST['y'];
		$name = $_POST['name'];
		$success = true;
		echo json_encode($success);
		
	}
	
	$query = "INSERT INTO map_coords VALUES('$xcoord','$ycoord','$name',NULL)";
	//$query = "SELECT * FROM map_coords";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	$conn->close();
	}	
?>