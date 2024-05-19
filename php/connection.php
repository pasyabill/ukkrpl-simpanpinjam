<?php
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'simpan_pinjam'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

// Buat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
function formatNumber($number) {
  // Format angka dengan ribuan dipisahkan oleh titik dan dua desimal
  $rr= number_format($number, 2, ',', '.');
  return "Rp.".$rr;
}
function query($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    return $result;
}

function validation(){
        if(isset($_SESSION["userid"]) && isset( $_SESSION["pass"])){
    $userid = $_SESSION["userid"];
    $query = "SELECT * FROM anggota WHERE id_anggota= '$userid'";
    $login =  query($query);
    $user = mysqli_fetch_assoc($login);
    if(mysqli_num_rows($login) == 0 || !password_verify($_SESSION["pass"], $user["password"])){
        header("Location: login.php");
        exit();
    }

}else  if(isset($_COOKIE["remember"]) && isset($_COOKIE["name"])){
    $username = $_COOKIE["userid"];
    $password = $_COOKIE["password"];
  
    $query = "SELECT * FROM anggota WHERE id_anggota= '$username'";
      $login =  query($query);
    if($login && mysqli_num_rows($login)> 0){
      $user = mysqli_fetch_assoc($login);
      if(password_verify($password, $user["password"])){
        $_SESSION['userid'] = $user['id_anggota'];
        $_SESSION['username'] = $user['nama'];
        
        $_SESSION['pass'] = $user['password'];
      }
    }else{
      header("Location: login.php");
      exit();
    }
  }else
  {
      header("Location: login.php");
      exit();
  }
}


function validationAdmin(){
  if(isset($_SESSION["adminid"]) && isset( $_SESSION["adminpass"])){
    $userid = $_SESSION["adminid"];
    $query = "SELECT * FROM petugas_koperasi WHERE id_petugas= '$userid'";
    $login =  query($query);
    $user = mysqli_fetch_assoc($login);
    if(mysqli_num_rows($login) == 0 || !password_verify($_SESSION["adminpass"], $user["password"])){
        header("Location: loginpetugas.php");
        exit();
    }

}else  if(isset($_COOKIE["rememberadmin"]) && isset($_COOKIE["adminname"])){
    $username = $_COOKIE["adminid"];
    $password = $_COOKIE["adminpassword"];
  
    $query = "SELECT * FROM petugas_koperasi WHERE id_petugas= '$username'";
      $login =  query($query);
    if($login && mysqli_num_rows($login)> 0){
      $user = mysqli_fetch_assoc($login);
      if(password_verify($password, $user["password"])){
        $_SESSION['adminid'] = $user['id_petugas'];
        $_SESSION['adminpass'] = $user['password'];
      }
    }else{
      header("Location: loginpetugas.php");
      exit();
    }
  }else
  {
      header("Location: loginpetugas.php");
      exit();
  }
}
?>