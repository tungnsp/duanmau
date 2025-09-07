<?php
class Cart {
        protected $pdo;
    public function __construct() {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();
    }
  public function findCartByUserId($userId){
    $sql= "SELECT * FROM `carts` WHERE user_id = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([":user_id" => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Chỉ trả về 1 hàng
}

public function insert($userId){
    $sql = "INSERT INTO `carts` (`user_id`) VALUES (:user_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ":user_id" => $userId]);
     // Lấy ID vừa tạo
}
public function delete($id){
    $sql = "DELETE FROM  `carts` WHERE id =:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id]);
}
}
