<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = (int)$_GET['id'];
    
    // Ngăn không cho tự sửa đổi chính mình
    if ($id == $_SESSION['user_id']) {
        echo "<script>alert('Bạn không thể tự thay đổi quyền của mình!'); window.location.href='admin_users.php';</script>";
        exit();
    }
    
    if ($action == 'promote') {
        $sql = "UPDATE nguoi_dung SET vai_tro = 1 WHERE ma_nguoi_dung = $id";
    } else if ($action == 'demote') {
        $sql = "UPDATE nguoi_dung SET vai_tro = 0 WHERE ma_nguoi_dung = $id";
    }
    
    if (isset($sql)) {
        if (mysqli_query($conn, $sql)) {
            header("Location: admin_users.php");
            exit();
        } else {
            echo "Lỗi cập nhật: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: admin_users.php");
    exit();
}
?>
