<?php
session_start();
include('koneksi-db.php');

// Proses sign up
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    $nama_panggilan = $_POST['nama_panggilan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $kata_sandi = $_POST['kata_sandi'];
    $konfirmasi_kata_sandi = $_POST['konfirmasi_kata_sandi'];

    // Validasi email sudah terdaftar
    $stmt = $conn->prepare("SELECT id FROM pengguna WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $error_message = "Email sudah terdaftar.";
    } elseif ($kata_sandi !== $konfirmasi_kata_sandi) {
        // Validasi password dan konfirmasi password
        $error_message = "Password dan konfirmasi password tidak cocok.";
    } else {
        // Hash password sebelum menyimpan ke database
        $hashed_password = password_hash($kata_sandi, PASSWORD_DEFAULT);

        // Simpan data pengguna ke database
        $sql = "INSERT INTO pengguna (nama_panggilan, nama_lengkap, email, telepon, kata_sandi) 
        VALUES (:nama_panggilan, :nama_lengkap, :email, :telepon, :kata_sandi)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nama_panggilan', $nama_panggilan);
        $stmt->bindParam(':nama_lengkap', $nama_lengkap);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telepon', $telepon);
        $stmt->bindParam(':kata_sandi', $hashed_password);
        $stmt->execute();

        // Arahkan ke halaman login setelah sign up berhasil
        header("Location: login.php?signup_success=true");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Aksara Suara</title>
    <link rel="stylesheet" href="registration.css">

        <!-- Font 4 : "Playfair Display" -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

    <!-- Font 5 : "Poppins" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">


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

<img src="../gambar/Keperluan-projek/background-profile.jpg" class="bg">

<div class="container-signup">



    <h2>Sign Up</h2>

    <!-- Form Sign Up -->
    <form action="sign_up.php" method="POST">
        <input type="text" name="nama_panggilan" placeholder="Nama Panggilan" required><br><br>
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="tel" name="telepon" placeholder="Nomor Telepon" required><br><br>
        <input type="password" name="kata_sandi" placeholder="Kata Sandi" required><br><br>
        <input type="password" name="konfirmasi_kata_sandi" placeholder="Konfirmasi Kata Sandi" required><br><br>

        <?php if (isset($error_message)): ?>
            <div style="color: red;"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <button type="submit" name="signup" class="submit-signup">Sign Up</button>
    </form>

    <a href="login.php" class="link-login">Sudah memiliki akun? Login</a>

    </div>

    <script href="script.js"></script>"
</body>
</html>
