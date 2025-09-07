<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="p-3">
                <form class=" border p-3" method="GET" action="<?= BASE_URL ?>">
                    <input type="hidden" name="action" value="client-products">
                    <h4>Tìm kiếm sản phẩm</h4>
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." name="search_name">
                    <button class="btn btn-primary btn-sm mt-2" >Tìm kiếm</button>
                </form>
                <div class="mt-5 border p-3">
                <h4>Lọc theo danh mục</h4>
                <div class="list-group">
                    <?php foreach($listCategory as $value):?>
                <a href="<?= BASE_URL ?>?action=client-products&search_category=<?= $value['id']?>" 
                class="list-group-item list-group-item-action">
                    <?= $value['name']?>
                </a>
                    <?php endforeach; ?>
                </div>
                </div>
                <div class="mt-5 border p-3">
                <h4>Lọc theo giá</h4>
                <form method="GET" action="<?= BASE_URL ?>">
                     <input type="hidden" name="action" value="client-products">
                    <div class="mb-2">
                        <input type="text" class="form-control" placeholder="Từ.." name="search_min_price" >
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" placeholder="Đến.." name="search_max_price">
                    </div>
                    <button class="btn btn-success btn-sm">Lọc</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-9">
        <div class="container-fluid">
            <div class="row ">
                <?php foreach($listProduct as $value):?>
                <div class="col-4 mb-5" >
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