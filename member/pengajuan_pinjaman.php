<?php
  session_start();
  require("../php/connection.php");
  validation();
  $lamaAngsur;
  $max;
  $min;

    $kategori = $_GET["kategori"];
    switch($kategori) {
      case 'pelajar' :
        global $lamaAngsur;
        global $max;
        global $min;
        $min = 500000;
        $max = 2000000;
        $lamaAngsur = 4;
        break;
      case 'keluarga' :
        global $lamaAngsur;
        $lamaAngsur = 8;
        $min = 500000;
        $max = 2000000;
        break;
      case 'bisnis' :
        global $lamaAngsur;
        $lamaAngsur = 12;
        $min = 500000;
        $max = 2000000;
        break;
      default :
        global $lamaAngsur;
        $lamaAngsur = 0;
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
    <link rel="stylesheet" href="css/main.css">
  </head>
</head>
<body>
    
<div class="box">
<form method="post" action="pinjaman_diajukan.php" class="mw-50 needs-validation shadow-lg p-3 h-auto d-inline-block rounded-2" style="width:500px; height: 700px">
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
    <?php for($i = 1; $i <= $lamaAngsur; $i++) : ?>
     <option value="<?= $i ?>"><?= $i ?> bulan</option>
    <?php endfor; ?>

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
  <input type="hidden" name="kategori" value="<?= $kategori ?>" id="">
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
        var min =  <?= $min ?>;
        var max =  <?= $max ?>;
        if (nilai < min) {
            this.value = min;
        } else if (nilai > max) {
            this.value = max;
        }
        
        // Perbarui nilai setiap kali input berubah
        nilai = parseInt(this.value); 
        
        // Perbarui status tombol submit
        if (nilai >= min && nilai <= max) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });


</script>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>