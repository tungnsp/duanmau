<?php 
class OrderDetail
{
 protected $pdo;

    public function __construct()
      {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();

    }
    public function insert($product_id, $quantity, $order_id, $product_name, $product_price){
    $sql = "
        INSERT INTO `order_detail`
        (`product_id`, `quantity`, `order_id`, `product_name`, `product_price`) 
        VALUES (:product_id, :quantity, :order_id, :product_name, :product_price)
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':product_id'    => $product_id,
        ':quantity'      => $quantity,
        ':order_id'      => $order_id,
        ':product_name'  => $product_name,
        ':product_price' => $product_price,
    ]);
}
public function findOrderDetailByOrderId($order_id){
    $sql = "SELECT order_detail.*,products.image FROM `order_detail` JOIN products on order_detail.product_id = products.id
    WHERE order_id = :order_id ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':order_id' =>$order_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}