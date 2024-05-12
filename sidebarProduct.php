<div id="sidebar" class="col-md-4">
	
	<div class="widget wid-product">
		<div class="heading">
			<h4>Sách mới nhất</h4>
		</div>
		<div class="content">
			<?php
			require 'inc/myconnect.php';
			$query = "SELECT * from sanpham ORDER BY date DESC limit 4;";
			$rs = $conn->query($query);
			if ($rs->num_rows > 0) {
				// output data of each row
				while ($row = $rs->fetch_assoc()) {

			?>
					<div class="product row">
						<div class="col-md-5">
							<a href="product.php?id=<?php echo $row["ID"] ?>">
								<img src="images/<?php echo $row["HinhAnh"] ?>" style="width:200px;height:150px" />
							</a>
						</div>
						<div class="col-md-7">
							<div class="wrapper">
								<h5 class="mb-0"><a href="product.php?id=<?php echo $row["ID"] ?>"><?php echo $row["Ten"] ?></a>
								</h5>
								<div class="price"><?php echo $row["Gia"] ?>.000 VNĐ</div>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>

<script>
	function togglePublisherFilter(publisherId) {
		var currentUrl = window.location.href;
		if (currentUrl.indexOf('?manhasx=') !== -1) {
			// User has already filtered by publisher, remove the parameter and reload page
			var baseUrl = currentUrl.split('?')[0];
			window.location.href = baseUrl;
		} else {
			// User hasn't filtered by publisher yet, add the parameter and reload page
			window.location.href = currentUrl + '?manhasx=' + publisherId;
		}
	}
</script>

<script>
	function togglePublisherFilter(publisherId) {
		var currentUrl = window.location.href;
		if (currentUrl.indexOf('?manhasx=') !== -1) {
			// User has already filtered by publisher, remove the parameter and reload page
			var baseUrl = currentUrl.split('?')[0];
			window.location.href = baseUrl;
		} else {
			// User hasn't filtered by publisher yet, add the parameter and reload page
			window.location.href = currentUrl + '?manhasx=' + publisherId;
		}

		// Remove text-primary class from all publisher links
		var publisherLinks = document.querySelectorAll('[id^="publisher_"]');
		publisherLinks.forEach(function(link) {
			link.classList.remove('text-primary');
		});

		// Add text-primary class to the clicked publisher link
		var clickedLink = document.getElementById('publisher_' + publisherId);
		clickedLink.classList.add('text-primary');
	}
</script>

<script>
	function togglePublisherMenu() {
		var menu = document.getElementById('publisherMenu');
		menu.style.display = (menu.style.display === 'none') ? 'block' : 'none';
	}
</script>