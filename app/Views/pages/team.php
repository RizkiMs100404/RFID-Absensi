<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tim Pengembang</title>

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
    <h1>Team Development</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/rizky.jpg" alt="Rizky">
        <h3>Rizky</h3>
        <p>MC</p>
      </div>
      <div class="team-card">
        <img src="images/mizan.jpg" alt="Mizan">
        <h3>Mizan</h3>
        <p>NPC</p>
      </div>
      <div class="team-card">
        <img src="images/salman.jpg" alt="Salman">
        <h3>Salman</h3>
        <p>NPC</p>
      </div>
      <div class="team-card">
        <img src="images/arman.jpg" alt="Arman">
        <h3>Arman</h3>
        <p>NPC</p>
      </div>
    </div>

  </section>
    <section class="team-section">
    <h1>Team Laporan</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/rizky.jpg" alt="Rizky">
        <h3>Rizky</h3>
        <p>MC - Master Coder</p>
      </div>
      <div class="team-card">
        <img src="images/mizan.jpg" alt="Mizan">
        <h3>Mizan</h3>
        <p>NPC - UI/UX Designer</p>
      </div>
      <div class="team-card">
        <img src="images/salman.jpg" alt="Salman">
        <h3>Salman</h3>
        <p>NPC - Backend Developer</p>
      </div>
      <div class="team-card">
        <img src="images/arman.jpg" alt="Arman">
        <h3>Arman</h3>
        <p>NPC - Integrator</p>
      </div>
    </div>
  </section>

   <section class="team-section">
    <h1>Team Dokumentasi</h1>
    <div class="team-grid">
      <div class="team-card">
        <img src="images/rizky.jpg" alt="Rizky">
        <h3>Rizky</h3>
        <p>MC - Master Coder</p>
      </div>
      <div class="team-card">
        <img src="images/mizan.jpg" alt="Mizan">
        <h3>Mizan</h3>
        <p>NPC - UI/UX Designer</p>
      </div>
      <div class="team-card">
        <img src="images/salman.jpg" alt="Salman">
        <h3>Salman</h3>
        <p>NPC - Backend Developer</p>
      </div>
      <div class="team-card">
        <img src="images/arman.jpg" alt="Arman">
        <h3>Arman</h3>
        <p>NPC - Integrator</p>
      </div>
    </div>
  </section>

</body>
</html>
