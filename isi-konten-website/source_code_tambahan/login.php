<?php
session_start();
include('koneksi-db.php');

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $kata_sandi = $_POST['kata_sandi'];

    // Cek apakah email ada di database
    $stmt = $conn->prepare("SELECT id, nama_lengkap, email, kata_sandi FROM pengguna WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($kata_sandi, $user['kata_sandi'])) {
        // Simpan data user ke sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['email'] = $user['email'];

        // Redirect ke halaman profile
        header("Location: profile-baru.php");
        exit();
    } else {
        $login_error_message = "Email atau kata sandi salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aksara Suara</title>
    <link rel="stylesheet" href="registration.css">

    <!-- Font 4 : "Playfair Display" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

    <!-- Font 5 : "Poppins" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

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

<img src="../gambar/Keperluan-projek/background-profile.jpg" class="bg">

<div class="container-login">
    <h2>Login</h2>

    <!-- Form Login -->
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="kata_sandi" placeholder="Kata Sandi" required><br><br>

        <?php if (isset($login_error_message)): ?>
            <div style="color: red;"><?php echo $login_error_message; ?></div>
        <?php endif; ?>

        <button type="submit" name="login" class="submit-login">Login</button>
    </form>


    <a href="sign_up.php" class="link-signup">Belum punya akun? Sign Up</a>

    <?php if (isset($_GET['signup_success'])): ?>
        <div style="color: green;" class="notif-berhasil">Pendaftaran berhasil! Silakan login.</div>
    <?php endif; ?>

    </div>
</body>
</html>
