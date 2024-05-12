<?php
    require("database.php");
?>
<!-- <?php
    // if (isset($_GET['chude'])) {
    //     // Lấy giá trị của tham số truy vấn 'chude'
    //     $selectedChude = $_GET['chude'];

    //     // TODO: Kết nối đến cơ sở dữ liệu và thực hiện câu truy vấn để lấy sách theo chủ đề
    //     $Sach_query = "SELECT sach.*, hinhanhsach.url
    //                 FROM sach
    //                 INNER JOIN hinhanhsach ON sach.id = hinhanhsach.idSach
    //                 INNER JOIN theloai ON sach.idTheLoai = theloai.id
    //                 INNER JOIN chude ON theloai.idChuDe = chude.id
    //                 WHERE chude.tenChuDe = '$selectedChude'
    //                 GROUP BY sach.id";
    //     $Sach_result = mysqli_query($con, $Sach_query);
    //     if (mysqli_num_rows($Sach_result) > 0) {
    //         while ($row_Sach = mysqli_fetch_assoc($Sach_result)) {
    //             $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100);
    //             echo '
    //                     <div class="card">
    //                         <div class="img-wrapper">
    //                             <img src="' . $row_hinhanh['url'] . '" alt="">
    //                         </div>
    //                         <div class="card-body">
    //                             <h5 class="card-title">' . $row_Sach['ten'] . '</h5>
    //                             <p class="card-text">' . number_format($Discount_price, 0, '', '.') . ' đ</p>
    //                             <a href="#" class="btn btn-primary">Go somewhere</a>
    //                         </div>
    //                     </div>';
    //         }
    //     } else {
    //         echo '
    //             <div class="product">
    //                 <p>Không có sản phẩm thuộc chủ đề này</p>
    //             </div>';
    //     }
    // }
?> -->
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
            $Hinhanhsach_query = "SELECT hinhanhsach.url FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
            $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
            $row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result);
            $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100);
            echo '
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="' . $row_hinhanh['url'] . '" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . $row_Sach['ten'] . '</h5>
                            <p class="card-text">' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>';
        }
    } else {
        echo '
            <div class="product">
                <p>Không có sản phẩm thuộc chủ đề này</p>
            </div>';
    }
}
?>