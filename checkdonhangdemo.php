<?php
// Thực hiện kết nối đến cơ sở dữ liệu (đã được thực hiện trong file inc/myconnect.php)
require_once "inc/myconnect.php";

// Lấy số đơn hàng mới được tạo
$sodh = $conn->insert_id;

// Truy vấn thông tin của đơn hàng vừa mới được tạo
$query = "SELECT * FROM hoadon WHERE sodh = $sodh";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // In ra thông tin của đơn hàng
    while($row = $result->fetch_assoc()) {
        echo "Số đơn hàng: " . $row["sodh"]. "<br>";
        echo "Email khách hàng: " . $row["emailkh"]. "<br>";
        echo "Ngày giao hàng: " . $row["ngaygiao"]. "<br>";
        // và các trường thông tin khác của đơn hàng
    }
} else {
    echo "Không tìm thấy thông tin đơn hàng.";
}

// Đóng kết nối
$conn->close();
?>
