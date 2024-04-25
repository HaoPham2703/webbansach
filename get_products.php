<?php
require 'inc/myconnect.php';

$limit = 4;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($current_page - 1) * $limit;

$query = "SELECT * FROM sanpham ORDER BY ID DESC LIMIT $start, $limit";
$rs = $conn->query($query);

$products_html = '';
if ($rs->num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
        // Tạo HTML cho mỗi sản phẩm
        $products_html .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
        $products_html .= '<div class="product">';
        $products_html .= '<div class="image"><a href="product.php?id='.$row["ID"].'"><img src="images/'.$row["HinhAnh"].'" style="width:300px;height:300px"/></a></div>';
        $products_html .= '<div class="caption">';
        $products_html .= '<div class="name"><h3><a href="product.php?id='.$row["ID"].'">'.$row["Ten"].'</a></h3></div>';
        $products_html .= '<div class="price">'.$row["Gia"].'.000 VNĐ</div>';
        $products_html .= '</div>';
        $products_html .= '</div>';
        $products_html .= '</div>';
    }
}

// Tính toán phân trang và tạo HTML cho phân trang
$total_records_query = mysqli_query($conn, 'select count(ID) as total from sanpham');
$row = mysqli_fetch_assoc($total_records_query);
$total_records = $row['total'];
$total_page = ceil($total_records / $limit);

$pagination_html = '<ul class="pagination">';
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $current_page) {
        $pagination_html .= '<li class="active"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
    } else {
        $pagination_html .= '<li><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
    }
}
$pagination_html .= '</ul>';

$response = array(
    'products_html' => $products_html,
    'pagination_html' => $pagination_html
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
