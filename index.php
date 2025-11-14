<?php
session_start();

// Data wisata awal
if (!isset($_SESSION['wisata'])) {
    $_SESSION['wisata'] = [
        [
            "nama" => "Candi Borobudur",
            "lokasi" => "Magelang, Jawa Tengah",
            "deskripsi" => "Candi Buddha terbesar di dunia, warisan budaya UNESCO.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/9/93/Borobudur-Nothwest-view.jpg"
        ],
        [
            "nama" => "Dieng Plateau",
            "lokasi" => "Wonosobo, Jawa Tengah",
            "deskripsi" => "Dataran tinggi dengan candi dan kawah aktif.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/2/2f/Dieng_Plateau.jpg"
        ],
        [
            "nama" => "Pantai Parangtritis",
            "lokasi" => "Yogyakarta",
            "deskripsi" => "Pantai ikonik Yogyakarta dengan pasir hitam.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/b/b0/Pantai_Parangtritis.jpg"
        ],
        [
            "nama" => "Gunung Bromo",
            "lokasi" => "Probolinggo, Jawa Timur",
            "deskripsi" => "Gunung berapi aktif dengan sunrise indah.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/5/57/Bromo_Sunrise.jpg"
        ]
    ];
}

// Proses tambah wisata
if (isset($_POST['tambah'])) {
    $baru = [
        "nama" => $_POST['nama'],
        "lokasi" => $_POST['lokasi'],
        "deskripsi" => $_POST['deskripsi'],
        "gambar" => $_POST['gambar']
    ];

    $_SESSION['wisata'][] = $baru;

    header("Location: index.php");
    exit;
}

// Halaman detail
$detail = null;
if (isset($_GET['id'])) {
    $detail = $_SESSION['wisata'][$_GET['id']];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Website Informasi Wisata Lokal</title>

    <style>
        /* STYLE TETAP SAMA – tidak diubah */
        * { box-sizing: border-box; }
        body {
            font-family: "Poppins", Arial, sans-serif;
            background: linear-gradient(to right, #e0f2fe, #f0fdf4);
            margin: 0;
            color: #1e293b;
        }
        header {
            background: linear-gradient(90deg, #2563eb, #10b981);
            color: white;
            text-align: center;
            padding: 40px 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }
        main { padding: 40px 25px; max-width: 1100px; margin: auto; }
        h2 {
            color: #0f172a;
            border-left: 6px solid #2563eb;
            padding-left: 10px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.9em;
            transition: 0.2s;
        }
        .btn:hover { background: #1e40af; }

        /* Card, grid dan layout tetap */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: 0.25s;
        }
        .card img { width: 100%; height: 200px; object-fit: cover; }
        .card-content { padding: 18px; }

        /* FORM TAMBAH WISATA */
        .form-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
        }
    </style>
</head>

<body>

<header>
    <h1>🌄 Website Informasi Wisata Lokal</h1>
    <p>Menjelajahi Keindahan Alam Indonesia</p>
</header>

<main>

<?php if (isset($_GET['tambah'])): ?>

    <!-- HALAMAN FORM TAMBAH WISATA -->
    <h2>➕ Tambah Tempat Wisata</h2>

    <div class="form-card">
        <form method="POST">
            <label>Nama Wisata</label>
            <input type="text" name="nama" required>

            <label>Lokasi</label>
            <input type="text" name="lokasi" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4" required></textarea>

            <label>URL Gambar</label>
            <input type="text" name="gambar" required>

            <button type="submit" name="tambah" class="btn">Tambah</button>
            <a href="index.php" class="btn" style="background:#10b981;">Kembali</a>
        </form>
    </div>

<?php elseif ($detail): ?>

    <!-- HALAMAN DETAIL -->
    <h2><?= $detail['nama'] ?></h2>
    <img src="<?= $detail['gambar'] ?>" style="width:100%;border-radius:12px;">
    <p><b>📍 Lokasi:</b> <?= $detail['lokasi'] ?></p>
    <p><?= $detail['deskripsi'] ?></p>
    <a href="index.php" class="btn" style="background:#10b981;">⬅ Kembali</a>

<?php else: ?>

    <!-- HALAMAN UTAMA -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>🗺 Daftar Tempat Wisata</h2>
        <a href="?tambah=1" class="btn">➕ Tambah Wisata</a>
    </div>

    <div class="grid">
        <?php foreach ($_SESSION['wisata'] as $i => $w): ?>
            <div class="card">
                <img src="<?= $w['gambar'] ?>">
                <div class="card-content">
                    <h3><?= $w['nama'] ?></h3>
                    <p><b>📍</b> <?= $w['lokasi'] ?></p>
                    <a href="?id=<?= $i ?>" class="btn">Lihat Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

</main>

<footer>
    <p>© 2025 Website Informasi Wisata Lokal | Kelompok Sistem Informasi</p>
</footer>

</body>
</html>
