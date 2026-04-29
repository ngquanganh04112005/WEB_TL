<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../home_page/home.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <title>Chính sách bảo hành - ChonGame</title>
    <link rel="stylesheet" href="protectuser.css">

    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">
</head>

<body>
    <div id="header-placeholder"></div>
    <div id="sidebar-placeholder"></div>

    <div class="container0">
        <div class="title-section">
            <h1>Chính sách bảo hành</h1>
        </div>
        <div class="container">
            <div class="policy-grid">
                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-gamepad"></i>
                        </div>
                        <h2 class="policy-title">Chính sách bảo hành Tài Khoản Steam Offline</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 12/07/2025</p>
                    <div class="policy-excerpt">
                        Khi mua tài khoản Steam Offline shop sẽ đảm bảo bạn có thể chơi game đã mua Vĩnh Viễn (không
                        giới hạn thời gian). Shop...
                        <div class="full-text">
                            <p>Bảo hành 1 đổi 1 nếu lỗi từ phía nhà phát hành.</p>
                            <p>Hỗ trợ cài đặt từ xa qua Ultraview.</p>
                            <p>Đảm bảo truy cập chơi game trọn đời.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>

                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <h2 class="policy-title">Chính sách bảo hành Steam Key Chính Hãng</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 12/07/2025</p>
                    <div class="policy-excerpt">
                        Steam Key phân phối bởi ChonGame có xuất xứ từ nhà phân phối chính thức (được ủy quyền bởi các
                        nhà phát triển game).
                        <div class="full-text">
                            <p>Key chính hãng 100%, bảo hành vĩnh viễn theo tài khoản.</p>
                            <p>Kích hoạt trực tiếp trên Store chính thức.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>

                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                        <h2 class="policy-title">Chính sách bảo hành với Tài Khoản Steam + Mail</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 06/04/2025</p>
                    <div class="policy-excerpt">
                        Tài khoản Steam sẵn game là tài khoản Steam đã qua sử dụng, có sẵn các game bản quyền được mua
                        trước đó.
                        <div class="full-text">
                            <p>Bàn giao toàn bộ thông tin gốc bao gồm Email.</p>
                            <p>Hỗ trợ thay đổi thông tin bảo mật 100%.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>

                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <h2 class="policy-title">Chính sách Bảo Hành Tài Khoản Steam Online</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 11/11/2024</p>
                    <div class="policy-excerpt">
                        ChonGame – đơn vị cung cấp tài khoản Steam Online uy tín, xin gửi tới quý khách hàng chính
                        sách bảo hành toàn diện.
                        <div class="full-text">
                            <p>Gia hạn trực tiếp trên tài khoản cá nhân của khách hàng.</p>
                            <p>Hỗ trợ kỹ thuật 24/7 trong suốt quá trình sử dụng.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Hàm dùng để load file HTML vào một ID cụ thể
        function loadComponent(id, file) {
            fetch(file)
                .then(response => {
                    if (response.ok) return response.text();
                    throw new Error('Không tìm thấy file: ' + file);
                })
                .then(data => {
                    document.getElementById(id).innerHTML = data;
                })
                .catch(error => console.error(error));
        }

        // Gọi nạp dữ liệu
        loadComponent('header-placeholder', '../item_page/header.php');
        loadComponent('footer-placeholder', '../item_page/footer.php');
        loadComponent('sidebar-placeholder', '../item_page/sidebar.php');
    </script>

    <div id="footer-placeholder"></div>
    <script src="protectuser.js"></script>
    <script src="../home_page/home.js"></script>
</body>

</html>