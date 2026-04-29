<?php
// 1. Kết nối cơ sở dữ liệu
include_once '../pcs_buy/chongamedb.php';

// 2. Lấy ID sản phẩm từ URL (ví dụ: detail.php?id=5)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Truy vấn lấy thông tin sản phẩm
$sql = "SELECT * FROM san_pham WHERE ma_san_pham = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// Kiểm tra nếu sản phẩm không tồn tại
if (!$product) {
    echo "<script>alert('Sản phẩm không tồn tại!'); window.location.href='../home_page/index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['ten_game']; ?> - ChonGame</title>
    
    <link rel="stylesheet" href="../home_page/home.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="detail.css">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include '../item_page/header.php'; ?>

        <div class="main-layout">
            
            <aside class="sidebar-wrapper">
                <?php include '../item_page/sidebar.php'; ?>
            </aside>

            <main class="content-wrapper">
                
                <div class="detail-container">
                    <div class="detail-left">
                        <img src="<?php echo $product['anh_bia']; ?>" alt="<?php echo $product['ten_game']; ?>">
                    </div>

                    <div class="detail-right">
                        <nav class="breadcrumb">Trang chủ » Game Bản Quyền » <?php echo $product['ten_game']; ?></nav>
                        
                        <h1 class="product-title"><?php echo $product['ten_game']; ?></h1>
                        
                        <div class="price-detail">
                            Giá từ: <?php echo number_format($product['gia_ban'], 0, ',', '.'); ?>đ
                        </div>

                        <div class="product-info-box">
                            <ul>
                                <li>Tài khoản Steam có sẵn game<strong>:<?php echo $product['ten_game']; ?></strong></li>
                                <li>Đây là Tài Khoản Steam Offline(ngoại tuyến)</li>
                                <li>Đảm bảo có lượt kích hoạt <strong> DENUVO</strong> chơi luôn</li>
                                <li>Lưu save game riêng trên máy tính của bạn</li>
                                <li>Bảo hành trọn đời sản phẩm</li>
                            </ul>
                        </div>

                        <div class="btn-group">
                        <?php 
                        // 1. Link Mua ngay (nhảy thẳng đến trang thanh toán 1 sản phẩm)
                        $target_buy = isset($_SESSION['user']) ? "checkout.php?id=".$id : "../login_log_profile/login.php?error=nologin";

                        // 2. Link Thêm vào giỏ (chạy file xử lý rồi quay lại trang hiện tại)
                        $target_cart = isset($_SESSION['user']) ? "../item_page/cart_process.php?add=".$id : "../login_log_profile/login.php?error=nologin"; 
                        ?>

                            <a href="<?php echo $target_buy; ?>" class="btn-buy">
                                MUA NGAY <br>
                                <span style="font-size: 12px; font-weight: normal;">Giao dịch tự động 24/7</span>
                            </a>
                            <a href="<?php echo $target_cart; ?>" class="btn-cart">
                                <i class="fa-solid fa-cart-shopping"></i> THÊM VÀO GIỎ
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    <?php include '../item_page/footer.php'; ?>

</body>
</html>