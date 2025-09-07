<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người nhận</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderData as $key => $value): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td>
                                <p><?= $value['receiver_name'] ?> - <?= $value['receiver_email'] ?></p>
                                <small><?= $value['receiver_phone'] ?></small><br>
                                <small><?= $value['receiver_address'] ?></small><br>
                            </td>
                            <td>
                                <?= date("d/m/Y", strtotime($value['date'])); ?>
                            </td>
                            <td>
                                <?= number_format($value['total_money']) ?> vnđ
                            </td>
                            <td>
                                <?php if ($value['status'] == "pending"): ?>
                                    <span class="badge text-bg-warning">Đang chờ</span>
                                <?php elseif ($value['status'] == "processing"): ?>
                                    <span class="badge text-bg-info">Đang xử lý</span>
                                <?php elseif ($value['status'] == "delivered"): ?>
                                    <span class="badge text-bg-primary">Đã giao hàng</span>
                                <?php elseif ($value['status'] == "completed"): ?>
                                    <span class="badge text-bg-success">Đã hoàn thành</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"> <!-- colspan phải = số cột bên trên -->
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
                                        <?php foreach ($value['order_detail'] as $key2 => $value2): ?>
                                            <tr>
                                                <td><?= $key2 + 1 ?></td>
                                                <td><img src="<?= $value2['image'] ?>" alt="" width="80"></td>
                                                <td>
                                                    <div class="d-flex items-center justify-content-between">
                                                        <a target="_blank"
                                                            href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value2['product_id'] ?>">
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
                                                    <?= number_format(intval($value2['product_price']) * intval($value2['quantity'])) ?>
                                                    vnđ
                                                </td>
                                                <td>
                                                    <?php if($value['status'] == 'completed'):?>
                                                    <a href="<?= BASE_URL ?>?action=client-rating-product&id=" class="btn btn-warning">Đánh giá</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>