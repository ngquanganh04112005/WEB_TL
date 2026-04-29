<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Kiểm tra xem người dùng có phải là Admin không (vai_tro = 1)
if (!isset($_SESSION['vai_tro']) || $_SESSION['vai_tro'] != 1) {
    echo "<script>alert('Bạn không có quyền truy cập trang Quản trị!'); window.location.href = 'admin_login.php';</script>";
    exit();
}
?>
