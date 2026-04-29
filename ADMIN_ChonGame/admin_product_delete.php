<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Check if there are orders or inventory linked to this product
    // Usually it's better to soft delete, but for this task we will just delete or alert if constrained
    
    // First, delete from kho_hang (inventory)
    $sql_inventory = "DELETE FROM kho_hang WHERE ma_san_pham = $id";
    mysqli_query($conn, $sql_inventory);
    
    // Now delete from san_pham
    $sql = "DELETE FROM san_pham WHERE ma_san_pham = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='admin_products.php';</script>";
    } else {
        // Có thể dính khóa ngoại ở bảng don_hang
        echo "<script>alert('Lỗi: Không thể xóa sản phẩm do có dữ liệu liên quan (Đơn hàng).'); window.location.href='admin_products.php';</script>";
    }
} else {
    header("Location: admin_products.php");
    exit();
}
?>
