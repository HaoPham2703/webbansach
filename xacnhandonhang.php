<?php
session_start(); // Bắt đầu session
if (!isset($_SESSION['txtus'])) {
    header("Location: account.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $diachi = $_POST['diachi'];
    $date = $_POST['date'];
    $hinhthuctt = $_POST['hinhthuctt'];
    $dichvu = isset($_POST['dichvu']) ? $_POST['dichvu'] : array();
    $total = $_POST['total'];
    $madv = $_POST['madv'];

    // Kết nối tới CSDL
    require "inc/myconnect.php"; // Kết nối CSDL

    // Chuẩn bị truy vấn SQL để lưu đơn hàng vào bảng donhang
    $sql = "INSERT INTO donhang (diachi, ngaygiaohang, hinhthucthanhtoan, tongtien) VALUES (?, ?, ?, ?)";

    // Sử dụng prepared statement để tránh lỗ hổng SQL Injection
    $stmt = $conn->prepare($sql);
    
    // Bind các giá trị vào statement
    $stmt->bind_param("sssi", $diachi, $date, $hinhthuctt, $total);

    // Thực thi truy vấn
    $stmt->execute();

    // Lấy ID của đơn hàng vừa được thêm vào
    $donhang_id = $stmt->insert_id;

    // Đóng prepared statement
    $stmt->close();

    // Lưu thông tin về các dịch vụ được chọn vào bảng chitietdonhang
    if (!empty($dichvu)) {
        // Chuẩn bị truy vấn SQL để lưu chi tiết đơn hàng vào bảng chitietdonhang
        $sql_chi_tiet = "INSERT INTO chitietdonhang (donhang_id, madv) VALUES (?, ?)";
        $stmt_chi_tiet = $conn->prepare($sql_chi_tiet);

        // Lặp qua mỗi dịch vụ được chọn và thêm vào bảng chitietdonhang
        foreach ($dichvu as $madv) {
            // Bind các giá trị vào statement
            $stmt_chi_tiet->bind_param("ii", $donhang_id, $madv);

            // Thực thi truy vấn
            $stmt_chi_tiet->execute();
        }

        // Đóng prepared statement
        $stmt_chi_tiet->close();
    }

    // Đóng kết nối tới CSDL
    $conn->close();

    // Sau khi lưu đơn hàng, bạn có thể xoá giỏ hàng đã đặt
    // unset($_SESSION['cart']);

    // Hoặc làm bất kỳ xử lý nào khác, chẳng hạn gửi email xác nhận đơn hàng cho khách hàng
    // Sau đó, chuyển hướng người dùng đến trang xác nhận đơn hàng hoặc trang chính
    header("Location: xacnhandonhangthanhcong.php");
    exit();
} else {
    // Nếu không phải là phương thức POST, chuyển hướng về trang chính
    header("Location: index.php");
    exit();
}
?>
