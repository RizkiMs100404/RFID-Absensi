<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - RFID</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>
    <?= view('components/header') ?>
  <div class="login-container">
    <div class="login-card">
      <h2>Silakan login</h2>
      <p>Untuk melihat simulasi sistem RFID</p>
      <form>
        <div class="form-group">
          <label for="email">Email / Username</label>
          <input type="text" id="email" placeholder="Masukkan Email">
        </div>
        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" id="password" placeholder="Masukkan Password">
        </div>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-login">Login</a>
      </form>
    </div>
  </div>
</body>
</html>
