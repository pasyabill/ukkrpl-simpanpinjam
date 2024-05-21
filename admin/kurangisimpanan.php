<?php
    require('../php/connection.php');
session_start();

    validationAdmin();
    if (isset($_POST['id_anggota']) && isset($_POST['nominal'])) {
        $id_anggota = $_POST['id_anggota'];
        $nm = $_POST['nama'];
        $nominal = $_POST['nominal'];
        $date_now = date('Y-m-d');
        
       
        $query2 = "Select * from saldo where id_anggota = '{$_POST['id_anggota']}'";
        $data2 = query($query2);
        
            $hasil = mysqli_fetch_assoc($data2);
            if($hasil['saldo'] < $nominal){
                echo "<script>alert('Nominal melebihi saldo yang tersedia'); window.history.back();</script>";
            }else{
                $perintahadd = "Update saldo set saldo = saldo - '$nominal' where id_anggota = '$id_anggota'";
                query($perintahadd);
                $queri = "INSERT INTO simpanan (nm_simpanan, id_anggota, tgl_simpanan, besar_simpanan, ket) VALUES ('$nm', '$id_anggota', '$date_now', '$nominal', 'withdraw');";
                $result = query($queri);
                if ( $result){
                    header("Location: simpanan.php");
        
                    exit();
                }
            }
           


    
    } else {
        header("Location: simpanan.php");

    exit();
    }
?>