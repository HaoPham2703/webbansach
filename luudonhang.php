<?php
session_start();
require_once "inc/myconnect.php";

if(isset($_POST['Dat'])) {
    if(isset($_SESSION['cart'])) {
        // Retrieve the total amount from the session
        $total_amount = isset($_SESSION['tongtien']) ? $_SESSION['tongtien'] : 0;

        // Lấy danh sách các sản phẩm trong giỏ hàng
        $item = array_keys($_SESSION['cart']);
        $str = implode(",",$item);

        // Lấy user_id từ bảng loginuser dựa trên email
        $query = "SELECT user_id FROM loginuser WHERE email = '{$_SESSION['email']}'"; 
        $user_result = $conn->query($query);
        if ($user_result && $user_result->num_rows > 0) {
            $user_row = $user_result->fetch_assoc();
            $user_id = $user_row['user_id']; // Lấy user_id từ kết quả truy vấn
        } else {
            // Xử lý trường hợp không tìm thấy user_id
            echo "Không tìm thấy thông tin người dùng";
            exit;
        }

        // Truy vấn thông tin sản phẩm từ bảng sanpham và nhaxuatban
        $query = "SELECT s.ID, s.Ten, s.date, s.Gia, s.HinhAnh, s.KhuyenMai, s.giakhuyenmai, s.Mota, n.Ten as Tennhasx, s.Manhasx
            FROM sanpham s 
            LEFT JOIN nhaxuatban n ON n.ID = s.Manhasx
            WHERE s.id  IN ($str)";
        $result = $conn->query($query);

        // Lấy thông tin khác hàng và địa chỉ giao hàng
        $total = isset($_SESSION['order_total']) ? $_SESSION['order_total'] : 0;
        $email = $_SESSION['email'];
        $ngaygiao = isset($_POST['date']) ? $_POST['date'] : '';
        $tenkh = $_SESSION['HoTen'];
        $diachigh = isset($_POST['other_address']) ? $_POST['other_address'] : (isset($_SESSION['dia_chi']) ? $_SESSION['dia_chi'] : '');

        // Lưu địa chỉ vào session
        $_SESSION['dia_chigh'] = $diachigh;

        $dienthoai = $_SESSION['dienthoai'];
        $hinhthucthanhtoan = isset($_POST['hinhthuctt']) ? $_POST['hinhthuctt'] : ''; 

        // Thêm thông tin đơn hàng vào bảng hoadon
        $sql1 = "INSERT INTO hoadon (emailkh, ngaygiao, tenkh, diachi, dienthoai, user_id, hinhthucthanhtoan, thanhtien)
                VALUES ('$email', '$ngaygiao', '$tenkh', '$diachigh', '$dienthoai', '$user_id', '$hinhthucthanhtoan', '$total_amount')";

        if ($conn->query($sql1) === TRUE) {
            $sodh = $conn->insert_id; // Lấy số đơn hàng vừa tạo

            // Thêm thông tin chi tiết đơn hàng vào bảng chitiethoadon
            while($s = $result->fetch_assoc()) {
                $masp = $s["ID"];
                $dongia = ($s["KhuyenMai"]) ? $s["giakhuyenmai"] : $s["Gia"];
                $sl = $_SESSION['cart'][$s["ID"]];
                $thanhtien = $sl * $dongia;

                $sql2 = "INSERT INTO chitiethoadon (sodh, masp, soluong, dongia, thanhtien, donhang_id) 
                    VALUES ('$sodh', '$masp', '$sl', '$dongia', '$thanhtien', '$sodh')"; // Sửa đổi giá trị donhang_id thành sodh

                if ($conn->query($sql2) !== TRUE) {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                }
            }

            // Xóa thông tin giỏ hàng sau khi đã đặt hàng thành công
            unset($_SESSION['cart']);
            unset($_SESSION['order_total']);
            // Chuyển hướng đến trang xác nhận đơn hàng
            header('Location: xacnhandonhang.php');
            exit;
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
}
?>
