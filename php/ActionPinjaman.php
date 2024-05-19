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
        // Mengarahkan ke halaman sebelumnya
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

}

if(isset($_POST["reject"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $query = "UPDATE `pinjaman` SET `ket` = 'ditolak' WHERE `pinjaman`.`id_pinjaman` = '$id'";
    query($query);
    // Mengarahkan ke halaman sebelumnya
    header("location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

if(isset($_POST["terima"]) && isset($_POST["idPinjam"])){
    $id = $_POST["idPinjam"];
    $end =terimaPinjaman($id);
    if($end){
        // Mengarahkan ke halaman sebelumnya
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

}
if(isset($_POST["dibayar"]) && isset($_POST["idPinjam"]) && isset($_POST["id_angsuran"])) {
    $id = $_POST["idPinjam"];
    $id_angsuran = $_POST["id_angsuran"];
    var_dump($_POST);
    $date = date('Y-m-d');
    
    // Pastikan idPinjam dan id_angsuran tidak kosong
    if(!empty($id) && !empty($id_angsuran)) {
        $query = "UPDATE angsuran SET tgl_pembayaran = '$date', ket = 'lunas' WHERE id_angsuran = '$id_angsuran'";
        query($query);
        
        $query = "SELECT * FROM angsuran WHERE id_angsuran = '$id_angsuran'";
        $data1 = query($query);
        $fg = mysqli_fetch_assoc($data1);
        var_dump($fg);
        $query = "SELECT * FROM pinjaman WHERE id_pinjaman = '$id'";
        $data2 = query($query);
        $ff = mysqli_fetch_assoc($data2);
        $ffs = json_decode($ff["id_angsuran"]);
        $jumlah = is_array($ffs) ? count($ffs) : 1;

        if($fg['angsuran_ke'] == $jumlah) {
            $query = "UPDATE pinjaman SET tgl_pelunasan = '$date', ket = 'lunas' WHERE id_pinjaman = '$id'";
            query($query);
        }
    }
    
    // Redirect kembali ke halaman sebelumnya
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

?>
