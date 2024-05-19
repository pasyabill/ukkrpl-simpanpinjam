<?php
session_start();
require("../php/connection.php");
validation();
$lamaAngsur;
$max;
$min;
$bunga;

if(!isset($_GET["kategori"])){
    header("Location: dashboard.php");
    exit();
} else {
    if($_GET['kategori'] != "pelajar" && $_GET['kategori'] != "keluarga" && $_GET['kategori'] != "bisnis") {
        header("Location: dashboard.php");
        exit();
    }
}

$kategori = $_GET["kategori"];
switch($kategori) {
    case 'pelajar':
        $min = 500000;
        $max = 1900000;
        $lamaAngsur = 4;
        $bunga = 0.05;
        break;
    case 'keluarga':
        $min = 2000000;
        $max = 9900000;
        $lamaAngsur = 8;
        $bunga = 0.07;
        break;
    case 'bisnis':
        $min = 10000000;
        $max = 20000000;
        $lamaAngsur = 12;
        $bunga = 0.10;
        break;
    default:
        exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Pinjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    
<div class="box">
<form method="post" action="pinjaman_diajukan.php" class="mw-50 needs-validation shadow-lg p-3 h-auto d-inline-block rounded-2" style="width:500px; height: 700px">
    <div class="mb-1">
        <div class="title pt-3 pb-3">
            <h3>Pengajuan Pinjaman</h3>
        </div>
        <label for="nominalInput" id="text" class="form-label"></label>
        <input id="nominalInput" name="nominal" required type="number" class="form-control" aria-describedby="nominal">
    </div>
    <div class="row mb-1">
        <div class="col">
            <label for="angsurSelect" class="form-label">Lama Angsuran</label>
            <select required name="angsur" id="angsurSelect" class="form-select">
            </select>
        </div>
        <div class="col">
            <label for="kategoriSelect" class="form-label">Kategori</label>
            <select id="kategoriSelect" name="status" class="form-select">
                <option value="pelajar">Pelajar</option>
                <option value="keluarga">Keluarga</option>
                <option value="bisnis">Bisnis</option>
            </select>
        </div>
    </div>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "snk") : ?>
    <div class="alert alert-danger" role="alert">
        Harap menyetujui syarat dan kebijakan koperasi pikmi.
    </div>
    <?php endif ?>
    <div class="mb-3 form-check">
        <input required name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label  class="form-check-label" for="exampleCheck1">Saya setuju dengan kebijakan bank plecit</label>
    </div>
    <div class="row mb-1">
        <input type="hidden" name="kategori" value="<?= $kategori ?>">
        <div class="button-group d-flex gap-2">
            <button id="btnSubmit" name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kategoriSelect = document.getElementById('kategoriSelect');
    const nominalInput = document.getElementById('nominalInput');
    const angsurSelect = document.getElementById('angsurSelect');
    const submitButton = document.getElementById('btnSubmit');
    const text= document.getElementById('text');
    const inputField = document.getElementById('nominalInput');
    const kategori = '<?= $kategori ?>';
    let min = <?= $min ?>;
    let max = <?= $max ?>;
    const lamaAngsur = <?= $lamaAngsur ?>;

    kategoriSelect.value = kategori;
    text.innerHTML = `Nominal Pinjaman ${formatNumber(min)} - ${formatNumber(max)}`;
    for (let i = 1; i <= lamaAngsur; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = `${i} bulan`;
        angsurSelect.appendChild(option);
    }

   

    kategoriSelect.addEventListener('change', function() {
        const selectedKategori = this.value;
        switch (selectedKategori) {
            case 'pelajar':
                setParameters(500000, 1900000, 4);
                break;
            case 'keluarga':
                setParameters(2000000, 9900000, 8);
                break;
            case 'bisnis':
                setParameters(10000000, 200000000, 12);
                break;
        }
    });
 
    function setParameters(smin, smax, lamaAngsur) {
        text.innerHTML = `Nominal Pinjaman ${formatNumber(smin)} - ${formatNumber(smax)}`;
        min = smin;
        max = smax;
        nominalInput.min = min;
        nominalInput.max = max;

        while (angsurSelect.firstChild) {
            angsurSelect.removeChild(angsurSelect.firstChild);
        }
        for (let i = 1; i <= lamaAngsur; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = `${i} bulan`;
            angsurSelect.appendChild(option);
        }
    }
  
    inputField.addEventListener("change", function() {
        var nilai = parseInt(this.value);
        console.log(min);
        if (nilai < min) {
            this.value = min;
        } else if (nilai > max) {
            this.value = max;
        }
        
        // Perbarui nilai setiap kali input berubah
        nilai = parseInt(this.value); 
        
        // Perbarui status tombol submit
        
    });

    function formatNumber(num) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(num);
    }
    if (nilai >= min && nilai <= max) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
   
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
