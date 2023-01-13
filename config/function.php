<?php
//-------------- mendaftarkan user -------------------//
function register_user($email, $password, $name, $phone_number, $address){
  global $conn;
      
  //mencegah sql injection
  $email = escape($email);
  $password = escape($password);
  
  $hash = hashSSHA($password); //mengencrypt password
  
  $salt = $hash["salt"]; //berisi kode string random yang nantinya                             digunakan saat proses decrypt pada proses validasi

  $encrypted_password = $hash["encrypted"]; //mengambil data password yang sudah di enkripsi untuk ditampung pada variabel encrypted_password

      
  $query = "INSERT INTO users(email, password, unique_id, name, phone_number, address) VALUES('$email', '$encrypted_password', '$salt', '$name', '$phone_number', '$address') ON DUPLICATE KEY UPDATE unique_id = '$salt'";
   
  $user_new = mysqli_query($conn, $query);
  if( $user_new ) {
        $usr = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $usr);
        $user = mysqli_fetch_assoc($result);
        return $user;
  }else{
        return NULL;
  }
}
//-------------- *** end *** -------------------//
  
//---- mencegah sql injection -----//
function escape($data){
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}
//----------- *** end *** ---------//
  
//--- mengecek email apakah sudah terdaftar atau belum ---//
function cek_email($email){
    global $conn;
    $query = "SELECT * FROM users WHERE email = '$email'";
    if( $result = mysqli_query($conn, $query) ) return mysqli_num_rows($result);
}
//---------------- *** end ***-------------------------//
  
//------------ mengenkripsi password ----------------//
function hashSSHA($password) {
    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
}
//------------ *** end *** -------------------------//
  
// -------- mengenkripsi password yang dimasukkan user saat login -->
function checkhashSSHA($salt, $password) {
 
    $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
    return $hash;
}
//------------ *** end *** -------------------------//
 
//----------------- cek data user dan validasi------------------//
function cek_data_user($email,$password){
    global $conn;
    //mencegah sql injection
    $email = escape($email);
    $password = escape($password);
     
    $query  = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
     
    $unique_id = $data['unique_id'];
    $encrypted_password = $data['password'];
    // mengencrypt password
    $hash = checkhashSSHA($unique_id, $password);
    //validasi password
    if($encrypted_password == $hash){
        return $data;
    }else{
        return false;
    }
}
//---------------------- *** end *** -------------------------//

//----------------- cek data user dan validasi------------------//
function cek_data_admin($email,$password){
    global $conn;
    //mencegah sql injection
    $email = escape($email);
    $password = escape($password);
     
    $query  = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
     
    $unique_id = $data['unique_id'];
    $encrypted_password = $data['password'];
    // mengencrypt password
    $hash = checkhashSSHA($unique_id, $password);
    //validasi password
    if($encrypted_password == $hash){
        return $data;
    }else{
        return false;
    }
}
//---------------------- *** end *** -------------------------//
?>