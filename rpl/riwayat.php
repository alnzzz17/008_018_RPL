<?php include "./shared/header.php" ?>

<?php
include './shared/koneksi.php'; // Ganti dengan file koneksi database Anda

// Ganti dengan id user yang sebenarnya
$id_user = $_SESSION['id'];

// Buat query untuk mengambil transaksi dari tabel transaksi
$sql = "SELECT transaksi.*, rute.kota_awal, rute.kota_tujuan FROM transaksi 
        JOIN rute ON transaksi.rute = rute.id 
        WHERE transaksi.id_user = $id_user 
        ORDER BY transaksi.tanggal_mulai DESC";

// Eksekusi query
$result = $conn->query($sql);

// Cek jika ada hasil
if ($result->num_rows > 0) {
  // Output data dari setiap baris
  while ($row = $result->fetch_assoc()) {
    ?>
    <div class="card mt-3">
      <div class="card-body">
        <h4 class="card-title">
          <a href="transaksi-detail.php?id=<?= $row['id'] ?>">Perjalanan dari <?= $row['kota_awal'] ?> ke
            <?= $row['kota_tujuan'] ?></a>
        </h4>
        <p class="card-text"><?= $row['tanggal_mulai'] ?></p>
        <p class="card-text">Status: <?= $row['status'] ?></p>
        <a href="/lapor.php?id=<?= $row['id'] ?>" class="btn btn-primary">Laporkan Keluhan</a>
      </div>
    </div>
    <?php
  }
} else {
  echo "Tidak ada transaksi";
}

$conn->close();
?>

<?php include "./shared/footer.php" ?>