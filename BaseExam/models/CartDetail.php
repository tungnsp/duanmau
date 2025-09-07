<?php
class CartDetail{
    protected $pdo;
    public function __construct() {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();

    }
  
    public function insert($cartId, $productId, $quantity){
        $sql = "
            INSERT INTO `cart_detail`(`cart_id`, `product_id`, `quantity`) VALUES (:cart_id,
            :product_id, :quantity)
        ";
         $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
        ":cart_id" => $cartId,
        ":product_id" => $productId,
        ":quantity" => $quantity,
       ]);
    }
    public function findCartDetailByProduct($cartId, $productId){
        $sql ="
            SELECT * FROM `cart_detail` WHERE cart_id = :cart_id and product_id = :product_id 
        ";
         $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
        ":cart_id" => $cartId,
        ":product_id" => $productId,
       ]);
       return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($cartDetail, $cartId, $productId, $quantity, ){
        $sql ="
            UPDATE `cart_detail` SET `cart_id`=:cart_id ,`product_id`=:product_id , `quantity`=:quantity WHERE 
            id = :id
        ";
          $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
        ":cart_id" => $cartId,
        ":product_id" => $productId,
        ":quantity" => ($cartDetail['quantity'] + $quantity),
        ":id" => $cartDetail['id']
       ]);
    }
    public function findCartDetailByCartId($cartId){
        $sql = "
        SELECT cart_detail.*, products.image, products.name, products.quantity AS productQuantity, products.price FROM cart_detail
        JOIN products ON cart_detail.product_id = products.id
        WHERE cart_detail.cart_id = :cart_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
        ":cart_id" => $cartId,
       ]);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id){
        $sql = "
            DELETE FROM `cart_detail` WHERE id =:id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute([
            ":id" => $id,
        ]);
    }
    public function getOne($id) {
        $sql = "
        SELECT cart_detail.*, products.quantity as productQuantity,products.price FROM `cart_detail` JOIN products on cart_detail.product_id WHERE cart_detail.id= :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute([
            ":id" => $id,
        ]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateCartDetail($id, $quantity){
        $sql ="
            UPDATE `cart_detail` SET `quantity`= :quantity WHERE id = :id
        ";
         $stmt = $this->pdo->prepare($sql);
        $stmt ->execute([
            ":id" => $id,
            ":quantity" => $quantity,
        ]);
    }
}