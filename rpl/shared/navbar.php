<nav class="navbar fixed-top custom-bg-primary navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="icon/kirana.svg" alt="" class="d-inline-block align-text-top" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="mx-3 nav-item">
          <a class="nav-link text-white"
            href="<?= isset($_SESSION['id']) ? "dashboard.php" : "index.php?login=user" ?>">Plan a Trip</a>
        </li>

        <li class="mx-3 nav-item">
          <div class="bg-dark px-3">
            <?php
            if ($_SERVER['PHP_SELF'] == "/rpl/index.php"):
              if (!isset($_SESSION['id'])):
                ?>
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <li>
                    <form method="get">
                      <button type="submit" name="login" class="dropdown-item" value="user">User</button>
                    </form>
                  </li>
                  <li><a class="dropdown-item" href="/index.php?login=driver">Driver</a></li>
                  <li><a class="dropdown-item" href="/index.php?login=admin">Admin</a></li>
                </ul>
                <?php
              else:
                ?>
                <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                <?php
              endif;
            else:
              ?>
              <!-- <a class="nav-link text-white" href="my-account.php">Akun</a> -->
              <?php
            endif;
            ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div style="margin-top: 80px;">
</div>

<?php

if (isset($_GET['pesan'])) {
  echo "<script>alert('$_GET[pesan]')</script>";
}

if (isset($_GET['login']) && !isset($_SESSION['id'])) {
  include_once "./login.php";
} else if (!isset($_GET['login']) && isset($_GET['register']) && !isset($_SESSION['id'])) {
  include_once "./register.php";
}
?>