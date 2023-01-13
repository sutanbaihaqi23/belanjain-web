<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$myArray = array();
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		if($result = mysqli_query($conn, "SELECT * FROM order_list WHERE id=$id")){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){
				$myArray[] = $row;
			}
			mysqli_close($conn);
			echo json_encode($myArray);
		}
	}
?>