<?php
session_start();
if (!isset($_SESSION['txtus'])) {
    header("Location: account.php");
    exit();
}

require "inc/myconnect.php";

$sql = "SELECT hd.diachi, hd.ngaygiao, hd.hinhthucthanhtoan, hd.thanhtien, ctdh.madv, sp.Ten AS tensp, ctdh.soluong, ctdh.dongia
        FROM hoadon hd
        LEFT JOIN chitiethoadon ctdh ON hd.sodh = ctdh.sodh
        LEFT JOIN sanpham sp ON ctdh.masp = sp.ID
        WHERE hd.sodh = (SELECT sodh FROM hoadon ORDER BY sodh DESC LIMIT 1)";

$result = $conn->query($sql);

if (!$result) {
    echo "Lỗi khi thực thi truy vấn: " . $conn->error;
    exit();
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $diachi = $row['diachi'];
    $date = $row['ngaygiao'];
    $hinhthuctt = $row['hinhthucthanhtoan'];
    $total = $row['thanhtien'];
    $madv = $row['madv'];
?>

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
                            <p><strong>Ngày giao hàng dự kiến:</strong> <?php echo $date; ?></p>
                            <p><strong>Hình thức thanh toán:</strong> <?php echo $hinhthuctt; ?></p>
                            <p><strong>Tổng tiền:</strong> <?php echo $total; ?>0VND</p>
                            <p><strong>Mã dịch vụ:</strong> <?php echo $madv; ?></p>
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
    echo "Không tìm thấy đơn hàng mới nhất.";
}
?>