<?php
include "./shared/header.php";
include "./shared/koneksi.php";

// Query untuk mengambil rute dari tabel rute
$query_rute = "SELECT DISTINCT id, CONCAT(kota_awal, ' - ', kota_tujuan) AS rute FROM rute";

// Eksekusi query
$result_rute = $conn->query($query_rute);
?>

<h3 class="fw-bold my-4">Saat ini</h3>
<!--  -->

<?php
$id_user = $_SESSION['id'];

// Query untuk mengambil transaksi berdasarkan id user
$query_transaksi = "SELECT transaksi.id, CONCAT(rute.kota_awal, ' - ', rute.kota_tujuan) AS rute, transaksi.status, transaksi.tanggal_mulai
                    FROM transaksi
                    JOIN rute ON transaksi.rute = rute.id
                    WHERE transaksi.id_user = $id_user AND transaksi.status != 'selesai' ORDER BY transaksi.tanggal_mulai DESC";

// Eksekusi query
$result_transaksi = $conn->query($query_transaksi);

if ($result_transaksi->num_rows > 0) {
  while ($row = $result_transaksi->fetch_assoc()) {
    ?>
    <!-- select transaksi yang status nya belum selesai  -->
    <div class="col-12 bg-dark-subtle px-5 text-decoration-none py-3 d-flex justify-content-between">
      <a href=<?= $row['status']!='menunggu pembayaran' ? "/transaksi-detail.php?id=$row[id]": "/bayar.php?id=$row[id]" ?> class="text-decoration-none text-black">
        <h4 class="fw-semibold">Perjalanan <?= $row['rute'] ?></h4>
        <p>Status: <?= $row['status'] ?></p>
      </a>
      <div>
        <p><?= $row['tanggal_mulai'] ?></p>
        <a href="lapor.php?id=<?= $row['id'] ?>">Laporkan keluhan</a>
      </div>
    </div>
    <?php
  }
} else {
  ?>
  <div class="col-12 bg-dark-subtle px-5 py-3 d-flex justify-content-between">
    <h4 class="fw-bold">Anda tidak sedang dalam perjalanan</h4>
  </div>
<?php
}

?>
<!--  -->

<h3 class="fw-bold my-4">Buat Trip Baru</h3>
<!-- <div class="d-flex mb-3">
  <div class="mr-2 px-3 py-2 bg-dark-subtle">Pergi</div>
  <div class="mx-2 px-3 py-2 bg-dark-subtle">Pergi-Pulang</div>
  <div class="ml-2 px-3 py-2 bg-dark-subtle">Multi-Kota</div>
</div> -->
<div class="card bg-dark-subtle">
  <div class="card-body">
    <form action="/rpl/pesan.php" method="get">
      <div class="row">
        <div class="col-md-12">
          <div class="mb-3">
            <label for="rute" class="form-label">Pilih Rute</label>
            <select required class="form-control" id="rute" name="rute">
              <option value="">Pilih rute</option>
              <?php while ($row = $result_rute->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['rute']; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="tanggal-keberangkatan" class="form-label">Tanggal Keberangkatan</label>
            <input required type="date" class="form-control" id="tanggal-keberangkatan" name="tanggal-keberangkatan"
              value="<?php echo date('Y-m-d'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="tanggal-kepulangan" class="form-label">Tanggal Kepulangan</label>
            <input required type="date" class="form-control" id="tanggal-kepulangan" name="tanggal-kepulangan"
              value="<?php echo date('Y-m-d'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="jumlah-penumpang" class="form-label">Jumlah Penumpang</label>
            <input required type="number" class="form-control" id="jumlah-penumpang" name="jumlah"
              placeholder="Masukkan jumlah penumpang">
          </div>
        </div>
      </div>
      <div class="d-flex">
        <button type="submit" class="btn mx-auto btn-primary">Lanjutkan</button>
      </div>
    </form>
  </div>
</div>

<?php
$conn->close();
include "./shared/footer.php";
?>