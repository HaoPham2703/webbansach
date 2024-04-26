<?php
session_start(); // Bắt đầu phiên đăng nhập
ob_start();

include "head.php";
$title = "Shop huy";
$name = "Điện thoại";
include "top.php";
include "Header.php";
include "navigation.php";

// Kết nối đến cơ sở dữ liệu MySQL
require "inc/myconnect.php"; // Thay đổi tên file và đường dẫn phù hợp với cài đặt của bạn
?>

<!--//////////////////////////////////////////////////-->
<!--///////////////////Profile Page///////////////////-->
<!--//////////////////////////////////////////////////-->

<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading"><h1>Thông tin khách hàng</h1></div>
            </div>
            <div class="col-md-6">
                <!-- Hiển thị thông tin từ phiên đăng nhập -->
                
                <p><strong>Họ và tên:</strong> <?php echo isset($_SESSION['HoTen']) ? htmlspecialchars($_SESSION['HoTen']) : ''; ?></p>
                <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?></p>
                <p><strong>Điện thoại:</strong> <?php echo isset($_SESSION['dienthoai']) ? htmlspecialchars($_SESSION['dienthoai']) : ''; ?></p>
                <p><strong>Địa chỉ:</strong> <?php echo isset($_SESSION['dia_chi']) ? htmlspecialchars($_SESSION['dia_chi']) : ''; ?></p>

                <!-- Thêm nút sửa thông tin -->
                <a href="edit_profile.php" class="btn btn-primary">Sửa Profile</a>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
</body>
</html>
