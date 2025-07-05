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

<script type="module">
  import {
    db,
    collection,
    getDoc,
    getDocs,
    deleteDoc,
    setDoc,
    doc
  } from "<?= base_url('./firebase/firebase.js') ?>";

  const tableBody = document.getElementById("siswa-table-body");
  const modal = document.getElementById("modal");
  const closeModal = document.getElementById("close-modal");
  const addDataBtn = document.getElementById("add-data-btn");
  const form = document.getElementById("form-mahasiswa");
  let editMode = false;
  let editNIM = null;

  // Buka modal
  addDataBtn.addEventListener("click", () => modal.style.display = "flex");
  closeModal.addEventListener("click", () => modal.style.display = "none");

  async function deleteSiswa(nim) {
    if (confirm("Yakin ingin menghapus data ini?")) {
      try {
        await deleteDoc(doc(db, "mahasiswa", nim));
        alert("Data berhasil dihapus!");
        loadSiswa();
      } catch (error) {
        console.error("Gagal menghapus data:", error);
        alert("Terjadi kesalahan saat menghapus data.");
      }
    }
  }

  async function loadSiswa() {
    try {
      const querySnapshot = await getDocs(collection(db, "mahasiswa"));
      let no = 1;
      tableBody.innerHTML = ""; // Kosongkan isi tabel

      querySnapshot.forEach((docSnap) => {
        const data = docSnap.data();

        const row = `
          <tr>
            <td>${no++}</td>
            <td>${data.nama ?? '-'}</td>
            <td>${data.kelas ?? '-'}</td>
            <td>${data.nim ?? '-'}</td>
            <td>${data.rfid_user ?? '-'}</td>
            <td class="action-buttons">
              <button class="edit-btn" data-id="${docSnap.id}">Edit</button>
              <button class="delete-btn" data-id="${docSnap.id}">Hapus</button>
            </td>
          </tr>
        `;
        tableBody.innerHTML += row;
      });

      document.querySelectorAll(".delete-btn").forEach(btn => {
        btn.addEventListener("click", function() {
          const nim = this.getAttribute("data-id");
          deleteSiswa(nim);
        });
      });

      document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.addEventListener("click", async function() {
          const nim = this.getAttribute("data-id");

          try {
            const docRef = doc(db, "mahasiswa", nim);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
              const data = docSnap.data();

              // Isi form dengan data
              form.nim.value = data.nim;
              form.nama.value = data.nama;
              form.kelas.value = data.kelas;
              form.rfid_user.value = data.rfid_user;

              // Set edit mode
              editMode = true;
              editNIM = nim;
              form.nim.disabled = true; // NIM tidak boleh diubah saat edit

              modal.style.display = "flex";
            } else {
              alert("Data tidak ditemukan.");
            }
          } catch (error) {
            console.error("Gagal mengambil data untuk edit:", error);
            alert("Terjadi kesalahan saat mengambil data.");
          }
        });
      });


    } catch (error) {
      console.error("Gagal memuat data:", error);
    }
  }

  form.addEventListener("submit", async function(e) {
    e.preventDefault();

    const nim = form.nim.value.trim();
    const nama = form.nama.value.trim();
    const kelas = form.kelas.value.trim();
    const rfid_user = form.rfid_user.value.trim();

    if (!nim || !nama || !kelas) {
      alert("Semua field wajib diisi!");
      return;
    }

    try {
      await setDoc(doc(db, "mahasiswa", nim), {
        nim,
        nama,
        kelas,
        rfid_user
      });

      alert(editMode ? "Data berhasil diperbarui!" : "Data berhasil ditambahkan!");
      modal.style.display = "none";
      form.reset();
      form.nim.disabled = false;
      editMode = false;
      editNIM = null;
      loadSiswa();
    } catch (err) {
      console.error("Gagal menyimpan data:", err);
      alert("Terjadi kesalahan saat menyimpan data.");
    }
  });


  loadSiswa();
</script>

<body>

  <?= view('components/alert') ?>
  <div class="sidebar">
    <h2><?php echo $userData['nama'] ?></h2>
    <a href="<?= base_url('/admin/dashboard') ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
    <a href="<?= base_url('/admin/siswa') ?>"><i class="fas fa-users"></i> Kelola Siswa</a>
    <a href="<?= base_url('/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="main">
    <h1>Kelola Data Siswa</h1>
    <button class="btn" id="add-data-btn">+ Tambah Data</button>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>NIM</th>
          <th>RFID</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="siswa-table-body">
        <!-- Data siswa akan dimuat di sini -->
        <tr>
          <td colspan="5" style="text-align: center;">Memuat data siswa...</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="modal" class="modal">
    <div class="modal-content">
      <span id="close-modal" class="close">&times;</span>
      <h3>Tambah / Edit Data Mahasiswa</h3>
      <form id="form-mahasiswa">
        <div class="form-group">
          <label for="nim">NIM</label>
          <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
          <label for="kelas">Kelas</label>
          <input type="text" id="kelas" name="kelas" placeholder="Masukkan Kelas" required>
        </div>
        <div class="form-group">
          <label for="rfid_user">RFID</label>
          <input type="text" id="rfid_user" name="rfid_user" placeholder="Masukkan UID RFID">
        </div>
        <div style="text-align: right; margin-top: 20px;">
          <button type="submit" class="btn">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</body>



</html>