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
    <div class="carousel-inner">
        <?php
            if (isset($_GET['chude'])) {
                // Lấy giá trị của tham số truy vấn 'chude'
                $selectedChude = $_GET['chude'];

                // TODO: Kết nối đến cơ sở dữ liệu và thực hiện câu truy vấn để lấy sách theo chủ đề
                $Sach_query = "SELECT sach.*, hinhanhsach.url
                                FROM sach
                                INNER JOIN hinhanhsach ON sach.id = hinhanhsach.idSach
                                INNER JOIN theloai ON sach.idTheLoai = theloai.id
                                INNER JOIN chude ON theloai.idChuDe = chude.id
                                WHERE chude.tenChuDe = '$selectedChude'
                                GROUP BY sach.id";
                $Sach_result = mysqli_query($con, $Sach_query);
                if (mysqli_num_rows($Sach_result) > 0) {
                    while ($row_Sach = mysqli_fetch_assoc($Sach_result)) {
                        $id_Sach = $row_Sach['id'];
                        $tenSach = limitString($row_Sach['ten'], 22); // Thay 30 bằng độ dài tối đa bạn muốn
                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100);
                        echo'    
                        <div class="carousel-item active " id="list_vie">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="' . $row_Sach['url'] . '" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">' . $tenSach . '</h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text " >' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                                        <p class="card-text text-decoration-line-through" style="color: red">' . number_format($row_Sach['giagoc'], 0, '', '.') . 'đ</p>    
                                    </div>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '
                        <div class="product d-flex justify-content-center">
                            <p>Không có sản phẩm thuộc chủ đề này</p>
                        </div>';
                }
            }
        ?>
    </div>
