<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['phone_number']) && isset($_POST['address'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];

		$sql = $conn->prepare("INSERT INTO users (email, name, password, phone_number, address) VALUES (?, ?, ?, ?, ?)");
		$sql->bind_param('sssis', $email, $name, $password, $phone_number, $address);
		$sql->execute();
		
		if ($sql) {
			echo json_encode(array('RESPONSE' => 'SUCCESS'));
		} else {
			echo "FAILED";
		}
	} else {
		echo "FAILED";
	}
?>