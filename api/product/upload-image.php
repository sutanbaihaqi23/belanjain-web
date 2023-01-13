<?php 
$notification = "";

$image = array('','','');
$j = 0;
for ($i=0; $i<=2; $i++) {
			$rand = rand();
			$acc_ext = array('png', 'jpg', 'jpeg', 'gif', 'webp');
			$filename = $_FILES['image'.$i]['name'];
			$size = $_FILES['image'.$i]['size'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			$destination = "../../product-image/";
	
			if (!in_array($ext, $acc_ext)) {
				$notification .= "gagal 1";
			} else {
				if ($size < 1044070) {
					$xx = $rand.'_'.$filename;
					$image[$j] = $xx;
					$j++;

					move_uploaded_file($_FILES['image']['tmp_name'], $destination.$rand.'_'.$filename);
					$notification .= "berhansil 1";
					
				} else {
					$notification .= "gagal 3";
				}
			}
		}
echo $notification;
echo ("<br>");
echo $image[0];
echo ("<br>");
echo $image[1];
echo ("<br>");
echo $image[2];
?>
