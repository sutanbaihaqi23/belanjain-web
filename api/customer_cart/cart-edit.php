<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$data = json_decode(file_get_contents("php://input"));

	if(($data->id != null) && ($data->customer_id != null)){
		$id = $data->id;
		$customer_id = $data->customer_id;
		$product_id = $data->product_id;
		$quantity = $data->quantity;

		$sql = $conn->prepare("UPDATE customer_chart SET product_id=?, quantity = ? WHERE id=? && customer_id=?");
		$sql->bind_param('iiii', $product_id, $quantity, $id, $customer_id);
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