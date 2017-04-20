<?php		
		require_once 'mapLogin.php';
		
		$query = "SELECT * FROM map_coords";
		$result= $conn->query($query);
		if(!$result) die ($conn->error);

		$rows = $result->num_rows;		
		$json = array();
		
		while($row = mysqli_fetch_assoc($result)){
			$json['Coords'][]=$row;
		}
		
		$conn->close();
		echo json_encode($json);		
?>