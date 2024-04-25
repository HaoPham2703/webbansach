<?php include "login.php"; ?>
<?php include "head.php"; ?>
<?php include "top.php"; ?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>
<?php include "sider.php"; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="heading">
            <h2>Sách đang khuyến mãi</h2>
        </div>

        <div class="products">
            <?php
            require 'inc/truyvan.php';
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $productName = $row["Ten"];
                    $productNameDisplay = mb_strlen($productName, 'UTF-8') > 20 ? mb_substr($productName, 0, 20, 'UTF-8') . '...' : $productName;
            ?>
                    <div class="col-lg-3 col-md-4 col-xs-12">
                        <div class="product">
                            <div class="image"><a href="product.php?id=<?php echo $row["ID"] ?>"><img src="images/<?php echo $row["HinhAnh"] ?>" style="width:300px;height:300px" /></a></div>
                            <div class="caption">
                                <div class="name">
                                    <?php
                                    // Rút ngắn tên sản phẩm nếu nó quá dài
                                    $ten_san_pham = $row["Ten"];
                                    if (mb_strlen($ten_san_pham, 'UTF-8') > 25) {
                                        $ten_san_pham = mb_substr($ten_san_pham, 0, 25, 'UTF-8') . '...';
                                    }
                                    ?>
                                    <h3><a href="product.php?id=<?php echo $row["ID"] ?>"><?php echo $ten_san_pham ?></a></h3>
                                </div>
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

<?php include "sanphamoinhat.php"; ?>

</div>

</div>
</div>
</div>
<?php
include "scroll_back_button.php"
?>
<?php
include "footer.php"
?>
</body>

</html>