<?php
    require("./homepage_pages/database.php");
?>
<?php
    function limitString($string, $limit) {
            if (strlen($string) > $limit) {
                $string = substr($string, 0, $limit) . '...';
            }
            return $string;
        }
?>
<main>
    <div id="filtered-books" style="display: none"></div>
    <div class="search_dropdown w-100 hidden" id="search_dropdown">
        <div class="search_input d-flex justify-content-center align-items-start w-100">
            <form id="searchForm" class="row align-items-start w-75">
                <div class="col-md-12 mb-1">
                    <input type="text" id="keyword" placeholder="Tìm kiếm" style="padding: 10px" class="position-relative form-control">
                </div>
                <div class="col-md-6">
                    <select name="theloai" id="theloai" class="form-select">
                        <option value="">Chọn thể loại</option>
                        <?php
                        $sql = "SELECT * FROM theloai";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $theloai = $row['tenTheLoai'];
                                echo '<option value="' . $theloai . '">' . $theloai . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="price_range" id="price_range" class="form-select">
                        <option value="">Chọn khoảng giá</option>
                        <option value="0-100000">Dưới 100,000đ</option>
                        <option value="100000-500000">100,000đ - 500,000đ</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div id="search-books" class="carousel sanpham_carousel mb-3 hidden mt-3" data-bs-ride="carousel"></div>

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

    <div class="container-xl bg-light pb-3" id="khuyenmai">
        <div class="discount_header">
            <p>Khuyến mãi</p>
            <span>Kết thúc trong</span>
            <span>12312312321</span>
        </div>  

        <!--TODO: can ajax carousel -->
        <div id="khuyenmai_carousel" class="carousel sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                <!-- them ajax carousel item -->
                <!-- format -->
                <?php
                    $Sach_query = "SELECT * FROM sach;";
                    $Sach_result = mysqli_query($con, $Sach_query);
                    if (mysqli_num_rows($Sach_result) > 0) {
                        $i = 0;
                        while ($row_Sach = mysqli_fetch_assoc($Sach_result)) {
                            $id_Sach = $row_Sach['id'];
                            $id_SachKM = $row_Sach['phanTramKhuyenMai'];
                            if ($id_SachKM > 0) {
                                $Hinhanhsach_query = "SELECT hinhanhsach.url, hinhanhsach.idSach FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
                                $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
                                if (mysqli_num_rows($Hinhanhsach_result) > 0) {
                                    while ($row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result)) {
                                        $tenSach = limitString($row_Sach['ten'], 22); // Thay 30 bằng độ dài tối đa bạn muốn
                                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100);
                                        if ($i == 0) echo '
                                            <div class="carousel-item active">
                                                <div class="card">
                                                    <div class="img-wrapper">
                                                        <img src="' . $row_hinhanh['url'] . '" alt="">
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
                                        else echo '
                                            <div class="carousel-item">
                                                <div class="card">
                                                    <div class="img-wrapper">
                                                        <img src="' . $row_hinhanh['url'] . '" alt="">
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
                                            </div>'
                                        ;
                                        $i++;
                                    }
                                }
                            }
                        }
                    }
                ?>

            </div>
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
    <div class="container bg-light pb-3" id="vie">
        <div class="bookszoneproduct_header">
            <div class="title">
                <p>Sách tiếng việt</p>
            </div>
            <ul class="list">
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
                                        echo '<li><a onclick="handleClickVie(\'' . $row_chude['tenChuDe'] . '\', ' . $row_chude['id'] . ');">' . $row_chude['tenChuDe'] . '</a></li>';
                                    }
                                }
                            }
                        }
                    }
                ?>
            </ul>
        </div>
        <div id="sachtiengviet_carousel" class="carousel container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                <?php
                    //Lấy các sản phẩm thuộc sách tiếng việt
                    $Sach_query = "SELECT * FROM sach;";
                    $Sach_result = mysqli_query($con, $Sach_query);
                    if (mysqli_num_rows($Sach_result) > 0){
                        $i = 0; //dung de danh dau phan tu dau tien de tham class acitve cho carousel hoạt động
                        while ($row_Sach = mysqli_fetch_assoc($Sach_result)){
                            $id_Sach = $row_Sach['id'];
                            if($row_Sach['idNgonNgu']=='1'){
                                $Hinhanhsach_query = "SELECT hinhanhsach.url, hinhanhsach.idSach FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
                                $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
                                if(mysqli_num_rows($Hinhanhsach_result)>0){
                                    while ($row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result)){
                                        $tenSach = limitString($row_Sach['ten'], 22); // Thay 30 bằng độ dài tối đa bạn muốn
                                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100) ;
                                        if ($i == 0) echo'
                                            <div class="carousel-item active">  
                                                <div class="card">
                                                    <div class="img-wrapper">
                                                        <img src="' . $row_hinhanh['url'] . '" alt="">
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
                                            </div>'
                                        ;
                                        else echo '
                                            <div class="carousel-item">  
                                                <div class="card">
                                                    <div class="img-wrapper">
                                                        <img src="' . $row_hinhanh['url'] . '" alt="">
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
                                            </div>'
                                        ;
                                        $i++;

                                    }
                                }
                            }
                            
                        }
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#sachtiengviet_carousel" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sachtiengviet_carousel" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="more">
            <button data-bs-target="#sachtiengviet_collapse" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>
        <!-- show response from ajax request -->
        <div id="sachtiengviet_collapse" class="collapse show w-100 paginator_collapse" >
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>

    <!-- Sách tiếng anh -->
    <div class="container bg-light pb-3 " id="eng">
        <div class="bookszoneproduct_header">
            <div class="title">
                <p>Sách tiếng anh</p>
            </div>
            <ul class="list">
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
                                        echo '<li><a onclick="handleClickEng(\'' . $row_chude['tenChuDe'] . '\', ' . $row_chude['id'] . ');">' . $row_chude['tenChuDe'] . '</a></li>';
                                    }
                                }
                            }
                        }
                    }
                ?>        
            </ul>
        </div>
        <div id="sachtienganh_carousel" class="carousel container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                <?php
                    //Lấy các sản phẩm thuộc sách tiếng anh
                    $Sach_query = "SELECT * FROM sach;";
                    $Sach_result = mysqli_query($con, $Sach_query);
                    if (mysqli_num_rows($Sach_result) > 0){
                        $i = 0;
                        while ($row_Sach = mysqli_fetch_assoc($Sach_result)){
                            $id_Sach = $row_Sach['id'];
                            if($row_Sach['idNgonNgu']=='2'){
                                $Hinhanhsach_query = "SELECT hinhanhsach.url, hinhanhsach.idSach FROM hinhanhsach WHERE hinhanhsach.idSach = $id_Sach LIMIT 1;";
                                $Hinhanhsach_result = mysqli_query($con, $Hinhanhsach_query);
                                if(mysqli_num_rows($Hinhanhsach_result)>0){
                                    while ($row_hinhanh = mysqli_fetch_assoc($Hinhanhsach_result)){
                                        $tenSach = limitString($row_Sach['ten'], 22); // Thay 30 bằng độ dài tối đa bạn muốn
                                        $Discount_price = $row_Sach['giagoc'] - ($row_Sach['phanTramKhuyenMai'] * $row_Sach['giagoc'] / 100) ;
                                        if ($i == 0) echo'
                                            <div class="carousel-item active">  
                                                <div class="card">
                                                    <div class="img-wrapper">
                                                        <img src="' . $row_hinhanh['url'] . '" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">' . $tenSach. '</h5>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="card-text">' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                                                            <p class="card-text text-decoration-line-through" style="color: red">' . number_format($row_Sach['giagoc'], 0, '', '.') . 'đ</p>
                                                        </div>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>';
                                        else echo '
                                            <div class="carousel-item">
                                                <div class="card">
                                                    <div class="img-wrapper">
                                                        <img src="' . $row_hinhanh['url'] . '" alt="">
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
                                            </div>'
                                        ;
                                        $i++;
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#sachtienganh_carousel" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sachtienganh_carousel" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="more">
            <button data-bs-target="#sachtienganh_collapse" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>

        <!-- show response from ajax request -->
        <div id="sachtienganh_collapse" class="collapse show w-100 paginator_collapse">
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>
</main>