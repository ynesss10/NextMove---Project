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
      <a href="#">Home</a>
      <a href="/saved">Saved</a>
      <a href="registers" class="help-button">Sign Up</a>
    </div>
  </div>

<div class="main">
    <div class="title">
        <div class="title-1">Karir Yang Cocok Untukmu!</div>
        <div class="title-2">Berdasarkan bidang dan keterampilanmu</div>
    </div>


      <div class="container">
    <div class="top-bar">
      <div>Minat: <span class="blue">Teknologi Komputer</span></div>
      <div>Keterampilan: <span class="blue">Coding</span></div>
    </div>

    <div class="cards">
      
      <div class="card">
        <div class="card-header">Software Developer</div>
        <div class="card-body">Software developer bertanggung jawab untuk merancang, mengembangkan, menguji, dan memelihara perangkat lunak.</div>
        <div class="card-actions">
          <a href="/details" class="btn btn-view">View Detail</a>
          <button class="btn btn-save">Save</button>
        </div>
      </div>

      <div class="card">
        <div class="card-header">Web Developer</div>
        <div class="card-body">Web developer berfokus pada pengembangan dan pemeliharaan website.</div>
        <div class="card-actions">
          <a href="/career/detail?id=web-developer" class="btn btn-view">View Detail</a>
          <button class="btn btn-save">Save</button>
        </div>
      </div>

    </div>

  </div>

  <hr>

    <div class="footer-nav">
<a href="/" class="btn-back">Home</a>
<a href="#" class="btn-next">Save</a>
</div>

</div>

  <footer>
    <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
</footer>

  <script src="/js/career-save.js"></script>

</body>
</html>