<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../home_page/home.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">
    <title>Liên hệ - ChonGame</title>
    <style>
        .contact-page {
            background-color: var(--main-bg);
            padding: 50px 0;
            min-height: 60vh;
        }
        .contact-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            gap: 40px;
            padding: 20px;
        }
        .contact-info, .contact-form {
            background-color: var(--bg-card);
            padding: 40px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            flex: 1;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .contact-info h2, .contact-form h2 {
            color: var(--text-color);
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 22px;
            border-bottom: 2px solid var(--main-red);
            display: inline-block;
            padding-bottom: 10px;
        }
        .contact-info p {
            color: var(--main-text);
            line-height: 1.6;
            margin-bottom: 30px;
            font-size: 15px;
        }
        .contact-method {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            font-size: 15px;
            transition: transform 0.2s;
        }
        .contact-method:hover {
            transform: translateX(5px);
        }
        .contact-method i {
            width: 45px;
            height: 45px;
            background-color: rgba(230, 0, 35, 0.1);
            color: var(--main-red);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-right: 15px;
            font-size: 20px;
            border: 1px solid rgba(230, 0, 35, 0.2);
        }
        .contact-method span {
            color: var(--main-text);
            font-weight: 500;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            color: var(--text-color);
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 14px;
            background-color: var(--main-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            border-radius: 6px;
            outline: none;
            font-family: inherit;
            font-size: 15px;
            transition: all 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: var(--main-red);
            box-shadow: 0 0 5px rgba(230, 0, 35, 0.2);
        }
        .btn-submit {
            background-color: var(--main-red);
            color: white;
            border: none;
            padding: 15px 30px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            text-transform: uppercase;
            width: 100%;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: var(--hover-red);
        }
        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div id="header-placeholder"></div>
    <div id="sidebar-placeholder"></div>

    <div class="contact-page">
        <div class="contact-container">
            <div class="contact-info">
                <h2>Thông tin liên hệ</h2>
                <p>Nếu bạn có bất kỳ thắc mắc hay cần hỗ trợ, đừng ngần ngại liên hệ với chúng tôi qua các kênh dưới đây. Đội ngũ ChonGame luôn sẵn sàng hỗ trợ bạn một cách nhanh nhất.</p>
                
                <div class="contact-method">
                    <i class="fa-brands fa-facebook-f"></i>
                    <span>Facebook XXX.XXX</span>
                </div>
                <div class="contact-method">
                    <i class="fa-brands fa-instagram"></i>
                    <span>Instagram XXX.XXX</span>
                </div>
                <div class="contact-method">
                    <i class="fa-brands fa-tiktok"></i>
                    <span>TikTok XXX.XXX.XX</span>
                </div>
                <div class="contact-method">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Email XXX.XXX.XXX.XXX</span>
                </div>
                <div class="contact-method">
                    <i class="fa-brands fa-youtube"></i>
                    <span>Youtube XXX.XXX</span>
                </div>
            </div>

            <div class="contact-form">
                <h2>Gửi tin nhắn</h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email liên hệ</label>
                        <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung cần hỗ trợ</label>
                        <textarea id="message" name="message" rows="5" placeholder="Bạn cần ChonGame hỗ trợ gì..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Gửi Yêu Cầu</button>
                </form>
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

</body>

</html>