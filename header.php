<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ NHÂN SỰ</title>
    <style>
        <?php
            include 'style.php';
        ?>
    </style>
</head>

<body>

    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <form action="" method="POST">
            <a class="right"><input type="submit" name="logout" value="Đăng xuất"></a>
        </form>
        <!-- <a href="logout.php" class="right">Đăng xuất</a> -->
        <a class="right">Xin chào,
            <?php echo $_SESSION['username']; ?>!
        </a>
    </div>
</body>

</html>