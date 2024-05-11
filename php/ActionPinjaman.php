<?php
require("function.php");
session_start();
validationAdmin();
if(isset($_POST["acc"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $dateNow = date("Y-m-d");
    $query = "UPDATE `pinjaman` SET `ket` = 'diterima', `tgl_acc_peminjaman` = '$dateNow' WHERE `pinjaman`.`id_pinjaman` = '$id'";

    $end =query($query);
    if($end){
        header("location: ../admin/permintaan_pinjaman.php");
        exit();
    }

}

if(isset($_POST["reject"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $query = "UPDATE `pinjaman` SET `ket` = 'ditolak' WHERE `pinjaman`.`id_pinjaman` = '$id'";
    query($query);
    header("location: ../admin/permintaan_pinjaman.php");
    exit();
}

if(isset($_POST["terima"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $end =terimaPinjaman($id);
    if($end){
        header("location: ../admin/permintaan_pinjaman.php");
        exit();
    }

}
?>