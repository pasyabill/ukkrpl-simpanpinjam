<?php 
session_start();
require("php/connection.php");
validation();


if(isset($_POST)){
    $id = $_SESSION["userid"];

    $query = "Select nama from anggota where id_anggota = '$id'";
    $userRaw  = query($query);
    $user = mysqli_fetch_assoc($userRaw);
    $nama = $user["nama"];
    if($_POST["nominal"] >= 500000 && $_POST["nominal"] <= 2000000){
        $nominal = $_POST["nominal"];
        $lamaCicil = $_POST["angsur"];
        $tanggalpengajuanpinjam = date("Y-m-d");
       global $nama;
       global $id;
       $idpinjam = uniqid();
       $tanggalacc = null;
       $tanggalpinjma = null;
       $tgllunas = null;
       $idAngsur = uniqid(); 
       

    }
}

?>