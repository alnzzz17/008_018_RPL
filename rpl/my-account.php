<?php include "./shared/header.php" ?>
<?php
include "./shared/koneksi.php";
$id_user = $_SESSION['id'];

if (isset($_POST['save'])) {
  // Ambil data dari form
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $nomor_telepon = $_POST['nomor_telepon'];
  
  // Query untuk update data user
  $query_update = "UPDATE user
                   SET nama_lengkap = '$nama_lengkap', email = '$email', nomor_telepon = '$nomor_telepon'
                   WHERE id = $id_user";

  // Eksekusi query
  $conn->query($query_update);
  header("Location: my-account.php?sukses");
  }
  
  if (isset($_GET['sukses'])) {
    echo "<script>alert('Data berhasil diubah')</script>";
    header("refresh:0.1;url=my-account.php");
  
}

$query_user = "SELECT nama_lengkap, email, nomor_telepon
               FROM user
               WHERE id = $id_user";

// Eksekusi query
$result_user = $conn->query($query_user);

$user = "";

if ($result_user->num_rows > 0) {
  // Ambil detail user dari hasil query
  $user = $result_user->fetch_assoc();
}
?>
<div class="container my-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">MY ACCOUNT</h4>
      <p class="card-text">Manage your account</p>
    </div>
    <form method="post" class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>" class="form-control"
              id="nama-lengkap" placeholder="Enter your full name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="email"
              placeholder="Enter your email">
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nomor-telepon" class="form-label">Nomor Telepon</label>
            <input type="number" name="nomor_telepon" value="<?= $user['nomor_telepon'] ?>" class="form-control"
              id="nomor-telepon" placeholder="Enter your phone number">
          </div>
          <!--   <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password"  class="form-control" id="password" placeholder="Enter your password">
            </div> -->
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-danger" href="/logout.php">LOGOUT</a>
        <button class="btn btn-secondary" name="save" type="submit">SAVE CHANGES</button>
        <button class="btn btn-outline-danger" type="button">DELETE ACCOUNT</button>
      </div>
    </form>
  </div>
</div>



<?php include "./shared/footer.php" ?>