<?php
// Khởi động session
session_start();
require "inc/myconnect.php";

// Lấy email từ session
$email = $_SESSION['txtus'];

// Query để lấy user_id và địa chỉ từ bảng loginuser dựa trên email
$sql = "SELECT user_id, dia_chi FROM loginuser WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Đăng nhập thành công, lưu user_id và địa chỉ vào session
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['dia_chi'] = $row['dia_chi'];
    echo "Địa chỉ của bạn là: " . $_SESSION['dia_chi'];
    echo "Đăng nhập thành công! User ID của bạn là: " . $_SESSION['user_id'];
} else {
    // Đăng nhập thất bại
    echo "Email không tồn tại trong hệ thống!";
}

// Đóng kết nối
$conn->close();
?>