<?php
include './shared/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['nama-lengkap']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-password'];

  if ($password !== $confirm_password) {
    header("Location: index.php?register=user&error=Passwords do not match");
    exit;
  }

  $result = $conn->query("SELECT * FROM user WHERE email = '$email'");
  $user = $result->fetch_assoc();

  if ($user) {
    header("Location: index.php?register=user&error=Email already exists");
    exit;
  } else {
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $conn->query("INSERT INTO user (nama_lengkap, email, password) VALUES ('$name', '$email', '$password')");
    ?>
    <script>alert("Berhasil register, silahkan login dengan email ini")</script>
    <?php
    header("Location: index.php?login=user");
    exit;
  }
}
?>



<div style="position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 2000;
    ">

  <div id="login-modal" class="modal d-block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="myModalLabel">Login</h3>
          <a href="<?= $_SERVER['PHP_SELF'] ?>" type="button" onclick="removeQueryString()" class="btn-close"
            data-dismiss="modal" aria-label="Close">
          </a>

        </div>
        <div class="modal-body">
          <form action="register.php" method="POST">
            <div class="form-group">
              <label for="nama-lengkap">Nama Lengkap</label>
              <input type="text" name="nama-lengkap" id="nama-lengkap" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="confirm-password">Konfirmasi Password</label>
              <input type="password" name="confirm-password" id="confirm-password" class="form-control" required>
            </div>
            <?php if (isset($_GET['error'])): ?>
              <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
              </div>
            <?php endif; ?>
            <div class="d-flex">
              <button type="submit" class="btn mt-4 mx-auto btn-primary">Login</button>
            </div>
          </form>
          <p class="text-center">Don't have an account? <a href="index.php?register=user">Register here</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>