<?php
 require("../php/connection.php");
 $nama = $_POST["nama"];
 $nameused = query("Select * from anggota where nama = '$nama'");
 if(mysqli_num_rows($nameused) > 0){
   header("Location: register.php?invalid=true");
   exit();
 }
 if(count($_POST) >= 7){
   if(isset($_POST['submitpass'])){
  if($_POST["password"] == $_POST["p2"]){
    $nama = $_POST["nama"];
   
      $id = uniqid();
    $alamat = $_POST["alamat"];
    $tgllhr = $_POST["tgllhr"];
    $tmplhr = $_POST["tmplhr"];
    $jk = $_POST["jenis_kelamin"];
    $status = $_POST["status"];
    $no_tlp = $_POST["no_tlp"];
    $keterangan = $_POST["keterangan"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $query = "INSERT INTO anggota VALUES ('$id', '$nama', '$alamat', '$tgllhr', '$tmplhr', '$jk', '$status', '$no_tlp', '$keterangan', '$password')";
    $add = query($query);
    $query2 = "INSERT INTO saldo(id_anggota) VALUES ('$id')";
    $add2 = query($query2);
    if($add){
      unset($_POST);
      header(("Location: registerSucces.php"));
    }
  } else{
      header("Location: password.php?invalid=true");
      exit();

     }
   }

 }else{
   header("Location: register.php");
   exit();

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
    <style>
      .hidden{
        display: none;
      }
    </style>
</head>
<body>
    
<div class="box">
    <form method="post" action="" class="mw-50 shadow-lg p-3 h-auto d-inline-block rounded-2 needs-validation" style="width: 400px; height: 600px">
        <div class="mb-3">
            <div class="title pt-3 pb-3">
                <h3>Buat Password</h3>
            </div>
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input name="password" required minlength="8" type="password" class="form-control" id="exampleInputPassword" aria-describedby="password">
            <div id="passwordError" class="message hidden">
                Verifikasi tidak cocok
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input name="p2" required type="password" class="form-control" id="exampleInputConfirmPassword">
        </div>
        <?php if(count($_POST) >= 7 ) : ?>
            <input type="hidden" name="nama" value="<?php echo($_POST['nama']); ?>">
            <input type="hidden" name="jenis_kelamin" value="<?php echo($_POST['jenis_kelamin']); ?>">
            <input type="hidden" name="tgllhr" value="<?php echo($_POST['tgllhr']); ?>">
            <input type="hidden" name="tmplhr" value="<?php echo($_POST['tmplhr']); ?>">
            <input type="hidden" name="status" value="<?php echo($_POST['status']); ?>">
            <input type="hidden" name="alamat" value="<?php echo($_POST['alamat']); ?>">
            <input type="hidden" name="keterangan" value="<?php echo($_POST['keterangan']); ?>">
            <input type="hidden" name="no_tlp" value="<?php echo($_POST['no_tlp']); ?>">
        <?php endif ?>

        <?php if(isset($_GET["invalid"])) : ?>
            <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div>
        <?php endif ?>
        <div class="button-group d-flex gap-2">
            <button type="submit" id="btnsubmit" name="submitpass" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
    // Fungsi untuk memeriksa apakah password cocok
    function checkPasswordMatch() {
        var password = document.getElementById("exampleInputPassword").value;
        var confirmPassword = document.getElementById("exampleInputConfirmPassword").value;
        var submitbtn = document.getElementById("btnsubmit");

        // Jika password dan konfirmasi password tidak sama
        if (password != confirmPassword && confirmPassword != '') {
            document.getElementById("passwordError").classList.remove("hidden");
            submitbtn.disabled = true;
            return false;
        } else {
            document.getElementById("passwordError").classList.add("hidden");
            submitbtn.disabled = false;
            return true;
        }
    }

    // Tambahkan event listener ke kedua input password
    document.getElementById("exampleInputPassword").addEventListener("input", checkPasswordMatch);
    document.getElementById("exampleInputConfirmPassword").addEventListener("input", checkPasswordMatch);
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>