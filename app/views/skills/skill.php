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
        <div class="title-2">Pilih salah satu skill terbaik yang cocok dengan minat <strong><?= isset($interest['name']) ? htmlspecialchars($interest['name']) : 'Anda' ?></strong></div>
    </div>

    <form id="skillForm" action="/skill/save" method="POST">
      <div class="steps">
<?php if (empty($skills)): ?>
        <p>Data skill tidak tersedia. Pastikan database sudah diisi dengan data skills.</p>
<?php else: ?>
<?php
$count = 0;
foreach ($skills as $skill):
    if ($count > 0 && $count % 3 === 0) {
        echo '</div><div class="steps">';
    }
    $count++;
?>
        <div class="card" data-id="<?= $skill['id'] ?>">
            <h3><?= htmlspecialchars($skill['name']) ?></h3>
            <p><?= htmlspecialchars($skill['description']) ?></p>
        </div>
<?php endforeach; ?>
<?php endif; ?>
      </div>
      <input type="hidden" name="skill_id" id="skill_id" value="">

<hr>

      <div class="footer-nav">
        <a href="/interests" class="btn-back">Back</a>
        <button type="submit" class="btn-next">Next</button>
      </div>
    </form>
   
</div>
</div>

    <footer>
        <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
    </footer>
    
    <script src="/js/skill.js"></script>

</body>
</html>