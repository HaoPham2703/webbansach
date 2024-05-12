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
                    Quản lý
                    <small>hóa đơn</small>
                </h1>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Quản lý hóa đơn</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    

                                        <tr>
                                            <th>Số đơn hàng</th>
                                            <th>Tên Sách</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th> 
                                            <th>Ngày giao hàng</th> 
                                            <th>Địa chỉ</th>       
                                            <th>Dịch vụ</th> 
                                            <th>Chi tiết đơn hàng</th>              
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        <?php
                                            require '../inc/myconnect.php';
                                            $sql="SELECT h.sodh,soluong,dongia,h.thanhtien
                                            ,s.Ten as tensanpham,ngaygiao,diachi,madv
                                            from chitiethoadon c 
                                            LEFT JOIN sanpham s on s.ID= c.masp
                                            LEFT JOIN hoadon h on h.sodh= c.sodh Order by h.sodh  ";
                                            $result = $conn->query($sql); 
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                $prev_sodh = ""; // Biến để lưu trữ số đơn hàng trước đó
                                                $colors = []; // Mảng để lưu trữ màu cho từng số đơn hàng
                                                while($row = $result->fetch_assoc()) {
                                                    if (!isset($colors[$row["sodh"]])) {
                                                        $colors[$row["sodh"]] = count($colors) % 2 == 0 ? "darkgray" : "lightgray";
                                                    }
                                        ?>       
                                        <tr style="background-color: <?php echo $colors[$row["sodh"]]; ?>">
                                            <td><?php  echo $row["sodh"] ?></td>                                                   
                                            <td><a href="chitiethd.php?sodh=<?php echo $row["sodh"]?>" style="color:black"><?php echo $row["tensanpham"] ?></a></td>
                                            <td><?php  echo $row["soluong"] ?></td>
                                            <td><?php  echo $row["dongia"] ?>.000 VNĐ</td>
                                            <td><?php  echo $row["thanhtien"] ?>0 VNĐ</td>  
                                            <td><?php echo date_format(date_create($row["ngaygiao"]), "d/m/Y"); ?></td>   
                                            <td><?php  echo $row["diachi"] ?></td>  

                                            <td>
                                            
                                                <?php
                                                if($row["madv"]!= "") {
                                                    $ma = $row["madv"];
                                                    $sql_dv = "SELECT tendv from dichvu where madv  in ($ma)";
                                                    $results_dv = $conn->query($sql_dv);
                                                    if ($results_dv->num_rows > 0) {
                                                        while($s = $results_dv->fetch_assoc()) {
                                                            echo "<p>".$s["tendv"] ."</p>";                      
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td ><a href="chitietdonhang.php?sodh=<?php echo $row["sodh"]; ?>" style="color: red;">Xem chi tiết</a></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <div class="filter-container">
  

                                    </tbody>                   
                                </table>
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
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</body>
</html>
