<?php
include "login.php";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "head.php";
$title = "Sách 247";
$name = "Nhà Sách";
include "top.php";
include "header.php";
include "navigation.php";

// Kiểm tra nếu người dùng đã đăng nhập, thì chuyển hướng về trang index.php
if (isset($_SESSION['txtus'])) {
    header("Location: kiemtradonhang.php");
    exit; // Đảm bảo không có mã HTML hoặc mã PHP nào được thực thi sau lệnh header
}
?>
<div class="container">
    <br><br>
    <div class="alert alert-danger text-center py-10 my-8" role="alert" style="font-size: 33px;">
        Bạn cần đăng nhập để truy cập vào trang này.
        <br><br><br>
        <div class="d-flex justify-content-center">
            <a href="index.php" class="btn btn-primary mr-3">Trang chủ</a>
            <a href="account.php" class="btn btn-success">Đăng nhập</a>
        </div>
    </div>
    <br><br>
</div>
<?php
include "footer.php";
?>
</body>
</html>
