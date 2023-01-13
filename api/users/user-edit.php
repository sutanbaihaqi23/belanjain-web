<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$data = json_decode(file_get_contents("php://input"));

	if($data->id!=null){
		$id = $data->id;
		$email = $data->email;
		$name = $data->name;
		$password = $data->password;
		$phone_number = $data->phone_number;
		$address = $data->address;


		$sql = $conn->prepare("UPDATE users SET email=?, name=?, password=?, phone_number=?, address=?, WHERE id=?");
		$sql->bind_param('sssiis', $email, $name, $password, $phone_number, $id, $address);
		$sql->execute();
		
		if($sql){
			echo json_encode(array('RESPONSE' => 'SUCCESS'));
		}else{
			echo json_encode(array('RESPONSE' => 'FAILED'));
		}
	}else{
		echo "FAILED";
	}
?>