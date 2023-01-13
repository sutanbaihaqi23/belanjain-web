<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	if (isset($_POST['email']) && isset($_POST['product_id'])) {
		$email = $_POST['email'];
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$payment_method = $_POST['payment_method'];
		$total_price = $_POST['total_price'];
		$image = $_POST['image'];


		// echo ($email);
		// echo ($product_id);
		// echo ($product_name); 
		// echo ($price);
		// echo ($quantity);
		// echo ($payment_method);
		// echo ($total_price);
		// echo ($image);



		$sql = $conn->prepare("INSERT INTO order_list (email, product_id, product_name, price, quantity, payment_method, total_price, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->bind_param('sisiisis', $email, $product_id, $product_name, $price, $quantity, $payment_method, $total_price, $image);
		$sql->execute();

		if ($sql) {
			header("location: ../../belanjain/index.php");
		}else {
			echo "FAILED1";
		}
	} else {
		echo "FAILED2";
	}
?>