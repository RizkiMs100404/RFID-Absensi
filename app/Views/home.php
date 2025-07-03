<!-- app/Views/home.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RFID CLASS A</title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>

  <?= view('components/header') ?>

<section class="hero">
  <div class="overlay">
    <div class="content">
      <h5 class="subheading">SISTEM PRESENSI CERDAS</h5>
      <h1 class="main-heading">ABSENSI OTOMATIS BERBASIS RFID</h1>
      

      <p class="info-rfid">
        Sistem ini dilengkapi dengan fitur absensi otomatis menggunakan teknologi RFID yang akurat dan efisien.
      </p>
<br>
      <a href="<?= base_url('login') ?>" class="btn">Get Started</a>
    </div>
  </div>
</section>

</body>
</html>
