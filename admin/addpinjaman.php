<?php
session_start();
    require('../php/connection.php');
    validationAdmin();
    if (isset($_POST['id_anggota']) && isset($_POST['nominal'])) {
        $id_anggota = $_POST['id_anggota'];
        $nm = $_POST['nama_anggota'];
        $nominal = $_POST['nominal'];
        $date_now = date('Y-m-d');
        echo "ID Anggota: " . htmlspecialchars($id_anggota) . "<br>";
        echo "Nominal: " . htmlspecialchars($nominal);
        $queri = "insert into simpanan values ('', '$nm', '$id_anggota', '$date_now', '$nominal');";
        $result = query($queri);
        if ( $result){
            header('Location: permintaan_pinjaman.php?message=berhasil menginput tabungan');
            exit();
        }
    } else {
        header('Location: permintaan_pinjaman.php?error=Parameter id_anggota dan/atau nominal tidak diset.');
        exit();
    }
?>