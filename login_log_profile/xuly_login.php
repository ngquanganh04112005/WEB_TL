<?php
session_start();
include '../pcs_buy/chongamedb.php'; // File kết nối database của bạn

if (isset($_POST['login'])) {
    // Lấy dữ liệu và phòng chống SQL Injection cơ bản
    $u = mysqli_real_escape_string($conn, $_POST['txtuser']);
    $p = mysqli_real_escape_string($conn, $_POST['txtpass']);

    // Truy vấn đúng tên cột bạn đã có: ten_dang_nhap, mat_khau
    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$u' AND mat_khau = '$p'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Tạo Session lưu trữ thông tin
        $_SESSION['user'] = $row['ten_dang_nhap'];
        $_SESSION['user_id'] = $row['ma_nguoi_dung'];
        $_SESSION['vai_tro'] = $row['vai_tro']; // Lấy thêm vai trò để xác định Admin

        // Chuyển hướng về trang chủ
        header("Location: ../home_page/index.php");
        exit();
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không đúng!'); window.history.back();</script>";
    }
}
?>