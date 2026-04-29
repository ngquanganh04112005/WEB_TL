<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

include 'admin_header.php';
?>

<div class="table-container fade-in">
    <div class="table-header">
        <h2>Quản lý Kho Hàng (Số lượng)</h2>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Ảnh</th>
                <th>Tên Game</th>
                <th>Số Lượng Tồn Kho</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Lấy danh sách sản phẩm và đếm số lượng hàng trong kho có trạng thái 'Con Hang'
            $sql = "SELECT sp.ma_san_pham, sp.ten_game, sp.anh_bia, 
                    (SELECT COUNT(*) FROM kho_hang kh WHERE kh.ma_san_pham = sp.ma_san_pham AND kh.trang_thai = 'Con Hang') as so_luong
                    FROM san_pham sp 
                    ORDER BY so_luong ASC"; // Ưu tiên hiển thị sản phẩm sắp hết hàng
            
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $qty = $row['so_luong'];
                    
                    if ($qty == 0) {
                        $statusBadge = "<span class='badge badge-danger'>Hết hàng</span>";
                    } elseif ($qty <= 5) {
                        $statusBadge = "<span class='badge badge-warning'>Sắp hết</span>";
                    } else {
                        $statusBadge = "<span class='badge badge-success'>Còn hàng</span>";
                    }
                    
                    echo "<tr>";
                    echo "<td>#".$row['ma_san_pham']."</td>";
                    echo "<td><img src='".$row['anh_bia']."' alt='".$row['ten_game']."' style='width: 40px; height: 40px; object-fit: cover;'></td>";
                    echo "<td>".$row['ten_game']."</td>";
                    echo "<td style='font-size: 18px; font-weight: bold;'>".$qty."</td>";
                    echo "<td>".$statusBadge."</td>";
                    
                    echo "<td class='action-btns'>";
                    echo "<a href='admin_inventory_add.php?id=".$row['ma_san_pham']."' class='btn-primary' style='font-size: 12px; padding: 6px 10px;'><i class='fa-solid fa-plus'></i> Nhập hàng</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có sản phẩm nào để quản lý kho</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'admin_footer.php'; ?>
