<main>
    <div class="carousel slide container" data-bs-ride="carousel" id="banner_carousel">
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Image\Banner_Quatang_310x210.png" class="d-block w-100 m-auto" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Image\NCCKimDong_T323_BannerSmallBanner_310x210.png" class="d-block w-100 m-auto" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Image\Banner_Quatang_310x210.png" class="d-block w-100 m-auto" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" data-bs-target="#banner_carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" data-bs-target="#banner_carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
            <button data-bs-target="#banner_carousel" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#banner_carousel" data-bs-slide-to="1"></button>
            <button data-bs-target="#banner_carousel" data-bs-slide-to="2"></button>
        </div>
    </div>

    <div class="container-xl bg-light pb-3">
        <div class="discount_header">
            <p>Khuyến mãi</p>
            <span>Kết thúc trong</span>
            <span>12312312321</span>
        </div>  

        <!--TODO: can ajax carousel -->
        <div id="khuyenmai_carousel" class="carousel sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
<?php
$Sach_query = "SELECT * FROM sach;";
$Sach_result = mysqli_query($con, $Sach_query);
if (mysqli_num_rows($Sach_result) > 0) {
    while ($row_Sach = mysqli_fetch_assoc($Sach_result)) {
        $id_Sach = $row_Sach['id'];
        $id_SachKM = $row_Sach['phanTramKhuyenMai'];
        if ($id_SachKM > 0) {
            $Hinhanhsach_query = "SELECT hinhanhsach.url, hinhanhsach.idSach FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
            $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
            if (mysqli_num_rows($Hinhanhsach_result) > 0) {
                while ($row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result)) {
                    $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100);
                    echo '
                    <div class="carousel-item">
                        <div class="card">
                            <div class="img-wrapper">
                                <img src="' . $row_hinhanh['url'] . '" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">' . $row_Sach['ten'] . '</h5>
                                <p class="card-text">' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>';
                }
            }
        }
    }
}
?>
            <button class="carousel-control-prev" type="button" data-bs-target="#khuyenmai_carousel" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#khuyenmai_carousel" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="more">
            <button data-bs-target="#km_collapse" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>

        <!-- show response from ajax request -->
        <div class="collapse show w-100 paginator_collapse" id="km_collapse">
            <nav class="w-100 d-flex justify-content-center mb-3"></nav>
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>

                                <!-- Sách tiếng việt -->
<?php
echo'
    <div class="container bg-light pb-3 ">
        <div class="bookszoneproduct_header">
                <div class="title">
                    <p>Sách tiếng việt</p>
                </div>
                <div class="list">';
?>
<?php
    //Lấy các chủ đề thuộc sách tiếng việt
    $Danhmuc_query = "SELECT danhmuc.id, danhmuc.tenDanhMuc FROM danhmuc;";
    $Danhmuc_result = mysqli_query($con, $Danhmuc_query);
    $str2 = 'Sách Trong Nước'; 
    if (mysqli_num_rows($Danhmuc_result) > 0) {
        while ($row_danhmuc = mysqli_fetch_assoc($Danhmuc_result)) {
            $result = strcmp($row_danhmuc['tenDanhMuc'],$str2); //So sánh và chỉ xuất ra danh mục bằng Sách Tiếng Việt
            if($result === 0){ 
                $Chude_query = "SELECT chude.id, chude.tenChuDe, chude.idDanhMuc FROM `chude` WHERE chude.idDanhMuc = " . $row_danhmuc['id'];
                $Chude_result = mysqli_query($con, $Chude_query);
                if (mysqli_num_rows($Chude_result) > 0) {
                    while ($row_chude = mysqli_fetch_assoc($Chude_result)) {
                        echo'
                        <li><a onclick="filterBooksVie(\'' . $row_chude['tenChuDe'] . '\')">' . $row_chude['tenChuDe'] . '</a></li>                        ';
                    }
                }
            }
        }
    }
?>
<?php
echo'           </div>
        </div>
        <div id="demo" class="carousel container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">';
?>
                <div class="carousel-item active" id="list_vie">
