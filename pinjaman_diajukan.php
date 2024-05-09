<?php


session_start();
require("php/connection.php");
validation();

if(isset($_POST)){
    $id = $_SESSION["userid"];
    var_dump($_POST);
    $query = "Select nama from anggota where id_anggota = '$id'";
    $userRaw  = query($query);
    $user = mysqli_fetch_assoc($userRaw);
    $nama = $user["nama"];
    $nominal = $_POST["nominal"];
    $kategori = $_POST["kategori"];
    $idKategori;
    $max;
    $min;
    $kategori = $_POST["kategori"];
    switch($kategori) {
      case 'pelajar' :
        global $max;
        global $min;
        global $idKategori;
        $idKategori = 1;
        $min = 500000;
        $max = 2000000;
        break;
      case 'keluarga' :
          global $max;
          global $min;
          global $idKategori;
        $idKategori = 2;
        $min = 500000;
        $max = 2000000;
        break;
      case 'bisnis' :
          global $max;
          global $min;
          global $idKategori;
        $idKategori = 3;
        $min = 500000;
        $max = 2000000;
        break;
    }
    $lamaCicil = intval($_POST["angsur"]);
    $id_angsur = array();
        
    $biayaCicil = ($nominal / $lamaCicil);
    $biayaCicil = $biayaCicil + ($biayaCicil * 0.10);
    for($i = 0; $i < $lamaCicil; $i++ ){
      $id_angsur_raw = uniqid();
      $id_angsur = $id_angsur_raw;
      if($nominal <= $min || $nominal >= $max){
        $nominal = $_POST["nominal"];
        $tanggalpengajuanpinjam = date("Y-m-d");
        $kategori = $_POST["kategori"];
        $jatuhtempo = date("Y-m-d", strtotime("+".($i+1)." months"));
        $idpinjam = uniqid();

    
        
       query("INSERT INTO angsuran (id_angsuran, id_kategori, id_anggota, angsuran_ke) VALUES ('$id_angsur_raw', '$idKategori', '$id', '" . ($i + 1) . "')");
       query("INSERT INTO detail_angsuran (id_angsuran, tgl_jatuh_tempo, besar_angsuran) VALUES    ('$id_angsur_raw', '$jatuhtempo', '$biayaCicil')");

   
      }else{
     header("Location: pengajuan_pinjaman.php?invalid_nominal=true");

      }
    }

    $json_data = json_encode($id_angsur);

    $query = "INSERT INTO pinjaman (id_pinjaman, nama_pinjaman, id_anggota, besar_pinjaman, tgl_pengajuan_pinjaman, id_angsuran) VALUES ('$idpinjam', '$kategori', '$id', '$nominal', '$tanggalpengajuanpinjam', '$json_data')";




     
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Succes</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .parent {
  width: 300px;
  padding: 20px;
  perspective: 1000px;
}

.card {
  padding-top: 50px;
  /* border-radius: 10px; */
  border: 3px solid rgb(255, 255, 255);
  transform-style: preserve-3d;
  background: linear-gradient(135deg,#0000 18.75%,#f3f3f3 0 31.25%,#0000 0),
      repeating-linear-gradient(45deg,#f3f3f3 -6.25% 6.25%,#ffffff 0 18.75%);
  background-size: 60px 60px;
  background-position: 0 0, 0 0;
  background-color: #f0f0f0;
  width: 100%;
  box-shadow: rgba(142, 142, 142, 0.3) 0px 30px 30px -10px;
  transition: all 0.5s ease-in-out;
}

.card:hover {
  background-position: -100px 100px, -100px 100px;
  transform: rotate3d(0.5, 1, 0, 30deg);
}

.content-box {
  background: rgba(4, 193, 250, 0.732);
  /* border-radius: 10px 100px 10px 10px; */
  transition: all 0.5s ease-in-out;
  padding: 60px 25px 25px 25px;
  transform-style: preserve-3d;
}

.content-box .card-title {
  display: inline-block;
  color: white;
  font-size: 25px;
  font-weight: 900;
  transition: all 0.5s ease-in-out;
  transform: translate3d(0px, 0px, 50px);
}

.content-box .card-title:hover {
  transform: translate3d(0px, 0px, 60px);
}

.content-box .card-content {
  margin-top: 10px;
  font-size: 12px;
  font-weight: 700;
  color: #f2f2f2;
  transition: all 0.5s ease-in-out;
  transform: translate3d(0px, 0px, 30px);
}

.content-box .card-content:hover {
  transform: translate3d(0px, 0px, 60px);
}

.content-box .see-more {
  cursor: pointer;
  margin-top: 1rem;
  display: inline-block;
  font-weight: 900;
  font-size: 9px;
  text-transform: uppercase;
  color: rgb(7, 185, 255);
  /* border-radius: 5px; */
  background: white;
  padding: 0.5rem 0.7rem;
  transition: all 0.5s ease-in-out;
  transform: translate3d(0px, 0px, 20px);
}

.content-box .see-more:hover {
  transform: translate3d(0px, 0px, 60px);
}

.date-box {
  position: absolute;
  top: 30px;
  right: 30px;
  height: 60px;
  width: 60px;
  background: white;
  border: 1px solid rgb(7, 185, 255);
  /* border-radius: 10px; */
  padding: 10px;
  transform: translate3d(0px, 0px, 80px);
  box-shadow: rgba(100, 100, 111, 0.2) 0px 17px 10px -10px;
}

.date-box span {
  display: block;
  text-align: center;
}

.date-box .month {
  color: rgb(4, 193, 250);
  font-size: 9px;
  font-weight: 700;
}

.date-box .date {
  font-size: 20px;
  font-weight: 900;
  color: rgb(4, 193, 250);
}
 
    </style>
</head>

<body>
    <div class="box">
    <div class="parent">
  <div class="card">
      <div class="content-box">
          <span class="card-title">pengajuan pinjaman Berhasil</span>
          <p class="card-content">
              menunggu acc oleh admin
          </p>
          <a href="login.php" class="see-more">login</a>
      </div>
      <div class="date-box">
          <span class="month">plecit</span>
          <span class="date">plus</span>
      </div>
  </div>
</div>
    </div>
</body>
</html>