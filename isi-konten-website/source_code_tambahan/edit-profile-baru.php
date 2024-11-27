<?php
session_start(); // Memulai sesi

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
include('koneksi-db.php');

// Ambil data user dari database
$user_id = $_SESSION['user_id'];
$sql = "SELECT id, nama_panggilan, nama_lengkap, email, telepon, alamat, foto_profil FROM pengguna WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika data tidak ditemukan, redirect ke login
if (!$user) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Update data jika form edit disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $nama_panggilan = $_POST['nama_panggilan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $foto_profil = $user['foto_profil']; // Simpan foto profil sebelumnya secara default

    // Proses upload foto jika ada file yang diunggah
    if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['foto_profil']['tmp_name'];
        $file_name = uniqid() . '_' . basename($_FILES['foto_profil']['name']);
        $upload_dir = 'uploads/';
        $upload_path = $upload_dir . $file_name;

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($file_tmp, $upload_path)) {
            $foto_profil = $file_name; // Update nama file foto profil
        }
    }

    $update_sql = "UPDATE pengguna SET 
        nama_panggilan = :nama_panggilan, 
        nama_lengkap = :nama_lengkap, 
        telepon = :telepon, 
        alamat = :alamat, 
        foto_profil = :foto_profil 
        WHERE id = :user_id";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bindParam(':nama_panggilan', $nama_panggilan, PDO::PARAM_STR);
    $update_stmt->bindParam(':nama_lengkap', $nama_lengkap, PDO::PARAM_STR);
    $update_stmt->bindParam(':telepon', $telepon, PDO::PARAM_STR);
    $update_stmt->bindParam(':alamat', $alamat, PDO::PARAM_STR);
    $update_stmt->bindParam(':foto_profil', $foto_profil, PDO::PARAM_STR);
    $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $update_stmt->execute();

    // Redirect kembali ke halaman profile setelah update
    header("Location: profile-baru.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>

    <link rel="stylesheet" href="edit-profile-baru.css">

            <!-- Font 4 : "Playfair Display" -->
            <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap"
      rel="stylesheet"/>

    <!-- Font 5 : "Poppins" -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap"
      rel="stylesheet"/>
    
</head>
<body>

<nav class="navbar">
      <div class="logo">
        <a href="../../Aksara_Suara_Website.html"
          ><img src="../gambar/pngwing.com.png" alt="Logo"
        /></a>
      </div>

      <div class="hamburger" id="hamburger-menu">
        <a href="javascript:void(0);">&#9776;</a>
        <!-- Simbol hamburger -->
      </div>

      <ul class="categories" id="categories">
        <li><a href="../../Aksara_Suara_Website.html">Beranda</a></li>
        <li class="dropdown">
          <a href="#">Kategori</a>
          <ul class="dropdown-menu">
            <li><a href="tiket-acara-kesenian.html">Tiket Acara Kesenian Nusantara</a></li>
            <li>
              <a href="pakaian-adat-tradisional.html">Pakaian Adat Tradisional</a>
            </li>
            <li><a href="isi-konten-website/source_code_tambahan/kerajinan-tangan.html">Kerajinan Tangan Tradisional</a></li>
          </ul>
        </li>
        <li><a href="agenda-budaya.html">Agenda Budaya</a></li>
        <li><a href="artikel.html">Artikel</a></li>
        <li><a href="tentang-kami.html">Tentang Kami</a></li>
      </ul>

      <div class="search-profile-container" id="search-profile-container">
        <div class="search-box" id="search-box">
          <input type="text" placeholder="Ketik..." />
          <button type="submit"><b>Cari</b></button>
        </div>
        <div class="search-icon" id="search-icon">
          <img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABaUlEQVR4nO2Wz0pCQRjFf2i6ydop9ArZO1T7FhrlK0TSH+spxNcw61GCaJMFJZn71rqolfHBufBtwjtzLxLkgYELM+ecud98cxhY4Q+hDLSAW+ANmGnY90BztiZXHAIfwHzBGAPNPAwLQM8JPwEXwDawrlEHLoGhW9cVNxo9CX0BJwvEbO5UaxPz6PLOJbQbwNtz5o1Q07I7U/vTULTFfQdKIcSWO9OYsyoCz9I4CiHeiXROPDrSuAkhjUSy7o1FXRp2z1NjKlIlg/GGNKbLNt6MMR7lUOod19mpMRDJEikW19Lox1ynYYbr9CKN49AAGYtoMRiKM3EnwFooueki02IwLfaBb3EPiETXmbdVwt9Q1J8mpp9ANda44MznisGOwqGiYd175c40MU3W18iAhq7FoofAROWtuqzObF5S4Fv2vioYZtpQX93rG6mWp3koqu5lYpvd4r+Y11zZH5ZpnJg/AvfLNl4Bww/dcoIlpDH7/gAAAABJRU5ErkJggg=="
          />
        </div>
        <div class="profile">
          <a href="#">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACZElEQVR4nO2ZPWtUQRSGHxNdiaZQxEpIndhpq6CNJloIJkgKg4VoERQtoiR+INFGC8mfkGisxcq/EPwKiPErWgQLCwUXRaO54cB7YVgkubOz7owyDwwsd89575mvO2dmIJP5Z6gBw8A94CVQV7Hfd/Wf2STNMeAdUKxR3gJDJEgnMOUE+hg4C/QBm1X69OyJY3dbvskwpcC+AyeBdavYdgCnZFtWJpnhVADfgD0efnudygwSmZozJ6wnfDkt3zexPwDDzpywIeOL+TyVhvVsNGYUxJkAjXPSmCYi8wqiN0BjpzRsnYnGVwXRHaDRLQ3Tika5HqSi0zS5Ig3kHmkVeWilNrS+KIAtARpbpfGZiDxXELsCNHZLw9L7aEwriAsBGhelcYeIHFIQ8wFJ4ytpDBCRTqXgFsh4E/4T8n2dwk5xP7AM/PBsVbP9CfwG9pEIN9SyS8BoBftR2ZrPdRJj3GM9KO1ukSiFZ0WSpcgVSYzif+iR7c4h3VqU51nbSIwBYEHBPahg/9BZCPuJTA0YAWadoWJnVDsq+PYALxy/WWnVaCM2HC4Bi04gH4ExYKOHzibgKvDJ0VmU9l8dctZa5509SJks2rOuAF2r/AlgztG1o6HJQN0/crDh3uORnq126u6LafVLu3zPB+Bwq15wRYldoVZrx+Q8ADzTO5fVO0FMSuwXcK3NqXYHcNlJLm82K3RErbGkU/dYDCrdt1iONjOxFwI2TK1mTLG89/1EH5ejTfANxGe9LlALrTeVuS8n2zCltnmb8XEqax89fWhIg8prusrUK9yVxyp1n4oUiZdMJoMfK+YhJaCnoLnkAAAAAElFTkSuQmCC"
            />
          </a>
        </div>
      </div>
    </nav>

    <!-- Menu Overlay -->
    <div class="menu-overlay" id="menu-overlay">
      <div class="overlay-content">
        <span class="closebtn" id="close-btn">&times;</span>
        <ul class="overlay-menu">
          <li><a href="../../Aksara_Suara_Website.html">Beranda</a></li>
          <li class="dropdown">
            <a href="#">Kategori</a>
            <ul class="dropdown-menu">
              <li><a href="tiket-acara-kesenian.html">Tiket Acara Kesenian Nusantara</a></li>
              <li>
                <a href="/pakaian-adat-tradisional.html"
                  >Pakaian Adat Tradisional</a
                >
              </li>
              <li><a href="isi-konten-website/source_code_tambahan/kerajinan-tangan.html">Kerajinan Tangan Tradisional</a></li>
            </ul>
          </li>
          <li><a href="#">Agenda Budaya</a></li>
          <li><a href="artikel.html">Artikel</a></li>
          <li><a href="tentang-kami.html" target="_blank">Tentang Kami</a></li>
          <li>
            <div class="search-box">
              <input type="text" placeholder="Ketik..." />
              <button type="submit"><b>Cari</b></button>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <h1>Edit Profil</h1>

    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <label for="nama_panggilan">Nama Panggilan:</label>
            <input type="text" name="nama_panggilan" id="nama_panggilan" value="<?php echo htmlspecialchars($user['nama_panggilan']); ?>" required><br><br>

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo htmlspecialchars($user['nama_lengkap']); ?>" required><br><br>

            <label for="telepon">Nomor Telepon:</label>
            <input type="text" name="telepon" id="telepon" value="<?php echo htmlspecialchars($user['telepon']); ?>" required><br><br>

            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="4"><?php echo htmlspecialchars($user['alamat']); ?></textarea><br><br>

            <label for="foto_profil">Foto Profil:</label>
            <input type="file" name="foto_profil" id="foto_profil"><br><br>

            <button type="submit" name="update_profile">Simpan Perubahan</button>

            <button name="update_profile" class="kembali">
            <a href="profile-baru.php">Kembali ke Profil</a>
            </button>
        </form>


    </div>
    <br>
    
    <script href="script.js"></script>
</body>
</html>