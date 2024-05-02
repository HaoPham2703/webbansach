<?php
include "login.php";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra

include "head.php";
$title = "Sách 247";
$name = "Nhà Sách";
include "top.php";
include "header.php";
include "navigation.php";

// Kiểm tra xem session 'txtus' đã tồn tại chưa
if (!isset($_SESSION['txtus'])) {
    // Nếu không, chuyển hướng người dùng đến trang đăng nhập
    header("Location: account.php");
    exit;
}

// Lấy email từ session
$email = $_SESSION['txtus'];

// Kết nối đến cơ sở dữ liệu
require 'inc/myconnect.php';

// Query để lấy user_id từ bảng loginuser dựa trên email
$sql = "SELECT user_id FROM loginuser WHERE email = '$email'";
$result = $conn->query($sql);

// Kiểm tra xem truy vấn đã thành công hay không
if ($result) {
    // Lấy user_id từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];

    // Truy vấn thông tin đơn hàng dựa trên user_id
    $sql = "SELECT * FROM hoadon WHERE user_id = $user_id ORDER BY sodh DESC";

    
    $result = $conn->query($sql);

    // Hiển thị thông tin đơn hàng
    ?>
    <div class="container">
        <h2>Danh sách đơn hàng đã đặt:</h2>
        <?php if ($result && $result->num_rows > 0) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Số đơn hàng</th>
                            <th>Email</th>
                            <th>Ngày dự kiến giao</th> <!-- Thay đổi tên cột thành "Ngày dự kiến giao" -->
                            <th>Tổng tiền</th>
                            
                            <th>Chi tiết đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row["sodh"]; ?></td>
                                <td><?php echo $row["emailkh"]; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($row["ngaygiao"])); ?></td> <!-- Hiển thị ngày dự kiến giao là ngày giao cộng thêm 5 ngày -->
                                <td><?php echo number_format($row["thanhtien"], 0, '.', ''); ?>.000 VNĐ</td>
                                
                                <td><a href="chitietdonhang.php?sodh=<?php echo $row["sodh"]; ?>">Chi tiết</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>Không có đơn hàng nào được tìm thấy.</p>
        <?php endif; ?>
    </div>
<?php
} else {
    // Hiển thị thông báo lỗi nếu truy vấn không thành công
    echo '<div class="container"><p>Có lỗi xảy ra khi truy vấn cơ sở dữ liệu.</p></div>';
}

include "footer.php";
?>
</body>
</html>
