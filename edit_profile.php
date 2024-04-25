<?php
ob_start(); // Start output buffering
session_start(); // Bắt đầu phiên đăng nhập
include "head.php";
$title = "Shop huy";
$name = "Điện thoại";
include "top.php";
include "Header.php";
include "navigation.php";

// Kiểm tra xem người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng về trang đăng nhập
if (!isset($_SESSION['txtus'])) {
    header("Location: account.php");
    exit();
}

// Kết nối đến cơ sở dữ liệu MySQL
include "inc/myconnect.php"; // Thay đổi tên file và đường dẫn phù hợp với cài đặt của bạn

// Xử lý việc cập nhật thông tin cá nhân nếu có dữ liệu được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Chuẩn bị câu lệnh SQL để cập nhật thông tin cá nhân
    $sql = "UPDATE loginuser SET HoTen='$fullname', email='$email', DienThoai='$phone', dia_chi='$address' WHERE HoTen='{$_SESSION['HoTen']}'";

    // Thực thi truy vấn
    if (mysqli_query($conn, $sql)) {
        // Nếu cập nhật thành công, cập nhật lại session
        $_SESSION['HoTen'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['dienthoai'] = $phone;
        $_SESSION['diachi'] = $address;

        // Chuyển hướng người dùng về trang profile hoặc trang chính
        header("Location: profile.php");
        exit();
    } else {
        // Nếu có lỗi trong quá trình cập nhật, có thể hiển thị thông báo lỗi hoặc xử lý khác
        echo "Error updating record: " . mysqli_error($conn);
    }
}

ob_end_flush(); // End output buffering and send to browser
?>

<!--//////////////////////////////////////////////////-->
<!--///////////////Edit Profile Page//////////////////-->
<!--//////////////////////////////////////////////////-->

<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active">Edit Profile</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading"><h1>Chỉnh sửa thông tin cá nhân</h1></div>
            </div>
            <div class="col-md-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo isset($_SESSION['HoTen']) ? htmlspecialchars($_SESSION['HoTen']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo isset($_SESSION['dienthoai']) ? htmlspecialchars($_SESSION['dienthoai']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($_SESSION['diachi']) ? htmlspecialchars($_SESSION['diachi']) : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
mysqli_close($conn); // Đóng kết nối đến cơ sở dữ liệu sau khi sử dụng
?>
</body>
</html>
