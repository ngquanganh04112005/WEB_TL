<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

$error = '';
$success = '';

if (!isset($_GET['id']) && !isset($_POST['ma_san_pham'])) {
    header("Location: admin_products.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : (int)$_POST['ma_san_pham'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_game = mysqli_real_escape_string($conn, $_POST['ten_game']);
    $the_loai = mysqli_real_escape_string($conn, $_POST['the_loai']);
    $gia_ban = (float)$_POST['gia_ban'];
    $ma_danh_muc = (int)$_POST['ma_danh_muc'];
    $anh_bia = mysqli_real_escape_string($conn, $_POST['anh_bia']);
    $mo_ta = mysqli_real_escape_string($conn, $_POST['mo_ta']);
    $is_hot = isset($_POST['is_hot']) ? 1 : 0;
    
    $sql_update = "UPDATE san_pham SET 
            ten_game = '$ten_game', 
            the_loai = '$the_loai', 
            mo_ta = '$mo_ta', 
            anh_bia = '$anh_bia', 
            gia_ban = $gia_ban, 
            ma_danh_muc = $ma_danh_muc, 
            is_hot = $is_hot 
            WHERE ma_san_pham = $id";
            
    if (mysqli_query($conn, $sql_update)) {
        $success = "Cập nhật sản phẩm thành công!";
    } else {
        $error = "Lỗi: " . mysqli_error($conn);
    }
}

// Fetch current data
$sql = "SELECT * FROM san_pham WHERE ma_san_pham = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Không tìm thấy sản phẩm");
}

include 'admin_header.php';
?>

<div class="form-container fade-in">
    <h2>Sửa Sản Phẩm: <?php echo htmlspecialchars($product['ten_game']); ?></h2>
    
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

    <form method="POST" action="admin_product_edit.php?id=<?php echo $id; ?>">
        <input type="hidden" name="ma_san_pham" value="<?php echo $id; ?>">
        
        <div class="form-group">
            <label>Tên Game <span style="color:red">*</span></label>
            <input type="text" name="ten_game" class="form-control" value="<?php echo htmlspecialchars($product['ten_game']); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Thể Loại</label>
            <input type="text" name="the_loai" class="form-control" value="<?php echo htmlspecialchars($product['the_loai']); ?>">
        </div>
        
        <div class="form-group">
            <label>Giá Bán (VNĐ) <span style="color:red">*</span></label>
            <input type="number" name="gia_ban" class="form-control" value="<?php echo $product['gia_ban']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Link Ảnh Bìa <span style="color:red">*</span></label>
            <input type="text" name="anh_bia" class="form-control" value="<?php echo htmlspecialchars($product['anh_bia']); ?>" required>
            <div style="margin-top:10px;">
                <img src="<?php echo htmlspecialchars($product['anh_bia']); ?>" width="150" style="border-radius:8px;">
            </div>
        </div>
        
        <div class="form-group">
            <label>Danh Mục <span style="color:red">*</span></label>
            <select name="ma_danh_muc" class="form-control" required>
                <?php
                $sql_dm = "SELECT * FROM danh_muc";
                $res_dm = mysqli_query($conn, $sql_dm);
                while($dm = mysqli_fetch_assoc($res_dm)) {
                    $selected = ($dm['ma_danh_muc'] == $product['ma_danh_muc']) ? "selected" : "";
                    echo "<option value='".$dm['ma_danh_muc']."' $selected>".$dm['ten_danh_muc']."</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Mô Tả</label>
            <textarea name="mo_ta" class="form-control"><?php echo htmlspecialchars($product['mo_ta']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                <input type="checkbox" name="is_hot" value="1" <?php echo ($product['is_hot'] == 1) ? 'checked' : ''; ?> style="width: 20px; height: 20px;"> Sản phẩm nổi bật (Hot)
            </label>
        </div>
        
        <div class="form-group" style="margin-top: 30px;">
            <button type="submit" class="btn-primary">Cập Nhật</button>
            <a href="admin_products.php" style="margin-left: 15px; color: var(--text-muted); text-decoration: none;">Quay lại danh sách</a>
        </div>
    </form>
</div>

<?php include 'admin_footer.php'; ?>
