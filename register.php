<?php
session_start();
include 'config/connect.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $username = $_POST['username'];
    $password = $_POST['password']; // Bạn cần mã hóa mật khẩu ở đây
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    // Kiểm tra xem tài khoản đã tồn tại chưa
    $check_user_query = "SELECT * FROM User WHERE username='$username' OR email='$email' LIMIT 1";
    $result = $conn->query($check_user_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // Nếu tài khoản đã tồn tại
        echo "Tài khoản đã tồn tại";
    } else {
        // Thêm người dùng mới vào cơ sở dữ liệu
        $query = "INSERT INTO User (username, password, fullname, email, role) VALUES('$username', '$password', '$fullname', '$email', 'user')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        header('location: index.php'); // Chuyển hướng đến trang index.php
    }
}
?>
<!-- Biểu mẫu HTML cho trang đăng ký -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Đăng ký tài khoản</h2>
    <form action="register.php" method="POST">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="fullname">Họ và tên:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Đăng ký">
    </form>
</body>

</html>