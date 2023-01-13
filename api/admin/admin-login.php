<?php 
  session_start();

  require_once "../../config/database.php";
  require_once "../../config/function.php";

  //mengecek parameter post
  if (isset($_POST['email']) && isset($_POST['password'])) {
    
    //menampung parameter ke dalam variabel
    $email  = $_POST['email'];
    $pass = $_POST['password'];
    
    $user = cek_data_admin($email, $pass);//validasi user

    if($user != false){
      //jika berhasil login
      $_SESSION["admin"] = $email;
      header("location: ../../belanjain-admin/users.php");
    }else{
      // user tidak ditemukan password/email salah
      echo "<script>
          alert('Login failed! wrong email or password')
          window.location.href = '../../belanjain-admin/login.php';
      </script>";
    }
  
  }else{
    echo "<script>
      alert('Email or password cannot be empty!')
      window.location.href = '../../belanjain-admin/login.php';
    </script>";
  }

?>