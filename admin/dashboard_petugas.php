
<?php
  require("../php/connection.php");
  session_start();
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

    .drop_content {
        border-bottom: 0.3px solid rgba(234, 76, 137, 0.4);

    }

    .hidden {
        display: none;
    }

    .card-body {
        height: auto;
    }

    .angsur_row_parent {
        border-bottom: 1px solid #0d0c22;
        padding-bottom: 10px;
        padding-top: 10px;
    }

    .angsur_row_parent>.col {
        align-self: center;

    }

    .drop_content_header {
        border-bottom: 0.55px solid rgba(0, 0, 0, 0.7);
        padding-bottom: 10px;
        font-weight: bold;
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
                <a href="dashboard_petugas.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Home </a>
                <a href="nasabah.php" class="dash-nav-item">
                    <i class="fas fa-info ps-3"></i> nasabah </a>
                <a href="permintaan_pinjaman.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> pinjaman nasabah </a>
                <a href="simpanan.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> tabungan nasabah </a>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                
            <h4>Dashboard Petugas</h4>

                <div class="tools">
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Profile</a>
                            <a class="dropdown-item" href="logout_petugas.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row dash-row">

                      
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> Transaksi simpanan Koperasi </div>
                                </div>
                                <div class="card-body easion-card-body-chart">
                                <?php
                                   $query = "SELECT * from simpanan";
                                   $data = query($query);
                                    if(mysqli_num_rows($data) > 0) :
                                   while($row = mysqli_fetch_assoc($data)) :
                                ?>
                              
                                            <div class="row mb-2 ">
                                                <div class="col">
                                                    <?php echo $row['nm_simpanan']; ?>
                                                </div>
                                                <div class="col">
                                                    <?php echo $row['tgl_simpanan']; ?>
                                                </div>
                                                <div class="col">
                                                    <?php echo formatNumber($row['besar_simpanan']); ?>
                                                </div>
                                                <div class="col">
                                                    <?php echo $row['ket']; ?>
                                                </div>
                                            </div>
                               
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="easion-card-title"> Permintaan Pinjaman </div>
                                </div>
                                <div class="card-body text-center easion-card-body-chart">
                                   
                                <?php
                        $query = "SELECT * from pinjaman join anggota on pinjaman.id_anggota = anggota.id_anggota where pinjaman.ket = 'diminta'";
                        $data = query($query);
                        if(mysqli_num_rows($data) > 0) :
                            while($row = mysqli_fetch_assoc($data)) :
                                ?>
                              
                                            <div class="row mb-2 ">
                                                <div class="col">
                                                    <?php echo $row['nama']; ?>
                                                </div>
                                                <div class="col">
                                                    <?php echo $row['nama_pinjaman']; ?>
                                                </div>
                                                <div class="col">
                                                    <?php echo formatNumber($row['besar_pinjaman']); ?>
                                                </div>
                                                <div class="col">
                                                    <?php echo count(json_decode($row["id_angsuran"])) . "bulan "; ?>
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
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/easion.js"></script>
</body>

</html>