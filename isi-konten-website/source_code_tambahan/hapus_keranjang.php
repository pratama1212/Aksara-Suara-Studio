<?php
session_start();
include('koneksi-db.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login terlebih dahulu.";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus item dari keranjang
    $query = "DELETE FROM keranjang WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "Item berhasil dihapus dari keranjang.";
    header("Location: keranjang.php"); // Arahkan kembali ke halaman keranjang
    exit();
}
?>
