<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="p-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Sản phẩm </th>
                            <th>Đơn giá </th>
                            <th>Số lượng </th>
                            <th>Thành tiền </th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php $tongTien = 0;?>
                        <?php foreach ($cartUserProduct as $value): ?>
                            <tr>
                                <td>
                                    <a class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')"
                                    href="<?= BASE_URL ?>?action=client-delete-cart-detail&idCartDetail=<?=$value['id'] ?>">
                                       Xóa
                                    </a>
                                </td>
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
                                    <a class="btn btn-secondary" 
                                    href="<?= BASE_URL?>?action=client-minus-cart-detail&idCartDetail=<?= $value['id']?>">-</a>
                                    <input type="text" class="form-control"  value="<?= $value['quantity']?>" disabled>
                                    <a class="btn btn-secondary" 
                                    href="<?= BASE_URL?>?action=client-plus-cart-detail&idCartDetail=<?= $value['id']?>">+</a>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                        $thanhtien = intval($value['price'] )* intval($value['quantity']);
                                        echo number_format($thanhtien);
                                        $tongTien += $thanhtien;
                                    ?>vnđ
                                </td>
                            </tr>
                           
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                      <a href="<?= BASE_URL?>?action=client-products">Tiếp tục mua hàng</a>
                    
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="p-4 d-flex justify-content-between">
                <p> Tổng tiền:</p>
                <span class="text-danger">
                            <?= number_format($tongTien) ?> vnđ
                </span>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-warning" href="<?= BASE_URL?>?action=client-pay">Thanh toán</a>
            </div>
        </div>
    </div>
</div>