<?php include "./shared/header.php" ?>
<?php include "./shared/koneksi.php" ?>

<?php



// Menerima data dari form 
$nama = $_GET['nama'];
$perusahaan = $_GET['perusahaan'];
$telepon = $_GET['telepon'];
$jumlah = $_GET['jumlah'];
$rute = $_GET['rute'];
$tanggal_keberangkatan = $_GET['tanggal-keberangkatan'];
$tanggal_kepulangan = $_GET['tanggal-kepulangan'];
$alamat_penjemputan = $_GET['alamat-penjemputan'];
$pemandu_wisata = isset($_GET['pemandu-wisata']) ? $_GET['pemandu-wisata'] : '';
$tempat_makan = isset($_GET['tempat-makan']) ? $_GET['tempat-makan'] : '';
$akomodasi = isset($_GET['akomodasi']) ? $_GET['akomodasi'] : '';
$catatan = isset($_GET['catatan']) ? $_GET['catatan'] : '';

$query_rute = "SELECT DISTINCT id, harga, CONCAT(kota_awal, ' - ', kota_tujuan) AS rute FROM rute WHERE id = $rute";
$result_rute = $conn->query($query_rute);
$row = $result_rute->fetch_assoc();
$harga = $row['harga'];

// Menghitung total harga
$total_harga = $harga * $jumlah;

$f_total_harga = number_format($total_harga, 2, ",", ".");

if (isset($_POST['konfirmasi'])) {
  $id_user = $_SESSION['id'];


  // Ambil data dari form
  $rute = $_POST['rute'];
  $tanggal_mulai = $_POST['tanggal_mulai'];
  $tanggal_selesai = $_POST['tanggal_selesai'];
  $jumlah_penumpang = $_POST['jumlah_penumpang'];
  $nama_pemesan = $_POST['nama_pemesan'];
  $perusahaan = $_POST['perusahaan'];
  $telepon = $_POST['telepon'];
  $alamat_penjemputan = $_POST['alamat_penjemputan'];
  $catatan = $_POST['catatan'];
  $total_harga = $_POST['total_harga'];

  // Query untuk memasukkan data ke dalam tabel transaksi
  $query_insert = "INSERT INTO transaksi (id_user, rute, tanggal_mulai, tanggal_selesai, jumlah_penumpang, nama_pemesan, perusahaan, telepon, alamat_penjemputan, catatan, total_harga, status, pemandu_wisata, tempat_makan, akomodasi)
                   VALUES ($id_user, $rute, '$tanggal_mulai', '$tanggal_selesai', $jumlah_penumpang, '$nama_pemesan', '$perusahaan', '$telepon', '$alamat_penjemputan', '$catatan', $total_harga, 'Menunggu pembayaran', '$pemandu_wisata', '$tempat_makan', '$akomodasi')";

  // Eksekusi query
  if ($conn->query($query_insert) === TRUE) {
    // echo "Transaksi berhasil ditambahkan";

    $id = $conn->insert_id;
    header("Location: bayar.php?id=$id");

    $judul = "Transaksi Berhasil";
    $konten = "Transaksi dengan ID $id telah berhasil ditambahkan. Silakan melakukan pembayaran.";
    $tanggal_waktu = date('Y-m-d H:i:s'); // Waktu saat ini
    $query_inbox = "INSERT INTO inbox (id_penerima, judul, tanggal_waktu, status, konten)
                    VALUES ($id_user, '$judul', '$tanggal_waktu', 1, '$konten')";

    $conn->query($query_inbox);
  } else {
    echo "Error: " . $query_insert . "<br>" . $conn->error;
  }
}



?>

<div class="container">
  <div class="d-flex justify-content-center pb-4">
    <p class="mx-4 fs-5">Pesan</p>
    <p class="mx-4 fs-5">Bayar</p>
    <p class="mx-4 fs-5">Selesai</p>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="mb-4 fw-bold">Pemesanan Tiket <strong><?= $row['rute'] ?></strong></h3>
      <p>Harga per orang : <?= number_format($harga, 2, ",", ".") ?></p>
      <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <p class=><strong><?= $jumlah ?></strong></p>
        <p><?= number_format($harga * $jumlah, 2, ",", ".") ?></p>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <p class="form-control-plaintext"><strong><?= $nama ?></strong></p>
      </div>
      <div class="mb-3">
        <label class="form-label">Perusahaan</label>
        <p class="form-control-plaintext"><strong><?= $perusahaan ?></strong></p>
      </div>
      <div class="mb-3">
        <label class="form-label">Telepon</label>
        <p class="form-control-plaintext"><strong><?= $telepon ?></strong></p>
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat Penjemputan</label>
        <p class="form-control-plaintext"><strong><?= $alamat_penjemputan ?></strong></p>
      </div>
      <?php if (!empty($pemandu_wisata)): ?>
        <div class="mb-3">
          <label class="form-label">Pemandu Wisata</label>
          <p class="form-control-plaintext"><strong><?= $pemandu_wisata ?></strong></p>
          <p>Harga pemandu akan diinformasikan langsung ketika perjalanan</p>
          <!-- <p>Harga : <?= number_format($pemandu, 2, ",", ".") ?></p> -->
        </div>
      <?php endif; ?>
      <?php if (!empty($tempat_makan)): ?>
        <div class="mb-3">
          <label class="form-label">Preferensi Tempat Makan</label>
          <p class="form-control-plaintext"><?= $tempat_makan ?></p>
        </div>
      <?php endif; ?>
      <?php if (!empty($akomodasi)): ?>
        <div class="mb-3">
          <label class="form-label">Preferensi Akomodasi</label>
          <p class="form-control-plaintext"><?= $akomodasi ?></p>
        </div>
      <?php endif; ?>
      <?php if (!empty($catatan)): ?>
        <div class="mb-3">
          <label class="form-label">Catatan Tambahan</label>
          <p class="form-control-plaintext"><?= $catatan ?></p>
        </div>
      <?php endif; ?>
      <div class="mb-3">
        <h4 class="mb-3">Total Harga</h4>
        <p class="form-control-plaintext"><strong>Rp<?= $f_total_harga ?></strong></p>
      </div>
      <div class="mb-3">
        <form method="post">
          <input type="hidden" name="rute" value="<?= $rute ?>">
          <input type="hidden" name="tanggal_mulai" value="<?= $tanggal_keberangkatan ?>">
          <input type="hidden" name="tanggal_selesai" value="<?= $tanggal_kepulangan ?>">
          <input type="hidden" name="jumlah_penumpang" value="<?= $jumlah ?>">
          <input type="hidden" name="nama_pemesan" value="<?= $nama_pemesan ?>">
          <input type="hidden" name="perusahaan" value="<?= $perusahaan ?>">
          <input type="hidden" name="telepon" value="<?= $telepon ?>">
          <input type="hidden" name="alamat_penjemputan" value="<?= $alamat_penjemputan ?>">
          <input type="hidden" name="catatan" value="<?= $catatan ?>">
          <input type="hidden" name="total_harga" value="<?= $total_harga ?>">
          <button type="submit" name="konfirmasi" class="btn btn-primary">Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "./shared/footer.php" ?>