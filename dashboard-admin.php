<?php include "./shared/header.php" ?>
     
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <a href="#" class="text-decoration-none">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pemesanan</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Menunggu diterima</li>
                  <li class="list-group-item">Menunggu pembayaran</li>
                </ul>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-6">
          <a href="#" class="text-decoration-none">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Perjalanan berlangsung</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Lihat Detail</li>
                </ul>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Driver</th>
                  <th scope="col">Kendaraan</th>
                  <th scope="col">Kapasitas</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Jane</td>
                  <td>Innova</td>
                  <td>12</td>
                  <td>Dalam perjalanan</td>
                  <td>Lihat Hapus</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Jane</td>
                  <td>Innova</td>
                  <td>12</td>
                  <td>Free</td>
                  <td>Lihat Hapus</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Jane</td>
                  <td>Innova</td>
                  <td>12</td>
                  <td>Free</td>
                  <td>Lihat Hapus</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pelaporan</h5>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Driver</th>
                      <th scope="col">Rute</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Laporan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>John Doe</td>
                      <td>Jane Smith</td>
                      <td>Jogja Solo</td>
                      <td>20 Juni 2024</td>
                      <td>Driver serapan lama bat</td>
                      <td>Detail</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 <?php include "./shared/footer.php" ?>