<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$myArray = array();
	if ($result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC")){
		while ($row = $result->fetch_array(MYSQLI_ASSOC)){
			$myArray[] = $row;
		}
		mysqli_close($conn);
		echo json_encode($myArray);
	}
?>