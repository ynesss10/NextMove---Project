<!DOCTYPE html>
<html lang="en">
<head>
    <title>Saved Careers - Next Move</title>
    <link rel="stylesheet" href="/css/save.css">
</head>
<body>

  <div class="navbar">
    <img src="/assets/logo.png" class="logo">
    <h1 class="nextmove">Next Move</h1>
    <div class="navigation">
      <a href="#">Home</a>
      <a href="/saved">Saved</a>
      <a href="registers" class="help-button">Sign Up</a>
    </div>
  </div>

    <div class="main">
        <div class="title">
            <div class="title-1">Karir yang Kamu Simpan</div>
            <div class="title-2">Kelola daftar karir pilihan yang ingin kamu pelajari lebih lanjut</div>
        </div>

        <div class="container">
            <div class="empty-state" id="emptyState">
                <div class="empty-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                </div>
                <h3>Belum ada karir yang disimpan</h3>
                <p>Mulai simpan karir yang menarik untuk dipelajari lebih lanjut</p>
                <a href="/interests" class="btn btn-explore">Explore Careers</a>
            </div>

            <div class="saved-careers" id="savedCareers" style="display: none;">
       
            </div>
        </div>

        <hr>

        <div class="footer-nav">
            <a href="/" class="btn-back">Home</a>
            <a href="/interests" class="btn-next">Explore More</a>
        </div>

    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
    </footer>

    <script src="/js/save.js"></script>

</body>
</html>
