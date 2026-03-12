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
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Help</a>
    </div>
</div>

<div class="main">

    <div class="title">
        <div class="title-1">Apa Yang Paling Menarik Buatmu?</div>
        <div class="title-2">Pilih satu bidang yang sesuai dengan minatmu</div>
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
<a href="#" class="btn-back">Back</a>
<a href="skill.php" class="btn-next">Next</a>
</div>
<footer>
    <p>&copy; <?= date('Y') ?> Next Move. SMK Kristen Immanuel.</p>
</footer>
</div>

<script>
const cards = document.querySelectorAll(".card");

cards.forEach(card => {
  card.addEventListener("click", () => {

    cards.forEach(c => c.classList.remove("active"));

    card.classList.add("active");
  });
});
</script>

</body>
</html>