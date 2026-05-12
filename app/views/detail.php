<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Detail - Next Move</title>
    <link rel="stylesheet" href="/css/detail.css">
</head>
<body>

    <div class="navbar">
        <img src="/assets/logo.png" class="logo">
        <h1 class="nextmove">Next Move</h1>
        <div class="navigation">
            <a href="/">Home</a>
            <a href="/saved">Saved</a>
            <?php if(isset($_SESSION['user_name'])): ?>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <a href="#" class="help-button"><?= htmlspecialchars($_SESSION['user_name']) ?></a>
                    <a href="/logout" class="logout-button">Log Out</a>
                </div>
            <?php else: ?>
                <a href="/register" class="help-button">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>

  
    <div class="main">
        <div class="container">
      
            <div class="career-header">
                <h1 class="career-title"><?= htmlspecialchars($career['name']) ?></h1>
                <p class="career-subtitle">
                    Bidang <?= htmlspecialchars($career['bidang']) ?>
                    <?php if (!empty($career['skill_name'])): ?>
                        &bull; Keterampilan <?= htmlspecialchars($career['skill_name']) ?>
                    <?php endif; ?>
                </p>
            </div>

    
            <div class="career-section">
                <h2>Deskripsi Karier</h2>
                <p><?= nl2br(htmlspecialchars($career['description'])) ?></p>
            </div>

            <div class="career-section">
                <h2>Informasi Tambahan</h2>
                <p><?= nl2br(htmlspecialchars($career['details'])) ?></p>
            </div>

       
            <div class="career-section">
                <h2>Keterampilan yang Dibutuhkan</h2>
                <div class="skills-grid">
                    <?php if (!empty($skills)): ?>
                        <?php foreach ($skills as $s): ?>
                        <div class="skill-item">
                            <span class="skill-name"><?= htmlspecialchars($s['skill_name']) ?></span>
                            <span class="skill-desc"><?= htmlspecialchars($s['skill_desc']) ?></span>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Belum ada data keterampilan.</p>
                    <?php endif; ?>
                </div>
            </div>

    
            <div class="career-section">
                <h2>Jalur Pendidikan</h2>
                <ul class="education-list">
                    <?php if (!empty($educations)): ?>
                        <?php foreach ($educations as $edu): ?>
                            <li><?= htmlspecialchars($edu['education_path']) ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>Belum ada data jalur pendidikan.</li>
                    <?php endif; ?>
                </ul>
            </div>

     
            <div class="action-buttons">
                <a href="/result" class="btn btn-back">Kembali ke Hasil</a>
                <button class="btn btn-save" data-id="<?= htmlspecialchars($career['id']) ?>">Simpan Karier</button>
            </div>
        </div>
    </div>


    <footer>
        <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
    </footer>

    <script src="/js/career-save.js"></script>
</body>
</html>
