<!DOCTYPE html>
<html lang="en">
<head>
    <title>Next Move</title>
    <link rel="stylesheet" href="/css/interest.css">
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
        <div class="title-1">Apa Yang Paling Menarik Buatmu?</div>
        <div class="title-2">Pilih satu bidang yang sesuai dengan minatmu</div>
    </div>

    <div class="steps">
<?php
$count = 0;
foreach ($interests as $interest):
    if ($count > 0 && $count % 3 === 0) {
        echo '</div><div class="steps">';
    }
    $count++;
?>
    <div class="card" data-id="<?= $interest['id'] ?>">
        <h3><?= htmlspecialchars($interest['name']) ?></h3>
        <p><?= htmlspecialchars($interest['description']) ?></p>
    </div>
<?php endforeach; ?>
</div>

<hr>
    <div class="footer-nav">
<a href="/" class="btn-back">Back</a>
<a href="/skills" class="btn-next">Next</a>
</div>

</div>

    <footer>
    <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
</footer>

<script src="/js/interest.js"></script>

</body>
</html>