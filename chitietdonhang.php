<?php
session_start();
if (!isset($_SESSION['txtus'])) {
    header("Location: account.php");
    exit();
}

require "inc/myconnect.php";

// Kiểm tra xem có tham số sodh được truyền qua không
if (isset($_GET['sodh'])) {
    // Lấy số đơn hàng từ tham số sodh
    $sodh = $_GET['sodh'];

    // Truy vấn để lấy thông tin đơn hàng dựa trên số đơn hàng
    $sql = "SELECT hd.diachi, hd.ngaygiao, hd.hinhthucthanhtoan, hd.thanhtien, hd.tinh_trang_don_hang, ctdh.madv, sp.Ten AS tensp, ctdh.soluong, ctdh.dongia
        FROM hoadon hd
        LEFT JOIN chitiethoadon ctdh ON hd.sodh = ctdh.sodh
        LEFT JOIN sanpham sp ON ctdh.masp = sp.ID
        WHERE hd.sodh = $sodh"; // Sử dụng điều kiện để chỉ lấy thông tin của đơn hàng cụ thể
    $result = $conn->query($sql);

    // Kiểm tra xem truy vấn đã thành công hay không
    if ($result && $result->num_rows > 0) {
        // Lấy thông tin của đơn hàng
        $row = $result->fetch_assoc();
        $diachi = $row['diachi'];
        $date = $row['ngaygiao'];
        $hinhthuctt = $row['hinhthucthanhtoan'];
        $total = $row['thanhtien'];
        $madv = $row['madv'];
        $tinhtrang = $row['tinh_trang_don_hang'];

        // Hàm để lấy class CSS tương ứng dựa trên trạng thái
        function getStatusClass($status)
        {
            switch ($status) {
                case 'Đang xử lý':
                    return 'label label-primary';
                case 'Đã xác nhận':
                    return 'label label-info';
                case 'Đang giao hàng':
                    return 'label label-warning';
                case 'Đã giao thành công':
                    return 'label label-success';
                case 'Đã hủy':
                    return 'label label-danger';
                default:
                    return 'label label-default';
            }
        }

        // Hàm để lấy văn bản tương ứng dựa trên trạng thái
        function getStatusText($status)
        {
            switch ($status) {
                case 'Đang xử lý':
                    return 'Đang xử lý';
                case 'Đã xác nhận':
                    return 'Đã xác nhận';
                case 'Đang giao hàng':
                    return 'Đang giao hàng';
                case 'Đã giao thành công':
                    return 'Đã giao thành công';
                case 'Đã hủy':
                    return 'Đã hủy';
                default:
                    return 'Không xác định';
            }
        }
?>

        <!-- Mã HTML để hiển thị trang và thông tin đơn hàng -->
        <?php include "head.php" ?>
        <?php include "top.php" ?>
        <?php include "Header.php" ?>
        <?php include "navigation.php" ?>

        <div id="page-content" class="single-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="contact.php">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h1>Xác nhận đơn hàng</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Thông tin đơn hàng:</div>
                            <div class="panel-body">
                                <p><strong>Địa chỉ:</strong> <?php echo $diachi; ?></p>
                                <p><strong>Ngày giao hàng:</strong> <?php echo $date; ?></p>
                                <p><strong>Hình thức thanh toán:</strong> <?php echo $hinhthuctt; ?></p>
                                <p><strong>Tổng tiền:</strong> <?php echo $total; ?></p>
                                <p><strong>Mã dịch vụ:</strong> <?php echo $madv; ?></p>
                                <p><strong>Tình trạng đơn hàng:</strong> <span class="h1 <?php echo getStatusClass($tinhtrang); ?>"><?php echo getStatusText($tinhtrang); ?></span></p>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Sản phẩm đã đặt:</div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <?php
                                    $result->data_seek(0);
                                    while ($product = $result->fetch_assoc()) {
                                    ?>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="list-group-item-heading"><?php echo $product['tensp']; ?></h4>
                                                    <p class="list-group-item-text">Số lượng: <?php echo $product['soluong']; ?></p>
                                                </div>
                                                <div class="col-md-6 text-right"> <!-- Thêm class text-right để căn lề phải -->
                                                    <p class="list-group-item-text"><strong>Đơn giá: <?php echo number_format($product['dongia'], 0, ',', '.') ?>.000 VNĐ</strong></p> <!-- Thêm thẻ strong để làm đậm chữ Đơn giá -->
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php" ?>
        </body>

        </html>

    <?php
    } else {
        // Hiển thị thông báo nếu không tìm thấy đơn hàng
        echo "Không tìm thấy đơn hàng có số đơn hàng là $sodh.";
    }

    // Giải phóng kết quả
    $result->free();
} else {
    // Hiển thị thông báo nếu không có số đơn hàng được truyền qua tham số
    echo "Không có số đơn hàng được xác định.";
}

// Đóng kết nối
$conn->close();
?>
