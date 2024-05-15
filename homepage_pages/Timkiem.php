<?php
require("database.php");
?>
<?php
    function limitString($string, $limit) {
            if (strlen($string) > $limit) {
                $string = substr($string, 0, $limit) . '...';
            }
            return $string;
        }
?>
<div class="carousel container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
    <div class="carousel-inner">

        <?php
        if (isset($_GET['keyword']) || isset($_GET['theloai']) || isset($_GET['price_range'])) {
            // Lấy giá trị từ các tham số truy vấn
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $theloai = isset($_GET['theloai']) ? $_GET['theloai'] : '';
            $minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : null;
            $maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : null;

            // Xây dựng câu truy vấn tìm kiếm dựa trên thông tin nhận được
            $sql = "SELECT sach.*, hinhanhsach.url
                    FROM sach
                    INNER JOIN hinhanhsach ON sach.id = hinhanhsach.idSach
                    INNER JOIN theloai ON sach.idTheLoai = theloai.id";

            // Thêm điều kiện tìm kiếm theo từ khóa
            if (!empty($keyword)) {
                $sql .= " AND sach.ten LIKE '%$keyword%'";
            }

            // Thêm điều kiện tìm kiếm theo thể loại
            if (!empty($theloai)) {
                $sql .= " AND theloai.tenTheLoai = '$theloai'";
            }

            // Thêm điều kiện tìm kiếm theo khoảng giá
            if ($minPrice !== null && $maxPrice !== null) {
                if ($minPrice !== '') {
                    $sql .= " AND sach.giagoc >= $minPrice";
                }
                if ($maxPrice !== '') {
                    $sql .= " AND sach.giagoc <= $maxPrice";
                }
            }

            // Thực hiện truy vấn
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $displayedProducts = array(); // Mảng lưu trữ các sản phẩm đã hiển thị
                while ($row = mysqli_fetch_assoc($result)) {
                    $productId = $row['id'];
                    $Discount_price = $row['giagoc'] - ($row['phanTramKhuyenMai'] * $row['giagoc'] / 100);
                    $tenSach = limitString($row['ten'], 22); // Thay 30 bằng độ dài tối đa bạn muốn
                    // Kiểm tra xem sản phẩm đã được hiển thị hay chưa
                    if (!in_array($productId, $displayedProducts)) {
                        echo '
                        <div class="carousel-item active " id="list_vie">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="' . $row['url'] . '" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">' . $tenSach . '</h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text " >' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                                        <p class="card-text text-decoration-line-through" style="color: red">' . number_format($row['giagoc'], 0, '', '.') . 'đ</p>    
                                    </div>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>';
                        // Thêm sản phẩm vào mảng đã hiển thị
                        $displayedProducts[] = $productId;
                    }
                }
            } else {
                echo '
                <div class="product w-100 justify-content-center">
                    <p>Không tìm thấy sách phù hợp.</p>
                </div>';
            }
        }
        ?>
    </div>
</div>
