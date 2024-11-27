<?php
include('koneksi-db.php');

// Mendapatkan data dari form
$id_pakaian = $_POST['id_pakaian'];
$nama_pakaian = $_POST['nama_pakaian'];
$harga = $_POST['harga'];

// Mengecek apakah barang sudah ada di keranjang
$query = "SELECT * FROM keranjang WHERE id_pakaian = :id_pakaian";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_pakaian', $id_pakaian, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Barang sudah ada, update jumlah
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $new_jumlah = $row['jumlah'] + 1;
    $update_query = "UPDATE keranjang SET jumlah = :jumlah WHERE id_pakaian = :id_pakaian";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bindParam(':jumlah', $new_jumlah, PDO::PARAM_INT);
    $update_stmt->bindParam(':id_pakaian', $id_pakaian, PDO::PARAM_INT);
    $update_stmt->execute();
} else {
    // Barang belum ada, insert baru
    $insert_query = "INSERT INTO keranjang (id_pakaian, nama_pakaian, harga, jumlah) 
                     VALUES (:id_pakaian, :nama_pakaian, :harga, 1)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bindParam(':id_pakaian', $id_pakaian, PDO::PARAM_INT);
    $insert_stmt->bindParam(':nama_pakaian', $nama_pakaian, PDO::PARAM_STR);
    $insert_stmt->bindParam(':harga', $harga, PDO::PARAM_STR);
    $insert_stmt->execute();
}

// Redirect ke halaman keranjang
header('Location: keranjang.php');
exit();
?>
