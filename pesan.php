<?php include "./shared/header.php" ?>
<?php include "./shared/koneksi.php" ?>

<?php
$id_rute = $_GET['rute'];
$jumlah = $_GET['jumlah'];
$tanggal_keberangkatan = $_GET['tanggal-keberangkatan'];
$tanggal_kepulangan = $_GET['tanggal-kepulangan'];

$query_rute = "SELECT DISTINCT id, harga, CONCAT(kota_awal, ' - ', kota_tujuan) AS rutes FROM rute WHERE id = $id_rute";

// Eksekusi query
$result_rute = $conn->query($query_rute);
$row = $result_rute->fetch_assoc();
$rute_s = $row['rutes'];
$harga = number_format($row['harga'], 2, ",", ".");
?>

<div class="container">
  <div class="d-flex justify-content-center pb-4">
    <p class="mx-4 fs-5">Pesan</p>
    <p class="mx-4 fs-5">Bayar</p>
    <p class="mx-4 fs-5">Selesai</p>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="mb-4 fw-bold">Pemesanan Tiket <?= $rute_s ?></h3>
      <p>Harga : <b>Rp<?= $harga ?></b> per orang</p>
      <form action="pesan-estimasi.php" method="get">
        <input type="hidden" name="rute" value="<?= $id_rute ?>">
        <div class="mb-3">
          <div for="berangkat" class="form-label">Tanggal Keberangkatan</div>
          <input required readonly type="datetime" class="form-control" id="berangkat" name="tanggal-keberangkatan" value="<?= $tanggal_keberangkatan ?>">
        </div>
        <div class="mb-3">
          <div for="pulang" class="form-label">Tanggal Kepulangan</div>
          <input required readonly type="datetime" class="form-control" id="pulang" name="tanggal-kepulangan" value="<?= $tanggal_kepulangan ?>">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Jumlah</label>
          <input required type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $jumlah ?>">
        </div>
        <h3 class="mb-4 mt-5">Pemesan Tiket</h3>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input required type="text" class="form-control" id="nama" name="nama_pemesan" placeholder="Masukkan nama">
        </div>
        <div class="mb-3">
          <label for="perusahaan" class="form-label">Perusahaan</label>
          <input required type="text" class="form-control" id="perusahaan" name="perusahaan"
            placeholder="Masukkan nama perusahaan">
        </div>
        <div class="mb-3">
          <label for="telepon" class="form-label">Telepon</label>
          <input required type="text" class="form-control" id="telepon" name="telepon"
            placeholder="Masukkan nomor telepon">
        </div>
        <div class="mb-3">
          <label for="alamat-penjemputan" class="form-label">Alamat Penjemputan</label>
          <textarea class="form-control" id="alamat-penjemputan" name="alamat-penjemputan" rows="3"
            placeholder="Masukkan alamat penjemputan"></textarea>
        </div>
        <div class="mb-3">


          <div class="accordion" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Opsi Lanjutan
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse px-5 collapse"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body ">
                  <h3 class="mb-4">Opsi Lanjutan</h3>
                  <h4 class="mb-3">Pemandu Wisata</h4>
                  <div class="form-check">
                    <input required class="form-check-input required" type="radio" name="pemandu-wisata"
                      id="pemandu-wisata-1" value="Ya">
                    <label class="form-check-label" for="pemandu-wisata-1">Ya</label>
                  </div>
                  <div class="form-check">
                    <input checked required class="form-check-input required" type="radio" name="pemandu-wisata"
                      id="pemandu-wisata-2" value="Tidak">
                    <label class="form-check-label" for="pemandu-wisata-2">Tidak</label>
                  </div>
                </div>
                <div class="mb-3">
                  <h4 class="mb-3">Preferensi Tempat Makan</h4>
                  <label for="tempat-makan" class="form-label">Cantumkan secara detail jika sudah menemukan tempat makan
                    yang
                    diinginkan</label>
                  <textarea class="form-control" id="tempat-makan" name="tempat-makan" rows="3"
                    placeholder="Masukkan preferensi tempat makan"></textarea>
                </div>
                <div class="mb-3">
                  <h4 class="mb-3">Preferensi Akomodasi</h4>
                  <label for="akomodasi" class="form-label">Cantumkan secara detail jika sudah menemukan
                    akomodasi/penginapan
                    yang diinginkan</label>
                  <textarea class="form-control" id="akomodasi" name="akomodasi" rows="3"
                    placeholder="Masukkan preferensi akomodasi"></textarea>
                </div>
                <div class="mb-3">
                  <h4 class="mb-3">Catatan Tambahan</h4>
                  <label for="catatan" class="form-label">Demi pengalaman terbaik Anda bersama Kirana Tour and Travel,
                    silahkan
                    beritahu kami kebutuhan dan preferensi Anda lainnya</label>
                  <textarea class="form-control" id="catatan" name="catatan" rows="3"
                    placeholder="Masukkan catatan tambahan"></textarea>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Lanjutkan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "./shared/footer.php" ?>