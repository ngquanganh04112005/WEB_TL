<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - ChonGame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../home_page/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">

    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">
</head>

<body>

    <div id="header-placeholder"></div>
    <div id="sidebar-placeholder"></div>

    <div class="container-page-login">
        <div class="page-login">
            <h2>ĐĂNG NHẬP</h2>
            
            <form action="xuly_login.php" method="POST">
                
                <div class="input-group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="txtuser" placeholder="Tên đăng nhập" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="txtpass" placeholder="Mật khẩu" required>
                </div>

                <div class="form-options">
                    <label><input type="checkbox" name="remember"> Ghi nhớ</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>

                <button type="submit" name="login" class="btn-login">ĐĂNG NHẬP</button>

                <p class="register-link">Chưa có tài khoản? <a href="./resignter.php">Đăng ký ngay</a></p>
            </form>
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