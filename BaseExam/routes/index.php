<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'login'         => (new HomeController)->login(),
    'register'         => (new HomeController)->register(),
    'logout'         => (new HomeController)->logout(),
    

    // Admin
    'admin-dashboard' => (new DashboardController)->index(),


    'admin-list-categories'=> (new CategoryController)->index(),
    'admin-create-categories'=> (new CategoryController)->create(),
    'admin-update-categories'=> (new CategoryController)->update(),
    'admin-delete-categories'=> (new CategoryController)->delete(),

    'admin-list-users'=> (new UserController)->index(),
    'admin-create-users'=> (new UserController)->create(),
    'admin-update-users'=> (new UserController)->update(),
    'admin-delete-users'=> (new UserController)->delete(),


     'admin-list-products'=> (new ProductController)->index(),
    'admin-create-products'=> (new ProductController)->create(),
    'admin-update-products'=> (new ProductController)->update(),
    'admin-delete-products'=> (new ProductController)->delete(),

    'admin-list-order'=> (new OrderController)->index(),
    'admin-detail-order'=> (new OrderController)->detailOrder(),
    'admin-update-order'=> (new OrderController)->updateOrder(),

    // Client
    'client-products' => (new HomeController)->clientProducts(),
    'client-detail-products' => (new HomeController)->detailProducts(),
    'client-add-to-cart' => (new HomeController)->addToCart(),
    'client-view-cart' => (new HomeController)->viewCart(),
    'client-delete-cart-detail' => (new HomeController)->deleteCart(),
    'client-minus-cart-detail' =>  (new HomeController)->minusCart(),
    'client-plus-cart-detail' =>  (new HomeController)->plusCart(),

    'client-pay' =>  (new HomeController)->pay(),
    'client-save-order' =>  (new HomeController)->saveOrder(),
    'client-view-order' =>  (new HomeController)->viewOrder(),

    'client-rating-product' =>  (new HomeController)->ratingProduct(),

};