<?php include "./shared/header.php" ?>
     
    <div class="container">
      <div class="d-flex justify-content-center pb-4">
        <p class="mx-4 fs-5">Pesan</p>
        <p class="mx-4 fs-5">Bayar</p>
        <p class="mx-4 fs-5">Selesai</p>
      </div>
      <div class="row bg-success-subtle p-5 fs-3 fw-bold mb-4">
        Sedang menunggu persetujuan admin
      </div>
      <div class="row">
        <div class="col-md-6">
          <h3 class="mb-4">Pemesanan Tiket</h3>
          <form>
            <div class="mb-3">
              <label for="tanggal-mulai" class="form-label">Tanggal Mulai</label>
              <input type="text" class="form-control" id="tanggal-mulai" placeholder="Masukkan tanggal mulai">
            </div>
            <div class="mb-3">
              <label for="tanggal-selesai" class="form-label">Tanggal Selesai</label>
              <input type="text" class="form-control" id="tanggal-selesai" placeholder="Masukkan tanggal selesai">
            </div>
            <div class="mb-3">
              <label for="jumlah-penumpang" class="form-label">Jumlah Penumpang</label>
              <input type="text" class="form-control" id="jumlah-penumpang" placeholder="Masukkan jumlah penumpang">
            </div>
            <h3 class="mb-4 mt-5">Pemesan Tiket</h3>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
            </div>
            <div class="mb-3">
              <label for="perusahaan" class="form-label">Perusahaan</label>
              <input type="text" class="form-control" id="perusahaan" placeholder="Masukkan nama perusahaan">
            </div>
            <div class="mb-3">
              <label for="telepon" class="form-label">Telepon</label>
              <input type="text" class="form-control" id="telepon" placeholder="Masukkan nomor telepon">
            </div>
            <div class="mb-3">
              <label for="alamat-penjemputan" class="form-label">Alamat Penjemputan</label>
              <textarea class="form-control" id="alamat-penjemputan" rows="3"
                placeholder="Masukkan alamat penjemputan"></textarea>
            </div>
            <button>Opsi Lanjutan</button>
          </form>
        </div>
        <div class="col-md-6">
          <h3 class="mb-4">Estimasi Biaya</h3>
          <div class="card">
            <div class="card-body">
              <p class="card-text">Tanggal: 10 Juni 2024</p>
              <div class="d-flex justify-content-between">
                <span>Perjalanan jogja solo 50 penumpang</span>
                <span>Rp 5.000.000</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Pemandu Wisata</span>
                <span>Rp 2.000.000</span>
              </div>
              <hr>
              <div class="d-flex justify-content-between">
                <span>Total</span>
                <span>Rp 2.000.000</span>
              </div>
              <button class="btn disabled mt-3">Menunggu persetujuan admin</button>
              <a href="bayar.php" class="btn btn-primary mt-3">Lanjutkan pembayaran</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <h3 class="mb-4">Pemandu Wisata</h3>
          <div class="mb-3">
            <label class="form-label">* Centang salah satu</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pemandu-wisata" id="pemandu-wisata-1">
              <label class="form-check-label" for="pemandu-wisata-1">
                Ya
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pemandu-wisata" id="pemandu-wisata-2">
              <label class="form-check-label" for="pemandu-wisata-2">
                Tidak
              </label>
            </div>

          </div>
          <h3 class="mb-4">Preferensi Tempat Makan</h3>
          <div class="mb-3">
            <label for="tempat-makan" class="form-label">Cantumkan secara detail jika sudah menemukan tempat makan yang
              diinginkan</label>
            <textarea class="form-control" id="tempat-makan" rows="3"
              placeholder="Masukkan preferensi tempat makan"></textarea>
          </div>
          <h3 class="mb-4">Preferensi Akomodasi</h3>
          <div class="mb-3">
            <label for="akomodasi" class="form-label">Cantumkan secara detail jika sudah menemukan akomodasi/penginapan
              yang diinginkan</label>
            <textarea class="form-control" id="akomodasi" rows="3"
              placeholder="Masukkan preferensi akomodasi"></textarea>
          </div>
          <h3 class="mb-4">Catatan Tambahan</h3>
          <div class="mb-3">
            <label for="catatan" class="form-label">Demi pengalaman terbaik Anda bersama Kirana Tour and Travel,
              silahkan beritahu kami kebutuhan dan preferensi Anda lainnya</label>
            <textarea class="form-control" id="catatan" rows="3" placeholder="Masukkan catatan tambahan"></textarea>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 <?php include "./shared/footer.php" ?>