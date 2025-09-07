<div class="container">
    <div class="row">
        <div class="col-5">
            <form action="<?= BASE_URL?>?action=client-save-order" method="post">
                <div class="mb-4">
                    <label for="">Tên người nhận</label>
                    <input type="text" name="receiver_name" class="form-control" value="<?= $userInfo['name']?>">
                </div>
                <div class="mb-4">
                    <label for="">Email người nhận</label>
                    <input type="text" name="receiver_email" class="form-control" value="<?= $userInfo['email']?>">
                </div>
                <div class="mb-4">
                    <label for="">Số điện thoại người nhận</label>
                    <input type="text" name="receiver_phone" class="form-control" value="<?= $userInfo['phone']?>">
                </div>
                <div class="mb-4">
                    <label for="">Địa chỉ người nhận</label>
                    <input type="text" name="receiver_address" class="form-control" value="<?= $userInfo['address']?>">
                </div>
             <button class="btn btn-success">Đặt hàng</button>
            </form>
        </div>
        <div class="col-7">
                  <table class="table">
                    <thead>
                        <tr> 
                            <th>Sản phẩm </th>
                            <th>Đơn giá </th>
                            <th>Số lượng </th>
                            <th>Thành tiền </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartUserProduct as $value): ?>
                            <tr>
                                <td>
                                    <div class="d-flex items-center justify-between">
                                        <img src="<?= $value['image'] ?>" alt="" width="100">
                                        <div>
                                                <a target="_blank"
                                                href="<?= BASE_URL?>?action=client-detail-products&id=<?=$value['product_id']?>">
                                                       <h6><?= $value['name'] ?></h6>
                                                </a>
                                            <small>Số lượng: <?= $value['productQuantity'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?= number_format($value['price']) ?> vnđ
                                </td>
                                 <td width="200">
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control"  value="<?= $value['quantity']?>" disabled>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                        $thanhtien = intval($value['price'] )* intval($value['quantity']);
                                        echo number_format($thanhtien);

                                    ?>vnđ
                                </td>
                            </tr>
                           
                        <?php endforeach ?>
            </div>
    </div>
</div>