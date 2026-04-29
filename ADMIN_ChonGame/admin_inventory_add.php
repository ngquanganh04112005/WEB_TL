<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

$error = '';
$success = '';

if (!isset($_GET['id']) && !isset($_POST['ma_san_pham'])) {
    header("Location: admin_inventory.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : (int)$_POST['ma_san_pham'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $thong_tin = $_POST['thong_tin_ban_giao'];
    
    // Nếu nhập nhiều key, mỗi dòng 1 key
    $lines = explode("\n", str_replace("\r", "", $thong_tin));
    $added = 0;
    
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line)) {
            $line_escaped = mysqli_real_escape_string($conn, $line);
            $sql_insert = "INSERT INTO kho_hang (ma_san_pham, thong_tin_ban_giao, trang_thai) VALUES ($id, '$line_escaped', 'Con Hang')";
            if(mysqli_query($conn, $sql_insert)) {
                $added++;
            }
        }
    }
    
    if ($added > 0) {
        $success = "Đã nhập thêm $added tài khoản/key vào kho!";
    } else {
        $error = "Chưa có thông tin nào được nhập hoặc có lỗi xảy ra.";
    }
}

// Lấy thông tin sản phẩm
$sql = "SELECT ten_game, anh_bia FROM san_pham WHERE ma_san_pham = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Không tìm thấy sản phẩm");
}

include 'admin_header.php';
?>

<div class="form-container fade-in">
    <h2>Nhập Hàng: <?php echo htmlspecialchars($product['ten_game']); ?></h2>
    
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
        <img src="<?php echo htmlspecialchars($product['anh_bia']); ?>" alt="Bìa" style="width: 100px; border-radius: 8px;">
        <p style="color: var(--text-muted);">
            Thêm thông tin bàn giao cho khách hàng (ví dụ: CD Key, hoặc thông tin Tài khoản + Mật khẩu).<br>
            <strong>Mẹo:</strong> Nếu bạn có nhiều key, bạn có thể nhập mỗi key trên 1 dòng để thêm nhanh nhiều sản phẩm cùng lúc.
        </p>
    </div>
    
    <?php if($error): ?>
        <div style="background: rgba(239, 68, 68, 0.1); color: var(--danger); padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <?php if($success): ?>
        <div style="background: rgba(16, 185, 129, 0.1); color: var(--success); padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="admin_inventory_add.php?id=<?php echo $id; ?>">
        <input type="hidden" name="ma_san_pham" value="<?php echo $id; ?>">
        
        <div class="form-group">
            <label>Thông tin bàn giao (Mỗi key/tài khoản 1 dòng) <span style="color:red">*</span></label>
            <textarea name="thong_tin_ban_giao" class="form-control" style="min-height: 200px;" placeholder="Ví dụ:
AAAA-BBBB-CCCC
DDDD-EEEE-FFFF
Hoặc:
TK: user1 | MK: pass1
TK: user2 | MK: pass2" required></textarea>
        </div>
        
        <div class="form-group" style="margin-top: 30px;">
            <button type="submit" class="btn-primary"><i class="fa-solid fa-download"></i> Lưu Vào Kho</button>
            <a href="admin_inventory.php" style="margin-left: 15px; color: var(--text-muted); text-decoration: none;">Quay lại Kho</a>
        </div>
    </form>
</div>

<?php include 'admin_footer.php'; ?>
