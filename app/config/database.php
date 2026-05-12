<?php

class Database {

    private $host = "localhost";
    private $db = "next_move";
    private $user = "root";
    private $pass = "";

    public function connect() {

        $conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass
        );

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $this->setupDatabase($conn);

        return $conn;
    }

    private function setupDatabase($conn) {
        $conn->query("CREATE DATABASE IF NOT EXISTS {$this->db}");
        $conn->select_db($this->db);

        $conn->query("CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $conn->query("CREATE TABLE IF NOT EXISTS interests (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $conn->query("CREATE TABLE IF NOT EXISTS skills (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $conn->query("CREATE TABLE IF NOT EXISTS careers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            description TEXT,
            interest_id INT NOT NULL,
            skill_id INT NOT NULL,
            details TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (interest_id) REFERENCES interests(id) ON DELETE CASCADE,
            FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
        )");

        $conn->query("CREATE TABLE IF NOT EXISTS user_selections (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            interest_id INT,
            skill_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (interest_id) REFERENCES interests(id) ON DELETE CASCADE,
            FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
        )");

        $conn->query("INSERT INTO interests (id, name, description) VALUES
                (1, 'Teknologi Komputer', 'Tertarik dengan komputer, pemrograman, dan sistem teknologi.'),
                (2, 'Kesehatan & Medis', 'Tertarik membantu orang dan ingin bekerja di bidang kesehatan.'),
                (3, 'Seni & Desain', 'Tertarik membuat karya visual, desain, dan kreativitas.'),
                (4, 'Akuntansi & Keuangan', 'Tertarik mengelola uang, laporan keuangan, dan perencanaan finansial.'),
                (5, 'Bisnis', 'Tertarik mengelola usaha, strategi, dan dunia bisnis.'),
                (6, 'Komunikasi & Media', 'Tertarik berbicara, menyampaikan informasi, dan bekerja dengan media atau publik.'),
                (7, 'Pariwisata dan Perhotelan', 'Tertarik dengan layanan, wisata, dan industri perjalanan.'),
                (8, 'Ilmu Sosial dan Humaniora', 'Tertarik mempelajari manusia, budaya, bahasa, dan sejarah.'),
                (9, 'Teknik dan Rekayasa', 'Tertarik merancang, membangun, dan mengembangkan teknologi, sistem, atau infrastruktur.')
            ON DUPLICATE KEY UPDATE name = VALUES(name), description = VALUES(description)");

        $conn->query("INSERT INTO skills (id, name, description) VALUES
                (1, 'Pemrograman dasar', 'Kemampuan membuat dan memahami logika program sederhana.'),
                (2, 'Manajemen sistem dan jaringan', 'Mengelola, mengatur, dan menjaga kinerja sistem serta koneksi jaringan.'),
                (3, 'Pengolahan data digital', 'Mengumpulkan, mengolah, dan menyajikan data dalam bentuk digital.'),
                (4, 'Komunikasi klinis', 'Berinteraksi dengan pasien secara jelas, empati, dan profesional.'),
                (5, 'Asesmen kondisi dasar', 'Mengidentifikasi kondisi awal pasien melalui pengamatan dan data.'),
                (6, 'Ketelitian dan akurasi data', 'Memastikan data medis dicatat dengan tepat dan detail.'),
                (7, 'Perancangan UI/UX', 'Kemampuan merancang tampilan dan pengalaman pengguna.'),
                (8, 'Pengolahan konten digital', 'Mengedit dan mengembangkan konten visual berbasis digital.'),
                (9, 'Kreativitas konseptual', 'Menghasilkan ide kreatif yang memiliki nilai dan tujuan jelas.'),
                (10, 'Manajemen laporan keuangan', 'Menyusun dan mengelola laporan keuangan secara sistematis.'),
                (11, 'Analisis data finansial', 'Menilai kondisi keuangan berdasarkan data dan angka.'),
                (12, 'Perencanaan dan kontrol anggaran', 'Mengatur penggunaan dana agar efisien dan terarah.'),
                (13, 'Komunikasi profesional', 'Menyampaikan ide dan informasi secara jelas dalam konteks bisnis.'),
                (14, 'Strategi dan pengambilan keputusan', 'Menentukan langkah terbaik berdasarkan analisis dan tujuan.'),
                (15, 'Manajemen operasional', 'Mengelola kegiatan bisnis agar berjalan efektif dan efisien.'),
                (16, 'Public speaking', 'Menyampaikan informasi di depan publik dengan percaya diri.'),
                (17, 'Content creation', 'Membuat konten yang informatif, menarik, dan relevan.'),
                (18, 'Manajemen informasi', 'Mengelola dan menyebarkan informasi secara tepat sasaran.'),
                (19, 'Customer experience', 'Memberikan pengalaman layanan yang memuaskan bagi pelanggan.'),
                (20, 'Komunikasi lintas budaya', 'Berinteraksi dengan orang dari latar budaya berbeda.'),
                (21, 'Manajemen layanan', 'Mengatur pelayanan agar berjalan dengan standar yang baik.'),
                (22, 'Analisis sosial', 'Memahami fenomena sosial dan perilaku masyarakat.'),
                (23, 'Critical thinking', 'Menganalisis informasi secara logis dan objektif.'),
                (24, 'Riset dan interpretasi data', 'Mengumpulkan dan menafsirkan data untuk menarik kesimpulan.'),
                (25, 'Problem solving teknis', 'Menyelesaikan masalah teknis secara sistematis.'),
                (26, 'Desain dan pengembangan sistem', 'Merancang dan membangun sistem atau solusi teknis.'),
                (27, 'Kolaborasi proyek', 'Bekerja sama dalam tim untuk menyelesaikan proyek teknis.')
            ON DUPLICATE KEY UPDATE name = VALUES(name), description = VALUES(description)");

        $conn->query("INSERT INTO careers (id, name, description, interest_id, skill_id, details) VALUES
                (1, 'Software Developer', 'Membuat dan menguji kode program.', 1, 1, 'Berfokus pada logika dasar pemrograman dan pembuatan aplikasi sederhana.'),
                (2, 'Network Administrator', 'Mengelola dan memelihara jaringan komputer.', 1, 2, 'Menjaga koneksi jaringan dan performa sistem informasi.'),
                (3, 'Digital Data Operator', 'Mengelola data digital untuk kebutuhan analisis.', 1, 3, 'Mengumpulkan, memproses, dan menyajikan data dalam format digital.'),
                (4, 'Asisten Klinis', 'Memberi dukungan komunikasi kepada pasien dan tim medis.', 2, 4, 'Berinteraksi secara profesional dan empatik dengan pasien.'),
                (5, 'Praktisi Asesmen', 'Melakukan pemeriksaan awal dan pengumpulan data pasien.', 2, 5, 'Mengidentifikasi kondisi dasar pasien melalui observasi dan data.'),
                (6, 'Spesialis Dokumentasi Medis', 'Menjaga ketelitian data medis dan catatan pasien.', 2, 6, 'Mencatat informasi medis dengan akurat dan detail.'),
                (7, 'UI/UX Designer', 'Merancang antarmuka dan pengalaman pengguna yang intuitif.', 3, 7, 'Mendesain tampilan digital yang ramah pengguna dan menarik.'),
                (8, 'Digital Content Editor', 'Membuat dan mengembangkan konten visual digital.', 3, 8, 'Mengolah materi digital menjadi konten yang menarik dan efektif.'),
                (9, 'Creative Concept Developer', 'Menghasilkan ide kreatif yang jelas dan bernilai.', 3, 9, 'Menciptakan konsep desain dan solusi kreatif untuk proyek.'),
                (10, 'Akuntan Junior', 'Menyusun laporan keuangan yang rapi dan akurat.', 4, 10, 'Mengatur pembukuan dan memastikan laporan keuangan lengkap.'),
                (11, 'Analis Keuangan', 'Menilai angka dan kondisi keuangan organisasi.', 4, 11, 'Menganalisis data finansial untuk mendukung keputusan bisnis.'),
                (12, 'Perencana Anggaran', 'Menyusun anggaran dan mengontrol pemakaian dana.', 4, 12, 'Merencanakan penggunaan dana agar sesuai tujuan dan efisien.'),
                (13, 'Spesialis Komunikasi Bisnis', 'Menyampaikan pesan profesional dalam bisnis.', 5, 13, 'Berkomunikasi dengan jelas di lingkungan organisasi.'),
                (14, 'Business Strategist', 'Merumuskan strategi dan keputusan bisnis penting.', 5, 14, 'Menentukan arah bisnis berdasarkan analisis dan tujuan.'),
                (15, 'Operation Manager', 'Mengelola proses operasional sehari-hari.', 5, 15, 'Menjaga agar aktivitas bisnis berjalan efektif dan efisien.'),
                (16, 'Public Relations Officer', 'Menyampaikan informasi kepada publik dengan percaya diri.', 6, 16, 'Berbicara di depan audiens dan menyampaikan pesan dengan jelas.'),
                (17, 'Content Creator', 'Menciptakan konten yang informatif dan menarik.', 6, 17, 'Mengembangkan materi untuk platform digital dan media.'),
                (18, 'Information Coordinator', 'Mengelola dan menyebarkan informasi secara tepat.', 6, 18, 'Menata alur informasi agar sampai ke audiens yang tepat.'),
                (19, 'Customer Experience Specialist', 'Memberikan layanan yang memuaskan bagi pelanggan.', 7, 19, 'Menciptakan pengalaman pelanggan yang positif dan konsisten.'),
                (20, 'Cultural Relations Coordinator', 'Berinteraksi dengan orang dari berbagai budaya.', 7, 20, 'Mengelola komunikasi lintas budaya dalam pelayanan.'),
                (21, 'Service Manager', 'Mengatur layanan agar memenuhi standar kualitas.', 7, 21, 'Memastikan pelayanan berjalan sesuai prosedur dan harapan pelanggan.'),
                (22, 'Sosiolog', 'Memahami fenomena sosial dan perilaku masyarakat.', 8, 22, 'Menganalisis interaksi sosial dan konteks budaya.'),
                (23, 'Analis Kebijakan', 'Menganalisis informasi dengan logika dan objektivitas.', 8, 23, 'Menilai fakta dan argumen untuk mendukung keputusan.'),
                (24, 'Peneliti Sosial', 'Melakukan riset dan interpretasi data sosial.', 8, 24, 'Mengumpulkan dan menafsirkan data untuk menarik kesimpulan.'),
                (25, 'Teknisi Lapangan', 'Menyelesaikan masalah teknis secara sistematis.', 9, 25, 'Melakukan perbaikan dan pemeliharaan teknis pada peralatan.'),
                (26, 'Engineer Sistem', 'Merancang dan mengembangkan sistem teknis.', 9, 26, 'Menyusun solusi teknis dan membangun sistem yang handal.'),
                (27, 'Koordinator Proyek Teknik', 'Bekerja sama dalam tim untuk menyelesaikan proyek teknis.', 9, 27, 'Mengorganisir tim dan kolaborasi proyek teknik yang efektif.')
            ON DUPLICATE KEY UPDATE name = VALUES(name), description = VALUES(description), interest_id = VALUES(interest_id), skill_id = VALUES(skill_id), details = VALUES(details)");

        $conn->query("CREATE TABLE IF NOT EXISTS career_req_skills (
            id INT AUTO_INCREMENT PRIMARY KEY,
            career_id INT NOT NULL,
            skill_name VARCHAR(100) NOT NULL,
            skill_desc TEXT NOT NULL,
            UNIQUE KEY unique_skill (career_id, skill_name),
            FOREIGN KEY (career_id) REFERENCES careers(id) ON DELETE CASCADE
        )");

        $conn->query("CREATE TABLE IF NOT EXISTS career_educations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            career_id INT NOT NULL,
            education_path VARCHAR(255) NOT NULL,
            UNIQUE KEY unique_education (career_id, education_path),
            FOREIGN KEY (career_id) REFERENCES careers(id) ON DELETE CASCADE
        )");

        $conn->query("INSERT INTO career_req_skills (career_id, skill_name, skill_desc) VALUES
            (1, 'Bahasa Pemrograman', 'Java, Python, C++, JavaScript'),
            (1, 'Database', 'MySQL, PostgreSQL, MongoDB'),
            (1, 'Framework', 'React, Node.js, Spring Boot'),
            (1, 'Version Control', 'Git, GitHub'),
            (2, 'Sistem Operasi', 'Linux, Windows Server'),
            (2, 'Jaringan', 'TCP/IP, DNS, DHCP, VPN'),
            (2, 'Keamanan', 'Firewall, IDS/IPS'),
            (3, 'Analisis Data', 'Excel, SQL, Python (Pandas)'),
            (3, 'Visualisasi Data', 'Tableau, Power BI'),
            (4, 'Komunikasi', 'Empati, Pendengar Aktif, Berbicara Jelas'),
            (4, 'Administrasi', 'Pencatatan Medis dasar, Penjadwalan'),
            (5, 'Observasi', 'Pengamatan Gejala Awal, Deteksi Dini'),
            (5, 'Pencatatan', 'Rekam Medis Elektronik, Dokumentasi Klinis'),
            (6, 'Dukungan Dokumentasi', 'Standarisasi catatan medis, pengarsipan'),
            (6, 'Ketelitian Data', 'Validasi dan koreksi catatan medis'),
            (7, 'Desain UI', 'Wireframe, prototyping, Figma/Adobe XD'),
            (7, 'UX Research', 'User testing, usability studies'),
            (7, 'Visual Design', 'Tipografi, layout, visual hierarchy'),
            (8, 'Konten Digital', 'Penulisan naskah, storytelling visual'),
            (8, 'Editing Multimedia', 'Editing foto, video, dan audio sederhana'),
            (8, 'Platform Sosial Media', 'Strategi publikasi dan penjadwalan konten'),
            (9, 'Kreativitas Konsep', 'Pengembangan ide original dan konsep visual'),
            (9, 'Presentasi Ide', 'Menyajikan konsep dengan jelas kepada tim'),
            (9, 'Riset Tren', 'Menganalisis gaya dan kebutuhan target audiens'),
            (10, 'Pembukuan', 'Pencatatan transaksi keuangan harian'),
            (10, 'Pelaporan Keuangan', 'Laporan laba rugi dan neraca'),
            (10, 'Excel', 'Penggunaan rumus, tabel pivot, dan grafik'),
            (11, 'Analisis Laporan', 'Menganalisis rasio keuangan dan tren'),
            (11, 'Peramalan', 'Membuat proyeksi kas dan anggaran'),
            (11, 'Audit Dasar', 'Memeriksa kesesuaian dokumen dan catatan'),
            (12, 'Perencanaan Anggaran', 'Menentukan alokasi biaya dan target'),
            (12, 'Kontrol Biaya', 'Memantau realisasi dan penyimpangan anggaran'),
            (12, 'Penganggaran', 'Membuat rencana anggaran operasional'),
            (13, 'Komunikasi Bisnis', 'Menulis memo, email, dan presentasi formal'),
            (13, 'Relasi Klien', 'Menjaga hubungan profesional dengan pelanggan'),
            (13, 'Public Speaking', 'Berbicara di depan pimpinan dan tim'),
            (14, 'Perencanaan Strategi', 'Menetapkan tujuan dan strategi jangka panjang'),
            (14, 'Analisis Pasar', 'Menganalisis peluang dan ancaman bisnis'),
            (14, 'Pengambilan Keputusan', 'Memilih aksi terbaik berdasarkan data'),
            (15, 'Manajemen Operasional', 'Mengelola proses layanan dan produksi'),
            (15, 'Koordinasi Tim', 'Menyelaraskan pekerjaan tim lintas fungsi'),
            (15, 'Pemecahan Masalah', 'Menyelesaikan hambatan operasional secara cepat'),
            (16, 'Public Relations', 'Mengelola hubungan media dan citra organisasi'),
            (16, 'Presentasi', 'Menyampaikan pesan kepada publik dengan jelas'),
            (16, 'Penulisan Siaran Pers', 'Menyusun materi komunikasi resmi'),
            (17, 'Konten Kreatif', 'Membuat teks, gambar, dan video yang menarik'),
            (17, 'Pengelolaan Media', 'Merencanakan konten untuk platform digital'),
            (17, 'Editing Video', 'Mengedit klip video untuk publikasi online'),
            (18, 'Manajemen Informasi', 'Mengatur data dan dokumen internal'),
            (18, 'Koordinasi Kantor', 'Menghubungkan departemen dan menyampaikan informasi'),
            (18, 'Analisis Data', 'Mengolah informasi menjadi insight yang jelas'),
            (19, 'Pelayanan Pelanggan', 'Melayani tamu dengan ramah dan cepat'),
            (19, 'Penyelesaian Keluhan', 'Menangani feedback dengan solusi tepat'),
            (19, 'Pemahaman Pengalaman', 'Mengenali kebutuhan pelanggan dan preferensi'),
            (20, 'Komunikasi Lintas Budaya', 'Berinteraksi dengan berbagai latar belakang'),
            (20, 'Event Diplomasi', 'Menyelenggarakan kegiatan hubungan budaya'),
            (20, 'Bahasa Asing', 'Mampu berkomunikasi dasar dengan bahasa lain'),
            (21, 'Manajemen Layanan', 'Menyusun standard operating procedures layanan'),
            (21, 'Kontrol Kualitas', 'Memastikan layanan sesuai standar'),
            (21, 'Kepemimpinan Tim', 'Memimpin tim layanan dan operasional'),
            (22, 'Riset Sosial', 'Merancang dan melaksanakan survei sosial'),
            (22, 'Analisis Data Sosial', 'Menafsirkan hasil studi dan statistik'),
            (22, 'Penulisan Ilmiah', 'Menyusun laporan penelitian sosial'),
            (23, 'Analisis Kebijakan', 'Mengkaji dampak aturan dan keputusan publik'),
            (23, 'Penulisan Laporan', 'Menyusun rekomendasi kebijakan tertulis'),
            (23, 'Statistika dasar', 'Mengolah data untuk mendukung analisis kebijakan'),
            (24, 'Metode Penelitian', 'Menyusun desain penelitian kuantitatif dan kualitatif'),
            (24, 'Observasi Lapangan', 'Mengumpulkan data secara langsung dalam konteks sosial'),
            (24, 'Interpretasi Data', 'Menganalisis temuan penelitian sosial'),
            (25, 'Teknik Peralatan', 'Memahami perangkat dan instalasi teknis'),
            (25, 'Troubleshooting', 'Mendiagnosis dan memperbaiki kerusakan lapangan'),
            (25, 'Keselamatan Kerja', 'Memastikan prosedur K3 terapkan di lokasi kerja'),
            (26, 'Desain Sistem', 'Menyusun arsitektur sistem teknis'),
            (26, 'Pengembangan', 'Membuat dan menguji sistem perangkat keras atau lunak'),
            (26, 'Uji Sistem', 'Melakukan test dan debugging komponen teknis'),
            (27, 'Manajemen Proyek', 'Menyusun jadwal dan sumber daya proyek teknik'),
            (27, 'Koordinasi Tim', 'Mengatur komunikasi dan tugas tim proyek'),
            (27, 'Pengendalian Waktu', 'Memantau tenggat dan penyelesaian milestone')
        ON DUPLICATE KEY UPDATE skill_desc = VALUES(skill_desc)");

        $conn->query("INSERT INTO career_educations (career_id, education_path) VALUES
            (1, 'Sarjana Teknik Informatika/Komputer'),
            (1, 'Diploma Teknik Informatika'),
            (1, 'Bootcamp Programming'),
            (1, 'Self-learning melalui online courses'),
            (2, 'Sarjana Teknik Komputer/Jaringan'),
            (2, 'Sertifikasi Jaringan (CCNA, CompTIA Network+)'),
            (2, 'Diploma Teknik Komputer'),
            (3, 'Sarjana Sistem Informasi/Statistika'),
            (3, 'Bootcamp Data Science/Analytics'),
            (4, 'Diploma Keperawatan/Kebidanan'),
            (4, 'Sertifikasi Asisten Tenaga Kesehatan'),
            (5, 'Sarjana Kedokteran/Kesehatan Masyarakat'),
            (5, 'Pelatihan Asesmen Klinis'),
            (6, 'Diploma Rekam Medis'),
            (6, 'Pelatihan Dokumentasi Kesehatan'),
            (7, 'Sarjana Desain Komunikasi Visual'),
            (7, 'Bootcamp UI/UX'),
            (7, 'Diploma Desain Multimedia'),
            (8, 'D3 Desain Multimedia'),
            (8, 'S1 Ilmu Komunikasi'),
            (8, 'Pelatihan Content Creation'),
            (9, 'Sarjana Seni Rupa/Desain'),
            (9, 'Pelatihan Kreativitas dan Konsep'),
            (9, 'Magang di studio kreatif'),
            (10, 'D3 Akuntansi'),
            (10, 'S1 Akuntansi'),
            (10, 'Sertifikasi Brevet A/B'),
            (11, 'S1 Ekonomi'),
            (11, 'S1 Manajemen Keuangan'),
            (11, 'Pelatihan Analisis Keuangan'),
            (12, 'S1 Manajemen'),
            (12, 'S1 Akuntansi'),
            (12, 'Pelatihan Perencanaan Anggaran'),
            (13, 'S1 Komunikasi'),
            (13, 'D3 Administrasi Niaga'),
            (13, 'Pelatihan Komunikasi Bisnis'),
            (14, 'S1 Manajemen'),
            (14, 'S1 Ekonomi'),
            (14, 'Pelatihan Strategi Bisnis'),
            (15, 'S1 Manajemen'),
            (15, 'D3 Manajemen Operasional'),
            (15, 'Sertifikasi Lean Six Sigma Dasar'),
            (16, 'S1 Hubungan Masyarakat'),
            (16, 'D3 Komunikasi'),
            (16, 'Pelatihan Media dan PR'),
            (17, 'S1 Ilmu Komunikasi'),
            (17, 'Pelatihan Media Digital'),
            (17, 'Magang Content Creation'),
            (18, 'D3 Sekretaris'),
            (18, 'S1 Ilmu Perpustakaan/Informasi'),
            (18, 'Pelatihan Manajemen Informasi'),
            (19, 'D3 Perhotelan'),
            (19, 'S1 Manajemen'),
            (19, 'Pelatihan Customer Experience'),
            (20, 'S1 Hubungan Internasional'),
            (20, 'S1 Bahasa Asing'),
            (20, 'Pelatihan Intercultural Communication'),
            (21, 'D3 Perhotelan'),
            (21, 'S1 Manajemen'),
            (21, 'Sertifikasi Hospitality Management'),
            (22, 'S1 Sosiologi'),
            (22, 'S1 Antropologi'),
            (22, 'Pelatihan Metodologi Penelitian'),
            (23, 'S1 Ilmu Politik'),
            (23, 'S1 Administrasi Publik'),
            (23, 'Pelatihan Analisis Kebijakan'),
            (24, 'S1 Sosiologi'),
            (24, 'S1 Psikologi'),
            (24, 'Pelatihan Statistik Sosial'),
            (25, 'D3 Teknik'),
            (25, 'S1 Teknik'),
            (25, 'Pelatihan K3 dan Keselamatan Kerja'),
            (26, 'S1 Teknik Elektro'),
            (26, 'S1 Teknik Informatika'),
            (26, 'Sertifikasi Sistem dan Jaringan'),
            (27, 'S1 Teknik'),
            (27, 'S1 Manajemen Proyek'),
            (27, 'Pelatihan manajemen proyek teknik')
        ON DUPLICATE KEY UPDATE education_path = VALUES(education_path)");
    }
}