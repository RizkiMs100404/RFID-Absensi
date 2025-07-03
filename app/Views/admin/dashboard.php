<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
</head>
<body>

  <div class="sidebar">
    <h2>Admin RFID</h2>
    <a href="<?= base_url('/admin/dashboard') ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
    <a href="<?= base_url('/admin/siswa') ?>"><i class="fas fa-users"></i> Kelola Siswa</a>
    <a href="<?= base_url('/login') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="main">
    <h1>Dashboard Admin</h1>

    <div class="stats">
      <div class="card">
        <h3>Total Siswa</h3>
        <p>120</p>
      </div>
      <div class="card">
        <h3>Hadir Hari Ini</h3>
        <p>98</p>
      </div>
      <div class="card">
        <h3>Telat</h3>
        <p>5</p>
      </div>
    </div>

    <h2 style="margin-bottom: 20px;">Riwayat Absensi Hari Ini</h2>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Waktu</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mizan Nurhakim</td>
          <td>07:02</td>
          <td class="status-hadir">Hadir</td>
        </tr>
        <tr>
          <td>Rizky Ramadhan</td>
          <td>07:18</td>
          <td class="status-telat">Telat</td>
        </tr>
        <tr>
          <td>Salman</td>
          <td>06:57</td>
          <td class="status-hadir">Hadir</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>
</html>
