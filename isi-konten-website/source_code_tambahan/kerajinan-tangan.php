<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksara Suara Studio | Kerajinan Tangan </title>
    <link rel="stylesheet" href="kerajinan-tangan.css">
    <link rel="icon" href="../gambar/pngwing.com.png" type="image/png" sizes="16x16">

        <!-- Font 1 : "Roboto Serif"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

        <!-- Font 2 : "Nobile"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

    <!-- Font 3 : "Open Sans" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

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
    
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">
            <a href="../../Aksara_Suara_Website.html"><img src="../gambar/pngwing.com.png" alt="Logo"></a>
        </div>
        
        <div class="hamburger" id="hamburger-menu">
            <a href="javascript:void(0);">&#9776;</a> <!-- Simbol hamburger -->
        </div>
    
        <ul class="categories" id="categories">
            <li><a href="../../Aksara_Suara_Website.html">Beranda</a></li>
            <li class="dropdown">
                <a href="#">Kategori</a>
                <ul class="dropdown-menu">
                    <li><a href="tiket-acara-kesenian.php">Tiket Acara Kesenian Nusantara</a></li>
                    <li><a href="pakaian-adat-tradisional.php">Pakaian Adat Tradisional</a></li>
                    <li><a href="kerajinan-tangan.php">Kerajinan Tangan Tradisional</a></li>
                </ul>
            </li>
            <li><a href="agenda-budaya.html">Agenda Budaya</a></li>
            <li><a href="artikel.html">Artikel</a></li>
            <li><a href="tentang-kami.html">Tentang Kami</a></li>
        </ul>
    
        <div class="search-profile-container" id="search-profile-container">
            <div class="search-box" id="search-box">
                <input type="text" placeholder="Ketik...">
                <button type="submit"><b>Cari</b></button>
            </div>
            <div class="search-icon" id="search-icon">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABaUlEQVR4nO2Wz0pCQRjFf2i6ydop9ArZO1T7FhrlK0TSH+spxNcw61GCaJMFJZn71rqolfHBufBtwjtzLxLkgYELM+ecud98cxhY4Q+hDLSAW+ANmGnY90BztiZXHAIfwHzBGAPNPAwLQM8JPwEXwDawrlEHLoGhW9cVNxo9CX0BJwvEbO5UaxPz6PLOJbQbwNtz5o1Q07I7U/vTULTFfQdKIcSWO9OYsyoCz9I4CiHeiXROPDrSuAkhjUSy7o1FXRp2z1NjKlIlg/GGNKbLNt6MMR7lUOod19mpMRDJEikW19Lox1ynYYbr9CKN49AAGYtoMRiKM3EnwFooueki02IwLfaBb3EPiETXmbdVwt9Q1J8mpp9ANda44MznisGOwqGiYd175c40MU3W18iAhq7FoofAROWtuqzObF5S4Fv2vioYZtpQX93rG6mWp3koqu5lYpvd4r+Y11zZH5ZpnJg/AvfLNl4Bww/dcoIlpDH7/gAAAABJRU5ErkJggg==">
            </div>
            <div class="profile">
                <a href="sign_up.php">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACZElEQVR4nO2ZPWtUQRSGHxNdiaZQxEpIndhpq6CNJloIJkgKg4VoERQtoiR+INFGC8mfkGisxcq/EPwKiPErWgQLCwUXRaO54cB7YVgkubOz7owyDwwsd89575mvO2dmIJP5Z6gBw8A94CVQV7Hfd/Wf2STNMeAdUKxR3gJDJEgnMOUE+hg4C/QBm1X69OyJY3dbvskwpcC+AyeBdavYdgCnZFtWJpnhVADfgD0efnudygwSmZozJ6wnfDkt3zexPwDDzpywIeOL+TyVhvVsNGYUxJkAjXPSmCYi8wqiN0BjpzRsnYnGVwXRHaDRLQ3Tika5HqSi0zS5Ig3kHmkVeWilNrS+KIAtARpbpfGZiDxXELsCNHZLw9L7aEwriAsBGhelcYeIHFIQ8wFJ4ytpDBCRTqXgFsh4E/4T8n2dwk5xP7AM/PBsVbP9CfwG9pEIN9SyS8BoBftR2ZrPdRJj3GM9KO1ukSiFZ0WSpcgVSYzif+iR7c4h3VqU51nbSIwBYEHBPahg/9BZCPuJTA0YAWadoWJnVDsq+PYALxy/WWnVaCM2HC4Bi04gH4ExYKOHzibgKvDJ0VmU9l8dctZa5509SJks2rOuAF2r/AlgztG1o6HJQN0/crDh3uORnq126u6LafVLu3zPB+Bwq15wRYldoVZrx+Q8ADzTO5fVO0FMSuwXcK3NqXYHcNlJLm82K3RErbGkU/dYDCrdt1iONjOxFwI2TK1mTLG89/1EH5ejTfANxGe9LlALrTeVuS8n2zCltnmb8XEqax89fWhIg8prusrUK9yVxyp1n4oUiZdMJoMfK+YhJaCnoLnkAAAAAElFTkSuQmCC">
                </a> 
            </div>
        </div>
    </nav>
    
    <!-- Menu Overlay Navbar -->
    <div class="menu-overlay" id="menu-overlay">
        <div class="overlay-content">
            <span class="closebtn" id="close-btn">&times;</span>
            <ul class="overlay-menu">
                <li><a href="/Coba baru/index.html">Beranda</a></li>
                <li class="dropdown">
                    <a href="#">Kategori</a>
                    <ul class="dropdown-menu">
                        <li><a href="tiket-acara-kesenian.php">Tiket Acara Kesenian Nusantara</a></li>
                        <li><a href="pakaian-adat-tradisional.php">Pakaian Adat Tradisional</a></li>
                        <li><a href="kerajinan-tangan.php">Kerajinan Tangan Tradisional</a></li>
                    </ul>
                </li>
                <li><a href="#">Agenda Budaya</a></li>
                <li><a href="artikel.html">Artikel</a></li>
                <li><a href="tentang-kami.html">Tentang Kami</a></li>
                <li>
                    <div class="search-box">
                        <input type="text" placeholder="Ketik...">
                        <button type="submit"><b>Cari</b></button>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- HALAMAN BANNER -->
    <div class="halaman-pertama">
        <img src="../gambar/Keperluan-projek/kerajinan-tangan/banner-kerajinan-tangan.png">
        <h1>AKSARA SUARA / KERAJINAN TANGAN</h1>
    </div>

    <?php include('koneksi-db.php'); ?>

