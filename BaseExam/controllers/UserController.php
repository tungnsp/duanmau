<?php 
class UserController{
    public function index(){
        $user = new User();
        $listData = $user->getList();

        $title = "Trang người dùng";
        $view = "admin/list-user";
        require_once PATH_VIEW . 'main.php';
    }
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User();
            $check = $user->findByEmail($_POST['email']);
            if($check){
                $_SESSION['error'][] = "Email đã tồn tại";
                header("Location: " . BASE_URL . "?action=admin-create-users");
                exit();
            }
            $user->register(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['phone'],
                $_POST['address'],
                        $_POST['role']
            );
            $_SESSION['success'][] = "Thêm mới người dùng thành công";
            header("Location: " . BASE_URL . "?action=admin-list-users");
        }else{
         $title = "Trang thêm mới người dùng";
        $view = "admin/create-user";
        require_once PATH_VIEW . 'main.php';
        }
    }
    public function update(){
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User();
            // $check = $user->findByEmail($_POST['email']);
            // if($check){
            //     $_SESSION['error'][] = "Email đã tồn tại";
            //     header("Location: " . BASE_URL . "?action=admin-update-users&id=" . $_GET['id']);
            //     exit();
            // }
            $user->update(
                $_GET['id'], 
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['role']
            );
            $_SESSION['success'][] = "Cập nhật thành công";
            header("Location: " . BASE_URL . "?action=admin-list-users");

         }else{
        $user = new User();
        $data = $user->getOne($_GET['id']);

        $title = "Trang chỉnh sửa người dùng";
        $view = "admin/update-user";
        require_once PATH_VIEW . 'main.php';
         }
    }
    public function delete(){
        $user = new User();
        $user->delete($_GET['id']);
        $_SESSION['success'][] = "Xóa thành công";
        header("Location: " . BASE_URL . "?action=admin-list-users");
    }
}