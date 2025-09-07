<?php 
class DashboardController{
    public function index() {
        // Load the admin dashboard view
        $title = "Trang dashboard";
        $view = "admin/dashboard";
        require_once PATH_VIEW . 'main.php';
    }
}