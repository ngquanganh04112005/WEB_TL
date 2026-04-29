<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "chongame_db"; // Tên database bạn đã tạo

$conn = mysqli_connect($host, $user, $pass, $dbname);

// Kiểm tra nếu kết nối lỗi
if (!$conn) {
    die("Kết nối database thất bại: " . mysqli_connect_error());
}

// Giúp hiển thị tiếng Việt không bị lỗi font
mysqli_set_charset($conn, "utf8mb4");
?>