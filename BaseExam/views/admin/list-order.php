<div class="container">
    <div class="row">
        <div class="col-3">
            <?php include 'views/admin/sidebar.php'; ?>
        </div>
        <div class="col-9">
            <!--Nội dung chính -->
            <a href="<?= BASE_URL ?>?action=admin-create-products" class="btn btn-primary btn-sm">Thêm mới</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người nhận</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $statusList = [
                        'pending' => 'Đang chờ',
                        'processing' => 'Đang xử lý',
                        'delivered' => 'Đã giao hàng',
                        'completed' => 'Đã hoàn thành',
                    ];
                    ?>

                    <?php foreach ($orderData as $key => $value): ?>
                        <?php
                        $currentStatus = $value['status'];
                        $currentIndex = array_search($currentStatus, array_keys($statusList));
                        ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['receiver_name'] ?> - <?= $value['receiver_email'] ?></td>
                            <td><?= number_format($value['total_money']) ?> vnđ</td>
                            <td><?= date("d/m/Y", strtotime($value['date'])); ?></td>
                            <td>
                                <form action="<?= BASE_URL ?>?action=admin-update-order&id=<?= $value['id'] ?>" method="post">
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <?php
                                        $i = 0;
                                        foreach ($statusList as $statusKey => $statusLabel):
                                            if ($i >= $currentIndex): ?>
                                                <option value="<?= $statusKey ?>" <?= $currentStatus == $statusKey ? 'selected' : '' ?>>
                                                    <?= $statusLabel ?> <?= $statusKey == $currentStatus ? '(hiện tại)' : '' ?>
                                                </option>
                                            <?php endif;
                                            $i++;
                                        endforeach; ?>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="<?= BASE_URL ?>?action=admin-detail-order&id=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>