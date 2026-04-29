<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Quản Trị - ChonGame</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #050505;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: #151515;
            padding: 40px;
            border-radius: 12px;
            border: 1px solid #e60023;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-box h2 {
            color: #f8fafc;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .login-box h2 span {
            color: #e60023;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        .input-group input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            background-color: #050505;
            border: 1px solid #333;
            border-radius: 8px;
            color: #f8fafc;
            font-size: 15px;
            box-sizing: border-box;
        }
        .input-group input:focus {
            outline: none;
            border-color: #e60023;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #e60023, #ff3352);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .btn-login:hover {
            opacity: 0.9;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover {
            color: #f8fafc;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <img src="../logo/android-chrome-192x192.png" alt="Logo" style="width: 80px; margin-bottom: 20px;">
        <h2>CHONGAME <span>ADMIN</span></h2>
        
        <form action="xuly_admin_login.php" method="POST">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="txtuser" placeholder="Tên đăng nhập Admin" required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="txtpass" placeholder="Mật khẩu" required>
            </div>

            <button type="submit" name="login" class="btn-login">ĐĂNG NHẬP</button>

            <a href="../home_page/index.php" class="back-link"><i class="fa fa-arrow-left"></i> Trở về trang web</a>
        </form>
    </div>

</body>
</html>
