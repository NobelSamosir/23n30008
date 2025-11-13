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
