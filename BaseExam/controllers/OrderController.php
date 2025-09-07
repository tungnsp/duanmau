<?php
class OrderController {
    public function index() {
    $order = new Order();
    $orderData = $order->getList();

    
    $title = "Trang đơn hàng";
    $view = "admin/list-order";
    require_once PATH_VIEW . 'main.php';
    }
    public function detailOrder() {
        $orderDetail = new OrderDetail();
        $orderDetailData = $orderDetail->findOrderDetailByOrderId($_GET['id']);
        
         
        $title = "Trang chi tiết đơn hàng";
        $view = "admin/detail-order";
        require_once PATH_VIEW . 'main.php';
        }
    public function updateOrder() {
        $order = new Order();
        $order->updateStatus($_GET['id'], $_POST['status']);
        header("Location: " . BASE_URL . "?action=admin-list-order");
    }
}