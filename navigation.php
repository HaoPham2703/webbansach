<nav id="menu" class="navbar">
	<div class="container">
		<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Trang Chủ</a></li>
			
				
				<li class="dropdown">
				<a href="category.php">SẢN PHẨM <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php
						require 'inc/myconnect.php';
						$laydanhsachnhasx = "SELECT ID as manhasx, Ten from nhaxuatban";
						$rstennhasx = $conn->query($laydanhsachnhasx);
						if ($rstennhasx->num_rows > 0) {
							while ($row = $rstennhasx->fetch_assoc()) {
						?>
								<li><a href="category.php?manhasx=<?php echo $row["manhasx"] ?>"><?php echo $row["Ten"] ?></a></li>
						<?php
							}
						}
						?>
					</ul>
					
				</li>
				<li><a href="cart.php">Giỏ hàng</a></li>
				<li><a href="contact.php">Liên hệ</a></li>
				<li><a href="prekiemtradonhang.php">Kiểm tra đơn hàng</a></li>
			</ul>
		</div>
	</div>
</nav>
