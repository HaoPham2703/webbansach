<?php
session_start(); // Start the session
ob_start();
?>
<?php



if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header("Location: baogiohangtrong.php");
    exit;
}

include "head.php";
$title = "Shop huy";
$name = "Điện thoai";
include "top.php";
include "header.php";
include "navigation.php";
?>

<form name="form6" id="ff6" method="POST" action="luudonhang.php">
    <div id="page-content" class="single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a style="text-align:center">Xác nhận đơn hàng</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin khách hàng</div>
                        <div class="panel-body">
                            <div class="col-md-8" style="margin-left: 130px;">
                                <label>Tên khách hàng : <?php echo $_SESSION['HoTen'] ?></label>
                                <br>
                                <label>Điện thoại: <?php echo $_SESSION['dienthoai'] ?></label>
                                <br>
                                <label>Email:<?php echo $_SESSION['email'] ?></label>

                                <label>
                                    <br>
                                </label>
                                <br>
                                <label>Địa chỉ giao hàng</label>
                                <div id="toggleAddress">
                                    <label class="toggleLabel">
                                        <input type="checkbox" id="toggleCheckbox" onchange="toggleAddress()">
                                        Địa Chỉ Hiện Tại
                                    </label>
                                    <div id="currentAddress" style="display: none;">
                                        <?php echo isset($_SESSION['diachitk']) ? htmlspecialchars($_SESSION['diachitk']) : '' ?>
                                    </div>
                                </div>

                                <div id="other_address_input">
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng" name="other_address" required>
                                </div>

                                <script>
                                    function toggleAddress() {
                                        var checkbox = document.getElementById("toggleCheckbox");
                                        var currentAddress = document.getElementById("currentAddress");
                                        var otherAddressInput = document.getElementById("other_address_input").getElementsByTagName("input")[0];

                                        if (checkbox.checked) {
                                            currentAddress.style.display = "block";
                                            otherAddressInput.value = "<?php echo isset($_SESSION['diachitk']) ? htmlspecialchars($_SESSION['diachitk']) : ''; ?>";
                                            otherAddressInput.setAttribute("readonly", "readonly"); // Make input readonly
                                        } else {
                                            currentAddress.style.display = "none";
                                            otherAddressInput.value = ""; // Clear the input
                                            otherAddressInput.removeAttribute("readonly"); // Make input editable
                                        }
                                    }
                                </script>



                                <br />


                                <label>Ngày giao hàng dự kiến: <br> <input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose" required readonly></label>
                                <label> Hình thức thanh toán :
                                    <select class="selectpicker" name="hinhthuctt">
                                        <option value="ATM">Trả thẻ</option>
                                        <option value="COD">Cod</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin đơn hàng</div>
                        <div class="panel-body">
                            <div class="col-md-17">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sách</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    $item[] = $key;
                                                }
                                                $str = implode(",", $item);
                                                $query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
                                                            FROM sanpham s 
                                                            LEFT JOIN nhaxuatban n ON n.ID = s.Manhasx
                                                            WHERE s.id  IN ($str)";
                                                $result = $conn->query($query);
                                                $total = 0;
                                                foreach ($result as $s) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $s["Ten"] ?></td>
                                                        <td><?php echo $_SESSION['cart'][$s["ID"]] ?></td>
                                                        <?php if ($s["KhuyenMai"] == true) { ?>
                                                            <td><?php echo $s["giakhuyenmai"] ?>.000 VNĐ</td>
                                                        <?php } ?>
                                                        <?php if ($s["KhuyenMai"] == false) { ?>
                                                            <td><?php echo $s["Gia"] ?>.000 VNĐ</td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php
                                                    if ($s["KhuyenMai"] == true) {
                                                        $total += $_SESSION['cart'][$s["ID"]] * $s["giakhuyenmai"];
                                                    }
                                                    if ($s["KhuyenMai"] == false) {
                                                        $total += $_SESSION['cart'][$s["ID"]] * $s["Gia"];
                                                    }
                                                    ?>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Thành tiền:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th name="result" style="color:red"><strong style="color:red" id="result" name="total"><?php echo $total ?>.000 VNĐ</strong></th>
                                                <input type="hidden" id="thannhtien" name="totalkcodv" value="<?php echo $total ?>" />
                                                <input type="hidden" name="total" id="total" value="" />
                                                <input type="hidden" name="madv" id="madv" value="" />
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Sách (<?php echo count($_SESSION['cart']) ?>)</div>
                    <div class="panel-body">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $item[] = $key;
                            }
                            $str = implode(",", $item);
                            $query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
                                        FROM sanpham s 
                                        LEFT JOIN nhaxuatban n ON n.ID = s.Manhasx
                                        WHERE s.id  IN ($str)";
                            $result = $conn->query($query);
                            $total = 0;
                            foreach ($result as $s) {
                        ?>
                                <div class="product well">
                                    <div class="col-md-3">
                                        <div class="image">
                                            <img src="images/<?php echo $s["HinhAnh"] ?>" style="width:300px;height:300px" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="caption">
                                            <div class="name">
                                                <h3><a href="product.php?id=<?php echo $s["ID"] ?>"><?php echo $s["Ten"] ?></a></h3>
                                            </div>
                                            <div class="info">
                                                <ul>
                                                    <li>Nhà xuất bản: <?php echo $s["Tennhasx"] ?></li>
                                                </ul>
                                            </div>
                                            <?php if ($s["KhuyenMai"] == true) { ?>
                                                <div class="price"><?php echo $s["giakhuyenmai"] ?>.000 VNĐ</div>
                                            <?php } ?>
                                            <?php if ($s["KhuyenMai"] == false) { ?>
                                                <div class="price"><?php echo $s["Gia"] ?>.000 VNĐ</div>
                                            <?php } ?>
                                            <input class="form-inline quantity" type="hidden" name="qty[<?php echo $s["ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["ID"]] ?>">
                                            <hr>
                                            <lable>Số lượng :<?php echo $_SESSION['cart'][$s["ID"]] ?></lable>
                                            <input type="hidden" name="idsprm" value="<?php echo $s["ID"] ?>" />
                                            <?php if ($s["KhuyenMai"] == true) { ?>
                                                <input type="hidden" name="dongia" value="<?php echo $s["giakhuyenmai"] ?>" />
                                            <?php } ?>
                                            <?php if ($s["KhuyenMai"] == false) { ?>
                                                <input type="hidden" name="dongia" value="<?php echo $s["Gia"] ?>" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <?php
                                $total += $_SESSION['cart'][$s["ID"]] * $s["Gia"];
                                ?>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <input type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" />
        </div>
    </div>
</form>

<?php include "footer.php" ?>

</body>

</html>

<script>
    var date = new Date();

    var date = new Date();

    // Thêm 5 ngày vào ngày hiện tại
    date.setDate(date.getDate() + 5);

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>

<script src="plugins/select2/select2.full.min.js"></script>
<script>
    $(function() {
        $(".select2").select2();
    });
</script>



<?php
// Calculate the total amount
$total_amount = $total; // Assuming $total is already calculated

// Store the total amount in the session
$_SESSION['tongtien'] = $total_amount;
?>