<div id="sidebar" class="col-md-4">
    <div class="widget wid-categories">
        <div class="heading" onclick="togglePublisherMenu()">
            <h4>Nhà xuất bản <i class="fas fa-caret-down"></i></h4>
        </div>
        <div class="content" id="publisherMenu" style="display: none;">
            <ul>
                <?php
                require 'inc/myconnect.php';
                $layidrandom = "SELECT ID, Ten FROM nhaxuatban";
                $kq = $conn->query($layidrandom);
                if ($kq->num_rows > 0) {
                    while ($d = $kq->fetch_assoc()) {
                        $publisherId = $d["ID"];
                        $publisherName = $d["Ten"];
                        $isActive = isset($_GET['manhasx']) && $_GET['manhasx'] == $publisherId ? 'text-primary' : '';
                ?>
                        <li><a id="publisher_<?php echo $publisherId ?>" href="#" onclick="togglePublisherFilter(event, '<?php echo $publisherId ?>')" class="<?php echo $isActive ?>"><?php echo $publisherName ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
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
    function togglePublisherFilter(event, publisherId) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        var currentUrl = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);

        var txttimkiem = urlParams.get('txttimkiem') || '';
        var tk = urlParams.get('tk') || '';
        var price = urlParams.get('price') || '';
        var sort = urlParams.get('sort') || '';

        urlParams.delete('manhasx');

        urlParams.append('manhasx', publisherId);

        var newUrl = currentUrl.split('?')[0] + '?';
        if (txttimkiem !== '') {
            newUrl += 'txttimkiem=' + txttimkiem + '&';
        }
        if (tk !== '') {
            newUrl += 'tk=' + tk + '&';
        }
        if (price !== '') {
            newUrl += 'price=' + price + '&';
        }
        if (sort !== '') {
            newUrl += 'sort=' + sort + '&';
        }
        newUrl += urlParams.toString();

        window.location.href = newUrl;
    }
</script>


<script>
    function togglePublisherMenu() {
        var menu = document.getElementById('publisherMenu');
        menu.style.display = (menu.style.display === 'none') ? 'block' : 'none';
    }
</script>
