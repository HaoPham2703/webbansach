<?php
// Kiểm tra nếu session chưa được khởi tạo thì bắt đầu một phiên làm việc mới
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include file head.php ở đây để đảm bảo rằng không có đầu ra không mong muốn hoặc dòng trống trước khi bắt đầu session
include "head.php";

// Tiếp tục với phần còn lại của mã trong file top.php
$title = "Shop huy";
$name = "Điện thoại";
?>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=617487565124105&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<!-- <select class="language">
						<option value="English" selected>VietNam</option>
					</select>
					<select class="currency">
						<option value="USD" selected>VNĐ</option>
					</select> -->
				</div>
				<div class="col-xs-6">
					<ul class="top-link">
						<?php
							if (!isset($_SESSION['txtus'])) { // Nếu session chưa được thiết lập
							    printf(' <li><a href="account.php"><span class="glyphicon glyphicon-log-in"></span> Tài Khoản</a></li>
										<li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Liên hệ</a></li>');
							} else { // Nếu session đã được thiết lập
							    echo '<li><span class="glyphicon glyphicon-user"></span> <a href="profile.php">Xin chào <span style="color:Tomato;"><b>' . $_SESSION['HoTen'] . '</b></span></a></li>';
							    echo '<li><span class="glyphicon glyphicon-log-out"></span><a href="dangxuat.php"> Đăng xuất!</a></li>';
							}
						?>
					</ul>
				</div>
			</div>
		</div>
    </nav>
    </body>
</html>
