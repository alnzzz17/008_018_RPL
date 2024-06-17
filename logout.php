<?php
session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['logout'] = '1';
header("Location: index.php?berhasil logout");
exit;