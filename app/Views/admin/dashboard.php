<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
</head>
<?php
$userData = session('userData');
?>

<script type="module">
  import {
    db,
    collection,
    doc,
    getDocs,
    setDoc
  } from "<?= base_url('./firebase/firebase.js') ?>";

  async function loadTotalSiswa() {
    try {
      const querySnapshot = await getDocs(collection(db, "mahasiswa"));
      document.getElementById("total-siswa").textContent = querySnapshot.size;
    } catch (err) {
      console.error("Gagal mengambil data total siswa:", err);
    }
  }

  async function loadAbsensi() {
    const tbody = document.querySelector("tbody");
    tbody.innerHTML = "";

    let totalHadir = 0;
    let totalTelat = 0;

    const filterStatus = document.getElementById("filter-status").value;
    const filterDate = document.getElementById("filter-date").value; // Format: YYYY-MM-DD

    try {
      const mahasiswaSnapshot = await getDocs(collection(db, "mahasiswa"));
      const dataMahasiswa = new Map();
      mahasiswaSnapshot.forEach(doc => {
        const nim = doc.id;
        const nama = doc.data().nama?.trim().toLowerCase();
        if (nama) dataMahasiswa.set(nim, nama);
      });

      const absensiSnapshot = await getDocs(collection(db, "absensi"));

      for (const docSnap of absensiSnapshot.docs) {
        const data = docSnap.data();
        const nim = data.nim;
        const namaInput = data.nama?.trim().toLowerCase();

        if (!dataMahasiswa.has(nim) || dataMahasiswa.get(nim) !== namaInput) continue;

        const waktuScan = new Date(data.waktu_scan);
        const waktuWIB = new Date(waktuScan.getTime() + 7 * 60 * 60 * 1000);
        const scanDateStr = waktuWIB.toISOString().split("T")[0];

        // Bandingkan dengan tanggal filter, jika ada
        if (filterDate && scanDateStr !== filterDate) continue;

        const jam = waktuWIB.getHours();
        const menit = waktuWIB.getMinutes();

        let status = "";
        if (jam < 7 || (jam === 7 && menit < 0)) {
          status = "Hadir";
          totalHadir++;
        } else if (jam === 7 && menit <= 59) {
          status = "Telat";
          totalTelat++;
          totalHadir++;
        } else {
          status = "Tidak Hadir";
        }

        if (filterStatus && filterStatus !== status) continue;

        if (!data.status || data.status !== status) {
          await setDoc(doc(db, "absensi", docSnap.id), {
            ...data,
            status: status
          });
        }

        const waktuStr = `${jam.toString().padStart(2, '0')}:${menit.toString().padStart(2, '0')}`;
        const statusClass =
          status === "Telat" ? "status-telat" :
          status === "Tidak Hadir" ? "status-tidak-hadir" :
          "status-hadir";

        tbody.innerHTML += `
        <tr>
          <td>${data.nama}</td>
          <td>${data.kelas}</td>
          <td>${waktuStr}</td>
          <td class="${statusClass}">${status}</td>
        </tr>
      `;
      }

      document.getElementById("total-hadir").textContent = totalHadir;
      document.getElementById("total-telat").textContent = totalTelat;

    } catch (err) {
      console.error("Gagal memuat data absensi:", err);
      tbody.innerHTML = `<tr><td colspan="4">Gagal memuat data absensi</td></tr>`;
    }
  }



  loadTotalSiswa();

  const dateInput = document.getElementById("filter-date");
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, '0');
  const dd = String(today.getDate()).padStart(2, '0');
  dateInput.value = `${yyyy}-${mm}-${dd}`;

  loadAbsensi();

  document.getElementById("filter-status").addEventListener("change", loadAbsensi);
  document.getElementById("filter-date").addEventListener("change", loadAbsensi);
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
    <h1>Dashboard Admin</h1>

    <div class="stats">
      <div class="card">
        <h3>Total Siswa</h3>
        <p id="total-siswa">0</p>
      </div>
      <div class="card">
        <h3>Total Siswa Hadir</h3>
        <p id="total-hadir">0</p>
      </div>
      <div class="card">
        <h3>Telat</h3>
        <p id="total-telat">0</p>
      </div>
    </div>

    <h2 style="margin-bottom: 20px;">Riwayat Absensi Hari Ini</h2>
    <div class="flex gap-4 items-center mb-6">
      <label for="filter-status" class="text-white">Filter Status:</label>
      <select id="filter-status" class="text-black px-3 py-2 rounded">
        <option value="">Semua</option>
        <option value="Hadir">Hadir</option>
        <option value="Telat">Telat</option>
        <option value="Tidak Hadir">Tidak Hadir</option>
      </select>

      <label for="filter-date" class="text-white">Pilih Tanggal:</label>
      <input type="date" id="filter-date" class="text-black px-3 py-2 rounded" />
    </div>

    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Waktu</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Data absensi akan dimuat di sini -->
        <tr>
          <td colspan="3" style="text-align: center;">Memuat data absensi...</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>

</html>