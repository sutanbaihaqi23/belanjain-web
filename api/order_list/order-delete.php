<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$data = json_decode(file_get_contents("php://input"));

	if (isset($_GET['email'])) {
		$email = $_GET['email'];
		echo $email;
		
		$sql = $conn->prepare("DELETE FROM customer_chart WHERE email=?");
		$sql->bind_param("s", $email);
		$sql->execute();

		if($sql){
			header("location: ../../belanjain/index.php");
		}else{
			echo json_encode(array('RESPONSE' => 'FAILED'));
		}
	} else {
		echo "FAILED";
	}
?>