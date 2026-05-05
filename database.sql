CREATE DATABASE IF NOT EXISTS next_move;
USE next_move;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS interests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS careers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    interest_id INT NOT NULL,
    skill_id INT NOT NULL,
    details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (interest_id) REFERENCES interests(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS user_selections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    interest_id INT,
    skill_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (interest_id) REFERENCES interests(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
);

-- Insert sample data
INSERT INTO interests (name, description) VALUES
('Teknologi Komputer', 'Tertarik dengan komputer, pemrograman, dan sistem teknologi.'),
('Kesehatan & Medis', 'Tertarik membantu orang dan ingin bekerja di bidang kesehatan.'),
('Seni & Desain', 'Tertarik membuat karya visual, desain, dan kreativitas.'),
('Akuntansi & Keuangan', 'Tertarik mengelola uang, laporan keuangan, dan perencanaan finansial.'),
('Bisnis', 'Tertarik mengelola usaha, strategi, dan dunia bisnis.'),
('Komunikasi & Media', 'Tertarik berbicara, menyampaikan informasi, dan bekerja dengan media atau publik.'),
('Pariwisata dan Perhotelan', 'Tertarik dengan layanan, wisata, dan industri perjalanan.'),
('Ilmu Sosial dan Humaniora', 'Tertarik mempelajari manusia, budaya, bahasa, dan sejarah.'),
('Teknik dan Rekayasa', 'Tertarik merancang, membangun, dan mengembangkan teknologi, sistem, atau infrastruktur.');

INSERT INTO skills (name, description) VALUES
('Pemrograman dasar', 'Kemampuan membuat dan memahami logika program sederhana.'),
('Manajemen sistem dan jaringan', 'Mengelola, mengatur, dan menjaga kinerja sistem serta koneksi jaringan.'),
('Pengolahan data digital', 'Mengumpulkan, mengolah, dan menyajikan data dalam bentuk digital.'),
('Komunikasi klinis', 'Berinteraksi dengan pasien secara jelas, empati, dan profesional.'),
('Asesmen kondisi dasar', 'Mengidentifikasi kondisi awal pasien melalui pengamatan dan data.'),
('Ketelitian dan akurasi data', 'Memastikan data medis dicatat dengan tepat dan detail.'),
('Perancangan UI/UX', 'Kemampuan merancang tampilan dan pengalaman pengguna.'),
('Pengolahan konten digital', 'Mengedit dan mengembangkan konten visual berbasis digital.'),
('Kreativitas konseptual', 'Menghasilkan ide kreatif yang memiliki nilai dan tujuan jelas.'),
('Manajemen laporan keuangan', 'Menyusun dan mengelola laporan keuangan secara sistematis.'),
('Analisis data finansial', 'Menilai kondisi keuangan berdasarkan data dan angka.'),
('Perencanaan dan kontrol anggaran', 'Mengatur penggunaan dana agar efisien dan terarah.'),
('Komunikasi profesional', 'Menyampaikan ide dan informasi secara jelas dalam konteks bisnis.'),
('Strategi dan pengambilan keputusan', 'Menentukan langkah terbaik berdasarkan analisis dan tujuan.'),
('Manajemen operasional', 'Mengelola kegiatan bisnis agar berjalan efektif dan efisien.'),
('Public speaking', 'Menyampaikan informasi di depan publik dengan percaya diri.'),
('Content creation', 'Membuat konten yang informatif, menarik, dan relevan.'),
('Manajemen informasi', 'Mengelola dan menyebarkan informasi secara tepat sasaran.'),
('Customer experience', 'Memberikan pengalaman layanan yang memuaskan bagi pelanggan.'),
('Komunikasi lintas budaya', 'Berinteraksi dengan orang dari latar budaya berbeda.'),
('Manajemen layanan', 'Mengatur pelayanan agar berjalan dengan standar yang baik.'),
('Analisis sosial', 'Memahami fenomena sosial dan perilaku masyarakat.'),
('Critical thinking', 'Menganalisis informasi secara logis dan objektif.'),
('Riset dan interpretasi data', 'Mengumpulkan dan menafsirkan data untuk menarik kesimpulan.'),
('Problem solving teknis', 'Menyelesaikan masalah teknis secara sistematis.'),
('Desain dan pengembangan sistem', 'Merancang dan membangun sistem atau solusi teknis.'),
('Kolaborasi proyek', 'Bekerja sama dalam tim untuk menyelesaikan proyek teknis.');

INSERT INTO careers (name, description, interest_id, skill_id, details) VALUES
('Software Developer', 'Membuat dan menguji kode program sederhana.', 1, 1, 'Berfokus pada logika dasar pemrograman dan pembuatan aplikasi sederhana.'),
('Network Administrator', 'Mengelola dan memelihara jaringan komputer.', 1, 2, 'Menjaga koneksi jaringan dan performa sistem informasi.'),
('Digital Data Operator', 'Mengelola data digital untuk kebutuhan analisis.', 1, 3, 'Mengumpulkan, memproses, dan menyajikan data dalam format digital.'),
('Asisten Klinis', 'Memberi dukungan komunikasi kepada pasien dan tim medis.', 2, 4, 'Berinteraksi secara profesional dan empatik dengan pasien.'),
('Praktisi Asesmen', 'Melakukan pemeriksaan awal dan pengumpulan data pasien.', 2, 5, 'Mengidentifikasi kondisi dasar pasien melalui observasi dan data.'),
('Spesialis Dokumentasi Medis', 'Menjaga ketelitian data medis dan catatan pasien.', 2, 6, 'Mencatat informasi medis dengan akurat dan detail.'),
('UI/UX Designer', 'Merancang antarmuka dan pengalaman pengguna yang intuitif.', 3, 7, 'Mendesain tampilan digital yang ramah pengguna dan menarik.'),
('Digital Content Editor', 'Membuat dan mengembangkan konten visual digital.', 3, 8, 'Mengolah materi digital menjadi konten yang menarik dan efektif.'),
('Creative Concept Developer', 'Menghasilkan ide kreatif yang jelas dan bernilai.', 3, 9, 'Menciptakan konsep desain dan solusi kreatif untuk proyek.'),
('Akuntan Junior', 'Menyusun laporan keuangan yang rapi dan akurat.', 4, 10, 'Mengatur pembukuan dan memastikan laporan keuangan lengkap.'),
('Analis Keuangan', 'Menilai angka dan kondisi keuangan organisasi.', 4, 11, 'Menganalisis data finansial untuk mendukung keputusan bisnis.'),
('Perencana Anggaran', 'Menyusun anggaran dan mengontrol pemakaian dana.', 4, 12, 'Merencanakan penggunaan dana agar sesuai tujuan dan efisien.'),
('Spesialis Komunikasi Bisnis', 'Menyampaikan pesan profesional dalam bisnis.', 5, 13, 'Berkomunikasi dengan jelas di lingkungan organisasi.'),
('Business Strategist', 'Merumuskan strategi dan keputusan bisnis penting.', 5, 14, 'Menentukan arah bisnis berdasarkan analisis dan tujuan.'),
('Operation Manager', 'Mengelola proses operasional sehari-hari.', 5, 15, 'Menjaga agar aktivitas bisnis berjalan efektif dan efisien.'),
('Public Relations Officer', 'Menyampaikan informasi kepada publik dengan percaya diri.', 6, 16, 'Berbicara di depan audiens dan menyampaikan pesan dengan jelas.'),
('Content Creator', 'Menciptakan konten yang informatif dan menarik.', 6, 17, 'Mengembangkan materi untuk platform digital dan media.'),
('Information Coordinator', 'Mengelola dan menyebarkan informasi secara tepat.', 6, 18, 'Menata alur informasi agar sampai ke audiens yang tepat.'),
('Customer Experience Specialist', 'Memberikan layanan yang memuaskan bagi pelanggan.', 7, 19, 'Menciptakan pengalaman pelanggan yang positif dan konsisten.'),
('Cultural Relations Coordinator', 'Berinteraksi dengan orang dari berbagai budaya.', 7, 20, 'Mengelola komunikasi lintas budaya dalam pelayanan.'),
('Service Manager', 'Mengatur layanan agar memenuhi standar kualitas.', 7, 21, 'Memastikan pelayanan berjalan sesuai prosedur dan harapan pelanggan.'),
('Sosiolog', 'Memahami fenomena sosial dan perilaku masyarakat.', 8, 22, 'Menganalisis interaksi sosial dan konteks budaya.'),
('Analis Kebijakan', 'Menganalisis informasi dengan logika dan objektivitas.', 8, 23, 'Menilai fakta dan argumen untuk mendukung keputusan.'),
('Peneliti Sosial', 'Melakukan riset dan interpretasi data sosial.', 8, 24, 'Mengumpulkan dan menafsirkan data untuk menarik kesimpulan.'),
('Teknisi Lapangan', 'Menyelesaikan masalah teknis secara sistematis.', 9, 25, 'Melakukan perbaikan dan pemeliharaan teknis pada peralatan.'),
('Engineer Sistem', 'Merancang dan mengembangkan sistem teknis.', 9, 26, 'Menyusun solusi teknis dan membangun sistem yang handal.'),
('Koordinator Proyek Teknik', 'Bekerja sama dalam tim untuk menyelesaikan proyek teknis.', 9, 27, 'Mengorganisir tim dan kolaborasi proyek teknik yang efektif.');
