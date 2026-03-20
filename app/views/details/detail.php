<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Detail - Next Move</title>
    <link rel="stylesheet" href="/css/detail.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <img src="/assets/logo.png" class="logo">
        <h1 class="nextmove">Next Move</h1>
        <div class="navigation">
            <a href="/">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="#">Help</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <!-- Career Header -->
            <div class="career-header">
                <h1 class="career-title">Software Developer</h1>
                <p class="career-subtitle">Bidang Teknologi Informasi</p>
            </div>

            <!-- Career Description -->
            <div class="career-section">
                <h2>Deskripsi Karier</h2>
                <p>Software Developer adalah profesional yang bertanggung jawab untuk merancang, mengembangkan, dan memelihara aplikasi perangkat lunak. Mereka bekerja dengan berbagai bahasa pemrograman dan teknologi untuk menciptakan solusi digital yang inovatif.</p>
            </div>

            <!-- Skills Required -->
            <div class="career-section">
                <h2>Keterampilan yang Dibutuhkan</h2>
                <div class="skills-grid">
                    <div class="skill-item">
                        <span class="skill-name">Bahasa Pemrograman</span>
                        <span class="skill-desc">Java, Python, C++, JavaScript</span>
                    </div>
                    <div class="skill-item">
                        <span class="skill-name">Database</span>
                        <span class="skill-desc">MySQL, PostgreSQL, MongoDB</span>
                    </div>
                    <div class="skill-item">
                        <span class="skill-name">Framework</span>
                        <span class="skill-desc">React, Node.js, Spring Boot</span>
                    </div>
                    <div class="skill-item">
                        <span class="skill-name">Version Control</span>
                        <span class="skill-desc">Git, GitHub</span>
                    </div>
                </div>
            </div>

            <!-- Education Path -->
            <div class="career-section">
                <h2>Jalur Pendidikan</h2>
                <ul class="education-list">
                    <li>Sarjana Teknik Informatika/Komputer</li>
                    <li>Diploma Teknik Informatika</li>
                    <li>Bootcamp Programming</li>
                    <li>Self-learning melalui online courses</li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="/results" class="btn btn-back">Kembali ke Hasil</a>
                <button class="btn btn-save">Simpan Karier</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
    </footer>

</body>
</html>