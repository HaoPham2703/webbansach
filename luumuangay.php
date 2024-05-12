<?php 
require "inc/myconnect.php";

if(isset($_POST['muangay'])) {
    // Lấy dữ liệu từ form
    $email = $_POST['emailMN']; 
    $ngaygiao = $_POST['dateMN'];
    $tenkh = $_POST['nameMN']; 
    $diachi = $_POST['txtdiachiMN'];
    $dienthoai = $_POST['phoneMN']; 
    $hinhthucthanhtoan = $_POST['hinhthucttMN']; 
    $masp = $_POST['idsp']; 
    $dongia = $_POST['gia']; 
    $sl = $_POST['txtsoluongMN'];

    // Tạo truy vấn SQL để chèn dữ liệu vào bảng hoadon
    $sql1 = "INSERT INTO hoadon (emailkh, ngaygiao, tenkh, diachi, dienthoai, hinhthucthanhtoan)
             VALUES ('$email', '$ngaygiao', '$tenkh', '$diachi', '$dienthoai', '$hinhthucthanhtoan')";

    // Thực thi truy vấn SQL vào bảng hoadon
    if ($conn->query($sql1) === TRUE) {
        // Lấy sodh mới được tạo
        $sodh = $conn->insert_id;

        // Tính toán thanh toán
        $thanhtien = $sl * $dongia;

        // Tạo truy vấn SQL để chèn dữ liệu vào bảng chitiethoadon
        $sql2 = "INSERT INTO chitiethoadon (donhang_id, masp, soluong, dongia, thanhtien, sodh) 
         VALUES ('$sodh', '$masp', '$sl', '$dongia', '$thanhtien','$sodh')";


        // Thực thi truy vấn SQL vào bảng chitiethoadon
        if ($conn->query($sql2) === TRUE) {
            // Chuyển hướng đến index.php
            header("Location: index.php");
            exit(); // Đảm bảo không có output khác được gửi
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}
?>
