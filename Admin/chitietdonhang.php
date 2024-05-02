<?php include "head.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include "Header.php"; ?> 
        <?php include "aside.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Chi tiết đơn hàng
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <?php
                                if (isset($_GET['sodh'])) {
                                    $sodh = $_GET['sodh'];
                                    // Lấy thông tin chi tiết đơn hàng từ CSDL
                                    require '../inc/myconnect.php';
                                    $sql_hoadon = "SELECT * FROM hoadon WHERE sodh = '$sodh'";
                                    $result_hoadon = $conn->query($sql_hoadon);
                                    if ($result_hoadon->num_rows > 0) {
                                        // Lặp qua từng đơn hàng
                                        while ($row_hoadon = $result_hoadon->fetch_assoc()) {
                                ?>
                                            <div class="form-group">
                                                <label for="sodh">Số hóa đơn:</label>
                                                <p id="sodh"><?php echo $row_hoadon["sodh"]; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="tinhtrang">Tình trạng đơn hàng:</label>
                                                <form action="update_tinhtrang.php" method="post">
                                                    <input type="hidden" name="sodh" value="<?php echo $sodh; ?>">
                                                    <select class="form-control" name="tinhtrang">
                                                        <option value="Đang xử lý" <?php if ($row_hoadon['tinh_trang_don_hang'] == 'Đang xử lý') echo 'selected'; ?>>Đơn hàng đang xử lý</option>
                                                        <option value="Đã xác nhận" <?php if ($row_hoadon['tinh_trang_don_hang'] == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                                                        <option value="Đang được giao" <?php if ($row_hoadon['tinh_trang_don_hang'] == 'Đang được giao') echo 'selected'; ?>>Đang được giao</option>
                                                        <option value="Đã giao thành công" <?php if ($row_hoadon['tinh_trang_don_hang'] == 'Đã giao thành công') echo 'selected'; ?>>Đã giao thành công</option>
                                                        <option value="Đã huỷ đơn" <?php if ($row_hoadon['tinh_trang_don_hang'] == 'Đã huỷ đơn') echo 'selected'; ?>>Đã huỷ đơn</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                </form>
                                            </div>
                                            <!-- Hiển thị thông tin về các sản phẩm trong đơn hàng -->
                                            <div class="form-group">
                                                <h3>Các sản phẩm trong đơn hàng:</h3>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>Đơn giá</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Truy vấn để lấy thông tin về các sản phẩm trong đơn hàng
                                                        $sql_sanpham = "SELECT c.*, s.Ten as tensanpham FROM chitiethoadon c LEFT JOIN sanpham s ON s.ID = c.masp WHERE c.sodh = '$sodh'";
                                                        $result_sanpham = $conn->query($sql_sanpham);
                                                        if ($result_sanpham->num_rows > 0) {
                                                            while ($row_sanpham = $result_sanpham->fetch_assoc()) {
                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $row_sanpham['tensanpham']; ?></td>
                                                                        <td><?php echo $row_sanpham['soluong']; ?></td>
                                                                        <td><?php echo $row_sanpham['dongia']; ?>.000 VNĐ</td>
                                                                        <td><?php echo $row_sanpham['thanhtien']; ?>0 VNĐ</td>
                                                                    </tr>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='4'>Không có sản phẩm trong đơn hàng này.</td></tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                <?php
                                        }
                                    } else {
                                        echo "Không tìm thấy đơn hàng!";
                                    }
                                } else {
                                    echo "Không có số đơn hàng được cung cấp!";
                                }
                                ?>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?php include "footer.php"; ?>
        <?php include "ControlSidebar.php"; ?>
        <!-- Control Sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>
</html>
