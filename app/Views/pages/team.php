<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tim Pengembang</title>
  <link rel="shortcut icon" href="<?= base_url('images/logo.png') ?>" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Eksternal -->
  <link rel="stylesheet" href="public/css/team.css">

  <!-- Optional: Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <!-- Optional: Animasi tambahan -->
  <style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;
  background: linear-gradient(rgba(0, 0, 0, 0.71), rgba(0, 0, 0, 0.72)),
              url('images/bg.jpg') no-repeat center center / cover;
  background-attachment: fixed;
  color: #fff;
}

    .team-section {
      padding: 100px 20px 60px;
      text-align: center;
    }

    .team-section h1 {
      font-size: 40px;
      margin-bottom: 50px;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
      animation: slideDown 1s ease-out forwards;
    }

    .team-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .team-card {
      background: rgba(255,255,255,0.1);
      border-radius: 12px;
      padding: 25px;
      width: 220px;
      backdrop-filter: blur(5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      opacity: 0;
      animation: popIn 1.2s ease forwards;
    }

    .team-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.5);
    }

    .team-card img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #fff;
      margin-bottom: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.4);
    }

    .team-card h3 {
      margin: 10px 0 5px;
      font-size: 18px;
    }

    .team-card p {
      font-size: 14px;
      color: #eee;
    }

    @keyframes popIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes slideDown {
      from { transform: translateY(-20px); opacity: 0; }
      to   { transform: translateY(0); opacity: 1; }
    }
  </style>
</head>

<body>
     <?= view('components/header') ?>
  <section class="team-section">
    <h1>TEAM DEVELOPMENT</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/mizan.jpeg" alt="Rizky">
        <h3>Mizan Nurhakim</h3>
        <p>Frontend Developer</p>
      </div>
      <div class="team-card">
        <img src="images/#" alt="Mizan">
        <h3>Salman Al Farizi</h3>
        <p>Backend Developer</p>
      </div>
  </section>

    <section class="team-section">
    <h1>TEAM IOT ENGGINER</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/ikiw.jpg" alt="Rizky">
        <h3>Rizki Mustofa</h3>
        <p>Engginer 1</p>
      </div>
      <div class="team-card">
        <img src="images/arman.jpg" alt="Mizan">
        <h3>Arman Hardiansyah</h3>
        <p>Engginer 2</p>
      </div>
      <div class="team-card">
        <img src="images/Zidan.jpg" alt="Salman">
        <h3>Zidan Gunawan</h3>
        <p>Engginer 3</p>
      </div>
      <div class="team-card">
        <img src="images/sultan.jpeg" alt="Arman">
        <h3>Sultan Moch Nabawi S</h3>
        <p>Engginer 4</p>
      </div>
            <div class="team-card">
        <img src="images/aqil.png" alt="Arman">
        <h3>M Aqil Safaat Nugraha</h3>
        <p>Engginer 5</p>
      </div>
    </div>
  </section>

   <section class="team-section">
    <h1>TEAM REPORT</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/vina.jpg" alt="Rizky">
        <h3>Vina Septia Anggraeni</h3>
        <p>Laporan 1</p>
      </div>
      <div class="team-card">
        <img src="images/risna.jpg" alt="Mizan">
        <h3>Risna Adhatiyah</h3>
        <p>Laporan 2</p>
      </div>
      <div class="team-card">
        <img src="images/Amel.jpg" alt="Salman">
        <h3>Amelia Mutiara Rahmani</h3>
        <p>Laporan 3</p>
      </div>
      <div class="team-card">
        <img src="images/nida.jpg" alt="Arman">
        <h3>Neng Nida Nurfadilah</h3>
        <p>Laporan 4</p>
      </div>
      <div class="team-card">
        <img src="images/hilda.jpeg" alt="Arman">
        <h3>Hilda Nur Apriliani</h3>
        <p>Laporan 5</p>
      </div>
            <div class="team-card">
        <img src="images/alif.jpg" alt="Arman">
        <h3>Alif Febrianto</h3>
        <p>Laporan 6</p>
      </div>
                  <div class="team-card">
        <img src="images/nisa.jpg" alt="Arman">
        <h3>An nisa Tri Syahti</h3>
        <p>Laporan 7</p>
      </div>
      <div class="team-card">
        <img src="images/rina.jpeg" alt="Arman">
        <h3>Rina Rahmawijaya</h3>
        <p>Laporan 8</p>
      </div>
            <div class="team-card">
        <img src="images/Billy.png" alt="Arman">
        <h3>Billy Ababhil</h3>
        <p>Laporan 9</p>
      </div>
      <div class="team-card">
        <img src="images/ijal.jpeg" alt="Mizan">
        <h3>Faizal Ersa Alfarobi </h3>
        <p>Laporan 10</p>
      </div>
      <div class="team-card">
        <img src="images/Exal.jpg" alt="Salman">
        <h3>Mochammad Exal Alrasyid</h3>
        <p>Laporan 11</p>
      </div>
  </section>

      <section class="team-section">
    <h1>TEAM DEMONSTRATION</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/Fikri.png" alt="Rizky">
        <h3>Fikri Darojatul Ilmi</h3>
        <p>Demonstrasi 1</p>
      </div>
      <div class="team-card">
        <img src="images/septa.jpeg" alt="Mizan">
        <h3>Septa Maulana</h3>
        <p>Demonstrasi 2</p>
      </div>
  </section>

    <section class="team-section">
    <h1>TEAM DOKUMENTATION</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/Galih.jpg" alt="Rizky">
        <h3>⁠Galih Restu CP</h3>
        <p>PDD 1</p>
      </div>
      <div class="team-card">
        <img src="images/san.jpg" alt="Mizan">
        <h3>M Rikshandi Jibriela</h3>
        <p>PDD 2</p>
      </div>
          <div class="team-grid">
      <div class="team-card">
        <img src="images/Tyas.jpg" alt="Rizky">
        <h3>Tyas Sri Rahayu</h3>
        <p>PDD 3</p>
      </div>
      <div class="team-card">
        <img src="images/nazar.cr2" alt="Mizan">
        <h3>Nazar Nurhilman</h3>
        <p>PDD 4</p>
      </div>
          <div class="team-grid">
      <div class="team-card">
        <img src="images/nurul.jpg" alt="Rizky">
        <h3>Nurul Kiftiyah</h3>
        <p>PDD 5</p>
      </div>

  </section>


</body>
</html>
