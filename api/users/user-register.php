<?php 
  require_once "../../config/database.php";
  require_once "../../config/function.php";
  
  // json response array
  $response = array("error" => FALSE);
  
  
  if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['address'])) {
    
      // menerima parameter POST ( email, password,  )
      $email = $_POST['email'];
      $password = $_POST['password'];
      $name = $_POST['name'];
      $phone_number = $_POST['phone_number'];
      $address = $_POST['address'];
      
      if($email != null && $password != null){
        //mengecek id apakah sudah pernah daftar atau belum
        if( cek_email($email) == 0 ){
          //mendaftarkan user baru
          $user = register_user($email, $password, $name, $phone_number, $address);
          if($user){
            // simpan user berhasil
            echo "<script>
              alert('Register successful')
              window.location.href = '../../belanjain/login.php';
            </script>";
          }else{
            // gagal menyimpan user
            echo "<script>
              alert('Registration failed!')
              window.location.href = '../../belanjain/register.php';
            </script>";
          }
        }else{
          // user telah ada
          echo "<script>
            alert('Registration failed! email has been used')
            window.location.href = '../../belanjain/register.php';
          </script>";
        }
      }else{
        echo "<script>
          alert('Registration failed! Email or password cannot be empty')
          window.location.href = '../../belanjain/register.php';
        </script>";
      }
  }
?>