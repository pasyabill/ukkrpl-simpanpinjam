<?php
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'simpan_pinjam'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

// Buat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    return $result;
}
?>