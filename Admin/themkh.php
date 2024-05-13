<?php
ob_start();
include "head.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include "Header.php"; ?>
    <?php include "aside.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Thêm
          <small>khách hàng</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Thêm khách hàng</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="xulythemkh.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-10">
                      <input type="text" name="HoTen" class="form-control" placeholder="Nhập họ tên" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                    <div class="col-sm-10">
                      <input type="text" name="DienThoai" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-10">
                      <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
                    <div class="col-sm-10">
                      <input type="password" name="matkhau" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <a href="qlykhachhang.php"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                  <button type="submit" name="create" class="btn btn-info pull-right">Create</button>
                </div><!-- /.box-footer -->
              </form>
            </div><!-- /.box -->
          </div><!--/.col (right) -->
        </div> <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "footer.php"; ?>
    <?php include "ControlSidebar.php"; ?>
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();
    });
  </script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>
<?php ob_end_flush(); ?>
