<?php
	define('HOST','localhost');
	define('USER','root');
	define('DB','belanjain');
	//password disesuaikan dengan akses ke database masing-masing
	define('PASS','');
	$conn = new mysqli(HOST,USER,PASS,DB) or die('Koneksi Error Untuk Mengakses Database');
?>