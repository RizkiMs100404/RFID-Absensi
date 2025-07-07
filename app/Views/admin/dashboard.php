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
<?php $userData = session('userData'); ?>

<script type="module">
  import {
    db,
    collection,
    doc,
    getDocs,
    addDoc,
    setDoc,
    query,
    where,
    updateDoc,
    getDoc,
    writeBatch,
    onSnapshot
  } from "<?= base_url('./firebase/firebase.js') ?>";

  function getWaktuWIB() {
    const now = new Date();
    const yyyy = now.getFullYear();
    const mm = String(now.getMonth() + 1).padStart(2, '0');
    const dd = String(now.getDate()).padStart(2, '0');
    const hh = String(now.getHours()).padStart(2, '0');
    const min = String(now.getMinutes()).padStart(2, '0');
    const ss = String(now.getSeconds()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}T${hh}:${min}:${ss}`;
  }

  // Tambahkan fungsi baru ini di dalam tag <script type="module"> Anda

  async function siapkanDokumenAbsensi(tanggal) {
    try {
      // Ambil semua data mahasiswa
      const mahasiswaSnapshot = await getDocs(collection(db, "mahasiswa"));

      // Ambil semua data absensi yang sudah ada pada tanggal tersebut
      const q = query(collection(db, "absensi"), where("tanggal", "==", tanggal));
      const absensiSnapshot = await getDocs(q);
      const nimYangSudahAbsen = new Set(absensiSnapshot.docs.map(doc => doc.data().nim));

      // Siapkan batch write untuk efisiensi
      const batch = writeBatch(db);
      let perluCommit = false;

      // Loop semua mahasiswa untuk memeriksa siapa yang belum punya dokumen absensi
      mahasiswaSnapshot.forEach(mhsDoc => {
        const nim = mhsDoc.id; // Asumsi ID dokumen mahasiswa adalah NIM
        const dataMhs = mhsDoc.data();

        if (!nimYangSudahAbsen.has(nim)) {
          // Jika mahasiswa ini belum punya catatan absensi, buatkan satu
          perluCommit = true;
          const customDocId = `${nim}_${tanggal}`;
          const docRef = doc(db, "absensi", customDocId);
          batch.set(docRef, {
            nim: nim,
            nama: dataMhs.nama,
            kelas: dataMhs.kelas,
            tanggal: tanggal,
            status: "",
            waktu_scan: ""
          });
        }
      });

      // Jika ada dokumen baru yang perlu dibuat, kirim semua sekaligus
      if (perluCommit) {
        console.log("Membuat dokumen absensi yang kosong untuk tanggal:", tanggal);
        await batch.commit();
      }
    } catch (err) {
      console.error("Gagal menyiapkan dokumen absensi:", err);
    }
  }


  async function loadTotalSiswa() {
    try {
      const querySnapshot = await getDocs(collection(db, "mahasiswa"));
      document.getElementById("total-siswa").textContent = querySnapshot.size;
    } catch (err) {
      console.error("Gagal mengambil data total siswa:", err);
    }
  }

  async function hitungStatistikAbsensi() {
    const filterDate = document.getElementById("filter-date").value;

    try {
      const absensiSnapshot = await getDocs(query(
        collection(db, "absensi"),
        where("tanggal", "==", filterDate)
      ));

      let totalHadir = 0;
      let totalTidakHadir = 0;

      absensiSnapshot.forEach(doc => {
        const data = doc.data();
        if (data.status === "Hadir" || data.status === "Telat") {
          totalHadir++;
        } else if (
          data.status === "Tidak Hadir" ||
          data.status === "Izin" ||
          data.status === "Sakit"
        ) {
          totalTidakHadir++;
        }
      });

      document.getElementById("total-hadir").textContent = totalHadir;
      document.getElementById("total-telat").textContent = totalTidakHadir;
    } catch (err) {
      console.error("Gagal menghitung statistik:", err);
    }
  }

  // Gantikan fungsi loadAbsensi Anda dengan yang ini
  let unsubscribeAbsensi = null;

  async function loadAbsensi() {
    const tbody = document.querySelector("tbody");
    tbody.innerHTML = `
    <tr>
      <td colspan="4" class="text-center">Memuat data absensi...</td>
    </tr>`;

    const filterDate = document.getElementById("filter-date").value;
    const filterStatus = document.getElementById("filter-status").value;

    // Hapus listener sebelumnya untuk mencegah tumpukan listener
    if (unsubscribeAbsensi) {
      unsubscribeAbsensi();
    }

    // LANGKAH 1: Pastikan semua dokumen absensi untuk tanggal ini sudah ada.
    // Ini adalah fungsi baru yang krusial untuk mencegah duplikasi.
    await siapkanDokumenAbsensi(filterDate);

    // LANGKAH 2: Setelah dokumen siap, baru pasang listener onSnapshot.
    const absensiRef = collection(db, "absensi");
    const q = query(absensiRef, where("tanggal", "==", filterDate));

    unsubscribeAbsensi = onSnapshot(q, (snapshot) => {
      tbody.innerHTML = ""; // Bersihkan tabel setiap kali ada update

      const absensiData = [];
      snapshot.forEach(doc => {
        // Filter berdasarkan status jika dipilih
        if (!filterStatus || doc.data().status === filterStatus) {
          absensiData.push(doc.data());
        }
      });

      if (absensiData.length === 0) {
        tbody.innerHTML = `<tr><td colspan="4" class="text-center">Tidak ada data untuk ditampilkan.</td></tr>`;
      } else {
        absensiData.forEach(data => {
          let waktuStr = "-";
          if (data.waktu_scan) {
            const waktu = new Date(data.waktu_scan);
            waktuStr = waktu.toTimeString().split(" ")[0].slice(0, 5);
          }

          const statusOptions = ["", "Hadir", "Telat", "Tidak Hadir", "Izin", "Sakit"].map(opt => {
            const selected = opt === data.status ? "selected" : "";
            return `<option value="${opt}" ${selected}>${opt || "-"}</option>`;
          }).join("");

          tbody.innerHTML += `
              <tr>
                <td>${data.nama}</td>
                <td>${data.kelas}</td>
                <td>${waktuStr}</td>
                <td>
                  <select class="status-dropdown bg-white text-black border border-gray-300 px-2 py-1 rounded" data-nim="${data.nim}" data-nama="${data.nama}" data-kelas="${data.kelas}">
                    ${statusOptions}
                  </select>
                </td>
              </tr>`;
        });
      }

      addDropdownListeners(filterDate);
      hitungStatistikAbsensi();
    });
  }

  function addDropdownListeners(tanggal) {
    document.querySelectorAll(".status-dropdown").forEach(select => {
      select.addEventListener("change", async function() {
        const nim = this.dataset.nim;
        const nama = this.dataset.nama;
        const kelas = this.dataset.kelas;
        const status = this.value;
        const waktuNow = getWaktuWIB();

        try {
          const q = query(
            collection(db, "absensi"),
            where("nim", "==", nim),
            where("tanggal", "==", tanggal)
          );
          const snapshot = await getDocs(q);

          if (!snapshot.empty) {
            const docRef = doc(db, "absensi", snapshot.docs[0].id);
            await updateDoc(docRef, {
              status: status,
              waktu_scan: waktuNow
            });
          } else {
            const customDocId = `${nim}_${tanggal}`;
            const docRef = doc(db, "absensi", customDocId);
            await setDoc(docRef, {
              nim: nim,
              nama: nama,
              kelas: kelas,
              waktu_scan: waktuNow,
              status: status,
              tanggal: tanggal
            });

          }

          alert("Status berhasil diperbarui.");
          loadAbsensi();
        } catch (err) {
          console.error("Gagal memperbarui status:", err);
          alert("Gagal menyimpan data.");
        }
      });
    });
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
        <h3>Total Siswa Tidak Hadir</h3>
        <p id="total-telat">0</p>
      </div>
    </div>

    <h2 class="mt-4 mb-2">Riwayat Absensi</h2>
    <div class="flex gap-4 items-center mb-6">
      <label for="filter-status" class="text-white">Filter Status:</label>
      <select id="filter-status" class="bg-white text-black border border-gray-300 px-2 py-1 rounded hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Semua</option>
        <option value="Hadir">Hadir</option>
        <option value="Telat">Telat</option>
        <option value="Tidak Hadir">Tidak Hadir</option>
        <option value="Izin">Izin</option>
        <option value="Sakit">Sakit</option>
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
        <tr>
          <td colspan="4" class="text-center">Memuat data absensi...</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>