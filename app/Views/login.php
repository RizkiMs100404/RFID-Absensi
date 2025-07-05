<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login - RFID</title>
  <link rel="shortcut icon" href="<?= base_url('images/logo.png') ?>" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
  <script type="module" src="<?= base_url('firebase/firebase.js') ?>"></script>
</head>

<script type="module">
  import {
    auth,
    signInWithEmailAndPassword,
    db,
    doc,
    getDoc
  } from './firebase/firebase.js';


  document.querySelector('.btn-login').addEventListener('click', async function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
      const userCredential = await signInWithEmailAndPassword(auth, email, password);
      const user = userCredential.user;

      const uid = user.uid;

      const docRef = doc(db, "users", uid)
      const docSnap = await getDoc(docRef);

      if (docSnap.exists()) {
        const userData = docSnap.data();

        await fetch("<?= base_url('/auth/set-session') ?>", {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(userData)
          })
          .then(res => res.json())
          .then(res => {
            if (res.status === 'success') {
              window.location.href = "<?= base_url('admin/dashboard') ?>";
            } else {
              alert("Gagal menyimpan session di server.");
            }
          });

        window.location.href = "<?= base_url('admin/dashboard') ?>";
      } else {
        throw new Error("User tidak ditemukan.");
      }
    } catch (error) {
      alert("Login gagal: " + error.message);
    }
  });
</script>

<body>
  <?= view('components/header') ?>
  <?= view('components/alert') ?>
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
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>
  </div>
</body>

</html>