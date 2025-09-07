<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <form action="<? BASE_URL?>?action=admin-create-users" method="post">
                <div class="mb-4">
                    <label for="">Tên người dùng</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng" required>
                </div>
                <div class="mb-4">
                    <label for="">Email người dùng</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập tên Email" required>
                </div>
                <div class="mb-4">
                    <label for="">Password người dùng</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập password" required>
                </div>
                <div class="mb-4">
                    <label for="">Số điện thoại người dùng</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="mb-4">
                    <label for="">Địa chỉ người dùng</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập dịa chỉ" required>
                </div>
                <div class="mb-4">
                    <label for="">Vai trò người dùng</label>
                    <select name="role" class="form-control">
                        <option value="0">Người dùng</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Thêm mới</button>
            </form>
        </div>
    </div>
</div>