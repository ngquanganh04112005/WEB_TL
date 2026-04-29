<?php
session_start();
include '../pcs_buy/chongamedb.php'; // Kết nối database

// 1. Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// 2. Truy vấn thông tin người dùng
$user_query = mysqli_query($conn, "SELECT * FROM nguoi_dung WHERE ma_nguoi_dung = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

// 3. Truy vấn danh sách game đã mua (Dựa trên cấu trúc bảng don_hang của bạn)
$sql_bought = "SELECT dh.ngay_mua, sp.ten_game, sp.anh_bia, sp.ma_san_pham 
               FROM don_hang dh
               JOIN san_pham sp ON dh.ma_san_pham = sp.ma_san_pham
               WHERE dh.ma_nguoi_dung = '$user_id'
               ORDER BY dh.ngay_mua DESC";
$res_bought = mysqli_query($conn, $sql_bought);
$count_bought = mysqli_num_rows($res_bought);

// 4. Đếm giỏ hàng hiện tại
$count_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hồ sơ của bạn - ChonGame.com</title>
    <link rel="stylesheet" href="../home_page/home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-color: #151515; color: #f0f0f0;">

    <?php include '../item_page/header.php'; ?>
    <?php include '../item_page/sidebar.php'; ?>

    <div class="profile-wrapper">
        <aside class="profile-sidebar">
            <i class="fa-solid fa-circle-user"></i>
            <h2 style="margin-bottom: 5px; font-size: 1.2rem;"><?php echo strtoupper($user_data['ten_dang_nhap']); ?></h2>
            <p style="color: #bbb; font-size: 14px;"><?php echo $user_data['email']; ?></p>
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #333;">
            <p style="text-align: left; font-size: 14px; color: #bbb;"><i class="fa fa-phone" style="font-size: 14px; color: #e60023;"></i> SĐT: <?php echo $user_data['so_dien_thoai'] ?? 'Chưa cập nhật'; ?></p>
            <a href="../login_log_profile/logout.php" style="display: block; margin-top: 20px; color: #ff2d55; text-decoration: none; font-weight: bold;">ĐĂNG XUẤT</a>
        </aside>

        <main class="profile-main">
            <h2 style="margin-top: 0;">Trung tâm cá nhân</h2>
            
            <div class="stats-grid">
                <div class="stat-card bought">
                    <p>Game đã sở hữu</p>
                    <h3><?php echo $count_bought; ?></h3>
                </div>
                <div class="stat-card incart">
                    <p>Đang chờ trong giỏ</p>
                    <h3><?php echo $count_cart; ?></h3>
                </div>
            </div>

            <h3 style="border-left: 4px solid #ff2d55; padding-left: 10px;">LỊCH SỬ MUA HÀNG</h3>
            
            <div class="bought-list">
                <?php if($count_bought > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($res_bought)): ?>
                        <div class="bought-item">
                            <img src="<?php echo $row['anh_bia']; ?>" alt="Game">
                            <div class="bought-info">
                                <h4><?php echo $row['ten_game']; ?></h4>
                                <p class="bought-date">Mua ngày: <?php echo date("d/m/Y H:i", strtotime($row['ngay_mua'])); ?></p>
                                <a href="../pcs_buy/detail.php?id=<?php echo $row['ma_san_pham']; ?>" style="font-size: 12px; color: red; text-decoration: none;">Xem lại trang sản phẩm</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div style="text-align: center; padding: 40px; color: #999;">
                        <i class="fa-solid fa-box-open" style="font-size: 40px;"></i>
                        <p>Bạn chưa mua sản phẩm nào trên hệ thống.</p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?php include '../item_page/footer.php'; ?>

</body>
</html>
