<?php
session_start();
require("../php/connection.php");
validationAdmin();
    function deleteAnggota($id_anggota) {
    global $conn; // Asumsikan $conn adalah koneksi database

    // Mulai transaksi
    mysqli_begin_transaction($conn);

    try {
        // Ambil semua id_pinjaman terkait anggota
        $sql = "SELECT id_pinjaman, id_angsuran FROM pinjaman WHERE id_anggota = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_anggota);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id_pinjaman = $row['id_pinjaman'];
            $id_angsuran = json_decode($row['id_angsuran'], true); // Decode JSON ke dalam array

            // Hapus angsuran terkait
            $sql = "DELETE FROM angsuran WHERE id_angsuran IN (" . implode(",", array_fill(0, count($id_angsuran), "?")) . ")";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(str_repeat("s", count($id_angsuran)), ...$id_angsuran);
            $stmt->execute();

            // Hapus pinjaman
            $sql = "DELETE FROM pinjaman WHERE id_pinjaman = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id_pinjaman);
            $stmt->execute();
        }

        // Hapus anggota
        $sql = "DELETE FROM anggota WHERE id_anggota = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_anggota);
        $stmt->execute();

        // Commit transaksi
        mysqli_commit($conn);

        echo "Anggota dan semua data terkait berhasil dihapus.";
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($conn);

        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}

if (isset($_POST['id_anggota'])) {
    $id_anggota = $_POST['id_anggota'];
    deleteAnggota($id_anggota);
}
?>

