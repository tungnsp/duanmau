<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
        <!--Nội dung chính -->
            <a href="<? BASE_URL?>?action=admin-create-products" class="btn btn-primary btn-sm">Thêm mới</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th> 
                        <th>Danh mục</th> 
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listData as $key =>$value):?>
                        <tr>
                            <td><?= $key +1 ?></td>
                            <td><?= $value['name'] ?></td>  
                            <td><?= number_format($value['price'] )?>VND</td>  
                            <td><?= $value['quantity'] ?></td>    
                            <td>
                                <?php if($value['image'] !=""): ?>
                                    <img src="<?= $value['image'] ?>" alt="" width="100">
                                <?php endif;?>
                            </td>    
                            <td><?= $value['description'] ?></td>    
                            <td><?= $value['categoryName'] ?></td>    
                            <td>
                                <a href="<?= BASE_URL?>?action=admin-update-products&id=<?= $value['id'] ?>">Sửa</a>
                                 <a href="<?= BASE_URL ?>?action=admin-delete-products&id=<?= $value['id'] ?>" 
                                   onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                        </tr>
                     <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
    </div>
</div>