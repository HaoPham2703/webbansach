<?php
ob_start();
?>
<?php
include "login.php";
?>
<?php
include "head.php";
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
<!--//////////////////////////////////////////////////-->
<!--///////////////////Category Page//////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="category.php">SẢN PHẨM</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div id="main-content" class="col-md-8">

                <!-- Thêm các nút sắp xếp -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <a href="category.php?manhasx=<?php echo isset($_GET['manhasx']) ? $_GET['manhasx'] : ''; ?>&sort=gia-cao-nhat" class="btn btn-default">Giá từ cao đến thấp</a>
                            <a href="category.php?manhasx=<?php echo isset($_GET['manhasx']) ? $_GET['manhasx'] : ''; ?>&sort=gia-thap-nhat" class="btn btn-default">Giá từ thấp đến cao</a>
                            
                        </div>
                    </div>
                </div>
                <!-- Kết thúc các nút sắp xếp -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="products">
                            <?php
                            require 'inc/myconnect.php';

                            $manhasx = isset($_GET["manhasx"]) ? $_GET["manhasx"] : '';
                            $sort = isset($_GET["sort"]) ? $_GET["sort"] : '';

                            $sql_query = "SELECT * FROM sanpham";

                            if (!empty($manhasx)) {
                                $sql_query .= " WHERE Manhasx = '$manhasx'";
                            }

                            switch ($sort) {
                                case 'gia-cao-nhat':
                                    $sql_query .= " ORDER BY Gia DESC";
                                    break;
                                case 'gia-thap-nhat':
                                    $sql_query .= " ORDER BY Gia ASC";
                                    break;
                                case 'moi-nhat':
                                    $sql_query .= " ORDER BY NgayCapNhat DESC";
                                    break;
                                default:
                                    $sql_query .= " ORDER BY ID ASC";
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
                            $limit = 12;
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
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                        ?>
                                <li class="active"><a href="#"><?php echo $i ?></a></li>
                            <?php
                            } else {
                            ?>
                                <li><?php echo '<a href="category.php?manhasx=' . $manhasx . '&sort=' . $sort . '&page=' . $i . '">' . $i . '</a> '; ?></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            include "sidebar.php";
            ?>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>

</html>
<?php ob_end_flush(); ?>
