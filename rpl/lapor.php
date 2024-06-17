<?php
include "./shared/header.php";
include './shared/koneksi.php';
$id_user = $_SESSION['id'];

if (isset($_POST['submit_report'])) {
  $judul = $_POST['judul'];

  $kategori = $_POST['tipe'];
  $konten = $_POST['detail'];
  $telpon = isset($_POST['telepon']) && !empty($_POST['telepon']) ? $_POST['telepon'] : '';

  $q;
  if (!empty($telpon)) {
    $q = "INSERT INTO pelaporan (pelapor, judul, kategori, isi, telepon) VALUES ($id_user, '$judul', '$kategori', '$konten', $telpon)";
  } else {
    $q = "INSERT INTO pelaporan (pelapor, judul, kategori, isi) VALUES ($id_user, '$judul', '$kategori', '$konten')";

  }


  if ($conn->query($q)) {
    echo "<script>alert('Report submitted successfully')</script>";
    header("refresh:0.1;url=dashboard.php");
  } else {
    echo "<script>alert('Failed to submit report')</script>";
    header("refresh:0.1;url=dashboard.php");
  }
}
?>
<div class="container my-5">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Report</h4>
      <form method="post">
        <div class="mb-3">
          <label for="report-type" class="form-label">Kategori</label>
          <select name="tipe" required class="form-select" id="report-type">
            <option value="" selected>Pilih kategori</option>
            <option value="driver">Driver</option>
            <option value="trip">Trip</option>
            <option value="agency">Travel Agency</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input required name="judul" type="text" class="form-control" id="judul" placeholder="Garis besar masalah">
        </div>
        <div class="mb-3">
          <label for="report-details" class="form-label">Detail</label>
          <textarea name="detail" required class="form-control" id="report-details" rows="3"
            placeholder="Jelaskan lebih detail"></textarea>
        </div>
        <div class="mb-3">
          <label for="report-contact" class="form-label">Nomor telepon (optional)</label>
          <input name="telepon" type="text" class="form-control" id="report-contact"
            placeholder="Nomor yang dapat dihubungi">
        </div>
        <button name="submit_report" type="submit" class="btn btn-primary">Submit Report</button>
      </form>
    </div>
  </div>
</div>
<?php include "./shared/footer.php" ?>