<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <form action="<?= BASE_URL?>?action=admin-create-products" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="mb-4">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
                </div>
                <div class="mb-4">
                    <label for="">Số lượng sản phẩm</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Nhập số lượng sản phẩm" required>
                </div>
                <div class="mb-4">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control">
                        <?php foreach ($listData as $value): ?>
                            <option value="<?= $value['id'] ?>">
                                <?= $value['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
               
                <div class="mb-4">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="mb-4">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Thêm mới</button>
            </form>
        </div>
    </div>
</div>