<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <a href="<?=BASE_URL?>?action=admin-create-users" class="btn btn-primary btn-sm">Thêm mới</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listData as $key =>$value):?>
                        <tr>
                            <td><?= $key +1 ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['phone'] ?></td>
                            <td><?= $value['address'] ?></td>
                            <td>
                                <?php if($value['role'] == "0"):  ?>
                                    <span> Người dùng</span>
                                    <?php else: ?>
                                    <span> Admin</span>
                                    <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= BASE_URL?>?action=admin-update-users&id=<?= $value['id'] ?>">Sửa</a>
                                <?php if($_SESSION['userLogin']['id'] !=$value['id']): ?>
                                 <a href="<?= BASE_URL ?>?action=admin-delete-users&id=<?= $value['id'] ?>" 
                                   onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                                <?php endif; ?>
                        </tr>
                     <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
    </div>
</div>