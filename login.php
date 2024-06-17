<?php
include './shared/koneksi.php';

if (isset($_POST['login']) && $_POST['login'] == 'user') {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];

  $result;

  if ($_POST['role'] == 'user') {
    $result = $conn->query("SELECT * FROM user WHERE email = '$email'");
  } elseif ($_POST['role'] == 'driver') {
    $result = $conn->query("SELECT * FROM driver WHERE email = '$email'");
  } elseif ($_POST['role'] == 'admin') {
    $result = $conn->query("SELECT * FROM admin WHERE email = '$email'");
  }

  // $result = $conn->query("SELECT * FROM user WHERE email = '$email'");
  $user = $result->fetch_assoc();

  if ($user && $password == $user['password']) {
    $_SESSION['id'] = $user['id'];
    header("Location: dashboard.php?pesan=Berhasil login");

    exit;
  } else {
    // Login failed, redirect back to login page with error message
    header("Location: index.php?login=user&error=Invalid email or password");
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
          <form method="POST">
            <input type="hidden" name="role" value="<?= $_GET['login'] ?>">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <?php if (isset($_GET['error'])): ?>
              <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
              </div>
            <?php endif; ?>
            <div class="d-flex">
              <button name="login" value="user" type="submit" class="btn mt-4 mx-auto btn-primary">Login</button>
            </div>
          </form>
          <p class="text-center">Don't have an account? <a href="index.php?register=user">Register here</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>