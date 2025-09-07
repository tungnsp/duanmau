<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Home' ?></title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  

    <nav class="navbar navbar-expand-xxl bg-light justify-content-between px-5">
       <div class="d-flex items-center">
         <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Trang chủ</b></a>
            </li>
        </ul>
         <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>?action=client-products"><b>Sản phẩm</b></a>
            </li>
        </ul>
       </div>
        <div>
            <?php if (isset($_SESSION['userLogin'])): ?>
             <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" 
            aria-expanded="false">
              <?= $_SESSION['userLogin']['name']?>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= BASE_URL?>?action=client-view-cart">Giỏ hàng</a></li>
                <li><a class="dropdown-item" href="<?= BASE_URL?>?action=client-view-order">Đơn hàng</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <?php if($_SESSION['userLogin']['role'] == "1"):?>
                <li><a class="dropdown-item" href="<?= BASE_URL?>?action=admin-dashboard">Trang Admin</a></li>
                <?php endif;?>
                <li><a class="dropdown-item" href="<?= BASE_URL?>?action=logout">Logout</a></li>
            </ul>
            </div>
            <?php else: ?>
    <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
            <a href="<?= BASE_URL ?>?action=login" class="btn btn-outline-primary">Đăng nhập</a>
            <?php endif; ?>
        </div>
</nav>

    
     <?php if(isset($_SESSION['error']) && count($_SESSION['error']) > 0): ?>
        <ul>
            <?php foreach($_SESSION['error'] as $error): ?>
                <li>
                    <span class="text-danger"><?= $error ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <?php if(isset($_SESSION['success']) && count($_SESSION['success']) > 0):    ?>
        <ul>
            <?php foreach($_SESSION['success'] as $success): ?>
                <li>
                    <span class="text-success"><?= $success ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>


    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home' ?></h1>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>