<?php
session_start();
    require('../php/connection.php');
    validationAdmin();
    if (isset($_POST['id_anggota']) && isset($_POST['nominal'])) {
        $id_anggota = $_POST['id_anggota'];
        $nm = $_POST['nama'];
        $nominal = $_POST['nominal'];
        $date_now = date('Y-m-d');
        echo "ID Anggota: " . htmlspecialchars($id_anggota) . "<br>";
        echo "Nominal: " . htmlspecialchars($nominal);
        $queri = "INSERT INTO simpanan (nm_simpanan, id_anggota, tgl_simpanan, besar_simpanan) VALUES ('$nm', '$id_anggota', '$date_now', '$nominal');";

        $query2 = "Select * from saldo where id_anggota = '{$_POST['id_anggota']}'";
        $data2 = query($query2);
     
            $perintahadd = "Update saldo set saldo = saldo + '$nominal' where id_anggota = '$id_anggota'";
            query($perintahadd);

        $result = query($queri);
        if ( $result){
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    }
?>