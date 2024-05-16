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
<div class="container-xl bg-light pb-3" id="locsach">
    <!--TODO: can ajax carousel -->
    <div id="locsach_carousel" class="carousel sanpham_carousel mb-3" data-bs-ride="carousel"> 
        <div class="carousel-inner row">
            <?php
            if (isset($_GET['theloai'])) {
                // Lấy giá trị của tham số truy vấn 'theloai'
                $selectedTheloai = $_GET['theloai'];

                // Kết nối đến cơ sở dữ liệu và thực hiện câu truy vấn để lấy sách theo thể loại
                $Sach_query = "SELECT sach.*, hinhanhsach.url
                            FROM sach
                            INNER JOIN hinhanhsach ON sach.id = hinhanhsach.idSach
                            INNER JOIN theloai ON sach.idTheLoai = theloai.id
                            WHERE theloai.tenTheLoai = '$selectedTheloai'
                            GROUP BY sach.id";
                $Sach_result = mysqli_query($con, $Sach_query);
                if (mysqli_num_rows($Sach_result) > 0) {
                    $i = 0;
                    while ($row_Sach = mysqli_fetch_assoc($Sach_result)) {
                        $id_Sach = $row_Sach['id'];
                        $Hinhanhsach_query = "SELECT hinhanhsach.url FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
                        $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
                        $row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result);
                        $tenSach = limitString($row_Sach['ten'], 22); // Thay 30 bằng độ dài tối đa bạn muốn
                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100);
                        echo '
                        <div class="carousel-item col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="card mb-3">
                                <div class="img-wrapper">
                                    <img src="' . $row_hinhanh['url'] . '" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">' . $tenSach . '</h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                                        <p class="card-text text-decoration-line-through" style="color: red">' . number_format($row_Sach['giagoc'], 0, '', '.') . 'đ</p>
                                    </div>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '
                    <div class="product w-100 justify-content-center">
                        <p>Không tìm thấy sách phù hợp.</p>
                    </div>';
                    $i++;
                }
            }
            ?>
        </div>

        <!-- show response from ajax request -->
        <div id="locsach_collapse" class="collapse show w-100 paginator_collapse">
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>
</div>
