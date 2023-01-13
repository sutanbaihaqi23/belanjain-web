<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');

	$data = json_decode(file_get_contents("php://input"));

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$brand_name = $_POST['brand_name'];
		$product_name = $_POST['product_name'];
		$category = $_POST['category'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
    $description = $_POST['description'];

		$sql = $conn->prepare("UPDATE products SET category=?, brand_name=?, product_name=?, quantity=?, price=?, description=? WHERE id=?");
		$sql->bind_param('sssiisi', $category, $brand_name, $product_name, $quantity, $price, $description, $id);
		$sql->execute();
		
		if($sql){

			for ($i=0; $i<=2; $i++) {
				$rand = rand();
				$acc_ext = array('png', 'jpg', 'jpeg', 'gif', 'webp');
				// $tmp_file=$_FILES['image'.$i]['tmp_name'];
				$filename = $_FILES['image'.$i]['name'];
				$size = $_FILES['image'.$i]['size'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
	
				$destination = "../../product-image/";
				$j = 1;
		
				if (!in_array($ext, $acc_ext)) {
					$notification .= "gagal 1";
	
				} else {
					if ($size < 1044070) {
						$xx = $rand.'_'.$filename;
						$image[$i] = $xx;
	
						move_uploaded_file($_FILES['image'.$i]['tmp_name'], $destination.$rand.'_'.$filename);
						

						$sql = $conn->prepare("UPDATE products SET image$j=? WHERE id=?");
						$sql->bind_param('si', $image[$i], $id);
						$sql->execute();

						$j++;
						$notification .= "berhansil 1";
						
					} else {
						$notification .= "gagal 3";				
					}
				}
			}

			header("location:../../belanjain-admin/products.php");
		}else{
			echo json_encode(array('RESPONSE' => 'FAILED1'));
		}
	} else {
		echo "FAILED2";
	}
	//echo $notification;
?>