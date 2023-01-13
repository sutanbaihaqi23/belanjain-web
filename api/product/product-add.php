<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../../config/database.php');


	$notification = "";

	if (isset($_POST['brand_name']) && isset($_POST['product_name']) &&	isset($_POST['category']) && isset($_POST['price']) &&
			isset($_POST['quantity']) && isset($_POST['description'])) 
	{

		$brand_name = $_POST['brand_name'];
		$product_name = $_POST['product_name'];
		$category = $_POST['category'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
    $description = $_POST['description'];

		$image = array('','','');

		for ($i=0; $i<=2; $i++) {
			$rand = rand();
			$acc_ext = array('png', 'jpg', 'jpeg', 'gif', 'webp');
			// $tmp_file=$_FILES['image'.$i]['tmp_name'];
			$filename = $_FILES['image'.$i]['name'];
			$size = $_FILES['image'.$i]['size'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			$destination = "../../product-image/";
	
			if (!in_array($ext, $acc_ext)) {
				$notification .= "gagal 1";

				echo "<script>
					alert('Extension file not accepted')
					window.location.href = '../../belanjain-admin/products.php';
				</script>";
			} else {
				if ($size < 1044070) {
					$xx = $rand.'_'.$filename;
					$image[$i] = $xx;

					move_uploaded_file($_FILES['image'.$i]['tmp_name'], $destination.$rand.'_'.$filename);
					$notification .= "berhansil 1";
					
				} else {
					$notification .= "gagal 3";
					echo "<script>
						alert('File size is too large')
						window.location.href = '../../belanjain-admin/product-register.php';
					</script>";					
				}
			}
		}



		$sql = $conn->prepare("INSERT INTO products (brand_name, product_name, category, price, quantity, description, image1, image2, image3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->bind_param('sssiissss', $brand_name, $product_name, $category, $price, $quantity, $description, $image[0], $image[1], $image[2]);
		$sql->execute();
		
		if ($sql) {
			$notification .= "berhasil 2";
			header("location: ../../belanjain-admin/product-register.php");
			// echo "<script>
			// 	alert('Register successful')
			// 	window.location.href = '../../belanjain-admin/product-register.php';
			// </script>";
		} else {
			$notification .= "gagal 4";

			echo "<script>
				alert('Product register failed')
				window.location.href = '../../belanjain-admin/product-register.php';
			</script>";
		}

		
	} else {
		$notification .= "gagal 5";

		echo "<script>
			alert('Product register failed')
			window.location.href = '../../belanjain-admin/product-register.php';
		</script>";
	}
	// echo $notification;
	// echo ("<br>");
	// echo $image[0];
	// echo ("<br>");
	// echo $image[1];
	// echo ("<br>");
	// echo $image[2];
?>