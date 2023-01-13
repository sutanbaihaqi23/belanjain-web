<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$data = json_decode(file_get_contents("php://input"));

	if ($data->id != null && $data->customer_id != null) {
		$id = $data->id;
		$customer_id = $data->customer_id;
		$product_id = $data->product_id;
		$total_price = $data->total_price;
		$payment_method = $data->payment_method;

		$sql = $conn->prepare("UPDATE order_list SET product_id=?, total_price=?, payment_method=? WHERE id=? && customer_id=?");
		$sql->bind_param('iisii', $product_id, $total_price, $payment_method, $id, $customer_id);
		$sql->execute();
		if($sql){
			echo json_encode(array('RESPONSE' => 'SUCCESS'));
		}else{
			echo json_encode(array('RESPONSE' => 'FAILED'));
		}
	} else {
		echo "FAILED";
	}
?>