<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChonGame Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    
    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">
</head>
<body>

<?php
// Lấy tên file hiện tại để active menu
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="admin-sidebar">
    <div class="sidebar-brand">
        <img src="../logo/favicon-32x32.png" alt="Logo" style="width: 24px; vertical-align: middle; margin-right: 8px;">
        CHONGAME
    </div>
    
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="admin_index.php" class="<?php echo $current_page == 'admin_index.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-chart-line"></i> Tổng quan
                </a>
            </li>
            <li>
                <a href="admin_products.php" class="<?php echo ($current_page == 'admin_products.php' || $current_page == 'admin_product_add.php' || $current_page == 'admin_product_edit.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-gamepad"></i> Sản phẩm
                </a>
            </li>
            <li>
                <a href="admin_inventory.php" class="<?php echo $current_page == 'admin_inventory.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-boxes-stacked"></i> Kho hàng
                </a>
            </li>
            <li>
                <a href="admin_users.php" class="<?php echo $current_page == 'admin_users.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-users"></i> Người dùng
                </a>
            </li>
            <li>
                <a href="../home_page/index.php" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-globe"></i> Về trang web
                </a>
            </li>
        </ul>
    </div>
    
    <div class="sidebar-footer">
        <a href="logout.php" class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
        </a>
    </div>
</div>

<div class="admin-main">
    <div class="top-header fade-in">
        <h1>Dashboard</h1>
        <div class="user-info">
            <i class="fa-solid fa-user-shield"></i>
            <span>Xin chào, <?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'Admin'; ?></span>
        </div>
    </div>
