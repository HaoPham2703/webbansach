<?php
include "login.php";
include "head.php";
include "top.php";
include "header.php";
include "navigation.php";

$tentimkiem = isset($_GET["txttimkiem"]) ? $_GET["txttimkiem"] : "";

$result_count = mysqli_query($conn, "SELECT COUNT(ID) AS total FROM sanpham WHERE Ten LIKE '%$tentimkiem%' ");
$row_count = mysqli_fetch_assoc($result_count);
$total_records = $row_count['total'];

if ($total_records == 0) {
    header('Location: timkiemkhongco.php');
    exit();
}

?>
<!--//////////////////////////////////////////////////-->
<!--///////////////////Category Page//////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a>Kết quả tìm kiếm</a></li>
                </ul>
            </div>
        </div>

        <!-- Thêm các nút sắp xếp -->
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <button onclick="filterAndSort1('<?php echo $tentimkiem; ?>', '<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>', 'gia-cao-nhat')" class="btn <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'gia-cao-nhat') ? 'btn-primary' : 'btn-default'; ?>">
                        Giá: cao -> thấp <i class="fas fa-sort-amount-down"></i>
                    </button>
                    <button onclick="filterAndSort1('<?php echo $tentimkiem; ?>', '<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>', 'gia-thap-nhat')" class="btn <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'gia-thap-nhat') ? 'btn-primary' : 'btn-default'; ?>">
                        Giá: thấp -> cao <i class="fas fa-sort-amount-up"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Kết thúc các nút sắp xếp -->

        <!-- Thêm các nút lọc giá -->
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <!-- Thêm các nút hoặc dropdown lọc giá -->
                    <button onclick="filterAndSort1('<?php echo $tentimkiem; ?>', 'lt-100', '<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>')" class="btn <?php echo (isset($_GET['price']) && $_GET['price'] == 'lt-100') ? 'btn-primary' : 'btn-default'; ?>">Nhỏ hơn 100,000₫</button>
                    <button onclick="filterAndSort1('<?php echo $tentimkiem; ?>', '100-200', '<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>')" class="btn <?php echo (isset($_GET['price']) && $_GET['price'] == '100-200') ? 'btn-primary' : 'btn-default'; ?>">Từ 100,000₫ - 200,000₫</button>
                </div>
            </div>
        </div>
        <!-- Kết thúc các nút lọc giá -->

        <div class="row">
            <div id="main-content" class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="products">
                            <?php
                            require 'inc/myconnect.php';

                            $manhasx = isset($_GET["manhasx"]) ? $_GET["manhasx"] : '';
                            $sort = isset($_GET["sort"]) ? $_GET["sort"] : '';
                            $price_filter = isset($_GET['price']) ? $_GET['price'] : '';

                            $sql_query = "SELECT * FROM sanpham WHERE Ten LIKE '%$tentimkiem%'";

                            if (!empty($manhasx)) {
                                $sql_query .= " AND Manhasx = '$manhasx'";
                            }

                            switch ($sort) {
                                case 'gia-cao-nhat':
                                    $sql_query .= " ORDER BY Gia DESC";
                                    break;
                                case 'gia-thap-nhat':
                                    $sql_query .= " ORDER BY Gia ASC";
                                    break;
                                default:
                                    $sql_query .= " ORDER BY ID ASC";
                            }

                            switch ($price_filter) {
                                case 'lt-100':
                                    $sql_query = "SELECT * FROM sanpham WHERE Gia < 100";
                                    break;
                                case '100-200':
                                    $sql_query = "SELECT * FROM sanpham WHERE Gia >= 100 AND Gia < 200";
                                    break;
                                default:
                                    // Không thêm bất kỳ điều kiện lọc nào nếu không có lựa chọn
                            }

                            $result = mysqli_query($conn, $sql_query);
                            if (!$result) {
                                die('Error: ' . mysqli_error($conn));
                            }

                            $total_records = mysqli_num_rows($result);

                            if ($total_records == 0) {
                                header('Location: khongcosanpham.php');
                                exit;
                            }

                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 9;
                            $total_page = ceil($total_records / $limit);

                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } elseif ($current_page < 1) {
                                $current_page = 1;
                            }

                            $start = ($current_page - 1) * $limit;

                            $sql_query .= " LIMIT $start, $limit";
                            $result = mysqli_query($conn, $sql_query);
                            if (!$result) {
                                die('Error: ' . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                $ten_san_pham = $row["Ten"];
                                if (mb_strlen($ten_san_pham, 'UTF-8') > 22) {
                                    $ten_san_pham = mb_substr($ten_san_pham, 0, 22, 'UTF-8') . '...';
                                }
                                ?>

                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <div class="product">
                                        <div class="image"><a href="product.php?id=<?php echo $row["ID"] ?>"><img src="images/<?php echo $row["HinhAnh"] ?>" style="width:100%; height:auto;" /></a></div>
                                        <div class="caption">
                                            <div class="name">
                                                <h3><a href="product.php?id=<?php echo $row["ID"] ?>"><?php echo $ten_san_pham ?></a></h3>
                                            </div>
                                            <div class="price"><?php echo $row["Gia"] ?>.000 VNĐ</div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <ul class="pagination">
                        <?php
                        // Hiển thị các nút phân trang
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                // Hiển thị trang hiện tại
                                echo '<li class="active"><a href="#">' . $i . '</a></li>';
                            } else {
                                // Hiển thị các trang khác
                                echo '<li><a href="timkiem.php?txttimkiem=' . $tentimkiem . '&page=' . $i . '">' . $i . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            // Include sidebar
            include "sidebarSearch.php";
            ?>
        </div>
    </div>
</div>

<!-- Sờ cờ ríp -->
<script>
    var currentSort = '<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>';
    var currentPrice = '<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>';

    function filterAndSort1(tentimkiem, price, sort) {
        // Kiểm tra và cập nhật trạng thái của các nút sắp xếp
        if (sort === currentSort) {
            currentSort = ''; // Nếu nút đã được chọn, đặt lại trạng thái về mặc định
        } else {
            currentSort = sort; // Nếu nút không được chọn, đặt trạng thái mới
        }

        // Kiểm tra và cập nhật trạng thái của các nút lọc giá
        if (price === currentPrice) {
            currentPrice = ''; // Nếu nút đã được chọn, đặt lại trạng thái về mặc định
        } else {
            currentPrice = price; // Nếu nút không được chọn, đặt trạng thái mới
        }

        // Xây dựng URL mới dựa trên trạng thái mới của các nút
        var url = 'timkiem.php?txttimkiem=' + tentimkiem + '&price=' + currentPrice + '&sort=' + currentSort;
        window.location.href = url; // Chuyển hướng đến trang mới với các tham số đã được cập nhật
    }
</script>


<?php
include "footer.php";
?>
</body>

</html>
