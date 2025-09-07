<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <a href="<? BASE_URL?>?action=admin-create-categories" class="btn btn-primary btn-sm">Thêm mới</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listData as $key =>$value):?>
                        <tr>
                            <td><?= $key +1 ?></td>
                            <td><?= $value['name'] ?></td>
                            <td>
                                <a href="<?= BASE_URL?>?action=admin-update-categories&id=<?= $value['id'] ?>">Sửa</a>
                                 <a href="<?= BASE_URL ?>?action=admin-delete-categories&id=<?= $value['id'] ?>" 
                                   onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                        </tr>
                     <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
    </div>
</div>