<?php
session_start();
if (!isset($_SESSION['id']) && $_SERVER['PHP_SELF'] != '/rpl/index.php') {
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  if (isset($description)) {
    echo "<meta name='description' content='$description'>";
  } else {
    echo "<meta name='description' content='Kirana tour'>";
  }

  if (isset($other)) {
    echo $other;
  }

  if (isset($title)) {
    echo "<title>$title</title>";
  } else {
    echo "<title>Kirana Tour - Travel Agency</title>";
  }

  ?>
  <style>
    .navbar {
      background-color: #007BFF;
      /* Warna biru */
    }

    .navbar-brand {
      font-family: 'Brush Script MT', cursive;
      /* Gaya font untuk logo */
      font-size: 2rem;
    }

    .navbar-brand span {
      display: block;
      font-size: 0.8rem;
      font-family: Arial, sans-serif;
    }

    .nav-link {
      color: white !important;
      /* Warna teks putih */
    }

    .btn-signin {
      background-color: #333;
      color: white;
      border: none;
    }

    .custom-bg-primary {
      background-color: #2070bb;
    }
  </style>
  <link rel="icon" href="icon/kirana.svg" type="image/svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>