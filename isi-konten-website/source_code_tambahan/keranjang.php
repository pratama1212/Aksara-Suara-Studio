<?php
session_start(); // Mulai session untuk mengakses variabel session
include('koneksi-db.php'); // Pastikan koneksi ke database sudah benar

// Cek apakah session 'user_id' ada
if (!isset($_SESSION['user_id'])) {
    die("Anda belum login. Silakan login terlebih dahulu.");
    // Atau bisa redirect ke halaman login:
    // header("Location: login.php");
    // exit();
}

$user_id = $_SESSION['user_id']; // Ambil user_id dari session

session_start();
include('koneksi-db.php'); // Pastikan koneksi ke database sudah benar

// Cek apakah session 'user_id' ada
if (!isset($_SESSION['user_id'])) {
    die("Anda belum login. Silakan login terlebih dahulu.");
    // Atau bisa redirect ke halaman login:
    // header("Location: login.php");
    // exit();
}

$user_id = $_SESSION['user_id']; // Ambil user_id dari session

// Fungsi untuk menampilkan keranjang
function tampilkanKeranjang() {
    global $conn, $user_id;

    // Ambil data barang di keranjang dari database
    $query = "SELECT * FROM keranjang WHERE user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Menampilkan data keranjang
    $keranjang = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($keranjang) {
        echo "<table>";
        echo "<tr><th>Nama Barang</th><th>Asal</th><th>Harga</th><th>Jumlah</th><th>Total Harga</th><th>Hapus</th></tr>";
        $total_harga = 0;
        foreach ($keranjang as $item) {
            echo "<tr>";
            echo "<td>" . $item['nama'] . "</td>";
            echo "<td>" . $item['asal'] . "</td>";
            echo "<td>IDR " . number_format($item['harga'], 0, ',', '.') . "</td>";
            echo "<td>" . $item['jumlah'] . "</td>";
            echo "<td>IDR " . number_format($item['harga'] * $item['jumlah'], 0, ',', '.') . "</td>";

            // Form untuk menghapus barang
            echo "<td>
                    <form method='POST' action='keranjang.php'>
                        <input type='number' name='jumlah_hapus' value='1' min='1' max='" . $item['jumlah'] . "'>
                        <input type='hidden' name='id_keranjang' value='" . $item['id_keranjang'] . "'>
                        <button type='submit' name='hapus_barang'>Hapus</button>
                    </form>
                  </td>";
            echo "</tr>";
            $total_harga += $item['harga'] * $item['jumlah'];
        }
        echo "<tr><td colspan='5'><strong>Total Harga:</strong></td><td><strong>IDR " . number_format($total_harga, 0, ',', '.') . "</strong></td></tr>";
        echo "</table>";
    } else {
        echo "<p>Keranjang Anda kosong.</p>";
    }
}

// Menghapus barang dari keranjang
if (isset($_POST['hapus_barang'])) {
    $id_keranjang = $_POST['id_keranjang'];
    $jumlah_hapus = $_POST['jumlah_hapus'];

    // Update jumlah barang di keranjang
    $query = "SELECT * FROM keranjang WHERE id_keranjang = :id_keranjang";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_keranjang', $id_keranjang);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        $new_quantity = $item['jumlah'] - $jumlah_hapus;
        
        // Jika jumlah baru lebih dari 0, update jumlah
        if ($new_quantity > 0) {
            $update_query = "UPDATE keranjang SET jumlah = :new_quantity WHERE id_keranjang = :id_keranjang";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bindParam(':new_quantity', $new_quantity);
            $update_stmt->bindParam(':id_keranjang', $id_keranjang);
            $update_stmt->execute();
        } else {
            // Jika jumlah menjadi 0, hapus barang dari keranjang
            $delete_query = "DELETE FROM keranjang WHERE id_keranjang = :id_keranjang";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bindParam(':id_keranjang', $id_keranjang);
            $delete_stmt->execute();
        }

        // Redirect agar perubahan tampak
        header("Location: keranjang.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
</head>
<body>

    <h1>Keranjang Belanja Anda</h1>

    <?php tampilkanKeranjang(); ?>

</body>
</html>
