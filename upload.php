<?php
	if(isset($_FILES['image'])){
		$errors = array();
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
		
		$extensions=array("jpeg","jpg","png");
		
		if(in_array($file_ext,$extensions)===false){
			$errors[]="extension not allowed";
		}
		if($file_size > 15000000){
			$errors[]='File too large';
		}
		
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"img/".$file_name);
			header("location:PUBGMap.php");    
		}else{
			print_r($errors);
		}
	}
?>
