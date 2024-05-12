<?php
ob_start();
?>
<?php
require "login.php";
if (!isset($_SESSION['txtus'])) {
    header("Location: giohangchuacodnhap.php");
    exit();
}

include "head.php";
$title = "Shop huy";
$name = "Điện thoai";

include "top.php";
include "header.php";
include "navigation.php";

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: baogiohangtrong.php');
    exit();
}

?>
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="cart">
            <p>
                <?php
                $totalItems = count($_SESSION['cart']);
                echo "Có $totalItems sản phẩm trong giỏ hàng";
                ?>
            </p>
        </div>
        <?php
        require "inc/myconnect.php";

        $total = 0;
        $totalQuantity = 0; // Khởi tạo biến tổng số lượng sản phẩm

        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $query = "SELECT s.ID, s.Ten, s.date, s.Gia, s.HinhAnh, s.KhuyenMai, s.giakhuyenmai, s.Mota, n.Ten as Tennhasx, s.Manhasx
            FROM sanpham s
            LEFT JOIN nhaxuatban n ON n.ID = s.Manhasx
            WHERE s.id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $productId);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();

            if ($product) {
                $subtotal = $product['KhuyenMai'] ? $product['giakhuyenmai'] * $quantity : $product['Gia'] * $quantity;
                $total += $subtotal;
                $totalQuantity += $quantity; // Cộng dồn số lượng sản phẩm
            }
        ?>

            <div class="row">
                <form name="form5" id="ff5" method="POST" action="removecart.php">
                    <div class="product well">
                        <div class="col-md-3">
                            <div class="image">
                                <img src="images/<?php echo $product["HinhAnh"] ?>" style="width:300px;height:300px" />
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="caption">
                                <div class="name">
                                    <h3><a href="product.php?id=<?php echo $product["ID"] ?>"><?php echo $product["Ten"] ?></a></h3>
                                </div>
                                <div class="info">
                                    <ul>
                                        <li>Nhà xuất bản: <?php echo isset($product["Tennhasx"]) ? $product["Tennhasx"] : 'N/A'; ?></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <?php if ($product && $product["KhuyenMai"]) : ?>
                                        <?php echo $product["giakhuyenmai"] ?>.000 VNĐ
                                    <?php elseif ($product) : ?>
                                        <?php echo $product["Gia"] ?>.000 VNĐ
                                    <?php endif; ?>
                                </div>
                                <label>Số lượng:</label>
                                <input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty[<?php echo $productId ?>]" value="<?php echo $quantity ?>" onchange="updateQuantity(<?php echo $productId ?>, this.value)">

                                <div>
                                <input type="submit" name="update" id="updateButton" style="margin-top:31px" value="Cập nhật sản phẩm này" class="btn btn-2" />
                                </div>
                                <hr>
                                <input type="submit" name="remove" value="Xóa sản phẩm này" class="btn btn-default pull-right" style="color: black;" />
                                <input type="hidden" name="idsprm" value="<?php echo $productId ?>" />
                                <label style="color:red">Thành tiền: <?php echo $subtotal ?>.000</label>
                            </div>
                        </div>

                        


                        <div class="clear"></div>
                    </div>
                </form>
            </div>

        <?php
        }
        ?>

        <div class="row">
            <a href="rmcart.php" class="btn btn-2" style="margin-bottom:31px">Xóa hết giỏ hàng</a>
            <div class="col-md-4 col-md-offset-8 ">
                <center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sản phẩm khác</a></center>
            </div>
            <div class="row">
                <div class="pricedetails">
                    <div class="col-md-4 col-md-offset-8">
                        <table style="margin-right:31px">
                            <h6>Chi tiết giá</h6>
                            <tr>
                                <td>Số lượng sản phẩm</td>
                                <td><?php echo $totalQuantity ?></td> <!-- Hiển thị tổng số lượng sản phẩm -->
                            </tr>
                            <tr style="border-top: 1px solid #333">
                                <td>
                                    <h5>Tổng cộng</h5>
                                </td>
                                <td><?php echo $total ?>.000</td>
                            </tr>
                        </table>
                        <center><a href="dathang.php" class="btn btn-1">Đặt hàng</a></center>
                    </div>
                </div>
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