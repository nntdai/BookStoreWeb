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
                <div class="carousel-item active">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
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



            

    <div class="container bg-light pb-3">
        <div class="bookszoneproduct_header">
                <div class="title">
                    <p>Sách tiếng việt</p>
                </div>
                <div class="list">
                    <li><a href="#">Văn học</a></li>
                    <li><a href="#">Kinh tế</a></li>
                    <li><a href="#">Kỹ năng</a></li>
                    <li><a href="#">Thiếu nhi</a></li>
                </div>
            </div>  

        <div id="demo" class="carousel container-lg sanpham_carousel mb-3" data-bs-ride="carousel"> 
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
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
</main>