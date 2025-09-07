<?php 
class ProductController{
    public function index(){
        $product = new Product();
        $listData = $product->getList();

        $title = "Trang sản phẩm";
        $view = "admin/list-product";
        require_once PATH_VIEW . 'main.php';
    }
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $file = $_FILES['image'];
            $path = "";
            if(isset($file) && $file['error'] == UPLOAD_ERR_OK){
                $newName =time() . $file['name'];
                $path ='assets/uploads' . $newName;
                move_uploaded_file($file['tmp_name'],$path);
            }
             $product = new Product();
             $product->insert(
                $_POST['name'],
                $_POST['price'],
                $_POST['quantity'],
                $_POST['category_id'],
                $path,
                $_POST['description']
             );
            $_SESSION['success'][] = "Thêm mới thành công";
            header("Location: " . BASE_URL . "?action=admin-list-products");
        }else{
        $category = new Category();
        $listData = $category->getList();
         $title = "Trang thêm mới sản phẩm";
        $view = "admin/create-product";
        require_once PATH_VIEW . 'main.php';
        }
    }
    public function update(){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product = new Product();
            $data = $product->getOne($_GET['id']);
             $file = $_FILES['image'];
            $path = $data['image'];
            if(isset($file) && $file['error'] == UPLOAD_ERR_OK){
                 if($path != ""){
            unlink($path);
        }
                $newName =time() . $file['name'];
                $path ='assets/uploads' . $newName;
                move_uploaded_file($file['tmp_name'],$path);
            }

            $product->update(
                $_GET['id'],
              $_POST['name'],
                $_POST['price'],
                $_POST['quantity'],
                $_POST['category_id'],
                $path,
                $_POST['description']
            );
            $_SESSION['success'][] = "Cập nhật thành công";
            header("Location: " . BASE_URL . "?action=admin-list-products");

         }else{
        $category = new Category();
        $listData = $category->getList();

        $product = new Product();
        $data = $product->getOne($_GET['id']);
        
        $title = "Trang chỉnh sửa sản phẩm";
        $view = "admin/update-product";
        require_once PATH_VIEW . 'main.php';
         }
    }
    public function delete(){
        $product = new Product();
        $data =$product->getOne($_GET['id']);
        if($data['image'] != ""){
            unlink($data['image']);
        }
        $product->delete($_GET['id']);
        $_SESSION['success'][] = "Xóa thành công";
        header("Location: " . BASE_URL . "?action=admin-list-products");
    }
}