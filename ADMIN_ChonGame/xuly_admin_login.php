<?php
session_start();
require_once '../pcs_buy/chongamedb.php'; 

if (isset($_POST['login'])) {
    $u = mysqli_real_escape_string($conn, $_POST['txtuser']);
    $p = mysqli_real_escape_string($conn, $_POST['txtpass']);

    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$u' AND mat_khau = '$p'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Kiểm tra xem có phải admin không
        if (isset($row['vai_tro']) && $row['vai_tro'] == 1) {
            // Tạo Session lưu trữ thông tin cho admin
            $_SESSION['user'] = $row['ten_dang_nhap'];
            $_SESSION['user_id'] = $row['ma_nguoi_dung'];
            $_SESSION['vai_tro'] = $row['vai_tro'];
            
            header("Location: admin_index.php");
            exit();
        } else {
            // Là user thường, không cho phép đăng nhập trang admin
            echo "<script>alert('Tài khoản này không có quyền Quản trị viên!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không đúng!'); window.history.back();</script>";
    }
}
?>
