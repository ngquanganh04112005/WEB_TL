<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>ChonGame</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="icon" type="image/x-icon" href="../logo/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-192x192.png">
    <link rel="icon" type="image/x-icon" href="../logo/android-chrome-512x512.png">
    <link rel="icon" type="image/x-icon" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="../logo/favicon-32x32.png">

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <?php include '../item_page/header.php'; ?>
        <?php include '../item_page/sidebar.php'; ?>
        <?php include '../item_page/slidegame.php'; ?>

        <div class="container-game">
            <?php include '../pcs_buy/chongamedb.php'; ?>

            <div class="game">
                <h1 id="game-hot">GAME ĐANG HOT</h1>
                
                <?php
                // Lấy tối đa 8 game có đánh dấu là hot
                $sql_hot = "SELECT * FROM san_pham WHERE is_hot = 1 LIMIT 8";
                $result_hot = mysqli_query($conn, $sql_hot);

                if (mysqli_num_rows($result_hot) > 0) {
                    while ($row = mysqli_fetch_assoc($result_hot)) {
                    ?>
                        <div class="game-card">
                            <a href="../pcs_buy/detail.php?id=<?php echo $row['ma_san_pham']; ?>">
                                <img src="<?php echo $row['anh_bia']; ?>" alt="<?php echo $row['ten_game']; ?>">
                            </a>
                            <div class="game-if">
                                <p>
                                    <?php echo $row['ten_game']; ?>
                                </p>
                            </div>
                            <div class="game-price">
                                <p>Giá từ: <?php echo number_format($row['gia_ban'], 0, ',', '.'); ?>đ</p>
                            </div>
                        </div>
                    <?php 
                    }
                } else {
                    echo "<p style='grid-column: 1/-1;'>Đang cập nhật danh sách game hot...</p>";
                }
                ?>
            </div>

            <div class="game">
                <h1 id="steam-key">STEAM KEY CHÍNH HÃNG</h1>
                <?php
                $result1 = mysqli_query($conn, "SELECT * FROM san_pham WHERE ma_danh_muc = 1");
                while ($row = mysqli_fetch_assoc($result1)): ?>
                    <div class="game-card">
                        <a href="../pcs_buy/detail.php?id=<?php echo $row['ma_san_pham']; ?>">
                            <img src="<?php echo $row['anh_bia']; ?>" alt="">
                        </a>
                        <div class="game-if">
                            <p><?php echo $row['ten_game']; ?> – <?php echo $row['mo_ta']; ?></p>
                        </div>
                        <div class="game-price">
                            <p>Giá từ: <?php echo number_format($row['gia_ban'], 0, ',', '.'); ?>đ</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="game">
                <h1 id="account-mail">TÀI KHOẢN STEAM MỚI VÀ MAIL</h1>
                <?php
                $result2 = mysqli_query($conn, "SELECT * FROM san_pham WHERE ma_danh_muc = 4");
                while ($row = mysqli_fetch_assoc($result2)): ?>
                    <div class="game-card">
                        <a href="../pcs_buy/detail.php?id=<?php echo $row['ma_san_pham']; ?>">
                            <img src="<?php echo $row['anh_bia']; ?>" alt="">
                        </a>
                        <div class="game-if">
                            <p><?php echo $row['ten_game']; ?> – <?php echo $row['mo_ta']; ?></p>
                        </div>
                        <div class="game-price">
                            <p>Giá từ: <?php echo number_format($row['gia_ban'], 0, ',', '.'); ?>đ</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="game">
                <h1 id="account-off">TÀI KHOẢN STEAM OFFLINE</h1>
                <?php
                $result3 = mysqli_query($conn, "SELECT * FROM san_pham WHERE ma_danh_muc = 2");
                while ($row = mysqli_fetch_assoc($result3)): ?>
                    <div class="game-card">
                        <a href="../pcs_buy/detail.php?id=<?php echo $row['ma_san_pham']; ?>">
                            <img src="<?php echo $row['anh_bia']; ?>" alt="">
                        </a>
                        <div class="game-if">
                            <p><?php echo $row['ten_game']; ?> – <?php echo $row['mo_ta']; ?></p>
                        </div>
                        <div class="game-price">
                            <p>Giá từ: <?php echo number_format($row['gia_ban'], 0, ',', '.'); ?>đ</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="game">
                <h1 id="account-on">TÀI KHOẢN STEAM ONLINE</h1>
                <?php
                $result4 = mysqli_query($conn, "SELECT * FROM san_pham WHERE ma_danh_muc = 3");
                while ($row = mysqli_fetch_assoc($result4)): ?>
                    <div class="game-card">
                        <a href="../pcs_buy/detail.php?id=<?php echo $row['ma_san_pham']; ?>">
                            <img src="<?php echo $row['anh_bia']; ?>" alt="">
                        </a>
                        <div class="game-if">
                            <p><?php echo $row['ten_game']; ?> – <?php echo $row['mo_ta']; ?></p>
                        </div>
                        <div class="game-price">
                            <p>Giá từ: <?php echo number_format($row['gia_ban'], 0, ',', '.'); ?>đ</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <?php include '../item_page/footer.php'; ?>
    </div>
    <script src="home.js"></script>
</body>
</html>