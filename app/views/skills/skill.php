<!DOCTYPE html>
<html lang="en">
<head>
    <title>Next Move</title>
      <link rel="stylesheet" href="/css/skill.css">
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
        <a href="/registers" class="help-button">Sign Up</a>
      <?php endif; ?>
    </div>
  </div>

<div class="main">
    <div class="title">
        <div class="title-1">Keterampilan Apa Yang Kamu Miliki?</div>
        <div class="title-2">Pilih keterampilan yang paling kamu kuasai atau ingin kembangkan</div>
    </div>

    <div class="steps">
        <div class="card">
            <h3>Temukan Minatmu</h3>
            <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
        </div>

        <div class="card">
            <h3>Temukan Minatmu</h3>
            <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
        </div>

        <div class="card">
            <h3>Temukan Minatmu</h3>
            <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
        </div>
    </div>

       <div class="steps">
        <div class="card">
            <h3>Temukan Minatmu</h3>
            <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
        </div>

        <div class="card">
            <h3>Temukan Minatmu</h3>
            <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
        </div>

        <div class="card">
            <h3>Temukan Minatmu</h3>
            <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
        </div>
        </div>
    
<hr>

    <div class="footer-nav">
<a href="/interests" class="btn-back">Back</a>
<a href="/results" class="btn-next">Next</a>
</div>
   
</div>
</div>

    <footer>
        <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
    </footer>
    
    <script src="/js/skill.js"></script>

</body>
</html>