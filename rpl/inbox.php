<?php
include "./shared/header.php";
include "./shared/koneksi.php";
// Ganti dengan id user yang sebenarnya
$id_user = $_SESSION['id'];

// Buat query untuk mengambil pesan dari tabel inbox
$sql = "SELECT * FROM inbox WHERE id_penerima = $id_user ORDER BY tanggal_waktu DESC";

// Eksekusi query
$result = $conn->query($sql);

?>
<div class="container my-5">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link text-dark active" href="#">Semua</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="#">Belum Dibaca</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="#">Sudah Dibaca</a>
    </li>
  </ul>
  <?php
  $result = $conn->query($sql);

  // Cek jika ada hasil
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<a href="inbox-detail.php?id=' . $row['id'] . '" class="text-decoration-none card mt-3">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $row['judul'] . '</h5>';
      echo '<p class="card-text">Admin Kirana Tour</p>';
      echo '<p class="card-text">' . $row['konten'] . '</p>';
      echo '<p class="card-text text-end">' . $row['tanggal_waktu'] . '</p>';
      echo '</div>';
      echo '</a>';
    }
  } else {
    echo '<p class="text-center">Tidak ada pesan</p>';
  }
  ?>
  <!-- <a href="inbox-detail.php" class="text-decoration-none card mt-3">
    <div class="card-body">
      <h5 class="card-title">Konfirmasi pesanan berhasil</h5>
      <p class="card-text">Admin Kirana Tour</p>
      <p class="card-text">Pesanan yang terkonfirmasi, berdasarkan permintaan perjalanan Jogja-Solo pada 21 ...</p>
      <p class="card-text text-end">8:35</p>
    </div>
  </a>
  <a href="inbox-detail.php" class="text-decoration-none card mt-3">
    <div class="card-body">
      <h5 class="card-title">Konfirmasi pesanan berhasil</h5>
      <p class="card-text">Admin Kirana Tour</p>
      <p class="card-text">Pesanan yang terkonfirmasi, berdasarkan permintaan perjalanan Jogja-Solo pada 21 ...</p>
      <p class="card-text text-end">2 Juni 2024</p>
    </div>
  </a>
  <a href="inbox-detail.php" class="text-decoration-none card mt-3">
    <div class="card-body">
      <h5 class="card-title">Konfirmasi pesanan berhasil</h5>
      <p class="card-text">Admin Kirana Tour</p>
      <p class="card-text">Pesanan yang terkonfirmasi, berdasarkan permintaan perjalanan Jogja-Solo pada 21 ...</p>
      <p class="card-text text-end">2 Juni 2024</p>
    </div>
  </a>
  <a href="inbox-detail.php" class="text-decoration-none card mt-3">
    <div class="card-body">
      <h5 class="card-title">Konfirmasi pesanan berhasil</h5>
      <p class="card-text">Admin Kirana Tour</p>
      <p class="card-text">Pesanan yang terkonfirmasi, berdasarkan permintaan perjalanan Jogja-Solo pada 21 ...</p>
      <p class="card-text text-end">2 Juni 2024</p>
    </div>
  </a> -->
</div>
</div>
<?php
include "./shared/footer.php"
  ?>