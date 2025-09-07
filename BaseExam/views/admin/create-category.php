<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <form action="<? BASE_URL?>?action=admin-create-categories" method="post">
                <div class="mb-4">
                    <label for="">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Thêm mới</button>
            </form>
        </div>
    </div>
</div>