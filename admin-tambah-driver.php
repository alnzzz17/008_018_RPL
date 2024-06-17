<?php include "./shared/header.php" ?>
     
    <div class="container my-5">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Driver - John Doe</h4>
          <form>
            <div class="mb-3">
              <label for="nama-depan" class="form-label">Nama depan</label>
              <input type="text" class="form-control" id="nama-depan" value="John">
            </div>
            <div class="mb-3">
              <label for="nama-belakang" class="form-label">Nama belakang</label>
              <input type="text" class="form-control" id="nama-belakang" value="Doe">
            </div>
            <div class="mb-3">
              <label for="kendaraan" class="form-label">Kendaraan</label>
              <input type="text" class="form-control" id="kendaraan" value="Mini Bus">
            </div>
            <div class="mb-3">
              <label for="kapasitas" class="form-label">Kapasitas</label>
              <input type="number" class="form-control" id="kapasitas" value="50">
            </div>
            <div class="mb-3">
              <label for="alamat-driver" class="form-label">Alamat Driver</label>
              <input type="text" class="form-control" id="alamat-driver" value="babaranjl kampus 2">
            </div>
            <div class="mb-3">
              <label for="nomor-hp" class="form-label">Nomor HP</label>
              <input type="text" class="form-control" id="nomor-hp" value="123123183">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
 <?php include "./shared/footer.php" ?>