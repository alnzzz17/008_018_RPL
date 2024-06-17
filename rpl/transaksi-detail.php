<?php include "./shared/header.php";

include "./shared/koneksi.php";

// Ganti dengan id user yang sebenarnya
$id_user = $_SESSION['id'];
$id_transaksi = $_GET['id'];

if (isset($_POST['update_status'])) {

  $id_transaksi = $_POST['id_transaksi'];
  $status = $_POST['status'];

  $query = "UPDATE transaksi SET status = '$status' WHERE id = $id_transaksi";

  if ($conn->query($query)) {

    // echo "Transaksi berhasil ditambahkan";

    $id = $conn->insert_id;
    header("Location: bayar.php?id=$id");

    $judul = "Update Transaksi Berhasil";
    $konten = "Transaksi dengan ID $id telah berhasil di update menjadi $status";
    $tanggal_waktu = date('Y-m-d H:i:s'); // Waktu saat ini
    $query_inbox = "INSERT INTO inbox (id_penerima, judul, tanggal_waktu, status, konten)
                      VALUES ($id_user, '$judul', '$tanggal_waktu', 1, '$konten')";

    $conn->query($query_inbox);

    echo "<script>alert('Status berhasil diubah')</script>";
    unset($_POST['update_status']);
    header("refresh:0.1;url=transaksi-detail.php?id=$id_transaksi");
  } else {
    echo "<script>alert('Status gagal diubah')</script>";
    unset($_POST['update_status']);
    header("refresh:0.1;url=transaksi-detail.php?id=$id_transaksi");
  }

}


// Buat query untuk mengambil transaksi dari tabel transaksi
$sql = "SELECT 
  transaksi.*,
  rute.kota_awal,
  rute.kota_tujuan,
  IFNULL(driver.nama_lengkap, '') AS driver_name,
  IFNULL(driver.email, '') AS driver_email,
  IFNULL(driver.nomor_telepon, '') AS driver_phone
FROM transaksi
JOIN rute ON transaksi.rute = rute.id
LEFT JOIN driver ON transaksi.driver = driver.id
WHERE transaksi.id = '$id_transaksi'";


// Eksekusi query
$result = $conn->query($sql);
// var_dump($result);
// echo $sql;
// die();

// Cek jika ada hasil
if ($result->num_rows > 0) {
  // Output data dari setiap baris
  $row = $result->fetch_assoc();
  ?>
  <div class="container my-5">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">TRANSAKSI DETAIL</h4>
      </div>
      <div class="card-body">
        <!-- <h5 class="card-title">Respon Pengajuan</h5> -->
        <div class="row">
          <!-- <div class="col-md-6">
            <p class="card-text">Yth. <?= $row['nama_pemesan'] ?></p>
            <p class="card-text">Pesanan anda telah disetujui oleh admin</p>
          </div> -->
          <div class="row mb-4">
            <div class="row">
              <div class="col-md-6">
                <p class="card-text fw-bold">Waktu Keberangkatan</p>
                <p class="card-text"><?= $row['tanggal_mulai'] ?></p>
              </div>
              <div class="col-md-6">
                <p class="card-text fw-bold">Waktu Kepulangan</p>
                <p class="card-text"><?= $row['tanggal_selesai'] ?></p>
              </div>
              <!-- <div class="col-md-6">
                <p class="card-text">Destinasi</p>
                <p class="card-text">Acin Atin, Kecamatan XXXX, Kabupaten XXXX</p>
              </div> -->
            </div>
          </div>
          <div class="row">
            <!--   <div class="col-md-6">
              <p class="card-text fw-bold">Transportasi</p>
              <p class="card-text">Bus</p>
            </div> -->
            <div class="col-md-6">
              <p class="card-text fw-bold">Akomodasi</p>
              <p class="card-text"><?= $row['akomodasi'] ? $row['akomodasi'] : "-" ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="card-text fw-bold">Tempat Makan</p>
              <p class="card-text"><?= $row['tempat_makan'] ? $row['tempat_makan'] : "-" ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="fw-bold">Total Biaya</p>
              <p class="">Rp <?= number_format($row['total_harga'], 2, ",", "."); ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="card-text fw-bold">Catatan</p>
              <p class="card-text"><?= $row['catatan'] ? $row['catatan'] : "-" ?></p>
            </div>
          </div>
        </div>
        <?php
        if (strtolower($row['status']) != 'selesai') {
          ?>
        
        <?php } ?>
      </div>
    </div>
    <?php
} else {
  echo '<p class="text-center">Tidak ada pesan</p>';
}
include "./shared/footer.php" ?>