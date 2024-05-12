<div class="row">
    <div class="col-lg-12">
        <div class="heading">
            <h2>Sản phẩm mới nhất</h2>
        </div>
        <div id="product-list">
            <?php
            while ($row = $result->fetch_assoc()) {
                $productName = $row["Ten"];
                $productNameDisplay = mb_strlen($productName, 'UTF-8') > 26 ? mb_substr($productName, 0, 26, 'UTF-8') . '...' : $productName;
            ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product">
                        <div class="image"><a href="product.php?id=<?php echo $row["ID"]; ?>"><img src="images/<?php echo $row["HinhAnh"]; ?>" style="width:300px;height:300px" /></a></div>
                        <div class="caption">
                            <div class="name">
                                <h3><a href="product.php?id=<?php echo $row["ID"]; ?>"><?php echo $productNameDisplay; ?></a></h3>
                            </div>
                            <?php if ($row["KhuyenMai"] == true) { ?>
                                <div class="price" style="color: red;"><?php echo $row["giakhuyenmai"]; ?>,000₫<span style="font-size: 14px;"><?php echo $row["Gia"]; ?>,000₫</span></div>
                            <?php } ?>
                            <div class="g-plusone" data-size="medium" data-annotation="none" data-href="/product.php?id=<?php echo $row["ID"]; ?>"></div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>

    <div class="row text-center">

        <div id="pagination">
            <!-- Các nút phân trang sẽ được cập nhật ở đây -->
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function shortenProductName(name) {
        return name.length > 26 ? name.substring(0, 26) + '...' : name;
    }

    $(document).ready(function() {
        loadProducts(1);

        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('data-page');
            loadProducts(page);
        });

        function loadProducts(page) {
            $.ajax({
                url: 'get_products.php',
                type: 'GET',
                data: {
                    page: page
                },
                success: function(response) {
                    // Rút gọn tên sản phẩm trước khi hiển thị
                    $('#product-list').html(response.products_html);
                    $('#product-list .name a').each(function() {
                        var productName = $(this).text();
                        $(this).text(shortenProductName(productName));
                    });
                    $('#pagination').html(response.pagination_html);
                }
            });
        }
    });
</script>
