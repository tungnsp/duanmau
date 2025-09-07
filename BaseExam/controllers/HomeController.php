<?php
class HomeController{
    public function index() {
        // Load the admin dashboard view
       $title = "Trang chủ";
       $view = "client/home";
       require_once PATH_VIEW . 'main.php';
    }
    public function login() {
        // Load the login view
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method =='POST'){
            $user = new User();
            $check = $user->checkLogin($_POST['email'], $_POST['password']);
            if($check){
                $_SESSION['success'][] ="Đăng nhập thành công";
                $_SESSION['userLogin'] = [
                    'id' => $check['id'],
                    'name' => $check['name'],
                    'role' => $check['role'],
                ];
                if($check['role'] == '1'){
                    header("Location: " . BASE_URL . "?action=admin-dashboard");
                    exit();
                }
                header("Location: " . BASE_URL );
                exit();
            }else{
                $_SESSION['error'][] ="Đăng nhập thất bại";
                header("Location: " . BASE_URL . "?action=login");
                exit();
            }
        }
        $title = " Trang đăng nhập";
        $view = "login";
        require_once PATH_VIEW . 'main.php';
    }
    public function register() {
        // Load the registration view
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            if($_POST['password'] == $_POST['confirm']){
                $user = new User();
                $check = $user->findByEmail($_POST['email']);
                if(!$check){
                    $user->register(
                        $_POST['name'],
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['phone'],
                        $_POST['address'],
                    );
                $_SESSION['success'][] ="Đăng ký thành công";
                header("Location: " . BASE_URL . "?action=login");
                exit();
                }

                $_SESSION['error'][] ="Email đã tồn tại";
                header("Location: " . BASE_URL . "?action=register");
                exit();
            }
            $_SESSION['error'][] ="Mật khẩu phải trùng với Xác nhận mật khẩu";
            header("Location: " . BASE_URL . "?action=register");
            exit();
        }
            $title = "Trang đăng ký";
            $view = "register";
            require_once PATH_VIEW . 'main.php';
        
     
    }
    public function logout() {
        // Handle user logout
        unset($_SESSION['userLogin']);
        $_SESSION['success'][] = "Đăng xuất thành công";
        header("Location: " . BASE_URL . "?action=login");
        exit();
    }
    public function clientProducts() {
        $product = new Product();
        $search = [
                'search_name' => "",
                'search_category' => "",
                'search_min_price'=> "",
                'search_max_price'=> "",
              ];
        // Load the client products view
        if(isset($_GET['search_name'])){
              $search['search_name'] = $_GET['search_name'];
              $listProduct = $product->getList($search);
        }else if(isset($_GET['search_category'])){
               $search['search_category'] = $_GET['search_category'];
               $listProduct = $product->getList($search);
        }else if(isset($_GET['search_min_price']) && isset($_GET['search_max_price'])){
              $search['search_min_price'] = $_GET['search_min_price'];
              $search['search_max_price'] = $_GET['search_max_price'];
              $listProduct = $product->getList($search);
        } else{
              $listProduct = $product->getList($search);
        }
        
      
        $category = new Category();
        $listCategory = $category->getList();

        $title = "Trang sản phẩm";
        $view = "client/products";
        require_once PATH_VIEW . 'main.php';
    }
    public function detailProducts() {
        $product = new Product();
        $data = $product->getOne($_GET['id']);
        $listOtherProducts = $product->getOther($data);
         $title = "Trang chi tiết sản phẩm";
        $view = "client/detail-products";
        require_once PATH_VIEW . 'main.php';
}
public function addToCart(){
    $product = new Product();
    $data = $product->getOne($_GET['id']);

    $quantity = $_GET['quantity']; // sửa đúng tên biến
    if ($quantity < 1 || $quantity > $data['quantity']) {
        $_SESSION['error'][] = "Số lượng sản phẩm không phù hợp";
        header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_GET['id']);
        exit();
    }

    // Khởi tạo giỏ hàng
    $cart = new Cart();
    $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);

    if(!$cartUser){
        $cart ->insert($_SESSION['userLogin']['id']);
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']) ;
    }

    // Thêm vào cart_details
    $cartDetail = new CartDetail();
    $cartProduct = $cartDetail ->findCartDetailByProduct($cartUser['id'],$_GET['id'],);
    if($cartProduct){
        if(($cartProduct['quantity'] + $quantity ) >$data['quantity']){
            $_SESSION['error'][] = "Số lượng sản phẩm không phù hợp";
        header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_GET['id']);
        exit();
        }
        $cartDetail->update($cartProduct,$cartUser['id'], $_GET['id'], $quantity );
    }else{
        $cartDetail->insert($cartUser['id'], $_GET['id'], $quantity);
    }
    

    $_SESSION['success'][] = "Mua hàng thành công! Vui lòng kiểm tra giỏ hàng";
    header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_GET['id']);
    exit();
}
public function viewCart(){

        $cart = new Cart();
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);
        $cartUserProduct = false;
        
        if($cartUser){
            $cartDetail = new CartDetail();
            $cartUserProduct = $cartDetail->findCartDetailByCartId($cartUser['id']);
        }

        $title = "Trang giỏ hàng";
        $view = "client/cart";
        require_once PATH_VIEW . 'main.php';
}
    public function deleteCart(){
        if(isset($_GET['idCartDetail'])){
            $cartDetail = new CartDetail();
            $cartDetail->delete($_GET['idCartDetail']);
        }
        header("Location:" . BASE_URL . "?action=client-view-cart");
        
    }
  public function minusCart()
{
    $cartDetail = new CartDetail();
    $data = $cartDetail->getOne($_GET['idCartDetail']);

    if (intval($data['quantity']) - 1 <= 0) {
        $_SESSION['error'][] = "Không được cập nhật số lượng sản phẩm dưới 0";
        header("Location: " . BASE_URL . "?action=client-view-cart");
        exit();
    }

    $cartDetail->updateCartDetail($_GET['idCartDetail'], intval($data['quantity']) - 1);

    // Redirect khi thành công
    header("Location: " . BASE_URL . "?action=client-view-cart");
    exit();
}

