<?php
include "./shared/header.php";
if (isset($_SESSION['logout'])):
  ?>
  <script>
    alert("Berhasil logout")
  </script>
  <?php
  unset($_SESSION['logout']);
endif;
?>




<div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center fw-bold mt-5">
          Perjalanan Anda <br />
          Prioritas Kami
        </h1>
        <p class="text-center">
          Kirana tour telah berdiri sejak lama dan memiliki reputasi yang
          baik
        </p>
      </div>
    </div>
  </div>
</div>

<!-- <?= var_dump($_SESSION) ?> -->
<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-4">
      <div class="card">
        <img src="img/1.jpg" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Paket Wisata</h5>
          <p class="card-text">
            Kirana tour menyediakan paket wisata yang menarik dan menantang
          </p>
          <a href="paket.php" class="btn btn-primary custom-bg-primary">Lihat Paket</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card">
        <img src="img/2.jpg" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Paket Wisata</h5>
          <p class="card-text">
            Kirana tour menyediakan paket wisata yang menarik dan menantang
          </p>
          <a href="paket.php" class="btn btn-primary custom-bg-primary">Lihat Paket</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card">
        <img src="img/2.jpg" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Paket Wisata</h5>
          <p class="card-text">
            Kirana tour menyediakan paket wisata yang menarik dan menantang
          </p>
          <a href="paket.php" class="btn btn-primary custom-bg-primary">Lihat Paket</a>
        </div>
      </div>
    </div>
  </div>
  <?php include "./shared/footer.php" ?>