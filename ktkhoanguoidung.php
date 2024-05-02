<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa bằng cách kiểm tra session
if (!isset($_SESSION['txtus'])) {
    // Nếu chưa đăng nhập, chuyển hướng người dùng về trang đăng nhập
    header('Location: login.php');
    exit;
}

// Kiểm tra xem cột khoatk của người dùng đã đăng nhập có giá trị là 1 hay không
require 'inc/myconnect.php';
$tk = $_SESSION['txtus'];
$sql = "SELECT khoatk FROM loginuser WHERE email = '$tk'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['khoatk'] == 1) {
        // Nếu tài khoản đã bị khoá, chuyển hướng đến trang khoanguoidung.php
        header('Location: khoanguoidung.php');
        exit;
    } else {
        // Nếu không, chuyển hướng đến trang index.php
        header('Location: index.php');
        exit;
    }
} else {
    // Nếu không tìm thấy tài khoản, chuyển hướng người dùng về trang đăng nhập
    header('Location: login.php');
    exit;
}
?>
