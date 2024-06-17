<?php include "./shared/plain-header.php" ?>
<?php include "./shared/navbar.php" ?>
<?php

if ($_SERVER['REQUEST_URI'] != "/" && $_SERVER['PHP_SELF'] != "/rpl/index.php" ):
  ?>

  <?php
  include "./shared/sidebar.php" ?>
  <div class="px-4 py-4" style="margin-left: 15rem">
  <?php
endif;
?>