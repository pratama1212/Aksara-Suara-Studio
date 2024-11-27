<?php
$host = 'localhost'; // Nama host database
$dbname = 'Aksara_suara'; // Nama database
$username = 'root'; // Nama pengguna MySQL
$password = ''; // Password MySQL

try {
    // Membuat koneksi ke database menggunakan PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
