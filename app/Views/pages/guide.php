<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panduan Penggunaan RFID</title>
  <link rel="shortcut icon" href="<?= base_url('images/logo.png') ?>" type="image/x-icon">

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
      background: linear-gradient(rgba(0, 0, 0, 0.78), rgba(0, 0, 0, 0.62)),
                  url('images/bg.jpg') no-repeat center center / cover;
      background-attachment: fixed;
      color: #fff;
    }

    .guide-section {
      padding: 100px 20px 60px;
      text-align: center;
      max-width: 800px;
      margin: auto;
    }

    .guide-section h1 {
      font-size: 42px;
      margin-bottom: 30px;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
      animation: slideDown 1s ease-out forwards;
    }

    ol.guide-steps {
      list-style: none;
      padding-left: 0;
      counter-reset: step;
      animation: fadeIn 1.5s ease forwards;
    }

    ol.guide-steps li {
      position: relative;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(4px);
      margin: 20px 0;
      padding: 20px 20px 20px 60px;
      border-radius: 10px;
      font-size: 18px;
      color: #eee;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      text-align: left;
      transform: translateX(-30px);
      opacity: 0;
      animation: slideLeft 0.6s ease forwards;
    }

    ol.guide-steps li:nth-child(2) {
      animation-delay: 0.3s;
    }

    ol.guide-steps li:nth-child(3) {
      animation-delay: 0.6s;
    }

    ol.guide-steps li::before {
      content: counter(step);
      counter-increment: step;
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      width: 30px;
      height: 30px;
      background: #00ffd5;
      color: #000;
      font-weight: bold;
      border-radius: 50%;
      text-align: center;
      line-height: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }

    @keyframes slideDown {
      from { transform: translateY(-20px); opacity: 0; }
      to   { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    @keyframes slideLeft {
      to { transform: translateX(0); opacity: 1; }
    }
  </style>
</head>
<body>
  <?= view('components/header') ?>
  
  <section class="guide-section">
    <h1>Panduan Penggunaan</h1>
    <ol class="guide-steps">
      <li><strong>Tap</strong> kartu RFID ke alat <em>reader</em>.</li>
      <li>Data kehadiran akan langsung <strong>terekam otomatis</strong>.</li>
      <li><strong>Cek riwayat absensi</strong> melalui dashboard pengguna.</li>
    </ol>
  </section>
</body>
</html>
