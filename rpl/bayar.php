<?php
include "./shared/header.php";
include "./shared/koneksi.php" ?>

<?php
$id_transaksi = $_GET['id'];

// Query untuk mengambil rute berdasarkan id transaksi
$query_rute = "SELECT rute.harga AS harga_rute, transaksi.jumlah_penumpang , 
               CONCAT(rute.kota_awal, ' - ', rute.kota_tujuan) AS rute
               FROM transaksi
               JOIN rute ON transaksi.rute = rute.id
               WHERE transaksi.id = $id_transaksi";

// Eksekusi query
$result_rute = $conn->query($query_rute);


$harga_rute = 0;
$jumlah_penumpang = 0;


$rute = "";
if ($result_rute->num_rows > 0) {
  $row = $result_rute->fetch_assoc();
  $harga_rute = $row['harga_rute'];
  $jumlah_penumpang = $row['jumlah_penumpang'];
  $rute = $row['rute'];
}

$total_biaya = ($harga_rute * $jumlah_penumpang);


?>

<div class="container">
  <div class="d-flex justify-content-center pb-4">
    <p Qclass="mx-4 fs-5">Pesan</p>
    <p class="mx-4 fs-5">Bayar</p>
    <p class="mx-4 fs-5">Selesai</p>
  </div>
  <div class="row">


  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-bold"><?= $rute ?></h5>
          <h5 class="card-title">Pilih Metode Pembayaran</h5>

          <form>
            <div class="form-check">
              <input class="form-check-input" checked type="radio" name="paymentMethod" id="bank" value="bank">
              <label class="form-check-label" for="bank">
                Bank
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="paymentMethod" id="e-wallet" value="e-wallet">
              <label class="form-check-label" for="e-wallet">
                E-Wallet
              </label>
            </div>
            <p class="card-text">Cara Pembayaran:</p>
            <ul>
              <li>Kunjungi item terdaftar</li>
              <li>Lakukan transaksi</li>
            </ul>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Estimasi Biaya</h5>
          <p class="card-text">Tanggal: 10 Juni 2024</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Item: <?= $rute ?> <span
                class="float-right"><?= number_format($harga_rute, 2, ",", "."); ?></span></li>
            <li class="list-group-item">Jumlah penumpang <span class="float-right"><?= $jumlah_penumpang ?></span></li>
            <li class="list-group-item font-weight-bold">Total <span
                class="float-right"><?= number_format($harga_rute * $jumlah_penumpang, 2, ",", "."); ?></span></li>
          </ul>
          <a href="#" class="btn disabled mt-3">Menunggu pembayaran</a>
          <form method="post" action="/rpl/selesai.php">
            <button type="submit" name="bayar" value="<?= $id_transaksi ?>"
              class="btn btn-primary mt-3">Selesai membayar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "./shared/footer.php" ?>