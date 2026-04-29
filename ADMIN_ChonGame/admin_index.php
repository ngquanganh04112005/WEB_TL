<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

// Thống kê số lượng người dùng
$sql_users = "SELECT COUNT(*) as total FROM nguoi_dung";
$result_users = mysqli_query($conn, $sql_users);
$total_users = mysqli_fetch_assoc($result_users)['total'];

// Thống kê số lượng sản phẩm
$sql_products = "SELECT COUNT(*) as total FROM san_pham";
$result_products = mysqli_query($conn, $sql_products);
$total_products = mysqli_fetch_assoc($result_products)['total'];

// Thống kê số lượng hàng trong kho (số key/tài khoản còn lại)
$sql_inventory = "SELECT COUNT(*) as total FROM kho_hang WHERE trang_thai = 'Con Hang'";
$result_inventory = mysqli_query($conn, $sql_inventory);
$total_inventory = mysqli_fetch_assoc($result_inventory)['total'];

include 'admin_header.php';
?>

<div class="dashboard-cards fade-in">
    <div class="card">
        <div class="card-icon">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="card-info">
            <h3>Tổng Người Dùng</h3>
            <div class="number"><?php echo number_format($total_users); ?></div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-icon">
            <i class="fa-solid fa-gamepad"></i>
        </div>
        <div class="card-info">
            <h3>Sản Phẩm</h3>
            <div class="number"><?php echo number_format($total_products); ?></div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-icon">
            <i class="fa-solid fa-key"></i>
        </div>
        <div class="card-info">
            <h3>Key/Tài khoản trong kho</h3>
            <div class="number"><?php echo number_format($total_inventory); ?></div>
        </div>
    </div>
</div>

<div class="table-container fade-in">
    <div class="table-header">
        <h2>Hoạt động gần đây (Người dùng mới)</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Đăng Nhập</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_recent_users = "SELECT * FROM nguoi_dung ORDER BY ma_nguoi_dung DESC LIMIT 5";
            $result_recent_users = mysqli_query($conn, $sql_recent_users);
            
            if(mysqli_num_rows($result_recent_users) > 0) {
                while($row = mysqli_fetch_assoc($result_recent_users)) {
                    echo "<tr>";
                    echo "<td>#".$row['ma_nguoi_dung']."</td>";
                    echo "<td>".$row['ten_dang_nhap']."</td>";
                    echo "<td>".($row['email'] ? $row['email'] : 'Chưa cập nhật')."</td>";
                    echo "<td>".date('d/m/Y', strtotime($row['ngay_tao']))."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'admin_footer.php'; ?>
