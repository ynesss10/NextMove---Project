<!DOCTYPE html>
<html lang="en">
<head>
    <title>Next Move</title>
        <link rel="stylesheet" href="/css/result.css">
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
    <div class="title">
        <div class="title-1">Karir Yang Cocok Untukmu!</div>
        <div class="title-2">Berdasarkan bidang dan keterampilanmu</div>
    </div>


      <div class="container">
    <div class="top-bar">
      <div>Minat: <span class="blue"><?= htmlspecialchars($interest['name']) ?></span></div>
      <div>Keterampilan: <span class="blue"><?= htmlspecialchars($skill['name']) ?></span></div>
    </div>

<?php if (isset($matchType) && $matchType !== 'exact'): ?>
    <div class="info-note" style="margin: 14px 0; padding: 12px; background: #eef5ff; border: 1px solid #cfe0ff; color: #1d3d7a; border-radius: 8px;">
        <?php if ($matchType === 'interest'): ?>
            Hasil yang ditampilkan adalah rekomendasi terbaik berdasarkan minat Anda.
        <?php elseif ($matchType === 'skill'): ?>
            Hasil yang ditampilkan adalah rekomendasi terbaik berdasarkan keterampilan Anda.
        <?php else: ?>
            Hasil yang ditampilkan adalah rekomendasi terbaik berdasarkan kombinasi minat dan keterampilan Anda.
        <?php endif; ?>
    </div>
<?php endif; ?>

    <div class="cards">
<?php if (empty($careers)): ?>
      <p style="text-align: center; padding: 40px;">Tidak ada karier yang sesuai dengan pilihan Anda. Silahkan pilih kombinasi lain.</p>
<?php else: ?>
<?php foreach ($careers as $career): ?>
      <div class="card">
        <div class="card-header"><?= htmlspecialchars($career['name']) ?></div>
        <div class="card-body"><?= htmlspecialchars($career['description']) ?></div>
        <div class="card-actions">
          <a href="/detail?id=<?= $career['id'] ?>" class="btn btn-view">View Detail</a>
          <button class="btn btn-save" data-id="<?= $career['id'] ?>">Save</button>
        </div>
      </div>
<?php endforeach; ?>
<?php endif; ?>
    </div>

  </div>

  <hr>

    <div class="footer-nav">
<a href="/" class="btn-back">Home</a>
<a href="/interest" class="btn-next">Explore More</a>
</div>

</div>

  <footer>
    <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
</footer>

  <script src="/js/career-save.js"></script>

</body>
</html>
