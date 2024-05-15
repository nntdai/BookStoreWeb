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
        
    <!-- hien thi san pham loc duoc -->
    <div id="search-books" class="w-100 collapse hide" style="min-height: 300px;">
        <nav class="w-100 d-flex justify-content-center mb-3"></nav>
        <div class="response row mb-3 g-1 m-auto container"></div>
    </div>
    

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
                <!-- du lieu se do vao day -->
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
        <div class="collapse hide w-100 paginator_collapse" id="km_collapse">
            <nav class="w-100 d-flex justify-content-center mb-3"></nav>
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>

    <!-- Sách tiếng việt -->
    <div class="container bg-light pb-3 " style="min-height: 260px;">
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
                                        echo'
                                        <li onclick="loadPage(1, 0,'.$row_chude["id"].', 1, 0, 0, 0, \'#sachtiengviet_collapse\', true);">' . $row_chude['tenChuDe'] . '</li>                        ';
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
                <!-- du lieu se do vao day -->
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
        <div id="sachtiengviet_collapse" class="collapse hide w-100 paginator_collapse" >
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>

    <!-- Sách tiếng anh -->
    <div class="container bg-light pb-3 " style="min-height: 260px;">
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
                                        echo '<li  onclick="loadPage(1, 0, '.$row_chude["id"].', '.$row_danhmuc['id'].', 0, 0, 0, \'#sachtienganh_collapse\', true);">'.$row_chude["tenChuDe"].'</li>';
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
                <!-- du lieu se do vao day -->
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
        <div id="sachtienganh_collapse" class="collapse hide w-100 paginator_collapse">
            <div class="response row mb-3 g-1 m-auto"></div>
            
        </div>
    </div>
</main>