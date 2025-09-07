<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <form action="<?= BASE_URL ?>?action=admin-update-users&id=<?= $data['id'] ?>" method="post">
                <div class="mb-4">
                    <label for="">Tên người dùng</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng" value="<?= $data['name'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Email người dùng</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập tên Email" value="<?= $data['email'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Password người dùng</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập password" value="<?= $data['password'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Số điện thoại người dùng</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?= $data['phone'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Địa chỉ người dùng</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập dịa chỉ" value="<?= $data['address'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Vai trò người dùng</label>
                    <select name="role" class="form-control">
                        <option value="0" <?php if( $data['role'] == "0"):?> selected <?php endif;?>>
                        Người dùng
                        </option>
                        <option value="1" <?php if( $data['role'] == "1"):?> selected <?php endif;?>>
                            Admin
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>