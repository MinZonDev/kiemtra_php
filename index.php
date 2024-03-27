<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset ($_SESSION['username'])) {
    // Nếu không, chuyển hướng đến trang đăng nhập
    header('location: login.php');
    exit();
}

// Xử lý đăng xuất tài khoản
if (isset ($_POST['logout'])) {
    // Hủy bỏ phiên làm việc của người dùng
    session_destroy();
    // Chuyển hướng đến trang đăng nhập
    header('location: login.php');
    exit(); // Dừng thực thi script
}
?>
<?php
include 'header.php';
?>
<!-- Kiểm tra quyền và hiển thị các chức năng -->
<?php
if ($_SESSION['role'] == 'admin') {
    echo '<button class="add-employee-btn" onclick="location.href=\'add_employee.php\'">Thêm nhân viên mới</button>';
}
?>

<!-- Nội dung khác của trang -->

<h1>THÔNG TIN NHÂN VIÊN</h1>

<table>
    <tr>
        <th>Mã Nhân Viên</th>
        <th>Tên Nhân Viên</th>
        <th>Giới tính</th>
        <th>Nơi Sinh</th>
        <th>Tên Phòng</th>
        <th>Lương</th>
        <?php
        if ($_SESSION['role'] == 'admin') {
            echo '<th>Thao tác</th>';
        }
        ?>
    </tr>

    <?php
    include 'config/connect.php';

    $results_per_page = 5;

    if (!isset ($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $start_from = ($page - 1) * $results_per_page;

    $sql = "SELECT NHANVIEN.Ma_NV, Ten_NV, Phai, Noi_Sinh, Ten_Phong, Luong
                FROM NHANVIEN
                JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong
                LIMIT $start_from, $results_per_page";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Ma_NV'] . "</td>";
            echo "<td>" . $row['Ten_NV'] . "</td>";
            echo "<td>";
            if ($row['Phai'] == 'NU') {
                echo '<img src="images/woman.png" alt="Woman">';
            } else {
                echo '<img src="images/man.png" alt="Man">';
            }
            echo "</td>";
            echo "<td>" . $row['Noi_Sinh'] . "</td>";
            echo "<td>" . $row['Ten_Phong'] . "</td>";
            echo "<td>" . $row['Luong'] . "</td>";
            if ($_SESSION['role'] == 'admin') {
                echo '<td><a href="edit_employee.php?id=' . $row['Ma_NV'] . '"><img src="images/pen.png" alt="Edit"></a> | <a href="delete_employee.php?id=' . $row['Ma_NV'] . '"><img src="images/bin.png" alt="Delete"></a></td>';
            }
            echo "</tr>";
        }
    } else {
        echo "Không có dữ liệu.";
    }


    $conn->close();
    ?>
</table>

<?php
// Phân trang
include 'pagination.php';
?>
<?php
include 'footer.php';
?>