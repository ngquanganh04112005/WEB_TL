<?php
session_start();
session_destroy(); // Xóa sạch phiên làm việc
header("Location: ../home_page/index.php"); // Quay về trang chủ
exit();
?>