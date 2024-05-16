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
    
    <!-- Banner -->
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

    <!-- Khuyến mãi -->
    <div class="container-xl bg-light pb-3">
        <div class="discount_header">
            <p>Khuyến mãi</p>
            <span>Kết thúc trong</span>
            <span>12312312321</span>
        </div>  

        <!--TODO: can ajax carousel -->
        <div id="khuyenmai_carousel" class="carousel collapse show sachKhuyenMaiData sanpham_carousel mb-3" data-bs-ride="carousel"> 
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
            <button data-bs-target=".sachKhuyenMaiData" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>
        <!-- show response from ajax request -->
        <div class="collapse hide sachKhuyenMaiData w-100 paginator_collapse" id="km_collapse">
            <nav class="w-100 d-flex justify-content-center mb-3"></nav>
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>

    <!-- Sách trong nước -->
    <div class="container bg-light pb-3 " style="min-height: 260px;">
        <div class="bookszoneproduct_header">
            <div class="title">
                <p>Sách trong nước</p>
            </div>
            <ul class="list">
                <?php
                    //liet ke tat ca chu de thuoc danh muc sach trong nuoc
                    $sql = "SELECT cd.id, cd.tenChuDe FROM chude cd, danhmuc dm WHERE cd.idDanhMuc = dm.id AND dm.tenDanhMuc = 'Sách trong nước';";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <li onclick="loadPage({
                                    page: 1,
                                    idChuDe: <?= $row['id'] ?>
                                }, '#sachTrongNuoc_collapse');">
                                <?= $row['tenChuDe'] ?>
                            </li>
                        <?php }
                    }
                ?>
            </ul>
        </div>
        <div id="sachTrongNuoc_carousel" class="carousel collapse show sachTrongNuocData container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                <!-- du lieu se do vao day -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#sachTrongNuoc_carousel" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sachTrongNuoc_carousel" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="more">
            <button data-bs-target=".sachTrongNuocData" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>
        <!-- show response from ajax request -->
        <div id="sachTrongNuoc_collapse" class="collapse hide sachTrongNuocData w-100 paginator_collapse " >
            <nav class="w-100 d-flex justify-content-center mb-3"></nav>
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>

    <!-- Sách nước ngoài -->
    <div class="container bg-light pb-3 " style="min-height: 260px;">
        <div class="bookszoneproduct_header">
            <div class="title">
                <p>Sách nước ngoài</p>
            </div>
            <ul class="list">
                <?php
                    //liet ke tat ca chu de thuoc danh muc foreign books
                    $sql = "SELECT cd.id, cd.tenChuDe FROM chude cd, danhmuc dm WHERE cd.idDanhMuc = dm.id AND dm.tenDanhMuc = 'Foreign Books';";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <li onclick="loadPage({
                                    page: 1,
                                    idChuDe: <?= $row['id'] ?>
                                }, '#sachNuocNgoai_collapse');">
                                <?= $row['tenChuDe'] ?>
                            </li>
                        <?php }
                    }
                ?>        
            </ul>
        </div>
        <div id="sachNuocNgoai_carousel" class="carousel collapse show sachNuocNgoaiData container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                <!-- du lieu se do vao day -->
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#sachNuocNgoai_carousel" data-bs-slide="prev" id="km_prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sachNuocNgoai_carousel" data-bs-slide="next" id="km_next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="more">
            <button data-bs-target=".sachNuocNgoaiData" data-bs-toggle="collapse">
                Xem thêm
            </button>
        </div>

        <!-- show response from ajax request -->
        <div id="sachNuocNgoai_collapse" class="collapse hide sachNuocNgoaiData w-100 paginator_collapse ">
            <nav class="w-100 d-flex justify-content-center mb-3"></nav>
            <div class="response row mb-3 g-1 m-auto"></div>
        </div>
    </div>
</main>