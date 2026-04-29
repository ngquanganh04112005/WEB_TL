<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

include 'admin_header.php';
?>

<div class="table-container fade-in">
    <div class="table-header">
        <h2>Quản lý Sản Phẩm</h2>
        <a href="admin_product_add.php" class="btn-primary"><i class="fa-solid fa-plus"></i> Thêm Sản Phẩm Mới</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên Game</th>
                <th>Thể Loại</th>
                <th>Giá Bán</th>
                <th>Danh Mục</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT sp.*, dm.ten_danh_muc FROM san_pham sp LEFT JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc ORDER BY sp.ma_san_pham DESC";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>#".$row['ma_san_pham']."</td>";
                    echo "<td><img src='".$row['anh_bia']."' alt='".$row['ten_game']."'></td>";
                    echo "<td>".$row['ten_game']."</td>";
                    echo "<td>".($row['the_loai'] ? $row['the_loai'] : '-')."</td>";
                    echo "<td>".number_format($row['gia_ban'], 0, ',', '.')." VNĐ</td>";
                    echo "<td>".($row['ten_danh_muc'] ? $row['ten_danh_muc'] : '-')."</td>";
                    
                    echo "<td class='action-btns'>";
                    echo "<a href='admin_product_edit.php?id=".$row['ma_san_pham']."' class='btn-edit'><i class='fa-solid fa-pen'></i></a>";
                    echo "<a href='admin_product_delete.php?id=".$row['ma_san_pham']."' class='btn-delete' onclick=\"return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');\"><i class='fa-solid fa-trash'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Không có sản phẩm nào</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'admin_footer.php'; ?>
