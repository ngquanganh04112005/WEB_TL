<?php
include '../pcs_buy/chongamedb.php';

if (isset($_POST['register'])) {
    $u = mysqli_real_escape_string($conn, $_POST['txtuser']);
    $e = mysqli_real_escape_string($conn, $_POST['txtemail']);
    $p = $_POST['txtpass']; // Chưa escape để kiểm tra Regex cho chính xác

    // 1. Kiểm tra độ dài 6-12 ký tự
    $length = strlen($p);
    
    // 2. Định nghĩa Regex: 
    // (?=.*[A-Z]) : Có ít nhất 1 chữ hoa
    // (?=.*[.!@#$%^&*]) : Có ít nhất 1 ký tự đặc biệt
    $pattern = '/^(?=.*[A-Z])(?=.*[.!@#$%^&*])';

    if ($length < 6 || $length > 12) {
        echo "<script>alert('Mật khẩu phải từ 6 đến 12 ký tự!'); window.history.back();</script>";
    } 
    elseif (!preg_match('/[A-Z]/', $p)) {
        echo "<script>alert('Mật khẩu phải có ít nhất 1 chữ cái viết hoa!'); window.history.back();</script>";
    }
    elseif (!preg_match('/[.!@#$%^&*]/', $p)) {
        echo "<script>alert('Mật khẩu phải có ít nhất 1 ký tự đặc biệt (. , @, #,...)!'); window.history.back();</script>";
    }
    else {
        // Mật khẩu hợp lệ -> Kiểm tra tên đăng nhập đã tồn tại chưa
        $check_sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$u'";
        $check_res = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_res) > 0) {
            echo "<script>alert('Tên đăng nhập đã tồn tại!'); window.history.back();</script>";
        } else {
            // Thực hiện thêm vào CSDL
            // Lưu ý: Trong thực tế nên dùng password_hash($p, PASSWORD_DEFAULT) để bảo mật
            $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, email, mat_khau) VALUES ('$u', '$e', '$p')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Đăng ký thành công! Hãy đăng nhập.'); window.location.href='login.php';</script>";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    }
}
?>