<?php
// API tìm kiếm game - Trả về JSON cho AJAX autocomplete
header('Content-Type: application/json; charset=utf-8');

// Kết nối database
include_once '../pcs_buy/chongamedb.php';

// Lấy từ khóa tìm kiếm
$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';

// Nếu từ khóa rỗng hoặc quá ngắn, trả về mảng trống
if (strlen($keyword) < 1) {
    echo json_encode([]);
    exit;
}

// Tìm kiếm game theo tên (LIKE %keyword%)
// Dùng prepared statement để tránh SQL injection
$search_term = "%{$keyword}%";
$stmt = mysqli_prepare($conn, "SELECT ma_san_pham, ten_game, anh_bia, gia_ban FROM san_pham WHERE ten_game LIKE ? ORDER BY ten_game ASC LIMIT 8");
mysqli_stmt_bind_param($stmt, "s", $search_term);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$games = [];
while ($row = mysqli_fetch_assoc($result)) {
    $games[] = [
        'id'    => $row['ma_san_pham'],
        'name'  => $row['ten_game'],
        'image' => $row['anh_bia'],
        'price' => number_format($row['gia_ban'], 0, ',', '.') . 'đ'
    ];
}

echo json_encode($games);
?>
