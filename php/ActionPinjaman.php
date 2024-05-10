<?php
require("function.php");
session_start();
validationAdmin();
if(isset($_POST["acc"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $query = "UPDATE `pinjaman` SET `ket` = 'diterima', `tgl_acc_pinjaman` = '$dateNow' WHERE `pinjaman`.`id_pinjaman` = '$id'";

    $end =query($query);
    if($end){
        header("location: ../permintaan_pinjaman.php");
        exit();
    }

}

if(isset($_POST["reject"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $query = "UPDATE `pinjaman` SET `ket` = 'ditolak' WHERE `pinjaman`.`id_pinjaman` = '$id'";
    query($query);
    header("location: permintaan_pinjaman.php");
    exit();
}
?>