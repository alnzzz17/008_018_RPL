<?php
include "./shared/header.php";
include "./shared/koneksi.php";

// Ambil id pesan dari parameter URL
$message_id = $_GET['id'];

// Query untuk mengambil detail pesan
$sql = "SELECT * FROM inbox WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $message_id);
$stmt->execute();
$result = $stmt->get_result();
$message = $result->fetch_assoc();
?>

<div class="container my-5">
  <h1 class="mb-4">Message Detail</h1>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $message['judul']; ?></h5>
      <p class="card-text"><?php echo $message['konten']; ?></p>
      <p class="card-text"><small class="text-muted">Received on
          <?php echo date("Y-m-d H:i:s", strtotime($message['tanggal_waktu'])); ?></small></p>
    </div>
  </div>
  <a href="inbox.php" class="btn btn-primary mt-3">Back to Inbox</a>
</div>
<?php
include "./shared/footer.php";
?>