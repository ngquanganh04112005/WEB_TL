<?php
require_once 'admin_check.php';
require_once '../pcs_buy/chongamedb.php';

include 'admin_header.php';
?>

<div class="table-container fade-in">
    <div class="table-header">
        <h2>Quản lý Người Dùng</h2>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Đăng Nhập</th>
                <th>Email</th>
                <th>Vai Trò</th>
                <th>Ngày Tạo</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM nguoi_dung ORDER BY ma_nguoi_dung DESC";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $isAdmin = isset($row['vai_tro']) && $row['vai_tro'] == 1;
                    $roleBadge = $isAdmin ? "<span class='badge badge-danger'>Admin</span>" : "<span class='badge badge-success'>User</span>";
                    
                    echo "<tr>";
                    echo "<td>#".$row['ma_nguoi_dung']."</td>";
                    echo "<td>".$row['ten_dang_nhap']."</td>";
                    echo "<td>".($row['email'] ? $row['email'] : 'Chưa cập nhật')."</td>";
                    echo "<td>".$roleBadge."</td>";
                    echo "<td>".date('d/m/Y', strtotime($row['ngay_tao']))."</td>";
                    
                    echo "<td class='action-btns'>";
                    if ($row['ma_nguoi_dung'] != $_SESSION['user_id']) { // Không cho tự đổi quyền chính mình
                        if ($isAdmin) {
                            echo "<a href='admin_user_action.php?action=demote&id=".$row['ma_nguoi_dung']."' class='btn-delete' onclick=\"return confirm('Hủy quyền Admin của người dùng này?');\"><i class='fa-solid fa-arrow-down'></i> Hủy Admin</a>";
                        } else {
                            echo "<a href='admin_user_action.php?action=promote&id=".$row['ma_nguoi_dung']."' class='btn-edit' onclick=\"return confirm('Nâng cấp người dùng này lên Admin?');\"><i class='fa-solid fa-arrow-up'></i> Cấp Admin</a>";
                        }
                    } else {
                        echo "<span style='color: var(--text-muted); font-size: 12px;'>Tài khoản của bạn</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'admin_footer.php'; ?>
