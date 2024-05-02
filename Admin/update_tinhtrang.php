<?php
session_start();
if (!isset($_SESSION['txtus'])) {
    header("Location: account.php");
    exit();
}

if (isset($_POST['sodh']) && isset($_POST['tinhtrang'])) {
    // Lấy số đơn hàng và tình trạng từ form
    $sodh = $_POST['sodh'];
    $tinhtrang = $_POST['tinhtrang'];

    // Kết nối đến CSDL
    require '../inc/myconnect.php';

    // Cập nhật tình trạng đơn hàng trong CSDL
    $sql_update = "UPDATE hoadon SET tinh_trang_don_hang = '$tinhtrang' WHERE sodh = '$sodh'";
    if ($conn->query($sql_update) === TRUE) {
        // Chuyển hướng người dùng đến trang quanlyhoadon.php
        header("Location: quanlyhoadon.php");
        exit();
    } else {
        echo "Lỗi: " . $sql_update . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có dữ liệu được gửi đến!";
}
?>
