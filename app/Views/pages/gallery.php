<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Sistem RFID</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <!-- Style -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(rgba(0, 0, 0, 0.73), rgba(0, 0, 0, 0.77)),
                  url('images/bg.jpg') no-repeat center center / cover;
      background-attachment: fixed;
      color: #fff;
    }

    .gallery-section {
      padding: 100px 20px 60px;
      text-align: center;
    }

    .gallery-section h1 {
      font-size: 42px;
      margin-bottom: 15px;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
      animation: slideDown 1s ease-out forwards;
    }

    .gallery-section p {
      font-size: 18px;
      margin-bottom: 50px;
      color: #eee;
      animation: fadeIn 1.5s ease-out forwards;
    }

    .gallery-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .gallery-card {
      width: 280px;
      height: 200px;
      background: rgba(255,255,255,0.1);
      border-radius: 12px;
      overflow: hidden;
      backdrop-filter: blur(4px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      opacity: 0;
      animation: popIn 1.2s ease forwards;
    }

    .gallery-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .gallery-card:hover img {
      transform: scale(1.1);
    }

    .gallery-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.5);
    }

    @keyframes popIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes slideDown {
      from { transform: translateY(-20px); opacity: 0; }
      to   { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }
  </style>
</head>
<body>
  <?= view('components/header') ?>
  
  <section class="gallery-section">
    <h1>Album Kelas A</h1>
    <p>Lihat dokumentasi proses pembuatan sistem RFID dan implementasinya di lapanganya.</p>

    <div class="gallery-grid">
      <!-- Tambahkan gambar sesuai kebutuhan -->
      <div class="gallery-card">
        <img src="images/rfid1.jpg" alt="RFID 1">
      </div>
      <div class="gallery-card">
        <img src="images/rfid2.jpg" alt="RFID 2">
      </div>
      <div class="gallery-card">
        <img src="images/rfid3.jpg" alt="RFID 3">
      </div>
      <div class="gallery-card">
        <img src="images/rfid4.jpg" alt="RFID 4">
      </div>
      <!-- Tambahkan lebih banyak jika diperlukan -->
    </div>
  </section>
</body>
</html>
