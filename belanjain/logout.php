<?php 
  // mengaktifkan session php
  session_start();
  
  // menghapus semua session
  unset($_SESSION['customer']);
  
  // mengalihkan halaman ke halaman login
  header("location:index.php");
?>