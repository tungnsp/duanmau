<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/bn1.jpg" class="d-block w-100" alt="..." height="300">
    </div>
    <div class="carousel-item">
      <img src="assets/images/bn2.jpg" class="d-block w-100" alt="..." height="300">
    </div>
    <div class="carousel-item">
      <img src="assets/images/bn3.jpg" class="d-block w-100" alt="..." height="300">
    </div>
    <div class="carousel-item">
      <img src="assets/images/bn4.jpg" class="d-block w-100" alt="..." height="300">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="mb-2 mt-5">
  <h1>Sản phẩm nổi bật</h1>
</div>

<div class="row">
  <?php if (!empty($products)): ?>
      <?php foreach ($products as $product): ?>
          <div class="col-md-3 mb-4">
              <div class="card h-100">
                  <img src="assets/images/<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" height="200">
                  <div class="card-body">
                      <h5 class="card-title"><?= $product['name'] ?></h5>
                      <p class="card-text text-danger fw-bold"><?= number_format($product['price']) ?> đ</p>
                      <a href="index.php?act=productDetail&id=<?= $product['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                  </div>
              </div>
          </div>
      <?php endforeach; ?>
  <?php else: ?>
      <p class="text-muted">Hiện chưa có sản phẩm nào.</p>
  <?php endif; ?>
</div>