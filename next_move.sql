-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2026 at 05:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `next_move`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `interest_id` int NOT NULL,
  `skill_id` int NOT NULL,
  `details` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `description`, `interest_id`, `skill_id`, `details`, `created_at`) VALUES
(1, 'Software Developer', 'Membuat dan menguji kode program.', 1, 1, 'Berfokus pada logika dasar pemrograman dan pembuatan aplikasi sederhana.', '2026-04-30 06:18:04'),
(2, 'Network Administrator', 'Mengelola dan memelihara jaringan komputer.', 1, 2, 'Menjaga koneksi jaringan dan performa sistem informasi.', '2026-04-30 06:18:04'),
(3, 'Digital Data Operator', 'Mengelola data digital untuk kebutuhan analisis.', 1, 3, 'Mengumpulkan, memproses, dan menyajikan data dalam format digital.', '2026-04-30 06:18:04'),
(4, 'Asisten Klinis', 'Memberi dukungan komunikasi kepada pasien dan tim medis.', 2, 4, 'Berinteraksi secara profesional dan empatik dengan pasien.', '2026-04-30 06:18:04'),
(5, 'Praktisi Asesmen', 'Melakukan pemeriksaan awal dan pengumpulan data pasien.', 2, 5, 'Mengidentifikasi kondisi dasar pasien melalui observasi dan data.', '2026-04-30 06:18:04'),
(6, 'Spesialis Dokumentasi Medis', 'Menjaga ketelitian data medis dan catatan pasien.', 2, 6, 'Mencatat informasi medis dengan akurat dan detail.', '2026-04-30 06:18:04'),
(7, 'UI/UX Designer', 'Merancang antarmuka dan pengalaman pengguna yang intuitif.', 3, 7, 'Mendesain tampilan digital yang ramah pengguna dan menarik.', '2026-04-30 06:18:04'),
(8, 'Digital Content Editor', 'Membuat dan mengembangkan konten visual digital.', 3, 8, 'Mengolah materi digital menjadi konten yang menarik dan efektif.', '2026-04-30 06:18:04'),
(9, 'Creative Concept Developer', 'Menghasilkan ide kreatif yang jelas dan bernilai.', 3, 9, 'Menciptakan konsep desain dan solusi kreatif untuk proyek.', '2026-04-30 06:18:04'),
(10, 'Akuntan Junior', 'Menyusun laporan keuangan yang rapi dan akurat.', 4, 10, 'Mengatur pembukuan dan memastikan laporan keuangan lengkap.', '2026-04-30 06:18:04'),
(11, 'Analis Keuangan', 'Menilai angka dan kondisi keuangan organisasi.', 4, 11, 'Menganalisis data finansial untuk mendukung keputusan bisnis.', '2026-04-30 06:18:04'),
(12, 'Perencana Anggaran', 'Menyusun anggaran dan mengontrol pemakaian dana.', 4, 12, 'Merencanakan penggunaan dana agar sesuai tujuan dan efisien.', '2026-04-30 06:18:04'),
(13, 'Spesialis Komunikasi Bisnis', 'Menyampaikan pesan profesional dalam bisnis.', 5, 13, 'Berkomunikasi dengan jelas di lingkungan organisasi.', '2026-04-30 06:18:04'),
(14, 'Business Strategist', 'Merumuskan strategi dan keputusan bisnis penting.', 5, 14, 'Menentukan arah bisnis berdasarkan analisis dan tujuan.', '2026-04-30 06:18:04'),
(15, 'Operation Manager', 'Mengelola proses operasional sehari-hari.', 5, 15, 'Menjaga agar aktivitas bisnis berjalan efektif dan efisien.', '2026-04-30 06:18:04'),
(16, 'Public Relations Officer', 'Menyampaikan informasi kepada publik dengan percaya diri.', 6, 16, 'Berbicara di depan audiens dan menyampaikan pesan dengan jelas.', '2026-04-30 06:18:04'),
(17, 'Content Creator', 'Menciptakan konten yang informatif dan menarik.', 6, 17, 'Mengembangkan materi untuk platform digital dan media.', '2026-04-30 06:18:04'),
(18, 'Information Coordinator', 'Mengelola dan menyebarkan informasi secara tepat.', 6, 18, 'Menata alur informasi agar sampai ke audiens yang tepat.', '2026-04-30 06:18:04'),
(19, 'Customer Experience Specialist', 'Memberikan layanan yang memuaskan bagi pelanggan.', 7, 19, 'Menciptakan pengalaman pelanggan yang positif dan konsisten.', '2026-04-30 06:18:04'),
(20, 'Cultural Relations Coordinator', 'Berinteraksi dengan orang dari berbagai budaya.', 7, 20, 'Mengelola komunikasi lintas budaya dalam pelayanan.', '2026-04-30 06:18:04'),
(21, 'Service Manager', 'Mengatur layanan agar memenuhi standar kualitas.', 7, 21, 'Memastikan pelayanan berjalan sesuai prosedur dan harapan pelanggan.', '2026-05-04 14:58:47'),
(22, 'Sosiolog', 'Memahami fenomena sosial dan perilaku masyarakat.', 8, 22, 'Menganalisis interaksi sosial dan konteks budaya.', '2026-05-04 14:58:47'),
(23, 'Analis Kebijakan', 'Menganalisis informasi dengan logika dan objektivitas.', 8, 23, 'Menilai fakta dan argumen untuk mendukung keputusan.', '2026-05-04 14:58:47'),
(24, 'Peneliti Sosial', 'Melakukan riset dan interpretasi data sosial.', 8, 24, 'Mengumpulkan dan menafsirkan data untuk menarik kesimpulan.', '2026-05-04 14:58:47'),
(25, 'Teknisi Lapangan', 'Menyelesaikan masalah teknis secara sistematis.', 9, 25, 'Melakukan perbaikan dan pemeliharaan teknis pada peralatan.', '2026-05-04 14:58:47'),
(26, 'Engineer Sistem', 'Merancang dan mengembangkan sistem teknis.', 9, 26, 'Menyusun solusi teknis dan membangun sistem yang handal.', '2026-05-04 14:58:47'),
(27, 'Koordinator Proyek Teknik', 'Bekerja sama dalam tim untuk menyelesaikan proyek teknis.', 9, 27, 'Mengorganisir tim dan kolaborasi proyek teknik yang efektif.', '2026-05-04 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `career_educations`
--

CREATE TABLE `career_educations` (
  `id` int NOT NULL,
  `career_id` int NOT NULL,
  `education_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `career_educations`
--

INSERT INTO `career_educations` (`id`, `career_id`, `education_path`) VALUES
(3, 1, 'Bootcamp Programming'),
(2, 1, 'Diploma Teknik Informatika'),
(1, 1, 'Sarjana Teknik Informatika/Komputer'),
(4, 1, 'Self-learning melalui online courses'),
(7, 2, 'Diploma Teknik Komputer'),
(5, 2, 'Sarjana Teknik Komputer/Jaringan'),
(6, 2, 'Sertifikasi Jaringan (CCNA, CompTIA Network+)'),
(9, 3, 'Bootcamp Data Science/Analytics'),
(8, 3, 'Sarjana Sistem Informasi/Statistika'),
(10, 4, 'Diploma Keperawatan/Kebidanan'),
(11, 4, 'Sertifikasi Asisten Tenaga Kesehatan'),
(13, 5, 'Pelatihan Asesmen Klinis'),
(12, 5, 'Sarjana Kedokteran/Kesehatan Masyarakat'),
(2380, 6, 'Diploma Rekam Medis'),
(2381, 6, 'Pelatihan Dokumentasi Kesehatan'),
(2383, 7, 'Bootcamp UI/UX'),
(2384, 7, 'Diploma Desain Multimedia'),
(2382, 7, 'Sarjana Desain Komunikasi Visual'),
(2385, 8, 'D3 Desain Multimedia'),
(2387, 8, 'Pelatihan Content Creation'),
(2386, 8, 'S1 Ilmu Komunikasi'),
(2390, 9, 'Magang di studio kreatif'),
(2389, 9, 'Pelatihan Kreativitas dan Konsep'),
(2388, 9, 'Sarjana Seni Rupa/Desain'),
(2391, 10, 'D3 Akuntansi'),
(2392, 10, 'S1 Akuntansi'),
(2393, 10, 'Sertifikasi Brevet A/B'),
(2396, 11, 'Pelatihan Analisis Keuangan'),
(2394, 11, 'S1 Ekonomi'),
(2395, 11, 'S1 Manajemen Keuangan'),
(2399, 12, 'Pelatihan Perencanaan Anggaran'),
(2398, 12, 'S1 Akuntansi'),
(2397, 12, 'S1 Manajemen'),
(2401, 13, 'D3 Administrasi Niaga'),
(2402, 13, 'Pelatihan Komunikasi Bisnis'),
(2400, 13, 'S1 Komunikasi'),
(2405, 14, 'Pelatihan Strategi Bisnis'),
(2404, 14, 'S1 Ekonomi'),
(2403, 14, 'S1 Manajemen'),
(2407, 15, 'D3 Manajemen Operasional'),
(2406, 15, 'S1 Manajemen'),
(2408, 15, 'Sertifikasi Lean Six Sigma Dasar'),
(2410, 16, 'D3 Komunikasi'),
(2411, 16, 'Pelatihan Media dan PR'),
(2409, 16, 'S1 Hubungan Masyarakat'),
(2414, 17, 'Magang Content Creation'),
(2413, 17, 'Pelatihan Media Digital'),
(2412, 17, 'S1 Ilmu Komunikasi'),
(2415, 18, 'D3 Sekretaris'),
(2417, 18, 'Pelatihan Manajemen Informasi'),
(2416, 18, 'S1 Ilmu Perpustakaan/Informasi'),
(2418, 19, 'D3 Perhotelan'),
(2420, 19, 'Pelatihan Customer Experience'),
(2419, 19, 'S1 Manajemen'),
(2423, 20, 'Pelatihan Intercultural Communication'),
(2422, 20, 'S1 Bahasa Asing'),
(2421, 20, 'S1 Hubungan Internasional'),
(2424, 21, 'D3 Perhotelan'),
(2425, 21, 'S1 Manajemen'),
(2426, 21, 'Sertifikasi Hospitality Management'),
(2429, 22, 'Pelatihan Metodologi Penelitian'),
(2428, 22, 'S1 Antropologi'),
(2427, 22, 'S1 Sosiologi'),
(2432, 23, 'Pelatihan Analisis Kebijakan'),
(2431, 23, 'S1 Administrasi Publik'),
(2430, 23, 'S1 Ilmu Politik'),
(2435, 24, 'Pelatihan Statistik Sosial'),
(2434, 24, 'S1 Psikologi'),
(2433, 24, 'S1 Sosiologi'),
(2436, 25, 'D3 Teknik'),
(2438, 25, 'Pelatihan K3 dan Keselamatan Kerja'),
(2437, 25, 'S1 Teknik'),
(2439, 26, 'S1 Teknik Elektro'),
(2440, 26, 'S1 Teknik Informatika'),
(2441, 26, 'Sertifikasi Sistem dan Jaringan'),
(2444, 27, 'Pelatihan manajemen proyek teknik'),
(2443, 27, 'S1 Manajemen Proyek'),
(2442, 27, 'S1 Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `career_req_skills`
--

CREATE TABLE `career_req_skills` (
  `id` int NOT NULL,
  `career_id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `skill_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `career_req_skills`
--

INSERT INTO `career_req_skills` (`id`, `career_id`, `skill_name`, `skill_desc`) VALUES
(1, 1, 'Bahasa Pemrograman', 'Java, Python, C++, JavaScript'),
(2, 1, 'Database', 'MySQL, PostgreSQL, MongoDB'),
(3, 1, 'Framework', 'React, Node.js, Spring Boot'),
(4, 1, 'Version Control', 'Git, GitHub'),
(5, 2, 'Sistem Operasi', 'Linux, Windows Server'),
(6, 2, 'Jaringan', 'TCP/IP, DNS, DHCP, VPN'),
(7, 2, 'Keamanan', 'Firewall, IDS/IPS'),
(8, 3, 'Analisis Data', 'Excel, SQL, Python (Pandas)'),
(9, 3, 'Visualisasi Data', 'Tableau, Power BI'),
(10, 4, 'Komunikasi', 'Empati, Pendengar Aktif, Berbicara Jelas'),
(11, 4, 'Administrasi', 'Pencatatan Medis dasar, Penjadwalan'),
(12, 5, 'Observasi', 'Pengamatan Gejala Awal, Deteksi Dini'),
(13, 5, 'Pencatatan', 'Rekam Medis Elektronik, Dokumentasi Klinis'),
(2380, 6, 'Dukungan Dokumentasi', 'Standarisasi catatan medis, pengarsipan'),
(2381, 6, 'Ketelitian Data', 'Validasi dan koreksi catatan medis'),
(2382, 7, 'Desain UI', 'Wireframe, prototyping, Figma/Adobe XD'),
(2383, 7, 'UX Research', 'User testing, usability studies'),
(2384, 7, 'Visual Design', 'Tipografi, layout, visual hierarchy'),
(2385, 8, 'Konten Digital', 'Penulisan naskah, storytelling visual'),
(2386, 8, 'Editing Multimedia', 'Editing foto, video, dan audio sederhana'),
(2387, 8, 'Platform Sosial Media', 'Strategi publikasi dan penjadwalan konten'),
(2388, 9, 'Kreativitas Konsep', 'Pengembangan ide original dan konsep visual'),
(2389, 9, 'Presentasi Ide', 'Menyajikan konsep dengan jelas kepada tim'),
(2390, 9, 'Riset Tren', 'Menganalisis gaya dan kebutuhan target audiens'),
(2391, 10, 'Pembukuan', 'Pencatatan transaksi keuangan harian'),
(2392, 10, 'Pelaporan Keuangan', 'Laporan laba rugi dan neraca'),
(2393, 10, 'Excel', 'Penggunaan rumus, tabel pivot, dan grafik'),
(2394, 11, 'Analisis Laporan', 'Menganalisis rasio keuangan dan tren'),
(2395, 11, 'Peramalan', 'Membuat proyeksi kas dan anggaran'),
(2396, 11, 'Audit Dasar', 'Memeriksa kesesuaian dokumen dan catatan'),
(2397, 12, 'Perencanaan Anggaran', 'Menentukan alokasi biaya dan target'),
(2398, 12, 'Kontrol Biaya', 'Memantau realisasi dan penyimpangan anggaran'),
(2399, 12, 'Penganggaran', 'Membuat rencana anggaran operasional'),
(2400, 13, 'Komunikasi Bisnis', 'Menulis memo, email, dan presentasi formal'),
(2401, 13, 'Relasi Klien', 'Menjaga hubungan profesional dengan pelanggan'),
(2402, 13, 'Public Speaking', 'Berbicara di depan pimpinan dan tim'),
(2403, 14, 'Perencanaan Strategi', 'Menetapkan tujuan dan strategi jangka panjang'),
(2404, 14, 'Analisis Pasar', 'Menganalisis peluang dan ancaman bisnis'),
(2405, 14, 'Pengambilan Keputusan', 'Memilih aksi terbaik berdasarkan data'),
(2406, 15, 'Manajemen Operasional', 'Mengelola proses layanan dan produksi'),
(2407, 15, 'Koordinasi Tim', 'Menyelaraskan pekerjaan tim lintas fungsi'),
(2408, 15, 'Pemecahan Masalah', 'Menyelesaikan hambatan operasional secara cepat'),
(2409, 16, 'Public Relations', 'Mengelola hubungan media dan citra organisasi'),
(2410, 16, 'Presentasi', 'Menyampaikan pesan kepada publik dengan jelas'),
(2411, 16, 'Penulisan Siaran Pers', 'Menyusun materi komunikasi resmi'),
(2412, 17, 'Konten Kreatif', 'Membuat teks, gambar, dan video yang menarik'),
(2413, 17, 'Pengelolaan Media', 'Merencanakan konten untuk platform digital'),
(2414, 17, 'Editing Video', 'Mengedit klip video untuk publikasi online'),
(2415, 18, 'Manajemen Informasi', 'Mengatur data dan dokumen internal'),
(2416, 18, 'Koordinasi Kantor', 'Menghubungkan departemen dan menyampaikan informasi'),
(2417, 18, 'Analisis Data', 'Mengolah informasi menjadi insight yang jelas'),
(2418, 19, 'Pelayanan Pelanggan', 'Melayani tamu dengan ramah dan cepat'),
(2419, 19, 'Penyelesaian Keluhan', 'Menangani feedback dengan solusi tepat'),
(2420, 19, 'Pemahaman Pengalaman', 'Mengenali kebutuhan pelanggan dan preferensi'),
(2421, 20, 'Komunikasi Lintas Budaya', 'Berinteraksi dengan berbagai latar belakang'),
(2422, 20, 'Event Diplomasi', 'Menyelenggarakan kegiatan hubungan budaya'),
(2423, 20, 'Bahasa Asing', 'Mampu berkomunikasi dasar dengan bahasa lain'),
(2424, 21, 'Manajemen Layanan', 'Menyusun standard operating procedures layanan'),
(2425, 21, 'Kontrol Kualitas', 'Memastikan layanan sesuai standar'),
(2426, 21, 'Kepemimpinan Tim', 'Memimpin tim layanan dan operasional'),
(2427, 22, 'Riset Sosial', 'Merancang dan melaksanakan survei sosial'),
(2428, 22, 'Analisis Data Sosial', 'Menafsirkan hasil studi dan statistik'),
(2429, 22, 'Penulisan Ilmiah', 'Menyusun laporan penelitian sosial'),
(2430, 23, 'Analisis Kebijakan', 'Mengkaji dampak aturan dan keputusan publik'),
(2431, 23, 'Penulisan Laporan', 'Menyusun rekomendasi kebijakan tertulis'),
(2432, 23, 'Statistika dasar', 'Mengolah data untuk mendukung analisis kebijakan'),
(2433, 24, 'Metode Penelitian', 'Menyusun desain penelitian kuantitatif dan kualitatif'),
(2434, 24, 'Observasi Lapangan', 'Mengumpulkan data secara langsung dalam konteks sosial'),
(2435, 24, 'Interpretasi Data', 'Menganalisis temuan penelitian sosial'),
(2436, 25, 'Teknik Peralatan', 'Memahami perangkat dan instalasi teknis'),
(2437, 25, 'Troubleshooting', 'Mendiagnosis dan memperbaiki kerusakan lapangan'),
(2438, 25, 'Keselamatan Kerja', 'Memastikan prosedur K3 terapkan di lokasi kerja'),
(2439, 26, 'Desain Sistem', 'Menyusun arsitektur sistem teknis'),
(2440, 26, 'Pengembangan', 'Membuat dan menguji sistem perangkat keras atau lunak'),
(2441, 26, 'Uji Sistem', 'Melakukan test dan debugging komponen teknis'),
(2442, 27, 'Manajemen Proyek', 'Menyusun jadwal dan sumber daya proyek teknik'),
(2443, 27, 'Koordinasi Tim', 'Mengatur komunikasi dan tugas tim proyek'),
(2444, 27, 'Pengendalian Waktu', 'Memantau tenggat dan penyelesaian milestone');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Teknologi Komputer', 'Tertarik dengan komputer, pemrograman, dan sistem teknologi.', '2026-04-30 06:12:51'),
(2, 'Kesehatan & Medis', 'Tertarik membantu orang dan ingin bekerja di bidang kesehatan.', '2026-04-30 06:12:51'),
(3, 'Seni & Desain', 'Tertarik membuat karya visual, desain, dan kreativitas.', '2026-04-30 06:12:51'),
(4, 'Akuntansi & Keuangan', 'Tertarik mengelola uang, laporan keuangan, dan perencanaan finansial.', '2026-04-30 06:12:51'),
(5, 'Bisnis', 'Tertarik mengelola usaha, strategi, dan dunia bisnis.', '2026-04-30 06:12:51'),
(6, 'Komunikasi & Media', 'Tertarik berbicara, menyampaikan informasi, dan bekerja dengan media atau publik.', '2026-04-30 06:12:51'),
(7, 'Pariwisata dan Perhotelan', 'Tertarik dengan layanan, wisata, dan industri perjalanan.', '2026-04-30 06:12:51'),
(8, 'Ilmu Sosial dan Humaniora', 'Tertarik mempelajari manusia, budaya, bahasa, dan sejarah.', '2026-04-30 06:12:51'),
(9, 'Teknik dan Rekayasa', 'Tertarik merancang, membangun, dan mengembangkan teknologi, sistem, atau infrastruktur.', '2026-04-30 06:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Pemrograman dasar', 'Kemampuan membuat dan memahami logika program sederhana.', '2026-04-30 06:12:51'),
(2, 'Manajemen sistem dan jaringan', 'Mengelola, mengatur, dan menjaga kinerja sistem serta koneksi jaringan.', '2026-04-30 06:12:51'),
(3, 'Pengolahan data digital', 'Mengumpulkan, mengolah, dan menyajikan data dalam bentuk digital.', '2026-04-30 06:12:51'),
(4, 'Komunikasi klinis', 'Berinteraksi dengan pasien secara jelas, empati, dan profesional.', '2026-04-30 06:12:51'),
(5, 'Asesmen kondisi dasar', 'Mengidentifikasi kondisi awal pasien melalui pengamatan dan data.', '2026-04-30 06:12:51'),
(6, 'Ketelitian dan akurasi data', 'Memastikan data medis dicatat dengan tepat dan detail.', '2026-04-30 06:12:51'),
(7, 'Perancangan UI/UX', 'Kemampuan merancang tampilan dan pengalaman pengguna.', '2026-04-30 06:12:51'),
(8, 'Pengolahan konten digital', 'Mengedit dan mengembangkan konten visual berbasis digital.', '2026-04-30 06:12:51'),
(9, 'Kreativitas konseptual', 'Menghasilkan ide kreatif yang memiliki nilai dan tujuan jelas.', '2026-05-04 14:58:47'),
(10, 'Manajemen laporan keuangan', 'Menyusun dan mengelola laporan keuangan secara sistematis.', '2026-05-04 14:58:47'),
(11, 'Analisis data finansial', 'Menilai kondisi keuangan berdasarkan data dan angka.', '2026-05-04 14:58:47'),
(12, 'Perencanaan dan kontrol anggaran', 'Mengatur penggunaan dana agar efisien dan terarah.', '2026-05-04 14:58:47'),
(13, 'Komunikasi profesional', 'Menyampaikan ide dan informasi secara jelas dalam konteks bisnis.', '2026-05-04 14:58:47'),
(14, 'Strategi dan pengambilan keputusan', 'Menentukan langkah terbaik berdasarkan analisis dan tujuan.', '2026-05-04 14:58:47'),
(15, 'Manajemen operasional', 'Mengelola kegiatan bisnis agar berjalan efektif dan efisien.', '2026-05-04 14:58:47'),
(16, 'Public speaking', 'Menyampaikan informasi di depan publik dengan percaya diri.', '2026-05-04 14:58:47'),
(17, 'Content creation', 'Membuat konten yang informatif, menarik, dan relevan.', '2026-05-04 14:58:47'),
(18, 'Manajemen informasi', 'Mengelola dan menyebarkan informasi secara tepat sasaran.', '2026-05-04 14:58:47'),
(19, 'Customer experience', 'Memberikan pengalaman layanan yang memuaskan bagi pelanggan.', '2026-05-04 14:58:47'),
(20, 'Komunikasi lintas budaya', 'Berinteraksi dengan orang dari latar budaya berbeda.', '2026-05-04 14:58:47'),
(21, 'Manajemen layanan', 'Mengatur pelayanan agar berjalan dengan standar yang baik.', '2026-05-04 14:58:47'),
(22, 'Analisis sosial', 'Memahami fenomena sosial dan perilaku masyarakat.', '2026-05-04 14:58:47'),
(23, 'Critical thinking', 'Menganalisis informasi secara logis dan objektif.', '2026-05-04 14:58:47'),
(24, 'Riset dan interpretasi data', 'Mengumpulkan dan menafsirkan data untuk menarik kesimpulan.', '2026-05-04 14:58:47'),
(25, 'Problem solving teknis', 'Menyelesaikan masalah teknis secara sistematis.', '2026-05-04 14:58:47'),
(26, 'Desain dan pengembangan sistem', 'Merancang dan membangun sistem atau solusi teknis.', '2026-05-04 14:58:47'),
(27, 'Kolaborasi proyek', 'Bekerja sama dalam tim untuk menyelesaikan proyek teknis.', '2026-05-04 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@nextmove.com', '$2y$10$yLQoPqLs1ligayBw.LM8KOPdT1CuA.LOTf9hYHiH4JOtWvMMHiboK', '2026-03-21 08:25:12'),
(2, 'admin1', 'admin1@nextmove.com', '$2y$10$u05Hbfom8JEtrFIN.tYd1.9RNy94heQX1z1QLbXQNdTmvmXaOTkZW', '2026-03-21 08:30:32'),
(12, 'davin jonas', 'davinjonas123@gmail.com', '$2y$10$.uE31aPaN7NGiO0AVTsuM.15oOizwzH/yKJKo97JLeEzZpohFMPye', '2026-03-21 12:20:43'),
(13, 'yones', 'yones@gmail.com', '$2y$10$UXlunEzb3Xlcf3cCMASiUOkR0Zzvn9nEt6GjC79b1/3OjW1AYQcYq', '2026-03-21 12:24:09'),
(14, 'yoness', 'yoness@gmail.com', '$2y$10$JlBqphUAP7zij1PmEiiSyOF6hR9QIzm5kHWuM1fTwyDg90.bx57yS', '2026-03-21 12:32:30'),
(15, 'davinfernandojosan', 'davinjonas@gmail.com', '$2y$10$gTuiXWrkaOD64p6r3wWzUubsltSMuVsN1sS4qAWdkAuV7tiTifW4S', '2026-04-28 05:14:39'),
(16, 'Junz', 'junz@gmail.com', '$2y$10$4qOnkNHQbaGHE/YECLVXdOhwwVxGbeNMRewxjv6YauATxHLFC3EEy', '2026-05-05 06:11:00'),
(17, '132432', '1242342211@gmail.com', '$2y$10$bsag0Wkniufzi8rTTjwnRuUBv5yqIRWoP9kqJRZp/XWNaQyCDvAxK', '2026-05-07 06:56:11'),
(18, 'test', 'test@gmail.com', '$2y$10$NHDPw.na8Lh538saOdwaD.srRsoWEk8ubagEa074pwAxsf9FJF3T.', '2026-05-09 13:36:47'),
(19, 'davinganteng', 'davinjonas22@gmail.com', '$2y$10$.K5i0GUrDGCZ.N1ISCPhkeZNs69/1bBOiMDPVEZu98p435c62UfM.', '2026-05-12 05:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_selections`
--

CREATE TABLE `user_selections` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `interest_id` int DEFAULT NULL,
  `skill_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_id` (`interest_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `career_educations`
--
ALTER TABLE `career_educations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_education` (`career_id`,`education_path`);

--
-- Indexes for table `career_req_skills`
--
ALTER TABLE `career_req_skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_skill` (`career_id`,`skill_name`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_selections`
--
ALTER TABLE `user_selections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `interest_id` (`interest_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `career_educations`
--
ALTER TABLE `career_educations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6593;

--
-- AUTO_INCREMENT for table `career_req_skills`
--
ALTER TABLE `career_req_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6593;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_selections`
--
ALTER TABLE `user_selections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_ibfk_1` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `careers_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `career_educations`
--
ALTER TABLE `career_educations`
  ADD CONSTRAINT `career_educations_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `career_req_skills`
--
ALTER TABLE `career_req_skills`
  ADD CONSTRAINT `career_req_skills_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_selections`
--
ALTER TABLE `user_selections`
  ADD CONSTRAINT `user_selections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_selections_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_selections_ibfk_3` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
