<?php
require("../php/connection.php");
validation();
$type = isset($_GET["type"]) ? $_GET["type"] : "";
$search = isset($_GET["search"]) ? $_GET["search"] : "";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
                    <i class="fas fa-home"></i> Home </a>
                <a href="dashboard.php" class="dash-nav-item">
                    <i class="fas fa-info ps-3"></i> Dashboard </a>
                <a href="dashboard_pinjaman.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Pinjam/Angsuran </a>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">

                <h2>Dashboard</h2>
                <div class="tools">

                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row ">

                        <div class="col-xl-6 d-inline-block p-3 mb-2 bg-success-subtle text-success-emphasis">
                            <h4>Total Pinjaman</h4>
                            <h2>Rp. 3.000.000,00 </h2>
                        </div>
                        <div class="col-xl-6 d-inline-block ms-5 p-3 mb-2 bg-success-subtle text-success-emphasis">
                            <h4>Jatuh Tempo <small><small>(terdekat)</small></small></h4>
                            <h2>2024/4/4 </h2>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card easion-card">
                                <div class="card-header ">
                                    <!-- Card header content -->
                                    <!-- Dropdown for filtering by status -->
                                    <div class="dropdown">
                                        <!-- Dropdown button -->
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php
                            if(!empty($type)){
                                echo($type);
                            }else{
                                echo("Status Pinjaman");
                            }
                            ?>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <!-- Dropdown items -->
                                            <li><a class="dropdown-item"
                                                    href="dashboard_pinjaman.php?type=diminta">Diminta</a></li>
                                            <li><a class="dropdown-item"
                                                    href="dashboard_pinjaman.php?type=ditolak">Ditolak</a></li>
                                            <li><a class="dropdown-item"
                                                    href="dashboard_pinjaman.php?type=diterima">Diterima</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="dashboard_pinjaman.php?type=dipinjamkan">Dipinjamkan</a></li>
                                        </ul>
                                    </div>
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
                                            <input placeholder="Search" type="search" class="input" name="search"
                                                value="<?php echo $search; ?>">

                                        </div>
                                        <!-- Submit button -->
                                    </form>
                                </div>
                                <div class="card-body easion-card-body-chart">
                                <?php
                                $id_a = $_SESSION["userid"];
                                      $query = "SELECT pinjaman.*, pinjaman.ket AS pinjaman_ket FROM pinjaman JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota Where pinjaman.id_anggota = '$id_a'";
                                      if (!empty($type)) {
                                        $query .= "and pinjaman.ket = '$type'";
                                    }else{
                                        $query .= "and pinjaman.ket = 'menunggu'";
                                    }
                
                                    // Jika $_GET["search"] tersedia, tambahkan kondisi ke dalam query
                                    if (!empty($search)) {
                                        // Ambil semua nama kolom dari tabel pinjaman
                                        $columnQuery = "SHOW COLUMNS FROM pinjaman";
                                        $columns = query($columnQuery);
                                        $searchConditions = [];
                                        while ($col = mysqli_fetch_assoc($columns)) {
                                            // Tambahkan kondisi pencarian untuk setiap kolom
                                            $searchConditions[] = "pinjaman." . $col['Field'] . " LIKE '%$search%'";
                                        }
                                        $searchQuery = implode(" OR ", $searchConditions);
                                        // Tambahkan kondisi pencarian ke dalam query
                                        $query .= " AND ($searchQuery)";
                                        $query .= " OR anggota.nama LIKE '%$search%'";
                                    }
                                      $data = query($query);
                                      if(mysqli_num_rows($data) > 0) :
                                      while($row = mysqli_fetch_assoc($data)) : 
                                      $id_angsuran_array = json_decode($row['id_angsuran']);
                                      $lamaangsur;
                                      if (is_array($id_angsuran_array)) {
                                          $lamaangsur = count($id_angsuran_array);
                                      } else {
                                            $lamaangsur = "1"; 
                                      }
                               ?>
                                    <div class="text-center col">
                                        <div class=" topContent">
                                            <div class="row angsur_row_parent text-center">
                                                <div class="col"><?php echo $row['tgl_pengajuan_pinjaman']; ?></div>
                                                <div class="col"><?php echo $row['nama_pinjaman']; ?></div>
                                                <div class="col"><?php echo $row['besar_pinjaman']; ?></div>
                                                <div class="col"><?php echo $row['pinjaman_ket']; ?></div>
                                                <div class="col"><?php echo $lamaangsur; ?> bulan</div>

                                            
                                                <?php
                                if($row['pinjaman_ket'] == "dipinjamkan") :
                              ?>

                                                <button name="down" onclick="buttonClick('<?= $row['id_pinjaman'] ?>')" id="<?= $row['id_pinjaman']?>"
                                                    class="btn col btn-warning">Angsuran</button>

                                                <?php
                                endif;
                              ?>




                                            </div>
                                        </div>


                                        <div id="drop<?= $row['id_pinjaman'] ?>" class="hidden drop_box">
                                            <?php
                                            if($row['pinjaman_ket'] == "dipinjamkan") :
                                                $anggotaid = $row['id_pinjaman'];
                                                $query = "SELECT pinjaman.*,angsuran.*, detail_angsuran.*, angsuran.ket AS angsuran_ket FROM pinjaman
                                                JOIN angsuran ON (
                                                    -- Menggunakan nilai langsung jika bukan array JSON
                                                    (JSON_VALID(pinjaman.id_angsuran) = 0 AND angsuran.id_angsuran = pinjaman.id_angsuran)
                                                    -- Jika nilai dalam format JSON array, kita perlu mengurai nilainya
                                                    OR (JSON_VALID(pinjaman.id_angsuran) = 1 
                                                        AND JSON_CONTAINS(pinjaman.id_angsuran, JSON_QUOTE(angsuran.id_angsuran)))
                                                )
                                                JOIN detail_angsuran ON angsuran.id_angsuran = detail_angsuran.id_angsuran 
                                                WHERE pinjaman.id_pinjaman = '663e430d0eb39'";
                                                
                                                $data2 = query($query);
                                                while($rows = mysqli_fetch_assoc($data2)) :
                                                    
                                            
                                        ?>

                                            <div  class="row text-center drop_content">
                                                <div class="col"><?= $rows['tgl_jatuh_tempo'] ?></div>
                                                <div class="col"><?= $rows['id_angsuran']?></div>
                                                <div class="col"><?= $rows['besar_angsuran']?></div>
                                                <div class="col"><?= $rows['angsuran_ket']?></div>
                                                <div class="col">Bulan ke <?= $rows['angsuran_ke']?></div>
                                                <div class="col">
                                                    <?php
                                                if($rows['tgl_pembayaran'] != null){
                                                    echo $rows['tgl_pembayaran'];
                                                }else{
                                                    echo '-';
                                                }
                                                ?>
                                                </div>
                                           



                                            </div>
                                            <?php
                                            endwhile;
                                        endif;
                                        ?>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="../js/easion.js"></script>
    <script>
                      function buttonClick(asd){
                        let dropDown = document.getElementById("drop"+asd);
                        dropDown.classList.toggle("hidden");
                      }
    
    </script>
</body>

</html>