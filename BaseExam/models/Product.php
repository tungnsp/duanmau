<?php 
class Product{
     protected $pdo;
    public function __construct() {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();

    }
    public function getList($search =[
        'search_name' => "",
        'search_category' => "",
        'search_min_price'=> "",
        'search_max_price'=> "",]){
        
       $sql= "SELECT products.*,categories.name AS categoryName FROM `products` JOIN categories ON products.
       category_id = categories.id
       
       ";
       if($search['search_name'] != ""){
        $sql = $sql . "where products.name like :searchName";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([
            'searchName' => '%' .  $search['search_name']  . '%'
        ]);
       }else if($search['search_category'] != ""){
        $sql = $sql . "where products.category_id = :searchCategory";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([
            'searchCategory' => $search['search_category']
        ]);
    } else if($search['search_min_price'] != "" && $search['search_max_price'] != ""){
        $sql = $sql . "where products.price >= :searchMinPrice AND products.price <= :searchMaxPrice";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([
            'searchMinPrice' => $search['search_min_price'],
            'searchMaxPrice' => $search['search_max_price']
        ]);
       }
       else{
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute();
       }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($name, $price, $quantity, $category_id, $image, $description){
        $sql = "INSERT INTO products(name, price, quantity, category_id, image, description) 
                VALUES(:name, :price, :quantity, :category_id, :image, :description)
            ";
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute([
        'name' => $name,
        'price' => $price, 
        'quantity' => $quantity,
        'category_id' => $category_id,
        'image' => $image,
        'description' => $description

       ]);
    }
    public function getOne($id){
         $sql= "SELECT products.*,categories.name AS categoryName FROM `products` JOIN categories ON products.
       category_id = categories.id
       WHERE products.id = :id
       ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id){
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
    }
    public function update($id, $name, $price, $quantity, $category_id, $image, $description){
        $sql = "UPDATE products SET name = :name, price = :price, quantity = :quantity, category_id = :category_id, image = :image,
         description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'category_id' => $category_id,
            'image' => $image,
            'description' => $description
        ]);
    }
    public function getOther($product) {
        $sql = "SELECT products.*,categories.name AS categoryName FROM `products` JOIN categories ON products.
       category_id = categories.id
       WHERE products.category_id = :category_id 
       AND products.id != :id
       ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':category_id' => $product['category_id'],
            ':id' => $product['id'],
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}