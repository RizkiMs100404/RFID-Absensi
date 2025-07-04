<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Data Siswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/siswa.css') ?>">
</head>
<?php 
  $userData = session('userData');
?>
<body>
  <div class="sidebar">
    <h2><?php echo $userData['nama'] ?></h2>
    <a href="<?= base_url('/admin/dashboard') ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
    <a href="<?= base_url('/admin/siswa') ?>"><i class="fas fa-users"></i> Kelola Siswa</a>
    <a href="<?= base_url('/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="main">
    <h1>Kelola Data Siswa</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>NIS</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mizan Nurhakim</td>
          <td>12 RPL</td>
          <td>20230123</td>
          <td class="action-buttons">
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Hapus</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Rizky Ramadhan</td>
          <td>11 TKJ</td>
          <td>20230124</td>
          <td class="action-buttons">
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
