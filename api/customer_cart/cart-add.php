<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');


	if (isset($_POST['product_id']) && isset ($_POST['user_id'])) { 

		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$price = $_POST['price'];
		$size = $_POST['size'];
		$color = $_POST['color'];
		$quantity = $_POST['quantity'];
		$email = $_POST['user_id'];
		$image = $_POST['image'];



		echo $product_id;
		echo $product_name;
		echo $price;
		echo $size;
		echo $color;
		echo $quantity;
		echo $email;
		



		$sql = $conn->prepare("INSERT INTO customer_chart(product_id, product_name, price, size, color, quantity, email, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->bind_param('isississ', $product_id, $product_name, $price, $size, $color, $quantity, $email, $image);
		$sql->execute();

		if ($sql) {
			header("location: ../../belanjain/product-detail.php?id=$product_id");
		} else {
			echo "FAILED";
		}
	} else {
		echo "FAILED" ;
	}
?>