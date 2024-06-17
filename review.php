<?php include "./shared/header.php" ?>
     
    <div class="container my-5 d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
          <h5 class="card-title">Perjalanan Jogja - Solo</h5>
          <div class="rating mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star text-warning"></i>
          </div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">Tulis Review</button>
        </div>
      </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reviewModalLabel">Tulis Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
              </div>
              <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <div class="rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star text-warning"></i>
                </div>
              </div>
              <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <textarea class="form-control" id="review" rows="3" placeholder="Tulis review Anda"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
 <?php include "./shared/footer.php" ?>