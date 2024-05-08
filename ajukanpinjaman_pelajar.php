<?php
  session_start();
  require("php/connection.php");
  validation();
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
<form method="post" action="pinjaman_pelajar.php" class="mw-50 needs-validation shadow-lg p-3 h-auto d-inline-block rounded-2" style="width:500px; height: 700px">
  <div class="mb-1">
    <div class="title pt-3 pb-3">
        <h3>Pengajuan Pinjaman</h3>
    </div>
    <label for="exampleInputUsername" class="form-label">Nominal Pinjaman 500 Ribu - 2 juta</label>
    <input id="validationCustom01" name="nominal" required type="number" class="form-control" id="exampleInputUsername" aria-describedby="nominal">


    
  </div>
<div class="row mb-1">
 <div class="col">
    <label for="exampleInputPassword" class="form-label">Lama Angsuran</label>
    <select required name="angsur" class="form-select" aria-label="Default select example">
     <option value="1">1 bulan</option>
     <option value="2">2 Bulan</option>
     <option value="3">3 Bulan</option>
     <option value="4">4 Bulan</option>
    </select>
  </div>
  
</div>
<?php if(isset($_GET["error"]) && $_GET["error"] == "snk") : ?>
  <div class="alert alert-danger" role="alert">
    Harap menyetujui syarat dan kebijakan koperasi pikmi.
  </div>
  <?php endif ?>

  <div class="mb-3 form-check">
    <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Saya setuju dengan kebijakan bank plecit</label>
  </div>
<div class="row mb-1">
  
  <div class="button-group d-flex gap-2">
  <button id="btnsubmit" name="submit" type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
    
</div>

<script>
    const inputField = document.getElementById("validationCustom01");
    const submitButton = document.getElementById("btnsubmit");

    inputField.addEventListener("change", function() {
        var nilai = parseInt(this.value);
        if (nilai < 500000) {
            this.value = 500000;
        } else if (nilai > 2000000) {
            this.value = 2000000;
        }
        
        // Perbarui nilai setiap kali input berubah
        nilai = parseInt(this.value); 
        
        // Perbarui status tombol submit
        if (nilai >= 500000 && nilai <= 2000000) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });

    // Inisialisasi nilai saat pertama kali halaman dimuat
    var nilai = parseInt(inputField.value);
    
    // Perbarui status tombol submit
    if (nilai >= 500000 && nilai <= 2000000) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
</script>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>