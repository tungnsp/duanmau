<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
            <table class="table">
                                  <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     <?php foreach($orderDetailData as $key2 => $value2 ): ?>
                                        <tr>
                                            <td><?= $key2 +1 ?></td>
                                            <td><img src="<?= $value2['image'] ?>" alt="" width="80"></td>
                                            <td>
                                                <div class="d-flex items-center justify-content-between">
                                                <a target="_blank"
                                                    href="<?= BASE_URL?>?action=client-detail-products&id=<?= $value2['product_id'] ?>">
                                                    <h6><?= $value2['product_name'] ?></h6>
                                                </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?= number_format($value2['product_price']) ?> vnđ
                                            </td>
                                            <td>
                                                <?= $value2['quantity'] ?>
                                            </td>
                                            <td>
                                                <?= number_format(intval($value2['product_price']) * intval($value2['quantity'])) ?> vnđ
                                            </td>
                                        </tr>
                                     <?php endforeach; ?>
                                  </tbody>      
                                </table>
        </div>
    </div>
</div>