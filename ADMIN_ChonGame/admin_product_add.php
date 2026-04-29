<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_game = mysqli_real_escape_string($conn, $_POST['ten_game']);
    $the_loai = mysqli_real_escape_string($conn, $_POST['the_loai']);
    $gia_ban = (float)$_POST['gia_ban'];
    $ma_danh_muc = (int)$_POST['ma_danh_muc'];
    $anh_bia = mysqli_real_escape_string($conn, $_POST['anh_bia']);
    $mo_ta = mysqli_real_escape_string($conn, $_POST['mo_ta']);
    $is_hot = isset($_POST['is_hot']) ? 1 : 0;
    
    $sql = "INSERT INTO san_pham (ten_game, the_loai, mo_ta, anh_bia, gia_ban, ma_danh_muc, is_hot) 
            VALUES ('$ten_game', '$the_loai', '$mo_ta', '$anh_bia', $gia_ban, $ma_danh_muc, $is_hot)";
            
    if (mysqli_query($conn, $sql)) {
        $success = "Thêm sản phẩm thành công!";
    } else {
        $error = "Lỗi: " . mysqli_error($conn);
    }
}

include 'admin_header.php';
?>

<div class="form-container fade-in">
    <h2>Thêm Sản Phẩm Mới</h2>
    
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

    <form method="POST" action="admin_product_add.php">
        <div class="form-group">
            <label>Tên Game <span style="color:red">*</span></label>
            <input type="text" name="ten_game" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Thể Loại</label>
            <input type="text" name="the_loai" class="form-control" placeholder="VD: Action, Adventure">
        </div>
        
        <div class="form-group">
            <label>Giá Bán (VNĐ) <span style="color:red">*</span></label>
            <input type="number" name="gia_ban" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Link Ảnh Bìa <span style="color:red">*</span></label>
            <input type="text" name="anh_bia" class="form-control" placeholder="URL hình ảnh" required>
        </div>
        
        <div class="form-group">
            <label>Danh Mục <span style="color:red">*</span></label>
            <select name="ma_danh_muc" class="form-control" required>
                <?php
                $sql_dm = "SELECT * FROM danh_muc";
                $res_dm = mysqli_query($conn, $sql_dm);
                while($dm = mysqli_fetch_assoc($res_dm)) {
                    echo "<option value='".$dm['ma_danh_muc']."'>".$dm['ten_danh_muc']."</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Mô Tả</label>
            <textarea name="mo_ta" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                <input type="checkbox" name="is_hot" value="1" style="width: 20px; height: 20px;"> Sản phẩm nổi bật (Hot)
            </label>
        </div>
        
        <div class="form-group" style="margin-top: 30px;">
            <button type="submit" class="btn-primary">Lưu Sản Phẩm</button>
            <a href="admin_products.php" style="margin-left: 15px; color: var(--text-muted); text-decoration: none;">Hủy</a>
        </div>
    </form>
</div>

<?php include 'admin_footer.php'; ?>
