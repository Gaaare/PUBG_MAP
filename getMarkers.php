<?php
	
		require 'mapLogin.php';
		$conn = new mysqli($hn, $un, $pw, $db);
		if($conn->connect_error) die ($conn->connect_error);
		
		$query = "SELECT * FROM map_coords";
		$result= $conn->query($query);
		if(!$result) die ($conn-error);

		$rows = $result->num_rows;
		
		$json = array();
		while($row = mysqli_fetch_assoc($result)){
			$json['Coords'][]=$row;
		}
		echo json_encode($json);

?>