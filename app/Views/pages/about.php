<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tentang Sistem RFID</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/about.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <?= view('components/header') ?>
    <br>
 <section class="about-section">
  <div class="about-wrapper">
    <div class="text-content">
      <h2>Tentang Sistem RFID</h2>
      <p>Sistem ini dirancang sebagai solusi modern untuk mencatat kehadiran secara otomatis dengan memanfaatkan teknologi RFID (Radio Frequency Identification), Dengan hanya menempelkan atau men-tap kartu RFID ke perangkat pembaca, data kehadiran akan langsung tercatat secara real-time tanpa perlu proses manual, Teknologi ini tidak hanya mempercepat proses pencatatan kehadiran, tetapi juga mengurangi potensi kesalahan data dan risiko kecurangan, seperti titip absen atau manipulasi waktu, Sistem ini sangat ideal diterapkan di berbagai lingkungan seperti sekolah untuk monitoring kehadiran siswa dan guru, kantor untuk efisiensi administrasi HRD, hingga pabrik untuk mengelola jadwal dan kehadiran karyawan secara lebih tertib dan transparan. Selain itu, sistem ini dapat diintegrasikan dengan berbagai fitur tambahan seperti laporan kehadiran otomatis, notifikasi, serta dasbor pemantauan yang dapat diakses secara online, menjadikannya solusi absensi yang efisien, akurat, dan fleksibel.</p>
    </div>

    <div class="features">
      <h2>Keunggulan Sistem Kami</h2>
      <div class="grid">
        <div class="card">
          <h3>🧼 Tanpa Kontak</h3>
          <p>Absensi dilakukan hanya dengan mendekatkan kartu ke reader, cepat & higienis.</p>
        </div>
        <div class="card">
          <h3>📊 Data Realtime</h3>
          <p>Semua aktivitas absensi langsung tercatat dan bisa diakses kapan saja.</p>
        </div>
        <div class="card">
          <h3>🔐 Aman & Terenkripsi</h3>
          <p>Data pengguna disimpan secara terenkripsi dan aman.</p>
        </div>
        <div class="card">
          <h3>📅 Riwayat Lengkap</h3>
          <p>Laporan absensi lengkap harian, mingguan hingga bulanan tersedia.</p>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
