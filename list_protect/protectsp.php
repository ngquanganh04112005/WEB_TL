<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../home_page/home.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="protectsp.css">
    <title>Chính sách đổi trả - ChonGame</title>

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
            <h1>Chính sách đổi trả</h1>
        </div>
        <div class="container">
            <div class="policy-grid">
                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-rotate-left"></i>
                        </div>
                        <h2 class="policy-title">Chính sách đổi trả Tài Khoản Steam Offline</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 12/07/2025</p>
                    <div class="policy-excerpt">
                        Khi mua tài khoản Steam Offline shop sẽ đảm bảo bạn có thể chơi game đã mua Vĩnh Viễn (không
                        giới hạn thời gian). Shop...
                        <div class="full-text">
                            <p>Hỗ trợ đổi mới tài khoản nếu gặp sự cố không thể khắc phục.</p>
                            <p>Quy trình đổi trả nhanh chóng trong vòng 24h.</p>
                            <p>Đảm bảo quyền lợi khách hàng tối đa.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>

                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h2 class="policy-title">Chính sách đổi trả Steam Key Chính Hãng</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 12/07/2025</p>
                    <div class="policy-excerpt">
                        Steam Key phân phối bởi ChonGame có xuất xứ từ nhà phân phối chính thức (được ủy quyền bởi các
                        nhà phát triển game).
                        <div class="full-text">
                            <p>Hoàn tiền 100% nếu key không thể kích hoạt do lỗi kỹ thuật.</p>
                            <p>Cam kết key chính thống từ các nền tảng lớn.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>

                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h2 class="policy-title">Chính sách đổi trả với Tài Khoản Steam + Mail</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 06/04/2025</p>
                    <div class="policy-excerpt">
                        Tài khoản Steam sẵn game là tài khoản Steam đã qua sử dụng, có sẵn các game bản quyền được mua
                        trước đó.
                        <div class="full-text">
                            <p>Đổi mới sản phẩm tương đương nếu có lỗi phát sinh từ hệ thống.</p>
                            <p>Bảo mật thông tin đổi trả tuyệt đối cho khách hàng.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>

                <div class="policy-item">
                    <div class="policy-header">
                        <div class="policy-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h2 class="policy-title">Chính sách đổi trả Tài Khoản Steam Online</h2>
                    </div>
                    <p class="policy-date"><i class="fa-regular fa-calendar-days"></i> 11/11/2024</p>
                    <div class="policy-excerpt">
                        ChonGame – đơn vị cung cấp tài khoản Steam Online uy tín, xin gửi tới quý khách hàng chính
                        sách bảo hành toàn diện.
                        <div class="full-text">
                            <p>Hỗ trợ đổi gói sản phẩm nếu khách hàng có nhu cầu nâng cấp.</p>
                            <p>Tư vấn giải pháp thay thế phù hợp nhất.</p>
                        </div>
                    </div>
                    <div class="policy-footer">
                        <button class="read-more-btn">XEM THÊM</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer-placeholder"></div>


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

    <script src="../home_page/home.js"></script>
    <script src="protectsp.js"></script>

</body>

</html>