<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="p-3">
                <img src="<?= $data['image'] ?>" alt="" width="100%">
            </div>
        </div>
        <div class="col-9">
            <div class="p-3">
                <h1><?= $data['name'] ?></h1>
                <h6 class="text-success"><?= $data['categoryName']?></h6>
                <p >
                    <?= number_format($data['price']) ?> vnđ
                </p>
                <small>Số lượng còn: <?= $data['quantity']?></small>
                <hr>
                <form class="mt-5 d-flex items-center" action="<?= BASE_URL?>" method="get">
                    <input type="hidden" name="action" value="client-add-to-cart">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <div class="me-4" width="50">
                    <input type="number" class="form-control "  value="1" min="1" max=" <?= $data['quantity']?>" name="quantity">
                    </div>
                   <?php if(isset($_SESSION['userLogin'])): ?>
                    <button type="submit" class=" btn btn-danger">Thêm vào giỏ hàng</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalLogin">
                             Thêm vào giỏ hàng
                        </button>
                        <?php endif;?>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="p3 mt-4">
                <h3>Mô tả sản phẩm</h3>
                <p><?= $data['description'] ?></p>
            </div>
            <div class="p3 mt-4">
                <h3>Sản phẩm cùng loại</h3>
                 <div class="container-fluid">
            <div class="row ">
                <?php foreach($listOtherProducts as $value):?>
                <div class="col-3 mb-5" >
                    <div class="card" >
                    <div class="p-4">
                        <img src="<?=$value['image'] ?>" class="card-img-top" alt="..." >
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?=$value['name']?></h5>
                        <p class="card-text">
                            <?=number_format($value['price']) ?> vnđ
                        </p>
                        <a href="<?=BASE_URL ?>?action=client-detail-products&id=<?=$value['id'] ?>" class="btn btn-primary">Xem 
                            chi tiết</a>
                    </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p> Bạn chưa đăng nhập. Vui lòng đăng nhập để mua sản phẩm</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="<?= BASE_URL?>" class="btn btn-primary">Đăng nhập</a>
      </div>
    </div>
  </div>
</div>