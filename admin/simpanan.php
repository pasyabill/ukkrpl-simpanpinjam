
<?php
   require("../php/connection.php");
   session_start();
     validationAdmin();
     $search = isset($_POST["search"]) ? $_POST["search"] : "";
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
    .input_box {
        position: fixed;
        width: 100vw;
        height: 100vh;
        z-index: 90;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 0;
        left: 0;
    }
    .form{
        background-color: #fff;
        display: block;
        width: 400px;
        height: 200px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        padding: 20px;
    }
    .form > * {
        width: 100%;
    }
    .input {
        width: 100%;
        height: 40px;
        line-height: 28px;
        padding: 0 1rem;
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
    .ps-2 {
        padding-left: 2.5em;
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
                            <a class="dropdown-item" href="logout_petugas.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                <div class="col-xl-12">
                <div class="card easion-card">
                                <div class="card-header">
                                  
                                    <!-- Form for search box -->
                                    <form class="search_box" action="" method="post">
                                        <!-- Search input -->
                                        <div class="group">
                                            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                                                <g>
                                                    <path
                                                        d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <input placeholder="Search" type="search" class="input ps-2" name="search"
                                                value="<?php echo $search; ?>">

                                        </div>
                                        <!-- Submit button -->
                                    </form>
                                </div>
                                <div class="card-body text-center easion-card-body-chart">
                                <div  class="row text-center drop_content drop_content_header">
                                                <div class="col">ID</div>
                                                <div class="col">Nama</div>
                                                <div class="col">Saldo</div>
                                                <div class="col">Aksi</div>
                                            </div>
                                    <?php
                                    
                                   
                
                              
                                    $query = "SELECT anggota.*, saldo.* 
                                    from anggota join saldo on anggota.id_anggota = saldo.id_anggota";

                                    // Jika $_GET["search"] tersedia, tambahkan kondisi ke dalam query
                                    if (!empty($search)) {
                                        // Ambil semua nama kolom dari tabel anggota
                                        $columnQuery = "SHOW COLUMNS FROM anggota";
                                        $columns = query($columnQuery);
                                        $searchConditions = [];
                                    
                                        while ($col = mysqli_fetch_assoc($columns)) {
                                            // Tambahkan kondisi pencarian untuk setiap kolom
                                            $searchConditions[] ='anggota.' . $col['Field'] . " LIKE '%$search%'";
                                        }
                                    
                                        $searchQuery = implode(" OR ", $searchConditions);
                                        // Tambahkan kondisi pencarian ke dalam query
                                        $query .= " WHERE $searchQuery";
                                    }
                                        $i = 0;
                                      $data = query($query);
                                      if(mysqli_num_rows($data) > 0) :
                                      while($row = mysqli_fetch_assoc($data)) : 
                                        $i += 1;
                               ?>
                                    <div class="text-center col">
                                        <div class=" topContent">
                                            <div class="row angsur_row_parent text-center">
                                            
                                                <div class="col"><?php echo $row['id_anggota']; ?></div>
                                                <div class="col"><?php echo $row['nama']; ?></div>
                                                <div class="col"><?php echo formatNumber($row['saldo']); ?></div>
                                                <div class="btn-group col"><button onclick="btnClick(<?= $i ?>)"  class="col btn btn-success">deposit</button>
                                                <button onclick="btnClick('Minus<?= $i ?>')"  class="col btn btn-danger">withdraw</button></div>
                                                <div class="input_box hidden" id="box<?= $i ?>">
                                                    <form class="form" action="addsimpanan.php" method="post">
                                                        <div class="">
                                                            <label for="nominal">Nominal deposit untuk <?php echo $row['nama']; ?></label>
                                                            <input  type="text" name="nominal" class="input">
                                                        </div>
                                                        <input type="hidden" name="id_anggota" class="input" value="<?php echo $row['id_anggota']; ?>">
                                                        <input type="hidden" name="nama" class="input" value="<?php echo $row['nama']; ?>">
                                                        <div class="btnGroup">
                                                            <button type="submit" class="btn btn-success">simpan</button>
                                                            <button type="button" onclick="btnClick(<?= $i ?>)" class="btn btn-danger">batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="input_box hidden" id="boxMinus<?= $i ?>">
                                                    <form class="form" action="kurangisimpanan.php" method="post">
                                                        <div class="">
                                                            <label  for="nominal">Nominal withdraw untuk <?php echo $row['nama']; ?></label>
                                                            <input maxlength="<?php echo $row['saldo']; ?>" type="text" name="nominal" class="input">
                                                        </div>
                                                        <input type="hidden" name="id_anggota" class="input" value="<?php echo $row['id_anggota']; ?>">
                                                        <input type="hidden" name="nama" class="input" value="<?php echo $row['nama']; ?>">
                                                        <div class="btnGroup">
                                                            <button type="submit" class="btn btn-success">simpan</button>
                                                            <button type="button" onclick="btnClick('Minus<?= $i ?>')" class="btn btn-danger">batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                               
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
            </main>
        </div>
    </div>
    <script>
                                                          function btnClick(asd){
                        let dropDown = document.getElementById("box"+asd);
                        dropDown.classList.toggle("hidden");
                      } 
                                                        </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/easion.js"></script>
</body>

</html>