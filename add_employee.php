<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có quyền 'admin' chưa
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    // Nếu không, chuyển hướng đến trang đăng nhập
    header('location: login.php');
    exit(); // Dừng thực thi script
}

// Kết nối CSDL
include 'config/connect.php';

// Lấy danh sách giới tính từ CSDL
$sql_gender = "SELECT DISTINCT Phai FROM NHANVIEN";
$result_gender = $conn->query($sql_gender);

// Lấy danh sách mã phòng từ CSDL
$sql_department = "SELECT DISTINCT Ma_Phong, Ten_Phong FROM PHONGBAN";
$result_department = $conn->query($sql_department);

// Xử lý form thêm nhân viên
if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $ma_nv = $_POST['ma_nv'];
    $ten_nv = $_POST['ten_nv'];
    $phai = $_POST['phai'];
    $noi_sinh = $_POST['noi_sinh'];
    $ma_phong = $_POST['ma_phong'];
    $luong = $_POST['luong'];

    // Query thêm nhân viên vào CSDL
    $sql = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) 
            VALUES ('$ma_nv', '$ten_nv', '$phai', '$noi_sinh', '$ma_phong', $luong)";

    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng đến trang index.php hoặc thông báo thành công
        header('location: index.php');
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<?php
include 'header.php';
?>
    <h1>Thêm Nhân Viên Mới</h1>
    
    <!-- Form thêm nhân viên -->
    <form action="" method="POST">
        <label for="ma_nv">Mã Nhân Viên:</label><br>
        <input type="text" id="ma_nv" name="ma_nv"><br>
        
        <label for="ten_nv">Tên Nhân Viên:</label><br>
        <input type="text" id="ten_nv" name="ten_nv"><br>
        
        <label for="phai">Giới Tính:</label><br>
        <select id="phai" name="phai">
            <?php
            while ($row = $result_gender->fetch_assoc()) {
                echo "<option value='" . $row['Phai'] . "'>" . $row['Phai'] . "</option>";
            }
            ?>
        </select><br>
        
        <label for="noi_sinh">Nơi Sinh:</label><br>
        <input type="text" id="noi_sinh" name="noi_sinh"><br>
        
        <label for="ma_phong">Mã Phòng:</label><br>
        <select id="ma_phong" name="ma_phong">
            <?php
            while ($row = $result_department->fetch_assoc()) {
                echo "<option value='" . $row['Ma_Phong'] . "'>" . $row['Ten_Phong'] . "</option>";
            }
            ?>
        </select><br>
        
        <label for="luong">Lương:</label><br>
        <input type="text" id="luong" name="luong"><br><br>
        
        <input type="submit" name="submit" value="Thêm Nhân Viên">
    </form>
<?php
    include 'footer.php';
?>
