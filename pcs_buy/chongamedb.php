<?php
// Sử dụng biến môi trường (Environment Variables) cho Railway, hoặc mặc định cho local
$host = getenv('MYSQLHOST') ?: "localhost";
$user = getenv('MYSQLUSER') ?: "root";
$pass = getenv('MYSQLPASSWORD') ?: "";
$dbname = getenv('MYSQLDATABASE') ?: "chongame_db";
$port = getenv('MYSQLPORT') ?: "3306";

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

// Kiểm tra nếu kết nối lỗi
if (!$conn) {
    die("Kết nối database thất bại: " . mysqli_connect_error());
}

// Giúp hiển thị tiếng Việt không bị lỗi font
mysqli_set_charset($conn, "utf8mb4");
?>