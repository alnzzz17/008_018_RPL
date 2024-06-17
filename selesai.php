<?php include "./shared/header.php";
include "./shared/koneksi.php";
if (isset($_POST['bayar'])) {
  $id = $_POST['bayar'];
  $query = "UPDATE `kiranatour`.`transaksi` SET `status`='Sudah dibayar' WHERE  `id`='$id';";
  $conn->query($query);

  
}
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

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body text-center">
          <h4 class="card-title mb-4">Payment Completed</h4>
          <p class="card-text">
            Your travel arrangement has been made with Kirana Tour. Please contact the person in charge.
          </p>
          <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "./shared/footer.php" ?>