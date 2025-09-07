<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <form action="<?= BASE_URL?>?action=admin-update-products&id=<?= $data['id']?>" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="<?= $data['name'] ?>" >
                </div>
                <div class="mb-4">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" value="<?= $data['price'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Số lượng sản phẩm</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Nhập số lượng sản phẩm" value="<?= $data['quantity'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control">
                        <?php foreach ($listData as $value): ?>
                            <option value="<?= $value['id'] ?>" <?php if($data['category_id'] == $value['id']):?> selected
                            <?php endif; ?>
                            >
                                <?= $value['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
               <?php if($data['image'] !=""):?>
                <img src="<?=$data['image']?>" alt="" width="100">
                <?php endif;?>
                <div class="mb-4">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="mb-4">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control"><?= $data['description']?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>