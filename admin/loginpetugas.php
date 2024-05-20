<?php
require("../php/connection.php");
session_start();

  if(isset($_COOKIE["rememberadmin"])){
    $userid = $_COOKIE["adminid"];
    $password = $_COOKIE["adminpassword"];

    $query = "SELECT * FROM petugas_koperasi WHERE id_petugas= '$userid'";
    $login =  query($query);
    if($login && mysqli_num_rows($login)> 0){
      $user = mysqli_fetch_assoc($login);
      if(password_verify($password, $user["password"])){
        session_start();
        $_SESSION['adminid'] = $user['id_petugas'];
        $_SESSION['adminpass'] = $password;
        header("Location: dashboard_petugas.php");
        exit();
      }
    }
  }
  if(isset($_POST["submit"])){
    $nama = $_POST["username"];

    $password = $_POST["password"];

    $query = "SELECT * FROM petugas_koperasi WHERE nama= '$nama'";
    $login =  query($query);

    if($login && mysqli_num_rows($login)> 0){
      $user = mysqli_fetch_assoc($login);
      if(password_verify($password, $user["password"])){
        $_SESSION['adminid'] = $user['id_petugas'];
        $_SESSION['adminpass'] = $password;
        if($_POST["remember"]){
          setcookie("rememberadmin", "true", time() + (86400 * 30), "/");
          setcookie("adminid", $user["id_petugas"], time() + (86400 * 30), "/");
          setcookie("adminpassword", $password, time() + (86400 * 30), "/");

        }
        header("Location: dashboard_petugas.php");
        exit();
      }else{
        header("Location: loginpetugas.php?error=password_incorrect");
        exit();
      }
    }else{
      header("Location: loginpetugas.php?error=user_not_found");
      exit();
    }
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
    
<div class="box ">
<form method="post" action="" class="mw-50 shadow-lg p-3 h-auto d-inline-block rounded-2" style="width: 400px; height: 600px">
  <div class="mb-3">
    <div class="title pt-3 pb-3">
        <h3>Login Petugas Plecit</h3>
    </div>
    <label for="exampleInputUsername" class="form-label">Username</label>
    <input name="username" required  type="text" class="form-control" id="exampleInputUsername" aria-describedby="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <?php if(isset($_GET["error"]) && $_GET["error"] == "password_incorrect") : ?>
  <div class="alert alert-danger" role="alert">
    Password Salah
  </div>
  <?php endif ?>
  <?php if(isset($_GET["error"]) && $_GET["error"] == "user_not_found") : ?>
  <div class="alert alert-danger" role="alert">
    nama pengguna tidak ditemukan.
  </div>
  <?php endif ?>

  <div class="mb-3 form-check">
    <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
  </div>
  <div class="button-group d-flex gap-2">
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
    
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>