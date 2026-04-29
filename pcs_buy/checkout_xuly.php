<?php
session_start();
include '../pcs_buy/chongamedb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Lấy dữ liệu từ form gửi sang
    $ma_nguoi_dung = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
    $ids_string = mysqli_real_escape_string($conn, $_POST['ma_san_pham']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $ma_kho = 1; // Giả định mã kho mặc định

    // Chuyển chuỗi ID thành mảng
    $ids_array = explode(',', $ids_string);
    $success_count = 0;

    // 2. Lặp qua từng sản phẩm để tạo đơn hàng
    foreach ($ids_array as $id) {
        $id = intval($id);
        if ($id > 0) {
            // Lấy giá của từng sản phẩm
            $res_price = mysqli_query($conn, "SELECT gia_ban FROM san_pham WHERE ma_san_pham = $id");
            $row_price = mysqli_fetch_assoc($res_price);
            $gia_ban = $row_price['gia_ban'];

            $sql_insert = "INSERT INTO don_hang (ma_nguoi_dung, ma_san_pham, ma_kho_hang, tong_tien, email, so_dien_thoai) 
                           VALUES ($ma_nguoi_dung, $id, $ma_kho, $gia_ban, '$email', '$phone')";
            
            if (mysqli_query($conn, $sql_insert)) {
                $success_count++;
                
                // 3. Xóa sản phẩm đã thanh toán khỏi giỏ hàng trong session
                if (isset($_SESSION['cart'])) {
                    if (($key = array_search($id, $_SESSION['cart'])) !== false) {
                        unset($_SESSION['cart'][$key]);
                    }
                }
            }
        }
    }

    // 4. Cập nhật lại Cookie giỏ hàng sau khi đã xóa các sản phẩm đã mua
    if (isset($_SESSION['cart'])) {
        $user_suffix = isset($_SESSION['user_id']) ? 'user_' . $_SESSION['user_id'] : 'guest';
        $cookie_name = 'cart_' . $user_suffix;
        setcookie($cookie_name, json_encode(array_values($_SESSION['cart'])), time() + (86400 * 30), "/");
    }

    if ($success_count > 0) {
        echo "<!DOCTYPE html>
        <html lang='vi'>
        <head>
            <meta charset='UTF-8'>
            <title>Đang xử lý đơn hàng</title>
            <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap' rel='stylesheet'>
            <style>
                body { background-color: #151515; color: white; font-family: 'Montserrat', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .container { text-align: center; padding: 40px; background: #1e1e1e; border-radius: 12px; border: 1px solid #e60023; max-width: 500px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
                .loader { border: 4px solid #333; border-top: 4px solid #e60023; border-radius: 50%; width: 60px; height: 60px; animation: spin 1s linear infinite; margin: 20px auto; }
                @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
                h1 { color: #e60023; margin-bottom: 15px; font-size: 24px; text-transform: uppercase; }
                p { color: #bbb; line-height: 1.6; font-size: 16px; }
                .btn-home { display: inline-block; margin-top: 30px; padding: 12px 30px; background: #e60023; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; transition: 0.3s; }
                .btn-home:hover { background: #ff3352; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='loader'></div>
                <h1>ĐƠN HÀNG ĐANG ĐƯỢC XỬ LÝ</h1>
                <p>Cảm ơn bạn đã tin tưởng ChonGame.<br>Thông tin tài khoản game sẽ được gửi đến email <strong>$email</strong> sau khi chúng tôi xác nhận giao dịch thành công.</p>
                <a href='../home_page/index.php' class='btn-home'>QUAY LẠI TRANG CHỦ</a>
            </div>
            <script>
                // Tự động chuyển hướng sau 3 giây
                setTimeout(function() {
                    window.location.href = '../home_page/index.php';
                }, 3000);
            </script>
        </body>
        </html>";
        exit();
    } else {
        echo "Lỗi hệ thống khi xử lý đơn hàng.";
    }
} else {
    header("Location: ../home_page/index.php");
    exit();
}
?>
