<?php
// 1. Khởi tạo session nếu chưa có (rất quan trọng để dùng giỏ hàng)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Xác định tên cookie giỏ hàng (theo user_id hoặc guest)
$user_suffix = isset($_SESSION['user_id']) ? 'user_' . $_SESSION['user_id'] : 'guest';
$cookie_name = 'cart_' . $user_suffix;

// Khôi phục giỏ hàng từ Cookie nếu Session trống (duy trì giỏ hàng riêng cho từng user)
if ((!isset($_SESSION['cart']) || empty($_SESSION['cart'])) && isset($_COOKIE[$cookie_name])) {
    $_SESSION['cart'] = json_decode($_COOKIE[$cookie_name], true);
}

// 2. Kết nối database - Dùng include_once để không bị lỗi trùng lặp nếu trang chính đã kết nối rồi
include_once '../pcs_buy/chongamedb.php'; 
?>
<div class="container-header0">
    <div class="container-header">
        <header class="header">
            <div class="logo">
                <a href="../home_page/index.php" style="text-decoration: none; color: inherit;">
                    <h1>ChonGame<span>.com</span></h1>
                </a>
            </div>

            <div class="search-box">
                <form action="../pcs_buy/detail.php" method="GET" style="display: flex; width: 100%;" id="search-form" autocomplete="off">
                    <input type="text" name="q" placeholder="Gõ để tìm kiếm..." id="search-input">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <!-- Dropdown gợi ý tìm kiếm -->
                <div class="search-suggestions" id="search-suggestions"></div>
            </div>

            <script>
            (function() {
                const input = document.getElementById('search-input');
                const suggestions = document.getElementById('search-suggestions');
                let debounceTimer;
                let activeIndex = -1;

                // Xác định đường dẫn tương đối đến thư mục item_page
                const scriptTags = document.querySelectorAll('script[src]');
                // Dùng đường dẫn tuyệt đối từ gốc web
                const basePath = '<?php echo dirname($_SERVER["PHP_SELF"]); ?>';
                const apiUrl = '/ChonGame/item_page/search_api.php';

                input.addEventListener('input', function() {
                    const query = this.value.trim();
                    clearTimeout(debounceTimer);
                    activeIndex = -1;

                    if (query.length < 1) {
                        suggestions.classList.remove('active');
                        suggestions.innerHTML = '';
                        return;
                    }

                    // Debounce 300ms để tránh gọi API liên tục
                    debounceTimer = setTimeout(() => {
                        fetch(apiUrl + '?q=' + encodeURIComponent(query))
                            .then(res => res.json())
                            .then(data => {
                                if (data.length === 0) {
                                    suggestions.innerHTML = '<div class="search-no-result"><i class="fa fa-search"></i> Không tìm thấy kết quả</div>';
                                    suggestions.classList.add('active');
                                    return;
                                }

                                let html = '';
                                data.forEach(game => {
                                    html += `
                                        <a href="/ChonGame/pcs_buy/detail.php?id=${game.id}" class="search-item">
                                            <img src="${game.image}" alt="${game.name}" class="search-item-img">
                                            <div class="search-item-info">
                                                <span class="search-item-name">${game.name}</span>
                                                <span class="search-item-price">${game.price}</span>
                                            </div>
                                        </a>
                                    `;
                                });
                                suggestions.innerHTML = html;
                                suggestions.classList.add('active');
                            })
                            .catch(() => {
                                suggestions.classList.remove('active');
                            });
                    }, 300);
                });

                // Điều hướng bằng phím mũi tên
                input.addEventListener('keydown', function(e) {
                    const items = suggestions.querySelectorAll('.search-item');
                    if (items.length === 0) return;

                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        activeIndex = Math.min(activeIndex + 1, items.length - 1);
                        updateActive(items);
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        activeIndex = Math.max(activeIndex - 1, 0);
                        updateActive(items);
                    } else if (e.key === 'Enter' && activeIndex >= 0) {
                        e.preventDefault();
                        items[activeIndex].click();
                    }
                });

                function updateActive(items) {
                    items.forEach((item, i) => {
                        item.classList.toggle('active', i === activeIndex);
                    });
                }

                // Ẩn dropdown khi click ra ngoài
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.search-box')) {
                        suggestions.classList.remove('active');
                    }
                });

                // Hiển thị lại khi focus vào input
                input.addEventListener('focus', function() {
                    if (suggestions.innerHTML.trim() !== '' && this.value.trim().length >= 1) {
                        suggestions.classList.add('active');
                    }
                });
            })();
            </script>

            <div class="header-right">
                <div class="social">
                    <a href="https://www.facebook.com/?locale=vi_VN" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/vi-VN/" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://mail.google.com/mail/u/0/?pli=1" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                    <a href="https://www.youtube.com/?app=desktop&hl=vi" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>

                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                ?>

                <?php if (isset($_SESSION['user'])): ?>
                    <div class="user-logged">
                        <a href="../login_log_profile/profile.php" class="login">
                            <i class="fa fa-user"></i> <?php echo strtoupper($_SESSION['user']); ?>
                        </a>
                        <a href="../login_log_profile/logout.php" title="Đăng xuất" style="color: var(--text-muted, #94a3b8);">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <a href="../login_log_profile/login.php" class="login">ĐĂNG NHẬP / ĐĂNG KÝ</a>
                <?php endif; ?>

                <div class="cart">
                    <div class="cart-icon-wrapper">
                        <i class="fa fa-bag-shopping"></i>
                        <?php 
                            // 1. Kiểm tra xem session cart có tồn tại và là mảng không
                            $count = (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
                            if($count > 0) echo "<span class='cart-badge'>$count</span>";
                        ?>
                    </div>
                    
                    <div class="cart-dropdown <?php echo isset($_GET['open_cart']) ? 'active' : ''; ?>">
                        <?php 
                        // 2. CHỈ CHẠY SQL KHI GIỎ HÀNG CÓ ÍT NHẤT 1 SẢN PHẨM
                        if ($count > 0): 
                            $ids = implode(',', array_map('intval', $_SESSION['cart'])); // Chuyển mảng thành chuỗi ID an toàn
                            $sql_cart = "SELECT * FROM san_pham WHERE ma_san_pham IN ($ids)";
                            $res_cart = mysqli_query($conn, $sql_cart);
                            
                            if ($res_cart): // Nếu câu lệnh SQL chạy thành công
                        ?>
                            <form action="../pcs_buy/checkout.php" method="GET">
                                <div class="cart-list">
                                    <?php 
                                    $total = 0;
                                    while($item = mysqli_fetch_assoc($res_cart)): 
                                        $total += $item['gia_ban'];
                                    ?>
                                    <div class="cart-item">
                                        <input type="checkbox" name="ids[]" value="<?php echo $item['ma_san_pham']; ?>" 
                                               data-price="<?php echo $item['gia_ban']; ?>" checked class="cart-checkbox">
                                        <img src="<?php echo $item['anh_bia']; ?>">
                                        <div class="item-info">
                                            <p class="item-name"><?php echo $item['ten_game']; ?></p>
                                            <span class="item-price"><?php echo number_format($item['gia_ban'], 0, ',', '.'); ?>đ</span>
                                        </div>
                                        <a href="../item_page/cart_process.php?remove=<?php echo $item['ma_san_pham']; ?>" class="remove-btn">&times;</a>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="cart-footer">
                                    <p>Tổng đã chọn: <strong id="cart-total-display"><?php echo number_format($total, 0, ',', '.'); ?>đ</strong></p>
                                    <button type="submit" class="btn-checkout-all">THANH TOÁN ĐÃ CHỌN</button>
                                </div>
                            </form>

                            <script>
                            document.querySelectorAll('.cart-checkbox').forEach(checkbox => {
                                checkbox.addEventListener('change', function() {
                                    let total = 0;
                                    document.querySelectorAll('.cart-checkbox:checked').forEach(cb => {
                                        total += parseInt(cb.getAttribute('data-price'));
                                    });
                                    document.getElementById('cart-total-display').innerText = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
                                });
                            });
                            </script>
                            <?php endif; ?>

                        <?php else: ?>
                            <div class="cart-empty">
                                <i class="fa fa-bag-shopping" style="font-size: 30px; color: #ccc;"></i>
                                <p>Bạn chưa có sản phẩm nào</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>