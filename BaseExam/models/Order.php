<?php 
class Order
{
    protected $pdo;

    public function __construct()
      {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();

    }
    public function insert($user_id, $total_money, $date,  $receiver_name, $receiver_phone, $receiver_address, $receiver_email){
        $sql = "
        INSERT INTO `orders`( `user_id`, `total_money`, `date`,  `receiver_name`, `receiver_phone`,
         `receiver_address`, `receiver_email`) VALUES (:user_id, :total_money, :date,  :receiver_name, :receiver_phone,
         :receiver_address, :receiver_email )
        ";

        $stmt = $this->pdo->prepare($sql);
       $stmt->execute([
        ':user_id' => $user_id,
        ':total_money' => $total_money,
        ':date' => $date,

        ':receiver_name' => $receiver_name,
        ':receiver_phone' => $receiver_phone,
        ':receiver_address' => $receiver_address,
        ':receiver_email' => $receiver_email,
       ]);
        return $this->pdo->lastInsertId();
    }

    public function findOrderByUserId($user_id){
        $sql = "SELECT * FROM `orders` WHERE user_id = :user_id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' =>$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getList(){
        $sql = "SELECT * FROM `orders`";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateStatus($id, $status) {
        $sql = "UPDATE `orders` SET `status` = :status WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':status' => $status,
            ':id' => $id
        ]);

    }
}