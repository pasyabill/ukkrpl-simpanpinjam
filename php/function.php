<?php
require("connection.php");
function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}
function terimaPinjaman($idPinjaman){
    echo $idPinjaman;
    $raw_pinjaman = query("SELECT *
    FROM pinjaman
    JOIN kategori_pinjaman ON pinjaman.nama_pinjaman = kategori_pinjaman.nama_pinjaman 
    where pinjaman.id_pinjaman = '$idPinjaman';
    ");
    var_dump($raw_pinjaman);
    $data_pinjaman = mysqli_fetch_assoc($raw_pinjaman);
    var_dump($data_pinjaman);
        // Periksa apakah $id_angsur_raw adalah array
        $id_angsur_raw = json_decode($data_pinjaman["id_angsuran"]) ;

    if (isJson($data_pinjaman["id_angsuran"]) && is_array($data_pinjaman['id_angsuran'])) {
        $lamaAngsur = count($id_angsur_raw);
    } else {
        $lamaAngsur = 1; // Jika hanya satu elemen, maka tetapkan $lamaAngsur menjadi 1
    }
    
    $nominal = $data_pinjaman["besar_pinjaman"];
    $id_kategori = $data_pinjaman["id_kategori_pinjaman"];
    $id = $data_pinjaman["id_anggota"];
    
    // Loop untuk memproses setiap elemen dalam array $id_angsur_raw
    for($i = 0; $i < $lamaAngsur; $i++) {
        // Untuk mendapatkan id_angsuran
        $id_angsuran = is_array($id_angsur_raw) ? $id_angsur_raw[$i] : $id_angsur_raw;
    
        $jatuhtempo = date("Y-m-d", strtotime("+".($i+1)." months"));
        $biayaCicil = ($nominal / $lamaAngsur);
        $biayaCicil = $biayaCicil + ($biayaCicil * 0.10);
    
        query("INSERT INTO angsuran (id_angsuran, id_kategori, id_anggota, angsuran_ke) VALUES ('$id_angsuran', '$id_kategori', '$id', '" . ($i + 1) . "')");
        query("INSERT INTO detail_angsuran (id_angsuran, tgl_jatuh_tempo, besar_angsuran) VALUES ('$id_angsuran', '$jatuhtempo', '$biayaCicil')");
    }
    
    $dateNow = date("Y-m-d");
    $query = "UPDATE `pinjaman` SET `ket` = 'dipinjamkan', `tgl_pinjaman` = '$dateNow' WHERE `pinjaman`.`id_pinjaman` = '$idPinjaman'";

    $end =query($query);
    if($end){
        return true;
        exit();
    }
}

function deleteAnggota($idAnggota){
    $query = "SELECT *
    FROM anggota
    JOIN pinjaman ON anggota.id_anggota = pinjaman.id_anggota
    JOIN angsuran ON JSON_CONTAINS(pinjaman.id_angsuran, JSON_QUOTE(angsuran.id_angsuran))
    JOIN detail_angsuran ON angsuran.id_angsuran = detail_angsuran.id_angsuran;    
    ";

    $raw_data = query($query);
    $data = mysqli_fetch_assoc($raw_data);
    $id_angsur = $data["id_angsur"];
    $id_user = $data["id_anggota"];
    query("delete from detail_angsuran where id_angsuran = '$id_angsur");
    query("delete from angsuran where id_angsuran = '$id_angsur");
    query("delete from pinjaman where id_anggota = '$id_user");
    query("delete from anggota where id_anggota = '$id_user");

}
?>