<?php
                    //Lấy các sản phẩm thuộc sách tiếng việt
                    $Sach_query = "SELECT * FROM sach;";
                    $Sach_result = mysqli_query($con, $Sach_query);
                    if (mysqli_num_rows($Sach_result) > 0){
                        while ($row_Sach = mysqli_fetch_assoc($Sach_result)){
                            // $id_TV = $row_Sach['idNgonNgu'];
                            $id_Sach = $row_Sach['id'];
                            $TiengViet = '1';
                            $resultt = strcmp($row_Sach['idNgonNgu'],$TiengViet);
                            if($resultt === 0){
                                $Hinhanhsach_query = "SELECT hinhanhsach.url, hinhanhsach.idSach FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
                                $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
                                if(mysqli_num_rows($Hinhanhsach_result)>0){
                                    while ($row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result)){
                                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100) ;
                                        echo'    
                                        <div class="card">
                                            <div class="img-wrapper">
                                                <img src="' . $row_hinhanh['url'] . '" alt="">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">' . $row_Sach['ten'] . '</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>';
                                    }
                                }
                            }
                        }
                    }
?>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="more">
            <button data-bs-target="#sp_collapse" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>

        <!-- show response from ajax request -->
        <div class="collapse show w-100 paginator_collapse" id="sp_collapse">
            <div class="response row mb-3 g-1 m-auto"></div>
            
        </div>
    </div>
    
 </div>

                                <!-- Sách tiếng anh -->
<?php
echo'
    <div class="container bg-light pb-3 ">
        <div class="bookszoneproduct_header">
                <div class="title">
                    <p>Sách tiếng việt</p>
                </div>
                <div class="list">';
?>
<?php
    //Lấy các chủ đề thuộc sách tiếng anh
    $Danhmuc_query = "SELECT danhmuc.id, danhmuc.tenDanhMuc FROM danhmuc;";
    $Danhmuc_result = mysqli_query($con, $Danhmuc_query);
    $str2 = 'Foreign Books'; 
    if (mysqli_num_rows($Danhmuc_result) > 0) {
        while ($row_danhmuc = mysqli_fetch_assoc($Danhmuc_result)) {
            $result = strcmp($row_danhmuc['tenDanhMuc'],$str2); //So sánh và chỉ xuất ra danh mục bằng Sách Tiếng anh
            if($result === 0){ 
                $Chude_query = "SELECT chude.id, chude.tenChuDe, chude.idDanhMuc FROM `chude` 
                                WHERE chude.idDanhMuc = " . $row_danhmuc['id'];
                $Chude_result = mysqli_query($con, $Chude_query);
                if (mysqli_num_rows($Chude_result) > 0) {
                    while ($row_chude = mysqli_fetch_assoc($Chude_result)) {
                        echo'
                            <li><a onclick="filterBooksEng(\'' . $row_chude['tenChuDe'] . '\',
                            \'' . $str2 . '\')">' . $row_chude['tenChuDe'] . '</a></li>';
                    }
                }
            }
        }
    }
?>
<?php
echo'           </div>
        </div>
        <div id="demo" class="carousel container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">';
?>
                <div class="carousel-item active" id="list_eng">
<?php
                    //Lấy các sản phẩm thuộc sách tiếng anh
                    $Sach_query = "SELECT * FROM sach;";
                    $Sach_result = mysqli_query($con, $Sach_query);
                    if (mysqli_num_rows($Sach_result) > 0){
                        while ($row_Sach = mysqli_fetch_assoc($Sach_result)){
                            // $id_TV = $row_Sach['idNgonNgu'];
                            $id_Sach = $row_Sach['id'];
                            $TiengAnh = '2';
                            $resultt = strcmp($row_Sach['idNgonNgu'],$TiengAnh);
                            if($resultt === 0){
                                $Hinhanhsach_query = "SELECT hinhanhsach.url, hinhanhsach.idSach FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
                                $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
                                if(mysqli_num_rows($Hinhanhsach_result)>0){
                                    while ($row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result)){
                                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100) ;
                                        echo'    
                                        <div class="card">
                                            <div class="img-wrapper">
                                                <img src="' . $row_hinhanh['url'] . '" alt="">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">' . $row_Sach['ten'] . '</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>';
                                    }
                                }
                            }
                        }
                    }
    ?>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="more">
            <button data-bs-target="#sp_collapse" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>

        <!-- show response from ajax request -->
        <div class="collapse show w-100 paginator_collapse" id="sp_collapse">
            <div class="response row mb-3 g-1 m-auto"></div>
            
        </div>
    </div>
</main>