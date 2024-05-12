<?php
// mới sửa phần đăng nhập
ob_start();
session_start();
?>

<?php 
include "head.php";
?>
<?php
$title ="Shop huy";
$name ="Điện thoai";
?>
<?php 
include "top.php";
?>
<?php 
include "header.php";
?>
<?php 
include "navigation.php";
?>

<?php
$tk = "" ;
$mk = "" ;
$kq = "";

if(isset($_POST['submit'])) {
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'];
    $mk = $_POST['txtem'];

    // Bạn có thể sử dụng hàm mysqli_real_escape_string để bảo vệ dữ liệu
    $tk = mysqli_real_escape_string($conn, $tk);
    $mk = mysqli_real_escape_string($conn, $mk);

    $sql="SELECT * FROM loginuser WHERE email = '$tk' AND matkhau = '$mk'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['txtus'] = $tk;
        $_SESSION['HoTen'] = $row["HoTen"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['matkhau'] = $row["matkhau"];
        $_SESSION['dienthoai'] = $row["DienThoai"];
        header('Location: ktkhoanguoidung.php');
    } else {
        $kq ="Thông tin không đúng vui lòng kiểm tra lại";
    }
}
?>

<?php
$name = "" ;
$email = "" ;
$dt = "";
$mk = "";
$kqdk = "";
$repass = "";
$diachi = "";

if(isset($_POST['dangky'])) {
    require 'inc/myconnect.php';
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $dt = $_POST['phone'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    $diachi = $_POST['diachi']; // Lấy giá trị địa chỉ từ form

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
    $check_email_query = "SELECT * FROM loginuser WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_query);

    // Kiểm tra định dạng email bằng regex
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $kqdk = "Định dạng email không hợp lệ";
    } elseif($check_email_result->num_rows > 0) {
        $kqdk = "Email đã tồn tại. Vui lòng chọn một email khác.";
    } elseif($repass != $mk) {
        $kqdk = "Mật khẩu nhập lại không chính xác";
    } else {
        // Tiếp tục thêm tài khoản nếu không có email trùng
        // Bạn có thể sử dụng hàm mysqli_real_escape_string để bảo vệ dữ liệu
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $dt = mysqli_real_escape_string($conn, $dt);
        $mk = mysqli_real_escape_string($conn, $mk);
        $diachi = mysqli_real_escape_string($conn, $diachi); // Bảo vệ dữ liệu địa chỉ

        $sql = "INSERT INTO loginuser (email, matkhau, hoten, DienThoai, dia_chi) 
                VALUES ('$email', '$mk', '$name', '$dt', '$diachi')"; // Chèn giá trị địa chỉ vào câu lệnh SQL

        if (mysqli_query($conn, $sql)) {
            $name = "";
            $email = "";
            $dt = "";
            $mk = "";
            $repass = "";
            $kqdk = "Đăng ký thành công";
            // Đặt giá trị địa chỉ vào session
    $_SESSION['dia_chi'] = $diachi;
        } else {
            $kqdk = "Đăng ký không thành công xin hãy kiểm tra lại thông tin";
        }
    }
    mysqli_close($conn);
}
?>

<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="account.php">Account</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="heading"><h2>Đăng nhập</h2></div>
                <form name="form1" id="ff1" method="POST" action="#">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="txtus" required value="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="txtem" required value="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-1" id="login">Đăng nhập</button>
                    <p style="color:red"><?php echo $kq; ?></p>
                    <br>
                    <i>* Bạn chưa có tài khoản? Vui lòng đăng ký.</i>
                </form>
            </div>
            <div class="col-md-6">
                <div class="heading"><h2> Đăng ký tài khoản</h2></div>
                <form name="form2" id="ff2" method="POST" action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name;?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $email;?>" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" value="<?php echo $mk;?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass;?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Địa Chỉ" name="diachi" id="diachi" value="<?php echo $diachi;?>" required>
                    </div>
                    <button type="submit" name="dangky" class="btn btn-1">Đăng ký</button>
                    <p style="color:red"><?php echo $kqdk; ?></p>
                </form>
                
            </div>
        </div>
    </div>
</div>



<?php 
include "footer.php";
?>


</body>
</html>
<?php ob_end_flush(); ?>
