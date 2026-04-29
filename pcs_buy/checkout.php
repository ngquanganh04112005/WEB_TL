<?php
session_start();
include '../pcs_buy/chongamedb.php';

// 1. Lấy danh sách ID từ URL (xử lý cả trường hợp đơn lẻ 'id' và mảng 'ids')
$selected_ids = [];
if (isset($_GET['ids']) && is_array($_GET['ids'])) {
    $selected_ids = array_map('intval', $_GET['ids']);
} elseif (isset($_GET['id'])) {
    $selected_ids = [intval($_GET['id'])];
}

if (empty($selected_ids)) {
    die("<script>alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán!'); window.history.back();</script>");
}

// 2. Truy vấn lấy thông tin các sản phẩm đã chọn
$ids_string = implode(',', $selected_ids);
$sql = "SELECT * FROM san_pham WHERE ma_san_pham IN ($ids_string)";
$res = mysqli_query($conn, $sql);

$products = [];
$total_price = 0;
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $products[] = $row;
        $total_price += $row['gia_ban'];
    }
} else {
    die("Lỗi: Không tìm thấy sản phẩm trong hệ thống.");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán - ChonGame</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="stylesheet" href="../home_page/home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .order-list {
            margin-bottom: 20px;
            border-bottom: 1px solid #333;
            padding-bottom: 15px;
        }
        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
            background: rgba(255,255,255,0.05);
            padding: 10px;
            border-radius: 8px;
        }
        .order-item img {
            width: 80px;
            height: 45px;
            object-fit: cover;
            border-radius: 4px;
        }
        .order-item-info {
            flex: 1;
        }
        .order-item-info h4 {
            margin: 0;
            font-size: 14px;
            color: #fff;
        }
        .order-item-price {
            color: var(--main-red);
            font-weight: bold;
            font-size: 14px;
        }
        .checkout-total {
            text-align: right;
            font-size: 18px;
            margin: 20px 0;
            padding: 10px;
            background: rgba(230, 0, 35, 0.1);
            border-radius: 4px;
        }
        .checkout-total span {
            color: var(--main-red);
            font-weight: 800;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 20000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            overflow: auto;
        }

        .modal-content {
            background-color: var(--bg-card);
            margin: 5% auto;
            padding: 30px;
            border: 1px solid var(--main-red);
            width: 90%;
            max-width: 800px;
            border-radius: 12px;
            position: relative;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .modal-header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 15px;
        }

        .modal-body {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .qr-section {
            flex: 1;
            min-width: 250px;
            text-align: center;
        }

        .qr-section img {
            width: 100%;
            max-width: 300px;
            border-radius: 8px;
            border: 5px solid white;
        }

        .info-section {
            flex: 1;
            min-width: 250px;
        }

        .info-item {
            margin-bottom: 15px;
            padding: 12px;
            background: rgba(255,255,255,0.05);
            border-radius: 6px;
        }

        .info-item label {
            display: block;
            font-size: 12px;
            color: #888;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .info-item p {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            margin: 0;
        }

        .info-item .highlight {
            color: var(--main-red);
            font-size: 18px;
        }

        .modal-footer {
            margin-top: 30px;
            text-align: center;
        }
        .btn-confirm-payment {
            padding: 15px 40px;
            background: var(--main-red);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-confirm-payment:hover {
            background: var(--hover-red);
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-modal:hover {
            color: white;
        }

        @media (max-width: 600px) {
            .modal-body {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <?php include '../item_page/header.php'; ?>
    <?php include '../item_page/sidebar.php'; ?>

    <div class="checkout-wrapper">
        <div class="checkout-container">
            <h2>Xác nhận đơn hàng</h2>
            
            <div class="order-list">
                <?php foreach ($products as $product): ?>
                <div class="order-item">
                    <img src="<?php echo $product['anh_bia']; ?>" alt="Game">
                    <div class="order-item-info">
                        <h4><?php echo $product['ten_game']; ?></h4>
                        <span class="order-item-price"><?php echo number_format($product['gia_ban'], 0, ',', '.'); ?>đ</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="checkout-total">
                Tổng thanh toán: <span><?php echo number_format($total_price, 0, ',', '.'); ?>đ</span>
            </div>

            <form id="checkoutForm" action="checkout_xuly.php" method="POST" class="checkout-form">
                <input type="hidden" name="ma_san_pham" value="<?php echo $ids_string; ?>">
                <input type="hidden" name="tong_tien" value="<?php echo $total_price; ?>">

                <div class="input-group">
                    <label for="email">Email nhận mã code Game:</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email" required>
                </div>

                <div class="input-group">
                    <label for="phone">Số điện thoại liên hệ:</label>
                    <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                </div>

                <button type="button" onclick="showPaymentModal()" class="btn-submit-order">
                    TIẾN HÀNH THANH TOÁN
                </button>
                
                <p class="checkout-note">Hệ thống sẽ chuyển sang bước thanh toán bằng mã QR.</p>
            </form>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closePaymentModal()">&times;</span>
            <div class="modal-header">
                <h2>THÔNG TIN THANH TOÁN</h2>
                <p style="color: #888;">Quét mã QR hoặc chuyển khoản thủ công</p>
            </div>
            <div class="modal-body">
                <div class="qr-section">
                    <img src="../qr_code_NguyenQuangAnh.jpg" alt="Mã QR Thanh Toán">
                </div>
                <div class="info-section">
                    <div class="info-item">
                        <label>Ngân hàng</label>
                        <p>Vietcombank</p>
                    </div>
                    <div class="info-item">
                        <label>Chủ tài khoản</label>
                        <p>Nguyễn Quang Anh</p>
                    </div>
                    <div class="info-item">
                        <label>Số tài khoản</label>
                        <p class="highlight">9348694005</p>
                    </div>
                    <div class="info-item">
                        <label>Số tiền</label>
                        <p class="highlight"><?php echo number_format($total_price, 0, ',', '.'); ?>đ</p>
                    </div>
                    <div class="info-item">
                        <label>Nội dung chuyển khoản</label>
                        <?php 
                            $order_id = strtoupper(substr(md5(time()), 0, 8)); 
                            $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'KHACH';
                            $transfer_msg = $user_name . " " . $order_id;
                        ?>
                        <p id="transferMsg" style="color: #00ff00; letter-spacing: 1px;"><?php echo $transfer_msg; ?></p>
                        <input type="hidden" name="order_msg" form="checkoutForm" value="<?php echo $transfer_msg; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="confirmPayment()" class="btn-confirm-payment">
                    XÁC NHẬN ĐÃ THANH TOÁN
                </button>
                <p style="font-size: 12px; color: #888; margin-top: 10px;">
                    Sau khi bấm xác nhận, hệ thống sẽ kiểm tra và xử lý đơn hàng của bạn.
                </p>
            </div>
        </div>
    </div>

    <script>
        function showPaymentModal() {
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            
            if (!email || !phone) {
                alert('Vui lòng điền đầy đủ thông tin Email và Số điện thoại!');
                return;
            }
            
            document.getElementById('paymentModal').style.display = 'block';
            document.body.style.overflow = 'hidden'; // Chặn scroll khi mở modal
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function confirmPayment() {
            document.getElementById('checkoutForm').submit();
        }

        // Đóng modal khi click ra ngoài
        window.onclick = function(event) {
            const modal = document.getElementById('paymentModal');
            if (event.target == modal) {
                closePaymentModal();
            }
        }
    </script>

    <?php include '../item_page/footer.php'; ?>
</body>
</html>