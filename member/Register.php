<?php
  require("../php/connection.php");
  if(isset($_COOKIE["remember"]) && isset($_COOKIE["name"])){
  $username = $_COOKIE["name"];
  $password = $_COOKIE["password"];

  $query = "SELECT * FROM anggota WHERE nama= '$username'";
    $login =  query($query);
  if($login && mysqli_num_rows($login)> 0){
    $user = mysqli_fetch_assoc($login);

    if(password_verify($password, $user["password"])){
      session_start();
      $_SESSION['username'] = $user['nama'];
      header("Location: dashboard.php");
      exit();
    }
  }else{
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
    <link rel="stylesheet" href="css/main.css">
  </head>
</head>
<body>
    
<div class="box">
<form method="post" action="password.php" class="mw-50 needs-validation shadow-lg p-3 h-auto d-inline-block rounded-2" style="width:500px; height: 700px">
  <div class="mb-1">
    <div class="title pt-3 pb-3">
        <h3>Daftar Nasabah Plecit</h3>
    </div>
    <label for="exampleInputUsername" class="form-label">Nama</label>
    <input id="validationCustom01" name="nama" required type="text" class="form-control" id="exampleInputUsername" aria-describedby="username">
    
  </div>
  <div class="mb-1  ">
    <label for="exampleInputPassword1" class="form-label">Alamat</label>
    <input name="alamat" required type="text" class="form-control" id="exampleInputPassword1">
    <div class="invalid-feedback">
      Harap mengsi Alamat
    </div>
  </div>
  <div class="row mb-1">
    <div class="col">
    <label for="exampleInputUsername" class="form-label">Tanggal Lahir</label>
    <input name="tgllhr" required type="date" class="form-control" id="exampleInputPassword1">
        
      </div>
    <div class="col">
      <label label for="exampleInputUsername" class="form-label">Tempat Lahir</label>
      <input name="tmplhr" required type="text" class="form-control" id="exampleInputPassword1">
    </div>  

  </div>
<div class="row mb-1">
 <div class="col">
    <label for="exampleInputPassword" class="form-label">Jenis Kelamin</label>
    <select required name="jenis_kelamin" class="form-select" aria-label="Default select example">
     <option value="laki-laki">Laki-laki</option>
     <option value="perempuan">Perempuan</option>
    </select>
  </div>
  <div class="col">
    <label for="exampleInputPassword" class="form-label">Status</label>
    <select name="status" class="form-select" aria-label="Default select example">
     <option value="menikah">Menikah</option>
     <option value="lajang">Lajang</option>
    </select>
  </div>
</div>
   
<div class="row mb-1">
  <div class="col">
    <label  for="exampleInputPassword1" class="form-label">Keterangan</label>
    <input name="keterangan" required type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="col">
      <label  for="exampleInputPassword1" class="form-label">Nomor HP</label>
      <input name="no_tlp" type="text" class="form-control" id="exampleInputPassword1" required>
    </div>
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