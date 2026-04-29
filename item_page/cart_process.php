<?php
session_start();
include_once '../pcs_buy/chongamedb.php';

// Xác định tên cookie dựa trên việc đã đăng nhập hay chưa
$user_suffix = isset($_SESSION['user_id']) ? 'user_' . $_SESSION['user_id'] : 'guest';
$cookie_name = 'cart_' . $user_suffix;

// 1. Thêm vào giỏ hàng
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (!in_array($id, $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $id);
    }
    
    // Lưu vào Cookie riêng cho từng user (hoặc guest)
    setcookie($cookie_name, json_encode($_SESSION['cart']), time() + (86400 * 30), "/");
    
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?open_cart=1");
    exit();
}

// 2. Xóa khỏi giỏ hàng
if (isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    if (isset($_SESSION['cart']) && ($key = array_search($id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
    
    // Cập nhật Cookie riêng
    setcookie($cookie_name, json_encode($_SESSION['cart']), time() + (86400 * 30), "/");
    
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?open_cart=1");
    exit();
}
?>