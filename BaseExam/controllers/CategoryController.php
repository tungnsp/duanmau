<?php
class CategoryController {
    public function index(){
        $category = new Category();
        $listData = $category->getList();

        $title = "Trang danh mục sản phẩm";
        $view = "admin/list-category";
        require_once PATH_VIEW . 'main.php';
    }
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $category = new Category();
             $category->insert($_POST['name']);
            $_SESSION['success'][] = "Thêm mới thành công";
            header("Location: " . BASE_URL . "?action=admin-list-categories");
        }else{
         $title = "Trang thêm mới danh mục sản phẩm";
        $view = "admin/create-category";
        require_once PATH_VIEW . 'main.php';
        }
     
    }
    public function update(){
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category = new Category();
            $category->update($_GET['id'], $_POST['name']);
            $_SESSION['success'][] = "Cập nhật thành công";
            header("Location: " . BASE_URL . "?action=admin-list-categories");

         }else{
        $category = new Category();
        $data = $category->getOne($_GET['id']);

        $title = "Trang chỉnh sửa danh mục";
        $view = "admin/update-category";
        require_once PATH_VIEW . 'main.php';
         }
       
       
    }
    public function delete(){
        $category = new Category();
        $category->delete($_GET['id']);
        $_SESSION['success'][] = "Xóa thành công";
        header("Location: " . BASE_URL . "?action=admin-list-categories");
    }
}