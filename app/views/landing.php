<!DOCTYPE html>
<html lang="en">
<head>
  <title>Next Move</title>
  <link rel="stylesheet" href="/css/home.css">
</head>
<body>
  <div class="navbar">
    <img src="/assets/logo.png" class="logo">
    <h1 class="nextmove">Next Move</h1>
    <div class="navigation">
      <a href="#">Home</a>
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
    <div class="title-1">Next Move</div>
    <div class="title-2">Explore Your Passion, Build Your Future</div>
  </div>
</div>

  <div class="banner">
    <img src="/assets/banner.png" class="banner-1">
  </div>

  <div class="body">
    <h1 class="body-1">How Next Move Operates?</h1>
  </div>

<div class="steps">
  <div class="card">
    <div class="circle">1</div>
    <h3>Temukan Minatmu</h3>
    <p>Eksplorasi berbagai bidang yang sesuai dengan passion kamu</p>
  </div>

  <div class="card">
    <div class="circle">2</div>
    <h3>Kenali Keterampilanmu</h3>
    <p>Pelajari kemampuan yang kamu miliki dan kembangkan</p>
  </div>

  <div class="card">
    <div class="circle">3</div>
    <h3>Dapatkan Rekomendasi</h3>
    <p>Kami akan memberikan saran karier yang cocok untukmu</p>
  </div>
</div>


<div class="cta">
  <h2>Ready To Find Your Career?</h2>
  <p>
    Hanya butuh beberapa menit untuk mendapatkan rekomendasi karier
    yang cocok untukmu
  </p>
  <?php if(isset($_SESSION['user_name'])): ?>
    <a href="/interests" class="cta-button">Start Now</a>
  <?php else: ?>
    <a href="/logins" class="cta-button">Start Now</a>
  <?php endif; ?>
</div>

<script>
  // Handle logout
  const logoutBtn = document.querySelector('.logout-button');
  if (logoutBtn) {
    logoutBtn.addEventListener('click', async (e) => {
      e.preventDefault();
      
      try {
        const response = await fetch('/api/logout', {
          method: 'POST'
        });
        
        const data = await response.json();
        
        if (data.success) {
          window.location.href = data.redirect;
        }
      } catch (error) {
        window.location.href = '/logout';
      }
    });
  }
</script>

</body>
</html>