<div class="halaman-barang">
    <img src="../gambar/Keperluan-projek/bg-batik-2.jpg" class="overlay">
    <img src="../gambar/Keperluan-projek/bg-batik-2.jpg" class="overlay">

    <div class="pilihan-barang">
    <?php
// Koneksi DB menggunakan PDO
include('koneksi-db.php');

$query = "SELECT * FROM kerajinan_tangan";
$result = $conn->query($query);

// Ganti num_rows dengan rowCount() untuk PDO
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="kotak-barang">';

        $formats = ['jpeg', 'jpg', 'png', 'webp'];
        $nama_kerajinan = strtolower(str_replace(' ', '-', $row['nama_kerajinan'])); // Nama file gambar tanpa ekstensi
        $found = false;

        foreach ($formats as $format) {
            $filepath = "../gambar/Keperluan-projek/kerajinan-tangan/{$nama_kerajinan}.{$format}";
            if (file_exists($filepath)) {
                echo '<img src="' . $filepath . '" alt="' . $row['nama_kerajinan'] . '" class="gambar-barang">';
                $found = true;
                break;
            }
        }

        if (!$found) {
            echo "<p>Gambar untuk " . $row['nama_kerajinan'] . " tidak ditemukan.</p>";
        }
        
        echo '<p class="nama-barang">' . $row['nama_kerajinan'] . '</p>';
        echo '<p class="asal-barang">' . $row['asal'] . '</p>';
        echo '<p class="harga-barang">IDR ' . number_format($row['harga'], 0, ',', '.') . '</p>';
        echo '</div>';
    }
} else {
    echo "<p>Data kerajinan tangan tidak ditemukan.</p>";
}

// Tidak perlu $conn->close(); karena dengan PDO koneksi ditutup otomatis
$conn = null;
?>

    </div>
</div>


        </div>
    </div>
    


    <script src="artikel.js"></script>
</body>
</html>