public function plusCart()
{
    $cartDetail = new CartDetail();
    $data = $cartDetail->getOne($_GET['idCartDetail']);

    if (intval($data['quantity']) + 1 > intval($data['productQuantity'])) {
        $_SESSION['error'][] = "Vượt quá số lượng có thể mua";
        header("Location: " . BASE_URL . "?action=client-view-cart");
        exit();
    }

    $cartDetail->updateCartDetail($_GET['idCartDetail'], intval($data['quantity']) + 1);

    // Redirect khi thành công
    header("Location: " . BASE_URL . "?action=client-view-cart");
    exit();
}
 public function pay (){
      $cart = new Cart();
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);
        $cartUserProduct = false;
        
        if($cartUser){
            $cartDetail = new CartDetail();
            $cartUserProduct = $cartDetail->findCartDetailByCartId($cartUser['id']);
        }
        $user = new User();
        $userInfo = $user->getOne($_SESSION['userLogin']['id']);
        $title = "Trang thanh toán";
        $view = "client/pay";
        require_once PATH_VIEW . 'main.php';
 }
 public function saveOrder(){
    $cart = new Cart();
    $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);//Cart
    $cartUserProduct = false;
        
    if($cartUser){
    $cartDetail = new CartDetail();
    $cartUserProduct = $cartDetail->findCartDetailByCartId($cartUser['id']);//Cart Detail
        }

    $user = new User();
    $userInfo = $user->getOne($_SESSION['userLogin']['id']); // User

    $total_money = 0;
    foreach($cartUserProduct as $value){
       $total_money += $value['quantity'] * $value['price'];
    }
    $order = new Order();   
    $orderId =$order->insert(
        $_SESSION['userLogin']['id'],
        $total_money,
        date('Y-m-d'),
        $_POST['receiver_name'],
        $_POST['receiver_phone'],
        $_POST['receiver_address'],
        $_POST['receiver_email']
    );
    $orderDetail = new OrderDetail();   
    foreach($cartUserProduct as $value){
        $orderDetail->insert(
            $value['product_id'],
            $value['quantity'],
            $orderId,
            $value['name'],
            $value['price'],
        );
    }   
    foreach($cartUserProduct as $value){
        $cartDetail->delete($value['id']);
    }
    $cart->delete($cartUser['id']);

    $_SESSION['success'][] = "Đặt hàng thành công";
    header("Location:" . BASE_URL);
    exit();
 }

 public function viewOrder(){
    $order = new Order();
    $orderData = $order->findOrderByUserId($_SESSION['userLogin']['id']);
    $orderDetail= new OrderDetail();
    foreach($orderData as $key => $value){
       $orderDetailData= $orderDetail->findOrderDetailByOrderId($value['id']);
       $orderData[$key]['order_detail'] = $orderDetailData;
    }

   
    
    $title = "Trang đơn hàng";
    $view = "client/order";
    require_once PATH_VIEW . 'main.php';
 }
    public function ratingProduct(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product = new Product();
            $data = $product->getOne($_POST['product_id']);
            if($data){
                $rating = new Rating();
                $rating->insert($_POST['product_id'],$_SESSION['userLogin']['id'],$_POST['rating'],$_POST['comment']);
                $_SESSION['success'][] = "Cảm ơn bạn đã đánh giá sản phẩm";
                header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_POST['product_id']);
                exit();
            }
            $_SESSION['error'][] = "Sản phẩm không tồn tại";
            header("Location: " . BASE_URL );
            exit();
        }
        header("Location: " . BASE_URL );
        exit();
    }
}


?>