<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lihat Paket</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <style>
    .custom-bg-primary {
      background-color: #2070bb;
    }
    .card-header {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
  <nav class="navbar custom-bg-primary navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="">
        <img src="icon/kirana.svg" alt="Kirana" class="d-inline-block align-text-top" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="mx-3 nav-item">
            <a class="nav-link text-white" href="#">Plan a Trip</a>
          </li>
          <li class="mx-3 nav-item">
            <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
          </li>
          <li class="mx-3 nav-item">
            <div class="bg-dark px-3">
              <a class="nav-link text-white" href="#">Akun</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">
    <h1 class="my-4">Lihat Paket: Paket Wisata Bali</h1>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header">Rute</div>
          <div class="card-body">
            <p class="card-text">Denpasar - Ubud - Kuta - Seminyak</p>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">Pemandu Wisata</div>
          <div class="card-body">
            <p class="card-text">Bapak Made</p>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">Tempat Makan</div>
          <div class="card-body">
            <p class="card-text">Warung Nasi Bali, Cafe Ubud, Restoran Seafood Kuta</p>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">Akomodasi</div>
          <div class="card-body">
            <p class="card-text">Hotel Kuta Beach, Villa Ubud</p>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">Catatan</div>
          <div class="card-body">
            <p class="card-text">Paket sudah termasuk tiket masuk objek wisata, makan 3x sehari, dan akomodasi. Belum termasuk tiket pesawat dan pengeluaran pribadi.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header">Total Harga</div>
          <div class="card-body">
            <p class="card-text">Rp 5.000.000,-</p>
          </div>
        </div>
        <a href="pesan.php" class="btn btn-primary">Beli Paket</a href="">
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>