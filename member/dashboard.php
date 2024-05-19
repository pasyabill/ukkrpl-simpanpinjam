
<?php
  require("../php/connection.php");
  session_start();
  validation();
  $userid = $_SESSION["userid"];


// Mengambil data angsuran
$datass = query("SELECT angsuran.*, detail_angsuran.* 
                 FROM angsuran 
                 JOIN detail_angsuran ON angsuran.id_angsuran = detail_angsuran.id_angsuran 
                 WHERE angsuran.id_anggota = '$userid' and ket != 'lunas'");

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
$datasss = query("SELECT * FROM saldo WHERE id_anggota = '$userid'");
$totaltabungan = 0;

if (mysqli_num_rows($datasss) > 0) {
    $row = mysqli_fetch_assoc($datasss);
    $tabungan = formatNumber($row['saldo']);
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
    <style>
    .group {
        display: flex;
        line-height: 28px;
        align-items: center;
        position: relative;
        max-width: 190px;
    }

    .input {
        width: 100%;
        height: 40px;
        line-height: 28px;
        padding: 0 1rem;
        padding-left: 2.5rem;
        border: 2px solid transparent;
        border-radius: 8px;
        outline: none;
        background-color: #f3f3f4;
        color: #0d0c22;
        transition: .3s ease;
    }

    .input::placeholder {
        color: #9e9ea7;
    }

    .input:focus,
    input:hover {
        outline: none;
        border-color: rgba(234, 76, 137, 0.4);
        background-color: #fff;
        box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
    }

    .icon {
        position: absolute;
        left: 1rem;
        fill: #9e9ea7;
        width: 1rem;
        height: 1rem;
    }

    .search_box {
        margin-left: 10px;
    }

    .dropdown_angsur {
        height: 50px;

    }

    .topContent>.col {
        display: block;
        align-self: center;
    }

    .topContent {
        display: block;
        padding-bottom: 10px;
    }

    .drop_box {
        padding-bottom: 10px;
        padding-top: 10px;
    }

    .drop_content>.col {
        align-self: center;

    }
    .drop_content{
        border-bottom: 0.3px solid rgba(234, 76, 137, 0.4);
        
    }

    .hidden {
        display: none;
    }

    .card-body {
        height: auto;
    }

    .angsur_row_parent{
        border-bottom: 1px solid #0d0c22;
        padding-bottom: 10px;
        padding-top: 10px;
    }
    .angsur_row_parent>.col {
        align-self: center;

    }

    .drop_content_header{
        border-bottom: 0.55px solid rgba(0, 0, 0, 0.7);
        padding-bottom: 10px;
        font-weight: bold   ;
        margin-bottom: 10px;
        margin-top: -10px;
    }
    </style>
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
                    <h2><?= $_SESSION['username']?></h2>
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
                                <div  class="row text-center drop_content drop_content_header">
                                                <div class="col">Tanggal</div>
                                                <div class="col">Nama</div>
                                                <div class="col">Nominal</div>
                                                <div class="col">keterangan</div>

                                            </div>
                                    <?php
                                    
                                   
                
                              
                                    $query = "SELECT * FROM simpanan where id_anggota='{$_SESSION['userid']}'";

                                  
                                      $data = query($query);
                                      if(mysqli_num_rows($data) > 0) :
                                      while($row = mysqli_fetch_assoc($data)) : 
                               ?>
                                    <div class="text-center col">
                                        <div class=" topContent">
                                            <div class="row angsur_row_parent text-center">
                                            
                                                <div class="col"><?php echo $row['tgl_simpanan']; ?></div>
                                                <div class="col"><?php echo $row['nm_simpanan']; ?></div>
                                                <div class="col"><?php echo formatNumber($row['besar_simpanan']); ?></div>
                                                <div class="col"><?php echo $row['ket']; ?></div>

                                            
                                           
                              
                                            </div>
                                        </div>


                                    </div>

                                    <?php
                          endwhile;
                      endif;
                      ?>
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