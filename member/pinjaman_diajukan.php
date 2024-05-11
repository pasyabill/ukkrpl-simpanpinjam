<?php


session_start();
require("../php/connection.php");
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
        $min = 500000;
        $max = 2000000;
        break;
      case 'keluarga' :
          global $max;
          global $min;
        $min = 500000;
        $max = 2000000;
        break;
      case 'bisnis' :
          global $max;
          global $min;
        $min = 500000;
        $max = 2000000;
        break;
    }
    $lamaCicil = intval($_POST["angsur"]);
    $id_angsur = array();
    $idpinjam = uniqid();
    $tanggalpengajuanpinjam = date("Y-m-d");
    for($i = 0; $i < $lamaCicil; $i++ ){
      $id_angsur[] = uniqid();
    }

    $json_data = json_encode($id_angsur);

    $query = "INSERT INTO pinjaman (id_pinjaman, nama_pinjaman, id_anggota, besar_pinjaman, tgl_pengajuan_pinjaman, id_angsuran) VALUES ('$idpinjam', '$kategori', '$id', '$nominal', '$tanggalpengajuanpinjam', '$json_data')";

    query($query);

    if($query){
      unset($_POST);
      header("Location: waiting_acc.php");
      exit();
    }
     
  
}else{
  header("Location: ../pinjaman.php");
  exit();
}

?>
