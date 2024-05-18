
<?php
  require("../php/connection.php");
  session_start();
  validation();
  $userid = $_SESSION["userid"];


// Mengambil data angsuran
$datass = query("SELECT angsuran.*, detail_angsuran.* 
                 FROM angsuran 
                 JOIN detail_angsuran ON angsuran.id_angsuran = detail_angsuran.id_angsuran 
                 WHERE angsuran.id_anggota = '$userid'");

$totalhutang = 0;
$closest_due_date = null;

if (mysqli_num_rows($datass) > 0) {
    while ($row = mysqli_fetch_assoc($datass)) {
        $totalhutang += $row['besar_angsuran'];
        $current_due_date = new DateTime($row['tgl_jatuh_tempo']);
   
    }
    $hutang = formatNumber($totalhutang);
} else {
    $hutang = "Rp.0";
}

// Mengambil data simpanan
$datasss = query("SELECT * FROM simpanan WHERE id_anggota = '$userid'");
$totaltabungan = 0;

if (mysqli_num_rows($datasss) > 0) {
    while ($row = mysqli_fetch_assoc($datasss)) {
        $totaltabungan += $row['besar_simpanan'];
    }
    $tabungan = formatNumber($totaltabungan);
} else {
    $tabungan = "Rp.0";
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/easion.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <title>Pleciplus</title>
</head>
<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="index.html" class="easion-logo"><i class="fas fa-sun"></i> <span>PleciPlus</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="../index.php" class="dash-nav-item">
                <i class="fas fa-arrow-left"></i>Home </a>
                <a href="dashboard.php" class="dash-nav-item">
                    <i class="fas fa-info ps-3"></i> Dashboard </a>
                <a href="dashboard_pinjaman.php" class="dash-nav-item">
                     <i class="fas fa-money-bill-wave"></i>Pinjam/Angsuran </a>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar d-flex">
                    <h2>Zulfakayang</h2>
                <div class="tools">
 

                        
                        <a href="logout.php" class="btn btn-danger">logout</a>
                   

                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row ">
                      
                        <div class="col-xl-6 d-inline-block p-3 mb-2 bg-success-subtle text-success-emphasis">
                            <h6>Tabungan Anda</h6>
                            <h2><?= $tabungan ?> </h2>
                        </div>
                        <div class="col-xl-6 d-inline-block ms-5 p-3 mb-2 bg-success-subtle text-success-emphasis">
                            <h6>Pinjaman Anda</h6>
                            <h2><?= $hutang ?> </h2>

                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> History tabungan </div>
                                </div>
                                <div class="card-body easion-card-body-chart">
                                   <div class="row ">
                                            
                                   </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/easion.js"></script>
</body>

</html>