<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - ChonGame</title>
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

    <?php include '../item_page/header.php'; ?>
    <?php include '../item_page/sidebar.php'; ?>

    <div class="container-page-login">
        <div class="page-login">
            <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
            
            <form action="xuly_resignter.php" method="POST">
                <div class="input-group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="txtuser" placeholder="Tên đăng nhập" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="txtemail" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="txtpass" placeholder="Mật khẩu (6-12 ký tự, 1 chữ hoa, 1 ký tự đặc biệt)" required>
                </div>

                <button type="submit" name="register" class="btn-login">ĐĂNG KÝ</button>

                <p class="register-link">Đã có tài khoản? <a href="./login.php">Đăng nhập ngay</a></p>
            </form>
        </div>
    </div>

    <?php include '../item_page/footer.php'; ?>



    <script src="../home_page/home.js"></script>
</body>

</html>