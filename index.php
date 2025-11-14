<?php
// =====================================================
// Website Informasi Wisata Lokal (Tampilan Modern)
// =====================================================
session_start();

// Data wisata
if (!isset($_SESSION['wisata'])) {
    $_SESSION['wisata'] = [
        [
            "nama" => "Candi Borobudur",
            "lokasi" => "Magelang, Jawa Tengah",
            "deskripsi" => "Candi Buddha terbesar di dunia, warisan budaya UNESCO. Dikelilingi oleh pegunungan dan pemandangan sawah yang indah.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/9/93/Borobudur-Nothwest-view.jpg"
        ],
        [
            "nama" => "Dieng Plateau",
            "lokasi" => "Wonosobo, Jawa Tengah",
            "deskripsi" => "Kawasan dataran tinggi yang terkenal dengan kompleks candi, kawah aktif, dan Danau Telaga Warna. Suhu dingin dan suasana mistis menjadi daya tarik utama.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/2/2f/Dieng_Plateau.jpg"
        ],
        [
            "nama" => "Pantai Parangtritis",
            "lokasi" => "Yogyakarta",
            "deskripsi" => "Pantai ikonik Yogyakarta yang terkenal dengan pasir hitam dan legenda Nyi Roro Kidul. Tempat terbaik menikmati sunset dan naik ATV di tepi pantai.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/b/b0/Pantai_Parangtritis.jpg"
        ],
        [
            "nama" => "Gunung Bromo",
            "lokasi" => "Probolinggo, Jawa Timur",
            "deskripsi" => "Gunung berapi aktif yang menjadi ikon wisata Jawa Timur. Pemandangan matahari terbit di Bromo adalah salah satu yang paling indah di Indonesia.",
            "gambar" => "https://upload.wikimedia.org/wikipedia/commons/5/57/Bromo_Sunrise.jpg"
        ]
    ];
}

// Menampilkan detail wisata (jika diklik)
$detail = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $detail = $_SESSION['wisata'][$id];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Website Informasi Wisata Lokal</title>
    <style>
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
        header h1 {
            margin: 0;
            font-size: 2.2em;
            letter-spacing: 1px;
        }
        header p {
            margin: 8px 0 0;
            font-size: 1.1em;
            opacity: 0.9;
        }
        main {
            padding: 40px 25px;
            max-width: 1100px;
            margin: auto;
        }
        h2 {
            color: #0f172a;
            border-left: 6px solid #2563eb;
            padding-left: 10px;
            margin-bottom: 20px;
        }
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
            transition: all 0.25s ease;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 18px;
        }
        .card-content h3 {
            margin-top: 0;
            color: #2563eb;
            font-size: 1.2em;
        }
        .card-content p {
            margin: 6px 0 10px;
            color: #334155;
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
        .btn:hover {
            background: #1e40af;
        }
        footer {
            text-align: center;
            background: linear-gradient(90deg, #2563eb, #10b981);
            color: white;
            padding: 15px 0;
            font-size: 14px;
            margin-top: 60px;
        }
        /* Halaman detail */
        .detail-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        .detail-card img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
        }
        .detail-card .content {
            padding: 25px;
        }
        .detail-card h2 {
            margin-top: 0;
            border: none;
            padding-left: 0;
            color: #2563eb;
        }
        .back-btn {
            display: inline-block;
            background: #10b981;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.2s;
        }
        .back-btn:hover {
            background: #059669;
        }
    </style>
</head>

<body>

<header>
    <h1>🌄 Website Informasi Wisata Lokal</h1>
    <p>Menjelajahi Keindahan Alam dan Budaya Indonesia</p>
</header>

<main>
<?php if ($detail): ?>
    <!-- Halaman Detail -->
    <div class="detail-card">
        <img src="<?= $detail['gambar'] ?>" alt="<?= $detail['nama'] ?>">
        <div class="content">
            <h2><?= $detail['nama'] ?></h2>
            <p><b>📍 Lokasi:</b> <?= $detail['lokasi'] ?></p>
            <p><?= $detail['deskripsi'] ?></p>
            <a href="wisata.php" class="back-btn">⬅ Kembali ke Daftar</a>
        </div>
    </div>

<?php else: ?>
    <!-- Daftar Wisata -->
    <h2>🗺 Daftar Tempat Wisata</h2>
    <div class="grid">
        <?php foreach ($_SESSION['wisata'] as $i => $w): ?>
            <div class="card">
                <img src="<?= $w['gambar'] ?>" alt="<?= $w['nama'] ?>">
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