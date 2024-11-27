<?php
session_start(); // Memulai sesi

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
include('koneksi-db.php');

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Proses hapus akun jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    // Query untuk menghapus data pengguna dari database
    $delete_sql = "DELETE FROM pengguna WHERE id = :user_id";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // Eksekusi query penghapusan
    if ($delete_stmt->execute()) {
        // Setelah akun dihapus, logout dan arahkan ke halaman login
        session_destroy(); // Hancurkan sesi
        header("Location: login.php"); // Arahkan ke halaman login
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus akun.";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Akun</title>
    <link rel="stylesheet" href="delete_account.css">
</head>
<body>
    <div class="container">
        <h1>Apakah Anda yakin ingin menghapus akun Anda?</h1>
        <p>Semua data Anda akan hilang dan tidak dapat dipulihkan.</p>

        <form method="POST">
            <button type="submit" name="delete_account" class="delete-button">Hapus Akun</button>
            <a href="profile.php" class="cancel-button">Batal</a>
        </form>
    </div>
</body>
</html>
